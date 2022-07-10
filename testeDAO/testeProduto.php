<?php

require_once 'D:\XAMPP\htdocs\ControleDeEstoque\interface\Produto.php';
require_once 'D:\XAMPP\htdocs\ControleDeEstoque\classDAO\ProdutoGateway.php';

$username = 'root';
$password = '';

try {
  $conn = new PDO('mysql:host=localhost; dbname=estoque', $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  ProdutoGateway::setConnection($conn);

  $produtos = Produto::all(); //reutorna todo os bjs do branco 
  foreach ($produtos as $produto) {
    $produto->delete(); //exclui todos os objetos existente
  }

  $p1 =  new Produto;
  $p1->descricao = (string)$_POST['descricao'];
  $p1->estoque = (int)$_POST['estoque'];
  $p1->preco_custo = (float)$_POST['preco_custo'];
  $p1->preco_venda = (float)$_POST['preco_venda'];
  $p1->codigo_barras = (int)$_POST['cadigo_barras'];
  $p1->data_cadastro = $_POST['data_cadastro'];
  $p1->data_vencimento = $_POST['data_vencimento'];
  $p1->data_fabricacao = $_POST['data_fabricacao'];
  $p1->origem = (string)$_POST['origem'];
  $p1->fabricante = (string)$_POST['fabricante'];
  $p1->save();

  /* $p3 = Produto::find(1); // Buscandod no banco pra exibir

  print "Descrição: " . $p3->descricao . "<br>";
  print "Margem de lucro: " . $p3->profifMargin() . "%<br>";
  $p3->purchaseRecord(50, 300);
  $p3->save(); */
} catch (Exception $ex) {
  print "Erro_________" . $ex->getMessage();
}
