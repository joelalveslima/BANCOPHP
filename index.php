<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho BANCO</title>
</head>

<body>
    <form action="./testeDAO/testeProduto.php" method="POST">
        Descrição:<br>
        <input type="text" name="descricao"><br>

        Estoque:<br>
        <input type="text" name="estoque"><br>

        Preço Custo:<br>
        <input type="text" name="preco_custo"><br>

        Preço Venda:<br>
        <input type="text" name="preco_venda"><br>

        Código de Barra:<br>
        <input type="number" name="cadigo_barras"><br>

        Data Cadastro:<br>
        <input type="date" name="data_cadastro"><br>

        Data Vencimento:<br>
        <input type="date" name="data_vencimento"><br>

        Data Fabricação:<br>
        <input type="date" name="data_fabricacao"><br>

        Origem:<br>
        <input type="text" name="origem"><br>

        Fabricante:<br>
        <input type="text" name="fabricante"><br><br>

        <input type="submit">
    </form>
</body>

</html>