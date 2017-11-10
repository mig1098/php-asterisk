<?php
namespace Asterisk\version_13;
/**
 * ManagerAction
 * 
 * @package 
 * @author mig.inc
 * @copyright 2017
 * @version $Id$
 * @access public
 */
class ManagerAction{
    public $parent;
    public function __construct($parent){
        $this->parent = $parent;
    }
    public function AbsoluteTimeout($result=array()){
        return $result;
    }
    public function AgentLogoff($result=array()){
        return $result;
    }
    public function Agents($result=array()){
        return $result;
    }
    public function AGI($result=array()){
        return $result;
    }
    public function AOCMessage($result=array()){
        return $result;
    }
    public function Atxfer($result=array()){
        return $result;
    }
    public function BlindTransfer($result=array()){
        return $result;
    }
    public function Bridge($result=array()){
        return $result;
    }
    public function BridgeDestroy($result=array()){
        return $result;
    }
    public function BridgeInfo($result=array()){
        return $result;
    }
    public function BridgeKick($result=array()){
        return $result;
    }
    public function BridgeList($result=array()){
        return $result;
    }
    public function BridgeTechnologyList($result=array()){
        return $result;
    }
    public function BridgeTechnologySuspend($result=array()){
        return $result;
    }
    public function BridgeTechnologyUnSuspend($result=array()){
        return $result;
    }
    public function Challenge($result=array()){
        return $result;
    }
    public function ChangeMonitor($result=array()){
        return $result;
    }
    public function Command($result=array()){
        return $result;
    }
    public function ConfBridgeKick($result=array()){
        return $result;
    }
    public function ConfBridgeList($result=array()){
        return $result;
    }
    public function ConfBridgeListRooms($result=array()){
        return $result;
    }
    public function ConfBridgeLock($result=array()){
        return $result;
    }
    public function ConfBridgeMute($result=array()){
        return $result;
    }
    public function QueueAdd($result=array()){
        return $result;
    }
    public function QueueLog($result=array()){
        return $result;
    }
    public function QueueMemberRingInUse($result=array()){
        return $result;
    }
    public function QueuePause($result=array()){
        return $result;
    }
    public function QueuePenalty($result=array()){
        return $result;
    }
    public function QueueReload($result=array()){
        return $result;
    }
    public function QueueRemove($result=array()){
        return $result;
    }
    public function QueueReset($result=array()){
        return $result;
    }
    public function QueueRule($result=array()){
        return $result;
    }
    public function Queues($result=array()){
        /******************************************************************
        # Show queues information.
        Action: QueueStatus
        *******************************************************************/
        
        
        return $result;
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
        
        return $result;
    }
    public function QueueSummary($result=array()){
        return $result;
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