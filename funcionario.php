<html>
    <center>
        <h1>Lista de Funcionarios:</h1>
        <a href="?pg=addFuncionario"><input type="button" value="Adicionar Funcionario" class="addcliente"/></a>
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
    $dados = $DaoLogin->listar_funcionario();
    ?>
    <table>
        <tr>
            <th>Nome_Completo:</th>
        <br>
        <th>CPF:</th>
        <br>
        <th>Número_celular:</th>
        <br>
        <th>Endereço:</th>
        <br>
        <th>Email:</th>
        <th>Função:</th>
        <br>
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
        echo "<td>" . $row["funcao"] . "</td>";
        echo "        <td><a href='?pg=editFuncionario&cpf=$cpf' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
        echo "       <a href='?pg=delFuncionario&cpf=$cpf' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
        echo " </tr>";
    }
    ?>
</table>
</html>