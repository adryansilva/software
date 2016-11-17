<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente]
 *
 * @author adryan_silva
 */
class Cliente {
    //put your code here
    private $cpf;
    private $nomeCompleto;
    private $numeroCelular;
    private $endereco;
    private $email;
    
    function getCpf() {
        return $this->cpf;
    }

    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getNumeroCelular() {
        return $this->numeroCelular;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getEmail() {
        return $this->email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setNumeroCelular($numeroCelular) {
        $this->numeroCelular = $numeroCelular;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
