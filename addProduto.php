<?php
require_once './dao/DaoLogin.php';
require_once './model/Produto.php';
$DaoLogin = DaoLogin::getInstance();
$listaCategorias = $DaoLogin->listar_categoria();
?>
<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <div class="titulo2">
            <span class="label label-success">ADICIONAR PRODUTO:</span>
        </div>
    <br>
    <a href="?pg=produto"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Produto:</b></legend>
            <br>
            <label><b>Nome do Produto:</b></label><br>
            <input type="text" name="nome_completo" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Categoria do produto:</b></label><br>
            <select name="categoria_id" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione uma Categoria</option>
                <?php
                foreach ($listaCategorias as $categoria) {
                ?>
                <option value="<?=$categoria["id"]?>"><?=$categoria["descricao"]?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <br>
             <label><b>Preço de Venda:</b></label><br>
             <input type="text" name="preco_venda" maxlength="10" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
             <label><b>Quantidade Estoque:</b></label><br>
            <input type="number" name="quantidade_estoque" required="" class="form-control" style="width: 45%; height: 35px;"/>
             <br>
            <br>
            <label><b>Descrição do produto:</b></label><br>
            <input type="text" name="descricao" required="" class="form-control" style="width: 45%; height: 35px;"/>
             <br>
            <br>
            <label><b>Preço de Custo (Valor do Fornecedor):</b></label><br>
            <input type="text" name="preco_custo" maxlength="10" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Imagem do Produto:</b></label><br>
            <input type="file" name="imagem" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Destaque:</b></label><br>
            <select name="destaque" required="" class="form-control" style="width: 45%; height: 35px;">
            <option value="1">Sim</option>
               <option value="0">Não</option>
            </select>
            <br>
            <br>
            <button type="submit" name="botao" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span><b>  Confirmar</b></button>
            <button type="reset" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-trash"></span><b> Limpar</b></button>
            <br>
            <br>
        </fieldset>
        <br>
        <br>
    </form>
    <br>
</center>
<?php
if (isset($_POST["botao"])) {
    $produto = new Produto();
    $produto->setNome_completo(@$_POST["nome_completo"]);
    $produto->setCategoria_id(@$_POST["categoria_id"]);
    $produto->setPreco_venda(@$_POST["preco_venda"]);
    $produto->setQuantidade_estoque(@$_POST["quantidade_estoque"]);
    $produto->setDescricao(@$_POST["descricao"]);
    $produto->setPreco_custo(@$_POST["preco_custo"]);
    $produto->setImagem($_FILES["imagem"]["name"]);
    $produto->setDestaque(@$_POST["destaque"]);
    
    /***upload de imagem**/
   $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino.basename($_FILES["imagem"]["name"]);  
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);
    chown($arquivoDestino, 777);    
    /***fim do upload***/

   
    $exe = $DaoLogin->inserir_produto($produto);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Produto Cadastrado com sucesso!');"
        . "location.href='?pg=produto';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o Produto!');"
        . "location.href='?pg=produto';"
        . "</script>";
    }
}