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
    margin: 10px auto;
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
        <th> Número: </th>
        <th> Data: </th>
        <th> Produtos: </th>
        <th> Custo:</th>
        <th> CPF do Cliente:</th>
        <th> CPF do Funcionário:</th>
        <th> Ações </th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $numero = $row["numero"];
        echo "<tr>";
        echo "<td>" . $row["numero"] . "</td>";
        echo "<td>" . $row["data"] . "</td>";
        echo "<td>" . $row["produtos"] . "</td>";
        echo "<td>" . $row["custo"] . "</td>";
        echo "<td>" . $row["clientes_cpf"] . "</td>";
        echo "<td>" . $row["funcionarios_cpf"] . "</td>";
        echo "        <td><a href='?pg=editPedido&numero=$numero' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
        echo "       <a href='?pg=delPedido&numero=$numero' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
        echo " </tr>";
    }
    ?>
</table>
<br>
<br>
<br>
<br>
<center>
    <div class="titulo2">
        <span class="label label-success">ACOMPANHE OS PEDIDOS DE SERVIÇOS:!</span>
    </div><br>
    <a href="?pg=addpedido_servico"><input type="button" value="Adicionar Pedido de Serviço" class="addpedido_servico"/></a><br><br><br>
</center>
<?php
require_once 'dao/DaoLogin.php';
$DaoLogin = DaoLogin::getInstance();
$dados = $DaoLogin->listar_ordem_servico();
?>
<table>
    <tr>
        <th> Número: </th>
        <th> Data: </th>
        <th> Tipo_Serviço: </th>
        <th> Relatorio: </th>
        <th> CPF do Cliente:</th>
        <th> CPF do Funcionário:</th>
        <th> Custo: </th>
        <th> Ações </th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $numero = $row["numero"];
        echo "<tr>";
        echo "<td>" . $row["numero"] . "</td>";
        echo "<td>" . $row["data"] . "</td>";
        echo "<td>" . $row["tipo_servico"] . "</td>";
        echo "<td>" . $row["relatorio"] . "</td>";
        echo "<td>" . $row["clientes_cpf"] . "</td>";
        echo "<td>" . $row["funcionarios_cpf"] . "</td>";
        echo "<td>" . $row["custo"] . "</td>";
        echo "        <td><a href='?pg=editOrdem_servico&numero=$numero' title='Editar'> <i class='glyphicon glyphicon-pencil'></i></a>    ";
        echo "       <a href='?pg=delOrdem_servico&numero=$numero' title='Excluir' onclick='return confirm(\"Deseja Excluir mesmo?\")'> <i class='glyphicon glyphicon-trash'></i></a></td>   ";
        echo " </tr>";
    }
    ?>
</table>