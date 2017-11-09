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
    protected $version = '1.8';
    /**
     * 
     **/
    private $timeout=10;
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
    private function connect(){
        $this->socket = fsockopen($this->host,$this->port, $errno, $errstr, $this->timeout);
        if (!$this->socket){
           throw new \Exception("$errstr ($errno)");
        }
    }
    private function amibuildRequest(){
        $this->request  = 'Action: Login'.$this->space(1);
        $this->request .= 'Username: '.$this->username.$this->space(1);
        $this->request .= 'Secret: '.$this->password.$this->space(2); 
        //
        foreach($this->queryRequest as $key => $value){
            if(!empty($value)){
                $this->request .= $key.': '.$value.$this->space(1);
            }
        }
        $this->request .= $this->space(1);
        //
        $this->request .= 'Action: Logoff'.$this->space(2);
        //echo $this->request;
        //exit;
    }
    public function amiRequest(){
        $this->connect();
        $this->amibuildRequest();
        stream_set_timeout($this->socket, 10);
        fputs($this->socket,$this->request);
        $wrets=fgets($this->socket);
        //
        while (!feof($this->socket)){
           $texto = fgets($this->socket);
           echo $texto."<br/>";
        }
        //return $this;
    }
    private function space($n){
        $s = "\r\n";
        return str_repeat($s,$n);
    }
    public function test(){
        echo 'Asterisk';
    }
}