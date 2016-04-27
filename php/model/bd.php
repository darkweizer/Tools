<?php
    class Bd {

        private $db_name;

        private $host;

        private $user;

        private $password;

        private static $pdo;


        public function __construct() {

            if(!file_exists("config.ini")){
                throw new Exception("Fichier config.ini de configuration de connexion à la base de donnée manquant.");
            }

            $config = parse_ini_file("config.ini");

            $this->db_name  = config['db_name'];
            $this->host     = config['host'];
            $this->user     = config['user'];
            $this->password = config['password'];
        }// __construct()


        public function getPDO() {

            if ( is_null(self::$pdo)) {
                self::$pdo = $this->connect();
            }

            return self::$pdo;
        }// getPDO()
        
        
        private function connect()
        {
            try{

                $db = new PDO('mysql:host'.$this->host.';dbname='.$this->db_name, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                return $db;

            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }// connect()
}