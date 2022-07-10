<?php

require_once 'C:\xampp\htdocs\pastaSabado\ControleDeEstoque\classDAO\ProdutoGateway.php';


$username = 'root';
$password = "";

$data1 = new stdClass;
$data1->descricao = "Fiat Cronus";
$data1->estoque = 100;
$data1->preco_custo = 70000;
$data1->preco_venda = 100000;
$data1->codigo_barras = "12345678910123";
$data1->data_cadastro = date('y-m-d');
$data1->data_vencimento = date('y-m-d');
$data1->data_fabricacao = date('y-m-d');
$data1->origem = "I";
$data1->fabricante = "Fiat";

$data2 = new stdClass;
$data2->descricao = "Hyundai HB20";
$data2->estoque = 200;
$data2->preco_custo = 90000;
$data2->preco_venda = 100001;
$data2->codigo_barras = "12345678910123";
$data2->data_cadastro = date('y-m-d');
$data2->data_vencimento = date('y-m-d');
$data2->data_fabricacao = date('y-m-d');
$data2->origem = "N";
$data2->fabricante = "Hyundai";

try {
    $conn = new PDO('mysql:host=localhost; dbname=estoque', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProdutoGateway::setConnection($conn);
    //salvand no banco.
    $gw = new ProdutoGateway;
    $gw->save($data1);
    $gw->save($data2);
    //atualizando no Banco
    $produto = $gw->find(1);
    $produto->estoque += 50;
    $gw->save($produto);

    //Mostra Informação do banco

    foreach ($gw->all("estoque > 160") as $produto) {
        print "$produto->descricao. <br>";
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}
