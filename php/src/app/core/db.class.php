<?php
    class DB {


        public $host = 'db';
        public $dbname = 'MY_DATABASE';
        public $password = 'MYSQL_PASSWORD';
        public $username = 'MYSQL_USER';
        
        public $conn;

        function __construct(){
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8;", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                echo 'Error in database connection '. $ex->getMessage();
            }
        }
        function prep($query){
            return $this->conn->prepare($query);
        }
        function execute($query,$value){
            $query = $this->prep($query);
            return $query->execute($value);
        }
        function fetch($query,$value){
            $query = $this->prep($query);
            $query->execute($value);
            return $query->fetch();
        }
        function fetchAll($query,$value){
            $query = $this->prep($query);
            $query->execute($value);
            return $query->fetchAll();
        }
        function num_row($query,$value){
            $query = $this->prep($query);
            $query->execute($value);
            return $query->rowCount();
        }
    }
?>