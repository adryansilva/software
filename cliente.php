<html>
    <center>
        <div class="titulo2">
            <span class="label label-success">LISTA DE CLIENTES:</span>
        </div><br>
        <a href="?pg=addCliente"><input type="button" value="Adicionar Cliente" class="addcliente"/></a><br><br><br>
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
    $dados = $DaoLogin->listar_cliente();
    ?>
    <table>
        <tr>
            <th>Nome_Completo:</th>
        <th>CPF:</th>
        <th>Número_celular:</th>
        <th>Endereço:</th>
        <th>Email:</th>
        <th> Ações </th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $cpf = $row["cpf"];
        echo "<tr>";
        echo "<td>" . $row["nome_completo"] . "</td>";
        echo "<td>" . $row["cpf"] . "</td>";
        echo "<td>" . $row["numero_celular"] . "</td>";
        echo "<td>" . $row["endereco"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "        <td><a href='?pg=editCliente&cpf=$cpf' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
        echo "       <a href='?pg=delCliente&cpf=$cpf' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
        echo " </tr>";
    }
    ?>
</table>
</html>