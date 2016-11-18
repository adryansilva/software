<?php
    $cpf = $_GET["cpf"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_cliente($cpf);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Cliente Excluido com Sucesso!');"
        . "location.href='?pg=cliente';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Cliente!');"
        . "location.href='?pg=cliente';"
        . "</script>;";
    }