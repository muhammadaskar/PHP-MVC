<?php

    class Database {
        
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        private $dbHandler;
        private $statement;

        public function __construct(){
            $this->koneksi();
        }

        private function koneksi(){
            // database source name
            $dsn = 'mysql:host=' . $this->host .';dbname=' .$this->db_name;

            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try{
                $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $option);
            } catch(PDOException $e){
                die($e->getMessage());
            }

        }

        public function query($query){
            $this->statement = $this->dbHandler->prepare($query);
        }

        public  function bind($param, $value, $type = null){
            
            if (is_null($type)){
                switch (true){
                    case is_int($value) : 
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) : 
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;

                }
            }
            // melakukan bind perdasarkan parameter
            $this->statement->bindValue($param, $value, $type);
        }

        // mengeksekusi atribut statement
        public function execute()
        {
            $this->statement->execute();
        }

        // kalau datanya banyak(Lebih Dari satu)
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }

        // Kalau Datanya cuman satu
        public function single(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }

        // untuk menghitung baris
        public function rowCount(){
            return $this->statement->rowCount();
        }

    }