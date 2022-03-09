<?php
  session_start();
    
  if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){

      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: index.php');
  }else{
      $logado = $_SESSION['usuario'];
  }
  if(!empty($_GET['id'])){
        
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM associados WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $estadoCivil = $user_data['estado_civil'];
            $nacionalidade = $user_data['nacionalidade'];
            $profissao = $user_data['profissao'];
            $cpf = $user_data['cpf'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $genero = $user_data['genero'];
            $dataNascimento = $user_data['data_nascimento'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
            $planoAssociado = $user_data['plano'];
            $dataAquisicao = $user_data['data_aquisicao'];
        }
        

    }else{
        header('Location: associados.php');
    }

    

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Formulário</title>
    </head>
    <body>
        <div class="container ">
            <div class="row justify-content-between botom">
                <div class="col-1">
                  <button onclick="window.location.href='associados.php'" type="button" class="btn btn-success">Voltar</button>
                </div>
                <div class="col-1">
                  <button onclick="window.location.href='sair.php'" type="button" class="btn btn-danger">Sair</button>
                </div>
            </div>
            <fieldset class="bodyContainer">
                <legend class="cabecalho"><b>Atualização de cadastro</b></legend>
                <form class="row g-3" action="saveEdit.php" method="POST">
                        <div class="col-12 input">
                            <label for="nome" class="form-label fontbold">Nome completo</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome completo" value="<?php echo $nome ?>" required>
                        </div>
                        <fieldset class="radius">
                            <legend class="col-form-label col-12 fontbold">Estado Civil</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_civil" id="solteiro" value="solteiro" <?php echo $estadoCivil == 'solteiro'?'checked':''?> required>
                                <label class="form-check-label" for="solteiro">
                                  Solteiro
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_civil" id="casado" value="casado" <?php echo $estadoCivil == 'casado'?'checked':''?> required>
                                <label class="form-check-label" for="casado">
                                  Casado
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_civil" id="divorciado" value="divorciado" <?php echo $estadoCivil == 'divorciado'?'checked':''?> required>
                                <label class="form-check-label" for="divorciado">
                                  Divorciado
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_civil" id="viuvo" value="viuvo" <?php echo $estadoCivil == 'viuvo'?'checked':''?> required>
                                <label class="form-check-label" for="viuvo">
                                  Viúvo
                                </label>
                              </div>
                            </div>
                        </fieldset>
                        <br/><br/><br/>
                        <div class="col-12 input">
                            <label for="nacionalidade" class="form-label fontbold">Nacionalidade</label>
                            <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="Nacionalidade" value="<?php echo $nacionalidade ?>" required>
                        </div>
                        <div class="col-12 input">
                            <label for="profissao" class="form-label fontbold">Profissão</label>
                            <input type="text" name="profissao" id="profissao" class="form-control" placeholder="Profissão" value="<?php echo $profissao ?>" required>
                        </div>
                        <div class="col-12 input">
                            <label for="cpf" class="form-label fontbold">CPF</label>
                            <input type="number" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?php echo $cpf ?>" required>
                        </div>
                        <div class="col-12 input">
                            <label for="email" class="form-label fontbold">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" value="<?php echo $email ?>" required>
                        </div>
                        <div class="col-12 input">
                            <label for="telefone" class="form-label fontbold">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="Telefone" value="<?php echo $telefone ?>" required>
                        </div>   
                        <fieldset class="radius">
                            <legend class="col-form-label col-12 fontbold">Sexo</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="feminio" value="feminino" <?php echo $genero == 'feminino'?'checked':''?> required>
                                <label class="form-check-label" for="feminino">
                                  Feminino
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" <?php echo $genero == 'masculino'?'checked':''?> required>
                                <label class="form-check-label" for="masculino">
                                  masculino
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="outro" value="outro" <?php echo $genero == 'outro'?'checked':''?> required >
                                <label class="form-check-label" for="outro">
                                  Outro
                                </label>
                              </div>
                            </div>
                        </fieldset>
                        <div class="w-100"></div>
                        <div class="col-3 input">
                            <label for="data_nascimento" class="form-label fontbold">Data de Nascimento</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?php echo $dataNascimento ?>" required>
                        </div>       
                        <div class="col-12 input">
                            <label for="cidade" class="form-label fontbold">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?php echo $cidade ?>" required>
                        </div>      
                        <div class="col-12 input">
                            <label for="estado" class="form-label fontbold">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="<?php echo $estado ?>" required>
                        </div>  
                        <div class="col-12 input">
                            <label for="endereco" class="form-label fontbold">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" value="<?php echo $endereco ?>"required>
                        </div>  
                        <fieldset class="radius">
                            <legend class="col-form-label col-12 fontbold">Plano de Associado</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="plano" id="mensal" value="mensal" <?php echo $planoAssociado == 'mensal'?'checked':''?> required>
                                <label class="form-check-label" for="mensal">
                                  Mensal
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="plano" id="anual" value="anual" <?php echo $planoAssociado == 'anual'?'checked':''?> required>
                                <label class="form-check-label" for="anual">
                                  Anual
                                </label>
                              </div>
                            </div>
                        </fieldset>
                        <div class="w-100"></div>
                        <div class="col-3 input">
                            <label for="data_aquisicao" class="form-label fontbold">Data de Aquisição</label>
                            <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control" value="<?php echo $dataAquisicao ?>" required>
                        </div> 
                         <input type="hidden" name="id" value="<?php echo $id ?>" >
                        <div class="w-100"></div>
                        <div class="btn-block">
                            <input type="submit" name="update" id="update" class="btn btn-lg btn-primary btn-block " value="Atualizar">
                        </div>
                    </form> 
                </div>
            </fieldset>
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>