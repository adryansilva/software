<?php
    $cpf = @$_GET["cpf"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_funcionario($cpf);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Funcionario Excluido com Sucesso!');"
        . "location.href='?pg=funcionario';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Funcionario!');"
        . "location.href='?pg=funcionario';"
        . "</script>;";
    }