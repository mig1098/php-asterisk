<?php
namespace Asterisk\version;

class Manager{
    
    public $parent;
    
    public function __construct($parent){
        $this->parent = $parent;
    }
    
    public function call($array=array()){
        if(!empty($array)){
            return $this->parent->queryRequest($array);
        }
    }
    
}