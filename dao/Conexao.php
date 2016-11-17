<?php

class Conexao {

    private static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        If (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=127.0.0.1;"
                    . "dbname=itsolution_db", "root", "");
        }
        return self::$instance;
    }

}
