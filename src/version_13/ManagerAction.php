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
    public function Queues($array=array()){
        /******************************************************************
        # Show queues information.
        Action: QueueStatus
        *******************************************************************/
        if(!empty($array)){
            $req = $array;
        }else{
            $req = array(
                'Action'=>'Queues'
            );
        }
        return $this->parent->queryRequest($req);
    }
    public function QueueStatus($array=array()){
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
        if(!empty($array)){
            $req = $array;
        }else{
            $req = array(
                'Action'   => 'QueueStatus',
                'ActionID' => '',
                'Queue'    => '',
                'Member'   => ''
            );
        }
        return $this->parent->queryRequest($req);
    }
    public function call($array=array()){
        return $this->parent->queryRequest($array);
    }
    public function test(){
        echo '<br />manager action 1.8';
    }
}