<?php
namespace Asterisk\version_13;
class ManagerAction{
    public $parent;
    public function __construct($parent){
        $this->parent = $parent;
    }
    public function Login(){
    }
    public function Logoff(){
    }
    public function Queues($result=array()){
        /******************************************************************
        # Show queues information.
        Action: QueueStatus
        *******************************************************************/
        print('<pre>');
        print_r($result);
    }
    public function QueueStatus($result=array()){
        /******************************************************************
        # Show queues information.
        Action: QueueStatus
        ActionID: <value>
        Queue: <value>
        Member: <value>
        # ###################
        ActionID - ActionID for this transaction. Will be returned.
        Queue - Limit the response to the status of the specified queue.
        Member - Limit the response to the status of the specified member. 
        *******************************************************************/
        var_dump($result);
        
    }
    public function call($array=array(),$function=''){
        
        if(!empty($function) && is_callable(array($this,$function))){ 
            $obj = $this;
            return $this->parent->queryRequest($array,function($array)use($obj,$function){
                return $obj->$function($array);
            });
        }
        return $this->parent->queryRequest($array);
    }
    public function test(){
        echo '<br />manager action 1.8';
    }
}