<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <h1> Adicionar Funcionario: </h1>
    <br>
    <a href="?pg=Funcionario"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Funcionario:</b></legend>
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
            <label><b>Função:</b></label><br>
            <input type="text" name="funcao" required="" style="width: 45%; height: 35px;"/>
             <br>
            <br>
            <label><b>Senha (Cuidado):</b></label><br>
            <input type="text" name="senha" required="" style="width: 45%; height: 35px;"/>
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
require_once './model/Funcionario.php';
if (isset($_POST["botao"])) {
    $funcionario = new funcionario();
    $funcionario->setNomeCompleto(@$_POST["nome_completo"]);
    $funcionario->setCpf(@$_POST["cpf"]);
    $funcionario->setNumeroCelular(@$_POST["numero_celular"]);
    $funcionario->setEndereco(@$_POST["endereco"]);
    $funcionario->setEmail(@$_POST["email"]);
    $funcionario->setFuncao(@$_POST["funcao"]);
    $funcionario->setSenha(@$_POST["senha"]);

    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->inserir_funcionario($funcionario);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Funcionario Cadastrado com sucesso!');"
        . "location.href='?pg=funcionario';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o Funcionario!');"
        . "location.href='?pg=funcionario';"
        . "</script>";
    }
}