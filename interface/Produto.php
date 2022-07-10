<?php
class Produto{

    private static $conn;
    private $data;


    function __get($props)
    {
        return $this->data[$props];
    }

    function __set($props, $value)
    {
        $this->data[$props] = $value;
    }

    public static function setConnection (PDO $conn){       
        self::$conn = $conn;
        ProdutoGateway::setConnection($conn);
    }

    public static function find($id){
        $gw = new ProdutoGateway;
        return $gw->find($id,'Produto');
    }

    public static function all($filter = ''){
        $gw = new ProdutoGateway;
        return $gw->all($filter, 'Produto');
    }

    public function delete(){
        $gw = new ProdutoGateway;
        return $gw->delete($this->id);
    }

    public function save(){
        $gw = new ProdutoGateway;
        return $gw->save((object)$this->data);
    }

    //metodo margem de lucro
    public function profifMargin(){
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    //registra compra
    public function purchaseRecord($custo,$quantidade){
        $this->preco_custo = $custo;
        $this->estoque += $quantidade;        
    }




}