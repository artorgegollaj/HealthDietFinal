<?php

class Database{
    private $server ="localhost";
    private $dbname="productdatabase";
    private $username="root";
    private $password="";

    function startConnection(){
        try{
            $conn=new PDO("mysql:host=$this->server; dbname=$this->dbname",$this->username,$this->password);
            $conn->setAttribute(attribute: PDO::ATTR_ERRMODE,value: PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Database connection failed!".$e->getMessage();
            return null;
        }
    }
}
?>