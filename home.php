<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITSOLUTION::GESTÃO</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/estilo.css"/>
    </head>
    <body>

    </body>
    <?php
    session_start();
    if (isset($_SESSION["logado"])) {
        if ((time() - @$_SESSION['last_login_timestamp']) > 900) { // 900 = 15 * 60  
            session_destroy();
            ?>
            <script type="text/javascript">
                alert("Sessão Expirada!\n\
                             FAÇA LOGIN NOVAMENTE!");
            </script>
        <?php
    } else {
        @$_SESSION['last_login_timestamp'] = time();
    }
} else {
    header('location: index.php');
}
if ($_SESSION['logado'] != 1) {
    ?>
        <script type="text/javascript">
            document.location.href = "index.php?erro=1";
        </script>
        <?php
    } else {
        
    }
    ?>
</html>