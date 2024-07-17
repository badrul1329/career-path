<?php
// Assignment 1: Problem 3
// Reverse the characters of each word

class SentenceManager{
    private $sentence;
    
    public function __construct($sentence = null){
        $this->sentence = $sentence;
    }
    public function rev_word($word){
        $reverse = null;
        $count = strlen($word);
        for($i=$count-1;$i>=0;$i--){
            $reverse.=$word[$i];
        }
        return $reverse;
    }
    public function rev_sentence(){
        $reverse = null;
        $words = explode(' ',$this->sentence);
        foreach($words as $word){
            $reverse .= $this->rev_word($word)." ";
        }
        echo $reverse;
    }
}

$sentence = "I love programming";
$manager = new SentenceManager($sentence);
$manager->rev_sentence();