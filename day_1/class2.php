<?php
class DayTwo extends DayOne {

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

        foreach ($data as $index => $value) {
            foreach ($data as $index2 => $value2) {
                foreach ($data as $index3 => $value3) {
                    if ($value+$value2+$value3 == $this->target) {
                        $this->_output = $value."+".$value2."+".$value3;
                    }
                }
            }
        }
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