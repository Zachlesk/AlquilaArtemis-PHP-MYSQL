<?php

require_once("db.php");

class Conectar{
        protected $db;

        public function __construct(){
            $this->db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

    }

?>