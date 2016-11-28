<?php

class Ordem_pedido {
   private $numero;
   private $data;
    private $tipo_servico;
   private $relatorio;
   private $clientes_cpf;
   private $funcionarios_cpf;
   private $custo;
   function getNumero() {
       return $this->numero;
   }

   function getData() {
       return $this->data;
   }

   function getTipo_servico() {
       return $this->tipo_servico;
   }

   function getRelatorio() {
       return $this->relatorio;
   }

   function getClientes_cpf() {
       return $this->clientes_cpf;
   }

   function getFuncionarios_cpf() {
       return $this->funcionarios_cpf;
   }

   function getCusto() {
       return $this->custo;
   }

   function setNumero($numero) {
       $this->numero = $numero;
   }

   function setData($data) {
       $this->data = $data;
   }

   function setTipo_servico($tipo_servico) {
       $this->tipo_servico = $tipo_servico;
   }

   function setRelatorio($relatorio) {
       $this->relatorio = $relatorio;
   }

   function setClientes_cpf($clientes_cpf) {
       $this->clientes_cpf = $clientes_cpf;
   }

   function setFuncionarios_cpf($funcionarios_cpf) {
       $this->funcionarios_cpf = $funcionarios_cpf;
   }

   function setCusto($custo) {
       $this->custo = $custo;
   }




}
