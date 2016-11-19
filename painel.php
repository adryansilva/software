<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITSolution - GESTÃO</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="titulo">
            <span class="label label-info">SEJA BEM VINDO AO SISTEMA DE GESTÃO DA ITSOLUTION AND CIA!</span>
        </div>
        <center>
        <div class="titulo2">
            <span class="label label-success">ACOMPANHE OS PEDIDOS DE PRODUTOS & SERVIÇOS:!</span>
        </div><br>
        <a href="?pg=addPedido"><input type="button" value="Adicionar Pedido" class="addcliente"/></a><br><br><br>
    </center>
    <style>
        table {
            border: 1px solid;
            outline-style: solid;
            outline-color: black;
            margin: 5px;
            width: 95%;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            margin: 5px auto;
        }
        th {
            height: 50px;
        }
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <?php
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $dados = $DaoLogin->listar_pedido();
    ?>
    <table>
        <tr>
            <th>Número:</th>
        <th>Data:</th>
        <th>Equipamento:</th>
        <th>Preço Venda:</th>
        <th>Quantidade Estoque:</th>
        <th>Descrição:</th>
        <th>Preço Custo:</th>
        <th>Imagem:</th>
        <th> Ações </th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $codigo = $row["codigo"];
        echo "<tr>";
        echo "<td>" . $row["codigo"] . "</td>";
        echo "<td>" . $row["nome_completo"] . "</td>";
        echo "<td>" . $row["tipo"] . "</td>";
        echo "<td>" . $row["preco_venda"] . "</td>";
        echo "<td>" . $row["quantidade_estoque"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>" . $row["preco_custo"] . "</td>";
        echo "<td>" . $row["imagem"] . "</td>";
        echo "        <td><a href='?pg=editProduto&codigo=$codigo' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
        echo "       <a href='?pg=delProduto&codigo=$codigo' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
        echo " </tr>";
    }
    ?>
</table>
    </body>
</html>