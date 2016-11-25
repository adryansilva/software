<?php
    $codigo = @$_GET["codigo"];
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->deletar_produto($codigo);
    if ($exe) {
    echo "<script type='text/javascript'>"
        . " alert('Produto Excluido com Sucesso!');"
        . "location.href='?pg=produto';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi concluir a exclusão do Produto! "
                . "TALVEZ EXISTA UM PEDIDO PARA ESTE PRODUTO!');"
        . "location.href='?pg=produto';"
        . "</script>;";
    }