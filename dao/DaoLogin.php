<?php

require_once 'dao/Conexao.php';
require_once 'dao/DaoLogin.php';
require_once 'model/login.php';

class DaoLogin {

    public static $instance;

    public function __construct() {
//
    }

    public static function getInstance() {
        If (!isset(self::$instance)) {
            self::$instance = new DaoLogin();
        }
        return self::$instance;
    }

    function login($usuario, $senha) {
        try {
            $sql = Conexao::getInstance()->prepare("SELECT * FROM tb_login WHERE usuario = :usuario AND senha = :senha");

            $param = array(
                ":usuario" => $usuario,
                ":senha" =>($senha)
            );


            $sql->execute($param);

            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }
    public function RetornaNome($usuario){
		try{
			
			 $sql = Conexao::getInstance()->prepare("SELECT * FROM tb_login WHERE usuario = :usuario");
			$param = array(
				":usuario"  => $usuario
			);
			
		 $sql->execute($param);
			
			$dados = $sql->fetch(PDO::FETCH_ASSOC);
			
			return $dados["usuario"];
			
			
		}catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
			return null;
        }
	}
}
