<?php
    $cpf = @$_GET["cpf"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $atualizar_funcionario = $DaoLogin->getFuncionario($cpf);
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
            <span class="label label-success">EDITAR FUNCJONÁRIO:</span>
        </div>
    <br>
    <a href="?pg=funcionario">Voltar</a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Funcionario:</b></legend>
            <br>
            <label><b>Nome Completo:</b></label><br>
            <input type="hidden" name="cpf" value="<?=$atualizar_funcionario["cpf"]?>"/><br>
            <input type="text" name="nome_completo" value="<?=$atualizar_funcionario["nome_completo"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Número Celular:</b></label><br>
            <input type="number" name="numero_celular" maxlength="15" value="<?=$atualizar_funcionario["numero_celular"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Endereço Completo:</b></label><br>
            <input type="text" name="endereco" value="<?=$atualizar_funcionario["endereco"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Função:</b></label><br>
            <input type="text" name="funcao" value="<?=$atualizar_funcionario["funcao"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Email:</b></label><br>
            <input type="email" name="email" maxlength="100" value="<?=$atualizar_funcionario["email"]?>" required="" style="width: 45%; height: 35px;"/><br>
            <label><b>Senha (Cuidado):</b></label><br>
            <input type="text" name="senha" value="<?=$atualizar_funcionario["senha"]?>" required="" style="width: 45%; height: 35px;"/><br>
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
require_once 'model/Funcionario.php';
if (isset($_POST["botao"])) {
    $funcionario = new Funcionario();
    $funcionario->setCpf(@$_POST["cpf"]);
    $funcionario->setNomeCompleto(@$_POST["nome_completo"]);
    $funcionario->setNumeroCelular(@$_POST["numero_celular"]);
    $funcionario->setEndereco(@$_POST["endereco"]);
    $funcionario->setEmail(@$_POST["email"]);
    $funcionario->setFuncao(@$_POST["funcao"]);
    $funcionario->setSenha(@$_POST["senha"]);

    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar_funcionario($funcionario);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Funcionario Atualizado com sucesso!');"
                . "location.href='?pg=funcionario';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar o Funcionario!');"
        . "</script>";
    }
}