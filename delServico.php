<?php
    $id = @$_GET["id"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_servico($id);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Servico Excluido com Sucesso!');"
        . "location.href='?pg=servicos';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Servico!');"
        . "location.href='?pg=servicos';"
        . "</script>;";
    }