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

    public function inserir_categoria(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria "
                    . " (id,"
                    . " :descricao)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $categoria->getId());
            $p_sql->bindValue(":cpf", $categoria->getDescricao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function inserir_produto(Produto $produto) {
        try {
            $sql = "INSERT INTO produto "
                    . " (nome_completo,"
                    . " categoria_id,"
                    . " preco_venda,"
                    . " quantidade_estoque,"
                    . "descricao,"
                    . "preco_custo,"
                    . "imagem)"
                    . " VALUES "
                    . " (:nome_completo,"
                    . " :categoria_id,"
                    . " :preco_venda,"
                    . " :quantidade_estoque,"
                    . " :descricao,"
                    . " :preco_custo,"
                    . " :imagem)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome_completo", $produto->getNome_completo());
            $p_sql->bindValue(":categoria_id", $produto->getCategoria_id());
            $p_sql->bindValue(":preco_venda", $produto->getPreco_venda());
            $p_sql->bindValue(":quantidade_estoque", $produto->getQuantidade_estoque());
            $p_sql->bindValue(":descricao", $produto->getDescricao());
            $p_sql->bindValue(":preco_custo", $produto->getPreco_custo());
            $p_sql->bindValue(":imagem", $produto->getImagem());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function inserir_pedido(Pedido $pedido) {
        try {
            $sql = "INSERT INTO produto "
                    . " (nome_completo,"
                    . " categoria_id,"
                    . " preco_venda,"
                    . " quantidade_estoque,"
                    . "descricao,"
                    . "preco_custo,"
                    . "imagem)"
                    . " VALUES "
                    . " (:nome_completo,"
                    . " :categoria_id,"
                    . " :preco_venda,"
                    . " :quantidade_estoque,"
                    . " :descricao,"
                    . " :preco_custo,"
                    . " :imagem)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome_completo", $produto->getNome_completo());
            $p_sql->bindValue(":categoria_id", $produto->getCategoria_id());
            $p_sql->bindValue(":preco_venda", $produto->getPreco_venda());
            $p_sql->bindValue(":quantidade_estoque", $produto->getQuantidade_estoque());
            $p_sql->bindValue(":descricao", $produto->getDescricao());
            $p_sql->bindValue(":preco_custo", $produto->getPreco_custo());
            $p_sql->bindValue(":imagem", $produto->getImagem());
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

    public function listar_categoria() {
        $sql = "SELECT * FROM categoria";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_produto() {
        $sql = "SELECT produto.codigo,"
                . " produto.imagem,"
                . " produto.nome_completo,"
                . " produto.preco_venda,"
                . " produto.quantidade_estoque,"
                . " produto.descricao,"
                . " produto.preco_custo,"
                . " categoria.descricao as categoria"
                . " FROM produto, categoria"
                . " WHERE produto.categoria_id = categoria_id "
                . " ORDER BY produto.categoria_id";
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

    public function listar_pedido() {
        $sql = "SELECT * FROM pedido";
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

    public function deletar_produto($codigo) {
        $sql = "DELETE FROM produto WHERE codigo =:codigo";
        try {
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":codigo", $codigo);
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

    public function getProduto($codigo) {
        $sql = "SELECT * FROM produto WHERE codigo =:codigo";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":codigo", $codigo);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoria($id) {
        $sql = "SELECT * FROM categoria WHERE id =:id";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        return $p_sql->fetch(PDO::FETCH_ASSOC);
    }
    public function getPedido($numero) {
        $sql = "SELECT * FROM pedido WHERE numero =:numero";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":numero", $numero);
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

    public function atualizar_produto(Produto $produto) {
        try {
            $sql = "UPDATE produto set nome_completo =:nome_completo, categoria_id=:categoria_id, preco_venda=:preco_venda, quantidade_estoque=:quantidade_estoque, descricao=:descricao, preco_custo=:preco_custo, imagem=:imagem"
                    . " WHERE codigo=:codigo";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":codigo", $produto->getCodigo());
            $p_sql->bindValue(":nome_completo", $produto->getNome_completo());
            $p_sql->bindValue(":categoria_id", $produto->getCategoria_id());
            $p_sql->bindValue(":preco_venda", $produto->getPreco_venda());
            $p_sql->bindValue(":quantidade_estoque", $produto->getQuantidade_estoque());
            $p_sql->bindValue(":descricao", $produto->getDescricao());
            $p_sql->bindValue(":preco_custo", $produto->getPreco_custo());
            $p_sql->bindValue(":imagem", $produto->getImagem());

            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function atualizar_categoria(Categoria $categoria) {
        try {
            $sql = "UPDATE categoria set descricao =:descricao"
                    . " WHERE id=:id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $categoria->getId());
            $p_sql->bindValue(":descricao", $categoria->getDescricao());
            return $p_sql->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

}
