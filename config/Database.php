<?php 

class Database {

    private $host;

    private $port;

    private $user;

    private $password;

    private $db;

    public function connect()
    {
        $this->host = 'localhost';
        $this->port = '3306';
        $this->user = 'root';
        $this->password = '';
        $this->db = 'crud';
        
        try {
        
            return new PDO("mysql:host=$this->host:$this->port;dbname=$this->db", $this->user, $this->password);
        
        } catch (Exception $e){

            return $e->getMessage();
        
        }
    }

}