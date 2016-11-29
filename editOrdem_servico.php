<?php
$numero = @$_GET["numero"];
require_once 'dao/DaoLogin.php';
$DaoLogin = DaoLogin::getInstance();
$atualizar_ordem_servico = $DaoLogin->getOrdem_servico($numero);
?>
<center>
    <div class="titulo2">
            <span class="label label-success">EDITAR PEDIDO DE SERVIÇO:</span>
        </div>
    <br>
    <a href="?pg=painel">Voltar</a>
    <br>
    <br>
    <form method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Pedido de Serviços:</b></legend>
            <br>
            <label><b>Data:</b></label><br>
            <input type="hidden" name="numero" value="<?= $atualizar_ordem_servico["numero"] ?>"/><br>
            <input type="date" name="data" value="<?= $atualizar_ordem_servico["data"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>Tipo de Serviço:</b></label><br>
            <input type="text" name="tipo_servico" value="<?= $atualizar_ordem_servico["tipo_servico"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>Relatório (Descrição):</b></label><br>
            <input type="text" name="relatorio" value="<?= $atualizar_ordem_servico["relatorio"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>CPF do Cliente:</b></label><br>
            <input type="text" name="clientes_cpf" value="<?= $atualizar_ordem_servico["clientes_cpf"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>CPF do Funcionario:</b></label><br>
            <input type="text" name="funcionarios_cpf" value="<?= $atualizar_ordem_servico["funcionarios_cpf"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
             <label><b>Custo (De Acordo com o Serviço):</b></label><br>
            <input type="text" name="custo" value="<?= $atualizar_ordem_servico["custo"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <br>
            <br>
            <button type="submit" name="botao" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span> Confirmar </button>
            <br>
            <br>
        </fieldset>
        <br>
        <br>
    </form>
    <br>
</center>
<?php
require_once 'dao/DaoLogin.php';
require_once 'model/Ordem_servico.php';
if (isset($_POST["botao"])) {
    $ordem_servico = new Ordem_servico();
    $ordem_servico->setNumero(@$_POST["numero"]);
    $ordem_servico->setData(@$_POST["data"]);
    $ordem_servico->setTipo_servico(@$_POST["tipo_servico"]);
    $ordem_servico->setRelatorio(@$_POST["relatorio"]);
    $ordem_servico->setClientes_cpf(@$_POST["clientes_cpf"]);
    $ordem_servico->setFuncionarios_cpf(@$_POST["funcionarios_cpf"]);
   $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar_ordem_servico($ordem_servico);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Pedido de Serviço Atualizado com sucesso!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar o Pedido de Serviço!');"
        . "</script>";
    }
}