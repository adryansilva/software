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

    public function inserir_funcionario(Funcionario $funcionario) {
        try {
            $sql = "INSERT INTO funcionario "
                    . " (nome_completo,"
                    . " cpf,"
                    . " numero_celular,"
                    . " endereco,"
                    . " email,"
                    . "funcao,"
                    . "senha)"
                    . " VALUES "
                    . " (:nome_completo,"
                    . " :cpf,"
                    . " :numero_celular,"
                    . " :endereco,"
                    . " :email,"
                    . " :funcao,"
                    . " :senha)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome_completo", $funcionario->getNomeCompleto());
            $p_sql->bindValue(":cpf", $funcionario->getCpf());
            $p_sql->bindValue(":numero_celular", $funcionario->getNumeroCelular());
            $p_sql->bindValue(":endereco", $funcionario->getEndereco());
            $p_sql->bindValue(":email", $funcionario->getEmail());
            $p_sql->bindValue(":funcao", $funcionario->getFuncao());
            $p_sql->bindValue(":senha", $funcionario->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listar_cliente() {
        $sql = "SELECT * FROM cliente";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_funcionario() {
        $sql = "SELECT * FROM funcionario";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar_cliente($cpf) {
        $sql = "DELETE FROM cliente WHERE cpf =:cpf";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $cpf);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }
     public function deletar_funcionario($cpf) {
        $sql = "DELETE FROM funcionario WHERE cpf =:cpf";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $cpf);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    function cpf($cpf, $senha) {
        try {
            $sql = Conexao::getInstance()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf AND senha = :senha");

            $param = array(
                ":cpf" => $cpf,
                ":senha" => ($senha)
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

    public function RetornaNome($cpf) {
        try {

            $sql = Conexao::getInstance()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf");
            $param = array(
                ":cpf" => $cpf
            );

            $sql->execute($param);

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            return $dados["cpf"];
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
            return null;
        }
    }

    public function getCliente($cpf) {
        $sql = "SELECT * FROM cliente WHERE cpf =:cpf";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":cpf", $cpf);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getFuncionario($cpf) {
        $sql = "SELECT * FROM funcionario WHERE cpf =:cpf";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":cpf", $cpf);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Cliente $cliente) {
        try {
            $sql = "UPDATE cliente set nome_completo =:nome_completo, numero_celular=:numero_celular, endereco=:endereco, email=:email"
                    . " WHERE cpf=:cpf";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            $p_sql->bindValue(":nome_completo", $cliente->getNomeCompleto());
            $p_sql->bindValue(":numero_celular", $cliente->getNumeroCelular());
            $p_sql->bindValue(":endereco", $cliente->getEndereco());
            $p_sql->bindValue(":email", $cliente->getEmail());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function atualizar_funcionario(Funcionario $funcionario) {
        try {
            $sql = "UPDATE funcionario set nome_completo =:nome_completo, numero_celular=:numero_celular, endereco=:endereco, email=:email, funcao=:funcao, senha=:senha"
                    . " WHERE cpf=:cpf";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cpf", $funcionario->getCpf());
            $p_sql->bindValue(":nome_completo", $funcionario->getNomeCompleto());
            $p_sql->bindValue(":numero_celular", $funcionario->getNumeroCelular());
            $p_sql->bindValue(":endereco", $funcionario->getEndereco());
            $p_sql->bindValue(":email", $funcionario->getEmail());
            $p_sql->bindValue(":funcao", $funcionario->getFuncao());
            $p_sql->bindValue(":senha", $funcionario->getSenha());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
