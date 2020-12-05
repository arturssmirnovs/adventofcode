<?php
require_once "class.php";

$script = new DayFivePartOne("data.txt");

echo $script->getMax();

echo "<br/>";

echo $script->getMissing();
