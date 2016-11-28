<?php
$id = @$_GET["id"];
require_once 'dao/DaoLogin.php';
$DaoLogin = DaoLogin::getInstance();
$atualizar_servico = $DaoLogin->getServico($id);
?>
<center>
    <div class="titulo2">
            <span class="label label-success">EDITAR SERVIÇO:</span>
        </div>
    <br>
    <a href="?pg=servicos">Voltar</a>
    <br>
    <br>
    <form method="post">
        <br>
        <fieldset style="width: 70%;">
            <legend><b>Editar Serviços:</b></legend>
            <br>
            <label><b>Tipo:</b></label><br>
            <input type="hidden" name="id" value="<?= $atualizar_servico["id"] ?>"/><br>
            <input type="text" name="tipo" value="<?= $atualizar_servico["tipo"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>Problema:</b></label><br>
            <input type="text" name="problema" value="<?= $atualizar_servico["problema"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>Custo (Para vender):</b></label><br>
            <input type="number" name="custo" value="<?= $atualizar_servico["custo"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
            <label><b>Relatório (Descrição):</b></label><br>
            <input type="text" name="relatorio" value="<?= $atualizar_servico["relatorio"] ?>" required="" class="form-control" style="width: 45%; height: 35px;"/><br>
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
require_once 'model/Servico.php';
if (isset($_POST["botao"])) {
    $servico = new Servico();
    $servico->setId(@$_POST["id"]);
    $servico->setTipo(@$_POST["tipo"]);
    $servico->setProblema(@$_POST["problema"]);
    $servico->setCusto(@$_POST["custo"]);
    $servico->setRelatorio(@$_POST["relatorio"]);
    $DaoLogin = DaoLogin::getInstance();
    $exe = $DaoLogin->atualizar_servico($servico);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Serviço Atualizado com sucesso!');"
        . "location.href='?pg=servicos';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel atualizar o Serviço!');"
        . "</script>";
    }
}