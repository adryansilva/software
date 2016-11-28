<html>
    <meta charset="UTF-8">
    <center>
        <div class="titulo2">
            <span class="label label-success">LISTA DE PRODUTOS:</span>
        </div><br>
        <a href="?pg=addServico"><input type="button" value="Adicionar Servico" class="addcliente"/></a><br><br><br>
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
    $dados = $DaoLogin->listar_servico();
    ?>
    <table>
        <tr>
            <th>ID:</th>
            <th>Tipo:</th>
            <th>Problema:</th>
            <th>Custo:</th>
            <th>Relatório:</th>
            <th>Imagem:</th>
            <th> Ações </th>
        </tr>
        <?php
        foreach ($dados as $row) {
            $id = $row["id"];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["tipo"] . "</td>";
            echo "<td>" . $row["problema"] . "</td>";
            echo "<td>" . $row["custo"] . "</td>";
            echo "<td>" . $row["relatorio"] . "</td>";
            echo "<td><img src='fotos/{$row["imagem"]}'/></td>";
            echo "        <td><a href='?pg=editServico&id=$id' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
            echo "       <a href='?pg=delServico&id=$id' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
            echo " </tr>";
        }
        ?>
    </table>
</html>