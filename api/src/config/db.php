<?php
    class db{
        // Properties
        private $dbhost = 'br-cdbr-azure-south-b.cloudapp.net';
        private $dbuser =  'b5878316b539fe';
        private $dbpass = '8e5d969e';
        private $dbname = 'campusdate';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }