<?php

class Conexao {

    private static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        If (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=mysql.hostinger.com.br;"
                    . "dbname=u413575999_it", "u413575999_root", "itsolution",
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        return self::$instance;
    }

}
