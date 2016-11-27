<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author adryan_silva
 */
class Produto {
    private $codigo;
    private $imagem;
    private $nome_completo;
    private $preco_venda;
    private $quantidade_estoque;
    private $descricao;
    private $preco_custo;
    private $categoria_id;
    private $destaque;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getNome_completo() {
        return $this->nome_completo;
    }

    function getPreco_venda() {
        return $this->preco_venda;
    }

    function getQuantidade_estoque() {
        return $this->quantidade_estoque;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco_custo() {
        return $this->preco_custo;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getDestaque() {
        return $this->destaque;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setNome_completo($nome_completo) {
        $this->nome_completo = $nome_completo;
    }

    function setPreco_venda($preco_venda) {
        $this->preco_venda = $preco_venda;
    }

    function setQuantidade_estoque($quantidade_estoque) {
        $this->quantidade_estoque = $quantidade_estoque;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco_custo($preco_custo) {
        $this->preco_custo = $preco_custo;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setDestaque($destaque) {
        $this->destaque = $destaque;
    }




}
