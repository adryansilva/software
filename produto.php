<html>
    <meta charset="UTF-8">
    <center>
        <div class="titulo2">
            <span class="label label-success">LISTA DE PRODUTOS:</span>
        </div><br>
                <a href="?pg=categoria"><input type="button" value="Ver Categorias" class="addcliente"/></a><br><br><br>
        <a href="?pg=addProduto"><input type="button" value="Adicionar Produto" class="addcliente"/></a><br><br><br>
    </center>
    <style>
        table {
            border: 1px solid;
            outline-style: solid;
            outline-color: black;
            margin: 5px;
            width: 98%;
        }
        table, th, td {
            border: 0.5px solid black;
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
        table img {
            width: 80px;
            margin: 5px auto;
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
            <th>Destaque (1:Sim):</th>
            <th>Nome do Produto:</th>
            <th>Categoria:</th>
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
            echo "<td>" . $row["destaque"] . "</td>";
            echo "<td>" . $row["nome_completo"] . "</td>";
            echo "<td>" . $row["categoria"] . "</td>";
            echo "<td>" . $row["preco_venda"] . "</td>";
            echo "<td>" . $row["quantidade_estoque"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>" . $row["preco_custo"] . "</td>";
            echo "<td><img src='fotos/{$row["imagem"]}'/></td>";
            echo "        <td><a href='?pg=editProduto&codigo=$codigo' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
            echo "       <a href='?pg=delProduto&codigo=$codigo' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
            echo " </tr>";
        }
        ?>
    </table>
</html>