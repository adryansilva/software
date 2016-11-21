<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <div class="titulo2">
            <span class="label label-success">ADICIONAR PEDIDO DE PRODUTOS:</span>
        </div>
    <br>
    <a href="?pg=painel"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Pedido de Produto:</b></legend>
            <br>
            <label><b>Número do Pedido:</b></label><br>
            <input type="hidden" name="numero" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Data do Pedido:</b></label><br>
            <input type="date" name="data" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Equipamento Comprado:</b></label><br>
            <input type="text" name="produtos_codigo" maxlength="100"  required=""style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Número de Celular:</b></label><br>
            <input type="number" name=numero_celular required="" maxlength="15" style="width: 45%; height: 35px;"/>
            <br>
            <br>
             <label><b>Endereço Completo:</b></label><br>
            <input type="text" name="endereco" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
             <label><b>Email:</b></label><br>
            <input type="email" name="email" required="" style="width: 45%; height: 35px;"/>
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
require_once './model/Pedido.php';
if (isset($_POST["botao"])) {
    $categoria = new Pedido();
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