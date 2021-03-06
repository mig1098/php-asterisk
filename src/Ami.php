<?php
/**
 * --------------------------------------------
 * @author Miglio Esaud <mig1098@hotmail.com>
 * @site http://mig1098.github.com/php-asterisk
 * @version 1.0
 * @create 2017-11-07
 * @update 2017-11-09
 * --------------------------------------------
 **/
namespace Asterisk;
use Asterisk\utils\Version;
class Ami extends Asterisk{
    /**
     * Manager Action
     **/
    private $managerAction;
    private $callfunction;
    
    public function __construct($config){
        parent::__construct($config);
    }
    
    public function output(){
        return parent::amiRequest($this->callfunction);
    }
    
    public function queryRequest($query,$function=null){
        $this->callfunction = $function;
        parent::queryRequest($query);
        return $this;
    }
    
    public function version($v=''){
        parent::setVersion($v);
        return $this;
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
