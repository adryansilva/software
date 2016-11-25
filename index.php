<!DOCTYPE html>
<html>
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta charset="UTF-8">
    <?php
    session_start();
    require_once ("dao/DaoLogin.php");
    require_once ("dao/Conexao.php");
    $DaoLogin = new DaoLogin();

    if (isset($_POST['OnLogin'])) {

        if ($DaoLogin->cpf(@$_POST['usuario_inserido'], @$_POST['senha_inserido'])) {
            @$_SESSION['logado'] = '1';
            @$_SESSION['nome'] = $DaoLogin->RetornaNome(@$_POST['cpf']);
            @$_SESSION['last_login_timestamp'] = time();
            header("Location: home.php");
        } else {
            ?>
            <script type="text/javascript">
                alert("Usuário ou senha inválido.");
            </script>
            <?php
        }
    }
    if (isset($_GET['erro'])) {
        switch (@$_GET['erro']) {
            case "1":
                ?>
                <script type="text/javascript">
                    alert("Você não tem permissão para acessar o painel.");
                </script>
                <?php
                break;
            case "2":
                ?>
                <script type="text/javascript">
                    alert("Você saiu do painel.");
                </script>
                <?php
                break;
        }
    }

    if (@$_SESSION['logado'] == 1) {
        header("Location: home.php");
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Login - ITSOLUTION GESTÃO</title>
         <link rel="shortcut icon" href="img/favicon.ico">
        <style>
            body {
                background-image: url("img/fundo.jpg");
                color: red;
            }
            input[type=text] {
                width: 50%;
                padding: 8px 20px;
                margin: 1px 0;
            }
            input[type=password] {
                width: 45%;
                padding: 7px 20px;
                margin: 1px 0;
            }
            input[type=text]:focus, input[type=number]:focus {
                border: 4px ridge activeborder;
            }
            input[type=button], input[type=submit], input[type=reset] {
                background-color: buttonhighlight;
                color: black;
                font-weight: bold;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 45%;
                cursor: pointer;
                font-size: 14px;
                border: activeborder;
            }
            h1 {
                font-size: 25px;
                font-family: Helvetica;
                font-weight: bold;
                color: #ff0000;
            }
            h2 {
                font-size: 20px;
                font-family: Helvetica;
                font-weight: bold;
                color: #ff0000;
            }
            h3 {
                font-size: 19px;
                font-family: Helvetica;
                font-weight: bold;
                color: #0000ff;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <fieldset style = "width: 45%; margin: 100px auto; opacity:.80;">
            <form action=" " method="post"> 
                <center>
                    <img src="img/logo.png" alt="img_" width="270" height="140"/>
                    <h2><b> CPF: </b><input type="text" name="usuario_inserido" required="" autocomplete="off" autofocus="" /></h2>
                    <h2><b> Senha: </b><input type="password" name="senha_inserido" required="" autocomplete="off"/></h2><br>
                    <input type='submit' name="OnLogin" value='Entrar'/>
                    <br>
                    <br>
                </center>
            </form>
        </fieldset>
    </body>
</html>
