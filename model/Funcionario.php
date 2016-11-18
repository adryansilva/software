<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author adryan_silva
 */
class Funcionario {
   private $cpf;
    private $nomeCompleto;
    private $numeroCelular;
    private $endereco;
    private $email;
    private $funcao;
    private $senha;
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

    function getFuncao() {
        return $this->funcao;
    }

    function getSenha() {
        return $this->senha;
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

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
