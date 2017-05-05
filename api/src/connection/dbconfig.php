<?php

class db{
    private $dbhost = 'br-cdbr-azure-south-b.cloudapp.net';
    private $dbuser = 'b5878316b539fe';
    private $dbpass = '8e5d969e';
    private $dbname = 'campusdate';

    public function connect(){
        $mysql_connect_str = "mysql:host=$this->dbhost; dbname=$this->dbname";
        $dbConnect = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
        $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnect;

    }
}
