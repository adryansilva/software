<?php
    $numero = @$_GET["numero"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_ordem_servico($numero);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Pedido de Serviço Excluido com Sucesso!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Pedido de Serviço!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    }