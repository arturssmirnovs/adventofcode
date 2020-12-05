<?php
require_once "class.php";
require_once "class2.php";

$script = new DayThreePartOne("data.txt");
echo $script->output();

echo "<br/>";

$script = new DayThreePartTwo();
echo $script->output();

