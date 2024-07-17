<?php
// Assignment 1: Problem 4
//  pyramid pattern based on the given number n

function pyramid($level=null){
    if(!is_int($level)){
        echo "please type an integer value";
        die();
    }
    for($i=1;$i<=$level;$i++){
        for($j=$level-$i;$j>=1;$j--){
            echo " ";
        }
        for($k=($i*2)-1;$k>=1;$k--){
            echo "*";
        }
        echo "\n";
    }
    
}
pyramid(5);