<?php

namespace Asterisk\version;

class Manager{
    
    public $parent;
    
    public function __construct($parent){
        $this->parent = $parent;
    }
    
    public function call($array=array(),$function=null){
        if(!empty($array)){
            return $this->parent->queryRequest($array,$function);
        }
    }
    
}