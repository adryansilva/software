<?php
    $id = @$_GET["id"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_categoria($id);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Categoria Excluida com Sucesso!');"
        . "location.href='?pg=categoria';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão da Categoria!');"
        . "location.href='?pg=categoria';"
        . "</script>;";
    }