<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <div class="titulo2">
            <span class="label label-success">ADICIONAR CLIENTE:</span>
    </div>
    <br>
    <a href="?pg=cliente"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Cliente:</b></legend>
            <br>
            <label><b>Nome Completo:</b></label><br>
            <input type="text" name="nome_completo" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>CPF:</b></label><br>
            <input type="number" name="cpf" maxlength="15"  required=""style="width: 45%; height: 35px;"/>
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
require_once './model/Cliente.php';
if (isset($_POST["botao"])) {
    $cliente = new cliente();
    $cliente->setNomeCompleto(@$_POST["nome_completo"]);
    $cliente->setCpf(@$_POST["cpf"]);
    $cliente->setNumeroCelular(@$_POST["numero_celular"]);
    $cliente->setEndereco(@$_POST["endereco"]);
    $cliente->setEmail(@$_POST["email"]);

    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->inserir_cliente($cliente);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cliente Cadastrado com sucesso!');"
        . "location.href='?pg=cliente';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o cliente!');"
        . "location.href='?pg=cliente';"
        . "</script>";
    }
}