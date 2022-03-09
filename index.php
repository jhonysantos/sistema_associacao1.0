<!DOCTYPE html>
<html lang="br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Sistema Associação</title>
    </head>
    <body class="body">
        <div class="area">
            <img class="logo" src="Logo.png" />
            
            <h2>Faça o Login</h2>
            <form action="loginUser.php" method="POST">
                <input type="text" name="usuario" placeholder="Usuário" class="form-control" />
                <br/>
                <input type="password" name="senha" placeholder="Senha" class="form-control" />
                <label class="remember">
                    <input type="checkbox" name="remember" value="1" />
                    Lembrar minha senha
                </label>
                <input type="submit"name="submit" value="Entrar" class="btn btn-lg btn-primary btn-block" />
            </form>
            <p class="gray padding">@ Desenvolvido por Jhony Santos</p>
        </div>
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>