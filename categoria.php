<html>
    <meta charset="UTF-8">
    <center>
        <div class="titulo2">
            <span class="label label-success">LISTA DE CATEGORIAS:</span>
        </div><br>
        <a href="?pg=addCategoria"><input type="button" value="Adicionar Categoria" class="addcliente"/></a><br><br><br>
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
        table img {
            width: 80px;
            margin: 5px auto;
        }
    </style>
    <?php
    require_once 'dao/DaoLogin.php';
    $DaoLogin = DaoLogin::getInstance();
    $dados = $DaoLogin->listar_categoria();
    ?>
    <table>
        <tr>
            <th>Código:</th>
            <th>Descrição:</th>
            <th> Ações </th>
        </tr>
        <?php
        foreach ($dados as $row) {
            $id = $row["id"];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "        <td><a href='?pg=editCategoria&id=$id' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
            echo "       <a href='?pg=delCategoria&id=$id' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
            echo " </tr>";
        }
        ?>
    </table>
</html>