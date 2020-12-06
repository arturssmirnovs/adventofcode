<?php
require_once "class.php";

$script = new DaySix("data.txt");

echo $script->getAnswers();

echo "<br/>";

echo $script->getUniqueAnswers();