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
class Asterisk{
    /**
     * 
     **/
    private $username;
    /**
     * Secret
     **/
    private $password;
    /**
     * 
     **/
    private $host = '127.0.0.1';
    /**
     * 
     **/
    private $port = '5038';
    /**
     * Defatult
     **/
    protected $version = '_';
    /**
     * conection timeout
     **/
    private $timeout=10;
    /**
     * read connectino timeout
     **/
    private $streamTimeout = 10;
    /**
     * 
     **/
    private $socket;
    /**
     * 
     **/
    private $request = '';
    /**
     * From:
     * ManagerACtion
     * ManagerEvent 
     * AgiCommand
     **/
    private $queryRequest;
    //
    public function __construct($config){
        $this->username = $config['username'];
        $this->password = $config['password'];
        if(!empty($config['host'])){
            $this->host = $config['host'];
        }
        if(!empty($config['port'])){
            $this->port = $config['port'];
        }
        if(!empty($config['version'])){
            $this->version = $config['version'];
        }
    }
    public function queryRequest($query){
        $this->queryRequest = $query;
    }
    public function setVersion($version){
        $this->version = $version;
    }
    private function connect(){
        $this->socket = fsockopen($this->host,$this->port, $errno, $errstr, $this->timeout);
        if (!$this->socket){
           throw new \Exception("$errstr ($errno)");
        }
    }
    private function amiBuildRequest(){
        $this->request  = 'Action: Login'.$this->space(1);
        $this->request .= 'Username: '.$this->username.$this->space(1);
        $this->request .= 'Secret: '.$this->password.$this->space(2); 
        foreach($this->queryRequest as $key => $value){
            if(!empty($value)){
                $this->request .= $key.': '.$value.$this->space(1);
            }
        }
        $this->request .= $this->space(1);
        $this->request .= 'Action: Logoff'.$this->space(2);
    }
    public function amiRequest($function=null){
        $this->connect();
        $this->amiBuildRequest();
        stream_set_timeout($this->socket, $this->streamTimeout);
        fputs($this->socket,$this->request);
        $wrets=fgets($this->socket);
        $array=array();
        while (!feof($this->socket)){
           $t = fgets($this->socket);
           //echo $t.'<br />';
           if(!empty($t) && $t != $this->space(1) ){ $array[] = $t; }
        }
        if(is_callable($function)){
            return $function($array);
        }
        return $array;
    }
    
    private function space($n){
        $s = "\r\n";
        return str_repeat($s,$n);
    }
    
}