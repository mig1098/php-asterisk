<?php

namespace Asterisk;
use Asterisk\utils\Version;
class Ami extends Asterisk{
    /**
     * Manager Action
     **/
    private $managerAction;
    
    public function __construct($config){
        parent::__construct($config);
    }
    
    public function output(){
        return parent::amiRequest();
    }
    
    public function queryRequest($query){
        parent::queryRequest($query);
        return $this;
    }
    
    public function version($v){
        parent::setVersion($v);
    }
    
    public function parseData(){
        
        $this->managerAction;
    }
    
    public function ManagerAction(){
        switch($this->version){
            case Version::$version['version_1_8']:
                $this->managerAction = New \Asterisk\version_1_8\ManagerAction($this);
            break;
            case Version::$version['version_13']:
                $this->managerAction = New \Asterisk\version_13\ManagerAction($this);
            break;
            default:
                $this->managerAction = New \Asterisk\version\Manager($this);
            break;
        }
        return $this->managerAction;
    }
    
    public function ManagerEvent(){
    }
}