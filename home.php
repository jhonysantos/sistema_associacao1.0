<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }else{
        $logado = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Home</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-end botom">
                <div class="col-11">
                    <?php
                        echo "<h1>Bem vindo <u>$logado</u> ao Sistema de Associados</h1>";
                    ?>
                </div>
                <div class="col-1">
                    <button onclick="window.location.href='sair.php'" type="button" class="btn btn-danger">Sair</button>
                </div>
            </div>
            <br/><br/>
            <div class="area">
                <div class="boxHome">
                    <a href="associados.php" class="btn btn-lg btn-primary">Associados</a>
                    <a href="formularioAssociado.php" class="btn btn-lg btn-primary">Cadastro de Associados</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>