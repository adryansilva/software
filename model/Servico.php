<?php
class Servico {
    private $id;
    private $tipo;
    private $problema;
    private $custo;
    private $relatorio;
    private $imagem;
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getProblema() {
        return $this->problema;
    }

    function getCusto() {
        return $this->custo;
    }

    function getRelatorio() {
        return $this->relatorio;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setProblema($problema) {
        $this->problema = $problema;
    }

    function setCusto($custo) {
        $this->custo = $custo;
    }

    function setRelatorio($relatorio) {
        $this->relatorio = $relatorio;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }



}
