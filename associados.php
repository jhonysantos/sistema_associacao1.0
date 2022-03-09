<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }

    $logado = $_SESSION['usuario'];
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM associados WHERE id LIKE '%$data%' or nome LIKE '%$data%' or cpf LIKE '%$data%' or plano LIKE '%$data%' ORDER BY id DESC";
    }else{
        $sql = "SELECT * FROM associados ORDER BY id DESC";
    }
    
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Associados</title>
    </head>
    <body>
        
        <div class="container ">
            <div class="row justify-content-between botom">
                <div class="col-1">
                    <button onclick="window.location.href='home.php'" type="button" class="btn btn-success">Voltar</button>
                </div>
                <div class="col-1">
                    <button onclick="window.location.href='gerarPdfAssociados.php'" type="button" class="btn btn-secondary">Imprimir</button>
                </div>
                <div class="col-1">
                    <button onclick="window.location.href='sair.php'" type="button" class="btn btn-danger">Sair</button>
                </div>
            </div>
            <div class="row justify-content-between botom">
            <div class="col-12">
                    <div class="box-search">
                        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                        <buton onclick="searchData()" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        </buton>
                    </div>
                </div>
            </div>
            <fieldset class="bodyContainer">
                <legend class="cabecalho"><b> Associados</b></legend>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">MATRICULA</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Plano</th>
                        <th scope="col">Data de aquisição</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>".$user_data['id']."</th>";
                            echo "<td>".$user_data['nome']."</td>";
                            echo "<td>".$user_data['cpf']."</td>";
                            echo "<td>".$user_data['plano']."</td>";
                            echo "<td>".$user_data['data_aquisicao']."</td>";
                            echo "<td><a class='btn btn-success btn-sm' href='perfilAssociado.php?id=$user_data[id]'>Visualizar</a>
                                    <a class='btn btn-warning btn-sm' href='editarAssociado.php?id=$user_data[id]'>Editar</a>
                                    <a class='btn btn-danger btn-sm'  href='' data-toggle='modal' data-target='#delete-modal'>Excluir</a>
                                    <!-- Modal -->
                                    <div type='hidden'class='modal fade' id='delete-modal' tabindex='-1' role='dialog' aria-labelledby='modalLabel'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h4 class='modal-title' id='modalLabel'>Excluir Item</h4>
                                                <button  type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>
                                            </div>
                                            <div class='modal-body'>
                                                Deseja realmente deletar este associado?
                                            </div>
                                            <div class='modal-footer'>
                                                <a class='btn btn-primary' href='delete.php?id=$user_data[id]'>Sim</a>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Não</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div> 
                                    <!-- /.modal -->
                                    
                                </td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </body>
    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function (event){
            if(event.key === "Enter")
            {
                searchData();
            }
        });
        function searchData(){
            window.location = 'associados.php?search='+search.value;
        }
    </script>
</html>