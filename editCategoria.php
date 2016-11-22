<?php
    $id = @$_GET["id"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $atualizar_categoria = $DaoLogin->getCategoria($id);
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
            <span class="label label-success">EDITAR CATEGORIA:</span>
        </div>
    <br>
    <a href="?pg=categoria">Voltar</a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Categoria:</b></legend>
            <br>
            <label><b>Nome Completo:</b></label><br>
            <input type="hidden" name="id" value="<?=$atualizar_categoria["id"]?>"/><br>
            <input type="text" name="descricao" value="<?=$atualizar_categoria["descricao"]?>" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
           <button type="submit" name="botao" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span> Confirmar </button>
        </fieldset>
        <br>
        <br>
    </form>
    <br>
</center>
<?php
require_once 'dao/DaoLogin.php';
require_once 'model/Categoria.php';
if (isset($_POST["botao"])) {
    $categoria = new Categoria();
    $categoria->setId(@$_POST["id"]);
    $categoria->setDescricao(@$_POST["descricao"]);

    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar_categoria($categoria);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Categoria Atualizada com sucesso!');"
                . "location.href='?pg=categoria';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar a Categoria!');"
        . "</script>";
    }
}