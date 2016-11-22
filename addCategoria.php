<center>
    <div class="titulo2">
            <span class="label label-success">ADICIONAR CATEGORIA:</span>
        </div>
    <br>
    <a href="?pg=produto"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Categoria:</b></legend>
            <br>
            <label><b>Nome da Categoria:</b></label><br>
            <input type="text" name="descricao" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <br>
            <br>
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
require_once './dao/DaoLogin.php';
require_once './model/Categoria.php';
if (isset($_POST["botao"])) {
    $categoria = new Categoria();
    $categoria->setId(@$_POST["id"]);
    $categoria->setDescricao(@$_POST["descricao"]);
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->inserir_categoria($categoria);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Categoria Cadastrada com sucesso!');"
        . "location.href='?pg=produto';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar a Categoria!');"
        . "location.href='?pg=produto';"
        . "</script>";
    }
}