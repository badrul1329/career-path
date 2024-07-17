<?php
// Assignment 1: Problem 2
// Given a few paragraphs in a file, read the file and count how many words are there

class FileManager{
    protected $file;
    protected $contents;
    
    public function __construct($file=null){
        $this->file = $file;
    }
    public function getContent(){
        if(empty($this->file)){
            echo "File not Found";
            die();
        }
        $this->contents = file_get_contents($this->file);
        return $this->contents;
    }
    public function filter(){
        $str = trim($this->contents);
        $this->contents = str_replace( array( '\'', '"',',' ), '', $str);
        return $this->contents;
    }
    
    public function countWords(){
        // return str_word_count($this->contents);
        $this->getContent();
        $this->filter();
        $words = explode(' ',$this->contents);
        $words = array_filter($words);
        print count($words);
    }
}
$words = new FileManager('./info.txt');
$words->countWords();