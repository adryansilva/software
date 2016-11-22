<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto_pedido
 *
 * @author adryan_silva
 */
class Produto_pedido {
    private $produtos_codigo;
    private $pedidos_numero;
    function getProdutos_codigo() {
        return $this->produtos_codigo;
    }

    function getPedidos_numero() {
        return $this->pedidos_numero;
    }

    function setProdutos_codigo($produtos_codigo) {
        $this->produtos_codigo = $produtos_codigo;
    }

    function setPedidos_numero($pedidos_numero) {
        $this->pedidos_numero = $pedidos_numero;
    }


}
