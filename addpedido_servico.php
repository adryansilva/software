<?php
require_once './dao/DaoLogin.php';
require_once './model/Servico.php';
require_once './model/Ordem_servico.php';
$DaoLogin = DaoLogin::getInstance();
$listar_servico = $DaoLogin->listar_servico();
$listar_ordem_servico = $DaoLogin->listar_ordem_servico();
$listar_cliente = $DaoLogin->listar_cliente();
$listar_funcionario = $DaoLogin->listar_funcionario();
?>
<center>
    <div class="titulo2">
        <span class="label label-success">ADICIONAR PEDIDO DE SERVIÇO:</span>
    </div>
    <br>
    <a href="?pg=painel"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form method="post">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Pedido de Serviço:</b></legend>
            <br>
            <label><b>Data do Pedido:</b></label><br>
            <input type="date" name="data" id="data" class="form-control" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Tipo de Serviço:</b></label><br>
            <select name="tipo_servico" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione o tipo de serviço</option>
                <?php
                foreach ($listar_servico as $servico) {
                        ?>
                        <option value="<?= $servico["id"] ?>"><?= $servico["tipo"] ?></option>
                        <?php
                    }
                ?>
            </select>
            <button type="button" name="mais_produtos" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-plus"></span><b></b></button>
            <br>
            <br>
            <label><b>Relatorio (Descrição):</b></label><br>
            <input type="text" name="relatorio" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Custo (De acordo com o preço do serviço):</b></label><br>
            <input type="text" name="custo" required="" maxlength="10" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>CPF do Cliente:</b></label><br>
            <select name="clientes_cpf" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione CPF do Cliente</option>
                <?php
                foreach ($listar_cliente as $cliente) {
                    ?>
                    <option value="<?= $cliente["cpf"] ?>"><?= $cliente["cpf"] ?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <br>
            <label><b>CPF do Funcionário:</b></label><br>
            <select name="funcionarios_cpf" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione CPF do Funcionário</option>
                <?php
                foreach ($listar_funcionario as $funcionario) {
                    ?>
                    <option value="<?= $funcionario["cpf"] ?>"><?= $funcionario["cpf"] ?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" name="botao" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span><b>  Confirmar</b></button>
            <button type="reset" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-trash"></span><b> Limpar</b></button>
            <br>
            <br>
        </fieldset>
        <br>
        <br>
    </form>
    <br>
</center>
<?php
if (isset($_POST["botao"])) {
    $ordem_servico = new Ordem_servico();
    $ordem_servico->setData(@$_POST["data"]);
    $ordem_servico->setTipo_servico(@$_POST["tipo_servico"]);
    $ordem_servico->setRelatorio(@$_POST["relatorio"]);
    $ordem_servico->setClientes_cpf(@$_POST["clientes_cpf"]);
    $ordem_servico->setFuncionarios_cpf(@$_POST["funcionarios_cpf"]);
    $ordem_servico->setCusto(@$_POST["custo"]);
    $exe = $DaoLogin->inserir_ordem_servico($ordem_servico);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Pedido de Serviço Cadastrado com sucesso!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o Pedido de Serviço!');"
        . "location.href='?pg=painel';"
        . "</script>";
    }
}