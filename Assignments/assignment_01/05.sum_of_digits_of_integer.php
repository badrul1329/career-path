<?php
// Assignment 1: Problem 5

function sum($number){
    $digit= 0;
    $sum = 0;
    if(!is_int($number)){
        echo "Please type an integer & positive value.";
        die();
    }
    $number = ($number<0)? (-1*$number):$number;
    while($number>0){
        $digit = $number % 10;
        $sum +=$digit;
        
        $number = (int) ($number / 10);
    }
    echo $sum;
}

sum(-1000);