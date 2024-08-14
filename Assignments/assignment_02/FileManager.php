<?php

class FileManager
{
    private $file, $data;
    public function __construct($file){
        $this->file = $file;
        $this->data = file_get_contents($this->file);
    }
    public function getData(){
        return $this->data = json_decode($this->data,true);
    }
    public function save($data=''){
        if(empty($data)){
            return false;
        }
        $this->data = json_encode($data);
        file_put_contents($this->file,$this->data);
    }
}