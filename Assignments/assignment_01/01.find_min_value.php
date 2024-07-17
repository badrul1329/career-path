<?php
// Assignment 1: Problem 1
// Given a list of integers, find the minimum of their absolute values. 

function find_min($numbers){
	$minimum = abs($numbers[0]);
	foreach($numbers as $number){
		$number = abs($number);
		if($minimum > $number){
			$minimum = $number;
		}
	}
	echo $minimum;
}

$numbers = [10,12,15,189,22,2,34];
find_min($numbers);
echo "\n";
$numbers1 = [10, -12, 34, 12, -3, 123];
find_min($numbers1);