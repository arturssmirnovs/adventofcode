<?php
class DayTwoPart2 extends DayTwo {
    /**
     * @var String Found target
     */
    private $_output;

    /**
     * Set _output value
     * @throws ErrorException
     * @return void
     */
    public function run() {
        $content = file_get_contents($this->file);

        if (!$content) {
            throw new ErrorException("Can't read file.");
        }

        $data = explode(PHP_EOL, $content);

        $i = 0;
        foreach ($data as $index => $line) {
            $parts = explode(" ", $line);

            $fromToParts = explode("-", $parts[0]);

            $from = $fromToParts[0];
            $to = $fromToParts[1];
            $letter = str_replace(":", "", $parts[1]);
            $password = $parts[2];

            if (substr($password, $from-1, 1) == $letter && substr($password, $to-1, 1) !== $letter) {
                $i++;
            }

            if (substr($password, $from-1, 1) !== $letter && substr($password, $to-1, 1) == $letter) {
                $i++;
            }

        }

        $this->_output = $i;
    }

    /**
     * If output has found, return output if not then try to find output
     * @return String output value
     * @throws ErrorException
     */
    public function output() {
        if (!$this->_output) {
            $this->run();
        }

        return $this->_output;
    }
}