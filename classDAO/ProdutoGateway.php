<?php

class ProdutoGateway{

    private static $conn;

    public static function setConnection (PDO $conn){
        //self faz referencia a classe em si, para membro estaticos, diferentemente do $this que aponta para o objeto.
        self::$conn = $conn;
    }

    // método find
    public function find($id,$class = 'stdClass'){
        $sql = "SELECT * FROM produto WHERE id = '$id'";
        print "$sql <br>";
        $result = self::$conn->query($sql);
        return $result->fetchObject($class);
    }
    // método all()
    
    public function all($filter, $class = 'stdClass'){
        $sql = "SELECT * FROM produto ";
        if($filter){
            $sql.="WHERE $filter";
        }
        print "$sql <br>";
        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS,$class);
    }

    //médetodo delete()
    public function delete($id){
        $sql = "DELETE FROM produto WHERE id = '$id'";
        print "$sql <br>";
        return self::$conn->query($sql);
    }
    //método save()

    public function save($data){
     if(empty($data->id)){ // return 0 - id bão localizado - inserir.
         $id = $this->getLastId() + 1;
         $sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, data_vencimento, data_fabricacao, origem, fabricante) VALUE ('{$id}',
        '{$data->descricao}', 
        '{$data->estoque}', 
        '{$data->preco_custo}', 
        '{$data->preco_venda}', 
        '{$data->codigo_barras}', 
        '{$data->data_cadastro}', 
        '{$data->data_vencimento}', 
        '{$data->data_fabricacao}', 
        '{$data->origem}', 
        '{$data->fabricante}')";
     }else{//return 1 - id localizado - update

        $sql = "UPDATE produto SET  descricao = '{$data->descricao}',
        estoque ='{$data->estoque}',
        preco_custo = '{$data->preco_custo}',
        preco_venda = '{$data->preco_venda}',
        codigo_barras = '{$data->codigo_barras}',
        data_cadastro = '{$data->data_cadastro}',
        data_vencimento = '{$data->data_vencimento}',
        data_fabricacao = '{$data->data_fabricacao}',
        origem = '{$data->origem}',
        fabricante = '{$data->fabricante}' WHERE id = '{$data->id}'";

     }
        print "$sql <br>";
        return self::$conn->exec($sql);

    }

    //getLastId()

    public function getLastId(){
        $sql = "SELECT max(id) as max FROM produto ";
        $result = self::$conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }



















}