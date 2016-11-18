<html>
    <center>
        <h1>Lista de Funcionarios:</h1>
        <a href="?pg=addProduto"><input type="button" value="Adicionar Produto" class="addcliente"/></a>
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
    $dados = $DaoLogin->listar_produto();
    ?>
    <table>
        <tr>
            <th>Código:</th>
        <br>
        <th>Nome do Produto:</th>
        <br>
        <th>Tipo:</th>
        <br>
        <th>Preço Venda:</th>
        <br>
        <th>Quantidade Estoque:</th>
        <br>
        <th>Descrição:</th>
        <br>
        <th>Preço Custo:</th>
        <br>
        <th>Imagem:</th>
        <br>
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
</html>