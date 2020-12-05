<?php
class DayThreePartTwo {
    /**
     * Output result
     * @return float|int
     */
    public function output() {
        $class = new DayThreePartOne("data.txt", 1, 1);
        $first = $class->output();

        $class = new DayThreePartOne("data.txt", 3, 1);
        $second = $class->output();

        $class = new DayThreePartOne("data.txt", 5, 1);
        $third = $class->output();

        $class = new DayThreePartOne("data.txt", 7, 1);
        $fourth = $class->output();

        $class = new DayThreePartOne("data.txt", 1, 2);
        $fifth = $class->output();

        return $first*$second*$third*$fourth*$fifth;
    }

}