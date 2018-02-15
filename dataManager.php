<?php

class dataManager {
    
    public $isConn;
    protected $datab;
    //connect to db
    public function __construct($username = "admin", $pass = "1234", $host = "localhost", $dbname = "gallery") {
        $this->isConn = TRUE;
        try {
            $this->datab = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8",$username, $pass);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    //disconnect
    public function Disconnect(){
        $this->datab = NULL;
        $this->isConn = FALSE;
    }
    public function createTable() {
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec ("CREATE TABLE upload (
                                          image_id INT NOT NULL AUTO_INCREMENT,
                                          image VARCHAR(255),
                                          image_thumb VARCHAR(255),
                                          click INT,
                                          PRIMARY KEY(image_id)
                                          )");
        } catch (PDOException $e) {
            print "Couldn't create table: " . $e->getMessage();
        }
    }
    
    public function getRow($query){
        try {
            $stmt = $this->datab->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function getRows($query, $params = []){
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function addImage($query, $params = []){
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return TRUE;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
   
}

