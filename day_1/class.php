<?php
class DayOne {
    /**
     * @var String File location
     */
    public $file;

    /**
     * @var int|String target number to find
     */
    public $target = 2020;

    /**
     * @var String Found target
     */
    private $_output;

    /**
     * DayOne constructor.
     * @param $file String File location
     */
    public function __construct($file) {
        $this->file = $file;
    }

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
                if ($value+$value2 == $this->target) {
                    $this->_output = $value."+".$value2;
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