<?php
    $codigo = @$_GET["codigo"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $atualizar_produto = $DaoLogin->getProduto($codigo);
?>
<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <h1> Editar Produto: </h1>
    <br>
    <a href="?pg=produto">Voltar</a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Produto:</b></legend>
            <br>
            <label><b>Nome Completo:</b></label><br>
            <input type="hidden" name="codigo" value="<?=$atualizar_produto["codigo"]?>"/><br>
            <input type="text" name="nome_completo" value="<?=$atualizar_produto["nome_completo"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Tipo de Produto:</b></label><br>
            <input type="text" name="tipo" maxlength="15" value="<?=$atualizar_produto["tipo"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Preço Venda:</b></label><br>
            <input type="number" name="preco_venda" value="<?=$atualizar_produto["preco_venda"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Quantidade em Estoque:</b></label><br>
            <input type="text" name="quantidade_estoque" value="<?=$atualizar_produto["quantidade_estoque"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Descrição do Produto:</b></label><br>
            <input type="text" name="descricao" maxlength="100" value="<?=$atualizar_produto["descricao"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Preco Custo:</b></label><br>
            <input type="number" name="preco_custo" value="<?=$atualizar_produto["preco_custo"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <br>
            <br>
             <label><b>Imagem:</b></label><br>
            <input type="file" name="imagem" value="<?=$atualizar_produto["imagem"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <br>
            <br>
           <button type="submit" name="botao" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span> Confirmar </button>
            <br>
            <br>
        </fieldset>
        <br>
        <br>
    </form>
    <br>
</center>
<?php
require_once 'dao/DaoLogin.php';
require_once 'model/Produto.php';
if (isset($_POST["botao"])) {
    $produto = new Produto();
    $produto->setCodigo(@$_POST["codigo"]);
    $produto->setNome_completo(@$_POST["nome_completo"]);
    $produto->setTipo(@$_POST["tipo"]);
    $produto->setPreco_venda(@$_POST["preco_venda"]);
    $produto->setDescricao(@$_POST["descricao"]);
    $produto->setPreco_custo(@$_POST["preco_custo"]);
    $produto->setImagem($_FILES["imagem"]["name"]);
    
    /***upload de imagem**/
    $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino.basename($_FILES["imagem"]["name"]);  
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);
    chown($arquivoDestino, 777);    
    /***fim do upload***/


    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar_produto($produto);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Produto Atualizado com sucesso!');"
                . "location.href='?pg=produto';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar o Produto!');"
        . "</script>";
    }
}