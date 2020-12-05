<?php
require_once "class.php";
require_once "class_2.php";

$script = new DayFourPartOne("data.txt");
echo $script->output();

echo "<br/>";

$script = new DayFourPartTwo("data.txt");
echo $script->output();
