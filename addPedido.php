<center>
    <div class="titulo2">
        <span class="label label-success">ADICIONAR PEDIDO DE PRODUTOS:</span>
    </div>
    <br>
    <a href="?pg=painel"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Pedido:</b></legend>
            <br>
            <label><b>Data do Pedido:</b></label><br>
            <input type="date" name="data" id="data" class="form-control" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Produtos Comprados:</b></label><br>
            <<select name="produtos_codigo" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione produtos</option>
                <?php
                foreach ($listar_produto as $produto) {
                ?>
                <option value="<?=$produto["codigo"]?>"><?=$produto["nome_completo"]?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <br>
            <label><b>Custo:</b></label><br>
            <input type="number" name=custo required="" maxlength="15" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>CPF do Cliente:</b></label><br>
            <input type="number" name="cpf_cliente" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>CPF do Funcionário:</b></label><br>
            <input type="number" name="cpf_funcionario" required="" class="form-control" style="width: 45%; height: 35px;"/>
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
require_once './dao/DaoLogin.php';
require_once './model/Pedido.php';
if (isset($_POST["botao"])) {
    $pedido = new Pedido();
    $pedido->setNumero(@$_POST["numero"]);
    $pedido->setData(@$_POST["data"]);
    $pedido->setEquipamento(@$_POST["produtos_codigo"]);
    $pedido->setCusto(@$_POST["custo"]);
    $pedido->setClientes_cpf(@$_POST["cpf_cliente"]);
    $pedido->setFuncionarios_cpf(@$_POST["cpf_funcionario"]);
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->inserir_pedido($pedido);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Pedido Cadastrado com sucesso!');"
        . "location.href='?pg=painel';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o Pedido!');"
        . "location.href='?pg=painel';"
        . "</script>";
    }
}