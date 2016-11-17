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
        public function inserir_cliente(Cliente $cliente) {
        try {
            $sql = "INSERT INTO cliente "
                    . " (nome_completo,"
                    . " cpf,"
                    . " numero_celular,"
                    . " endereco,"
                    . " email)"
                    . " VALUES "
                    . " (:nome_completo,"
                    . " :cpf,"
                    . " :numero_celular,"
                    . " :endereco,"
                    . " :email)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome_completo", $cliente->getNomeCompleto());
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            $p_sql->bindValue(":numero_celular", $cliente->getNumeroCelular());
            $p_sql->bindValue(":endereco", $cliente->getEndereco());
            $p_sql->bindValue(":email", $cliente->getEmail());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM cliente";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $sql = "DELETE FROM marca WHERE id =:id";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            
        }
    }

    function cpf($cpf, $senha) {
        try {
            $sql = Conexao::getInstance()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf AND senha = :senha");

            $param = array(
                ":cpf" => $cpf,
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
    public function RetornaNome($cpf){
		try{
			
			 $sql = Conexao::getInstance()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf");
			$param = array(
				":cpf"  => $cpf
			);
			
		 $sql->execute($param);
			
			$dados = $sql->fetch(PDO::FETCH_ASSOC);
			
			return $dados["cpf"];
			
			
		}catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
			return null;
        }
	}
}

