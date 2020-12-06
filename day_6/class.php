<?php
class DaySix {
    /**
     * File
     * @var
     */
    public $file;

    /**
     * DaySix constructor.
     * @param $file
     */
    public function __construct($file) {
        $this->file = $file;
    }

    /**
     * Get answers
     * @return int
     */
    public function getAnswers() {
        $data  = preg_split("#\n\s*\n#Uis", file_get_contents($this->file));

        $sum = 0;
        foreach ($data as $line) {
            $line = str_replace([PHP_EOL, " "], "", $line);
            $array = array_unique(str_split($line));

            $sum = $sum+count($array);
        }

        return $sum;
    }

    /**
     * Get answers that all was answered yes
     * @return int
     */
    public function getUniqueAnswers() {
        $data  = preg_split("#\n\s*\n#Uis", file_get_contents($this->file));

        $sum = 0;
        foreach ($data as $line) {
            $ids = str_split(str_replace([PHP_EOL, " "], "", $line));

            $target = count(explode(PHP_EOL, $line));

            $vals = array_count_values($ids);

            foreach ($vals as $val => $count) {
                if ($count == $target) {
                    $sum++;
                }
            }
        }

        return $sum;
    }
}