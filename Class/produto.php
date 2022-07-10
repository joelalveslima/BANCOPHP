<?php

class Produto{

    protected $descricao;
    protected $estoque;
    protected $precoCusto;
    protected $precoVenda;
    protected $codigoBarra;
    protected $dataCadastro;
    protected $dataVencimento;
    protected $dataFabricacao;
    protected $origem;
    protected $fabricante;

   public function __construct($descricao,$estoque,$precoCusto,$precoVenda,$codigoBarra,$dataCadastro,$dataVencimento,$dataFabricacao,$origem,$fabricante)
   {

    if(is_string($descricao)){
        $this->descricao = $descricao;
    }
    if(is_int($estoque)){
        $this->estoque = $estoque;
    }
    if(is_float($precoCusto)){
        $this->precoCusto = $precoCusto;
    }
    if(is_float($precoVenda)){
        $this->precoVenda = $precoVenda;
    }
    if(is_int($codigoBarra)){
        $this->codigoBarra = $codigoBarra;
    }
    if(is_string($dataCadastro)){
        $this->dataCadastro = $dataCadastro;
    }
    if(is_string($dataVencimento)){
        $this->dataVencimento = $dataVencimento;
    }
    if(is_string($dataFabricacao)){
        $this->dataFabricacao = $dataFabricacao;
    }
    if(is_string($origem)){
        $this->origem = $origem;
    }
    if(is_string($fabricante)){
        $this->fabricante = $fabricante;
    }  

   }

   public function setDescricao($descricao){
       $this->descricao = $descricao;
   }

   public function getDescricao(){
       return $this->descricao;
   }



}
