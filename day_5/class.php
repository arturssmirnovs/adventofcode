<?php
class DayFivePartOne {
    /**
     * File
     * @var
     */
    public $file;

    /**
     * Ticket ids
     * @var array
     */
    public $ids = [];

    /**
     * DayFivePartOne constructor.
     * @param $file
     */
    public function __construct($file) {
        $this->file = $file;

        $this->process();
    }

    /**
     * proccess tickets and setup ID's
     */
    public function process() {
        foreach (explode(PHP_EOL, file_get_contents($this->file)) as $line) {
            $this->ids[] = $this->_processTicket($line);
        }
    }

    /**
     * Get highest ticket ID
     * @return mixed
     */
    public function getMax() {
        return max($this->ids);
    }

    /**
     * Get min ticket ID
     * @return mixed
     */
    public function getMin() {
        return min($this->ids);
    }

    /**
     * Get missing ticket ID
     * @return mixed
     */
    public function getMissing() {
        $min = $this->getMin();
        $max = $this->getMax();

        foreach (range($min, $max) as $id) {
            if (!in_array($id, $this->ids)) {
                return $id;
            }
        }
    }

    /**
     * Get ticket unique ID
     * @param $ticket
     * @return float
     */
    private function _processTicket($ticket) {

        $parts = str_split(substr($ticket, 0, 7), 1);

        $lower = 0;
        $upper = 127;
        $row = "";

        foreach ($parts as $part) {

            if ($part == "F") { // LOWER
                $lower = round($lower);
                $upper = floor($upper/2+($lower/2));
                $row = $lower;
            }
            if ($part == "B") { // HIGHER
                $lower = round($upper/2+($lower/2));
                $upper = floor($upper);

                $row = $upper;
            }

            //echo $part." - ".$lower." - ".$upper."<br/>";
        }

        // COLUMN

        $parts = str_split(substr($ticket, 7, 3), 1);

        $lower = 0;
        $upper = 7;
        $column = "";
        foreach ($parts as $part) {

            if ($part == "L") { // LOWER
                $lower = round($lower);
                $upper = floor($upper/2+($lower/2));
                $column = $lower;
            }
            if ($part == "R") { // HIGHER
                $lower = round($upper/2+($lower/2));
                $upper = floor($upper);

                $column = $upper;
            }

            //echo $part." - ".$lower." - ".$upper."<br/>";
        }

        return round(round($row)*8+round($column));
    }
}