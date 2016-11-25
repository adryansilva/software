<?php
    $numero = @$_GET["numero"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_pedido($numero);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Pedido Excluido com Sucesso!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Pedido!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    }