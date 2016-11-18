<?php
    $cpf = @$_GET["cpf"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $atualizar = $DaoLogin->getCliente($cpf);
?>
<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <h1> Editar Cliente: </h1>
    <br>
    <a href="?pg=cliente">Voltar</a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Cliente:</b></legend>
            <br>
            <label><b>Nome Completo:</b></label><br>
            <input type="hidden" name="cpf" value="<?=$atualizar["cpf"]?>"/><br>
            <input type="text" name="nome_completo" value="<?=$atualizar["nome_completo"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Número Celular:</b></label><br>
            <input type="number" name="numero_celular" maxlength="15" value="<?=$atualizar["numero_celular"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Endereço Completo:</b></label><br>
            <input type="text" name="endereco" value="<?=$atualizar["endereco"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Email:</b></label><br>
            <input type="email" name="email" maxlength="100" value="<?=$atualizar["email"]?>" required="" style="width: 45%; height: 35px;"/><br>
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
require_once 'model/Cliente.php';
if (isset($_POST["botao"])) {
    $cliente = new Cliente();
    $cliente->setCpf($_POST["cpf"]);
    $cliente->setNomeCompleto(@$_POST["nome_completo"]);
    $cliente->setNumeroCelular(@$_POST["numero_celular"]);
    $cliente->setEndereco(@$_POST["endereco"]);
    $cliente->setEmail(@$_POST["email"]);

    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar($cliente);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cliente Atualizado com sucesso!');"
                . "location.href='?pg=cliente';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar o Cliente!');"
        . "</script>";
    }
}