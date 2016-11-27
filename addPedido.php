<?php
require_once './dao/DaoLogin.php';
require_once './model/Pedido.php';
require_once './model/Produto_pedido.php';
$DaoLogin = DaoLogin::getInstance();
$listaCategorias = $DaoLogin->listar_categoria();
$listar_produto_pedido = $DaoLogin->listar_produto_pedido();
$listar_produto = $DaoLogin->listar_produto();
$listar_cliente = $DaoLogin->listar_cliente();
$listar_funcionario = $DaoLogin->listar_funcionario();
?>
<center>
    <div class="titulo2">
        <span class="label label-success">ADICIONAR PEDIDO DE PRODUTOS:</span>
    </div>
    <br>
    <a href="?pg=painel"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form method="post">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Pedido:</b></legend>
            <br>
            <label><b>Data do Pedido:</b></label><br>
            <input type="date" name="data" id="data" class="form-control" required="" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Produtos Comprados:</b></label><br>
            <select name="produtos_codigo" required="" class="form-control" style="width: 45%; height: 35px;">
                <option value="">Selecione produtos</option>
                <?php
                foreach ($listar_produto_pedido as $produto_pedido) {
                    foreach ($listar_produto as $produto) {
                        ?>
                        <option value="<?= $produto_pedido["produtos_codigo"] ?>"><?= $produto["nome_completo"] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button type="button" name="mais_produtos" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-plus"></span><b></b></button>
            <br>
            <br>
            <label><b>Custo:</b></label><br>
            <input type="number" name="custo" required="" maxlength="10" class="form-control" style="width: 45%; height: 35px;"/>
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
    $pedido = new Pedido();
    $pedido->setData(@$_POST["data"]);
    $pedido->setCusto(@$_POST["custo"]);
    $pedido->setProdutos(@$_POST["produtos_codigo"]);
    $pedido->setClientes_cpf(@$_POST["clientes_cpf"]);
    $pedido->setFuncionarios_cpf(@$_POST["funcionarios_cpf"]);
    $exe = $DaoLogin->inserir_pedido($pedido);
    if ($exe) {
        $produto_pedido = new Produto_pedido();
        $produto_pedido->setProdutos_codigo(@$_POST["produtos_codigo"]);
        $exe = $DaoLogin->inserir_produto_pedido($produto_pedido);
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