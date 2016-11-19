<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITSOLUTION::GESTÃO</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <?php
                    session_start();
                    if (isset($_SESSION["logado"])) {
                        if ((time() - @$_SESSION['last_login_timestamp']) > 1800) {
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
    <body>
        <div id="container">
            <div id="header">
                <img src="img/banner_ITSOLUTION_GESTÃO.jpg" alt="img_banner_ITSolution_GESTÃO"/>
            </div>
            <div id="menu">
                <?php
                include 'menu.php';
                ?>
            </div>
            <div id="content">
                <div id="content-main">
                    <?php
                    $pg = @$_GET["pg"];
                    if (!empty($pg)) {
                        include $pg . '.php';
                    } else {
                        include 'painel.php';
                    }
                    ?>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
                    </body>
                    </html>