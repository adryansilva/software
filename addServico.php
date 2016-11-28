<?php
require_once './dao/DaoLogin.php';
require_once './model/Servico.php';
$DaoLogin = DaoLogin::getInstance();
?>
<center>
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: inherit;
        }
    </style>
    <div class="titulo2">
            <span class="label label-success">ADICIONAR SERVIÇO:</span>
        </div>
    <br>
    <a href="?pg=servico"><h4><b>Voltar</b></h4></a>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <fieldset style="width: 60%;">
            <legend><b>Cadastro de Servico:</b></legend>
            <br>
            <label><b>Tipo do Serviço:</b></label><br>
            <input type="text" name="tipo" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
             <label><b>Problema:</b></label><br>
             <input type="text" name="problema" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
             <label><b>Preco de Custo:</b></label><br>
            <input type="text" name="custo" required="" class="form-control" style="width: 45%; height: 35px;"/>
             <br>
            <br>
            <label><b>Relatório do Serviço (Descrição):</b></label><br>
            <input type="text" name="relatorio" required="" class="form-control" style="width: 45%; height: 35px;"/>
            <br>
            <br>
            <label><b>Imagem do Serviço:</b></label><br>
            <input type="file" name="imagem" required="" class="form-control" style="width: 45%; height: 35px;"/>
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
    $servico = new Servico();
    $servico->setTipo(@$_POST["tipo"]);
    $servico->setProblema(@$_POST["problema"]);
    $servico->setCusto(@$_POST["custo"]);
    $servico->setRelatorio(@$_POST["relatorio"]);
    $servico->setImagem($_FILES["imagem"]["name"]);
    
    /***upload de imagem**/
   $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino.basename($_FILES["imagem"]["name"]);  
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);
    chown($arquivoDestino, 777);    
    /***fim do upload***/
$exe = $DaoLogin->inserir_servico($servico);
   
    if ($exe) {
         echo "<script type='text/javascript'>"
        . " alert('Serviço Cadastrado com sucesso!');"
        . "location.href='?pg=servicos';"
        . "</script>;";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possivel cadastrar o Serviço!');"
        . "location.href='?pg=servicos';"
        . "</script>";
    }
}