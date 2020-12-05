<?php
class DayThreePartOne {
    /**
     * Map
     * @var string
     */
    public $data;

    /**
     * Current position
     * @var int
     */
    public $position = 0;

    /**
     * How many trees are on the way
     * @var int
     */
    private $trees = 0;

    /**
     * How many steps to right
     * @var int
     */
    public $step = 3;

    /**
     * How many steps down
     * @var int
     */
    public $down = 1;

    /**
     * DayThreePartOne constructor.
     * @param $file
     */
    public function __construct($file, $step = null, $down = null) {
        $this->data = file_get_contents($file);

        if ($step) {
            $this->step = $step;
        }

        if ($down) {
            $this->down = $down;
        }

        $lines = count(explode(PHP_EOL, $this->data));

        $extanded = "";
        foreach (explode(PHP_EOL, $this->data) as $line) {
            $extanded .= str_repeat($line, round($lines/$this->step*2)).PHP_EOL;
        }

        $this->data = $extanded;
    }

    /**
     * Output result
     * @return int
     */
    public function output() {
        $parts = explode(PHP_EOL, $this->data);

        $lines = count($parts);

        $down = 0;
        for ($x = 0; $x <= $lines-2; $x++) {
            $down++;
            if ($down !== $this->down && $x) {
                continue;
            }
            $down = 0;

            $line = $parts[$x];

            $characters = substr($line, $this->position, 1);

            //echo $x." = ".$this->position." ".$characters."<br/>";

            if ($characters == "#") {
                $this->trees++;
            }

            $this->position = $this->position+$this->step;
        }

        return $this->trees;
    }
}