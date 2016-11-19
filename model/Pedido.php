<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author adrya
 */
class Pedido {
    private $numero;
    private $data;
    private $equipamento;
    private $custo;
    private $clientes_cpf;
    private $funcionarios_cpf;
    function getNumero() {
        return $this->numero;
    }

    function getData() {
        return $this->data;
    }

    function getEquipamento() {
        return $this->equipamento;
    }

    function getCusto() {
        return $this->custo;
    }

    function getClientes_cpf() {
        return $this->clientes_cpf;
    }

    function getFuncionarios_cpf() {
        return $this->funcionarios_cpf;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setEquipamento($equipamento) {
        $this->equipamento = $equipamento;
    }

    function setCusto($custo) {
        $this->custo = $custo;
    }

    function setClientes_cpf($clientes_cpf) {
        $this->clientes_cpf = $clientes_cpf;
    }

    function setFuncionarios_cpf($funcionarios_cpf) {
        $this->funcionarios_cpf = $funcionarios_cpf;
    }


}
