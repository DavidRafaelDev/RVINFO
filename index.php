<?php
    //inicia a session
    session_start();
    require_once 'usuario.php';
    $user = new usuario;

    // Logar
    $LoginInvalido = false;
    if(isset($_POST['logar'])){
        //instnacia uma variavel de session do tipo usuario
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        if(!empty($email) && !empty($senha)){
            if($user->logar($email,$senha)){
               header("Location: home.php");
               exit;
            }else{
                $LoginInvalido = true;
            }
        }
    }

    // Registrar
    $sucesso = 2;
    if(isset($_POST['enviar'])){
    $sucesso = $user->CadastrarUsuario($_POST['nome'],
                            $_POST['email'],
                            $_POST['senha'],
                            $_POST['comida']);
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="estilo/estilo.css">

    <title>O Crud - Login</title>

</head>

<body>
    <!--Logo -->
    <div class="row">
        <div class="col-md-1 offset-md-4">
            <img class="img-logo" src="img/logo.png">
        </div>
    </div>

    <!--Teste para mensagem de sucesso de cadastro-->
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <?php
                if($sucesso == 1){
                            echo  '<div class="alert alert-success" role="alert"> Cadastrado com sucesso, faça login e beba agua !</div>';
                        }

                        if($sucesso == 0){
                            echo  '<div class="alert alert-warning" role="alert">Erro ao cadastrar, tente novamente</div>';
                        }
            ?>
        <!--Teste para mensagem de erro de login-->
        <?php
            if($LoginInvalido){
                echo  '<div class="alert alert-warning" role="alert">Usuario ou senha incorreto</div>';
            }
        ?>
        </div>
    </div>

    <!--Formulario de login-->
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="email"placeholder="exemplo@hotmail.com">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="*******">
            </div>
            <button type="submit" name="logar" class="btn btn-primary">Entrar</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastro">Cadastrar</button>
            </form>
        </div>                 
    </div>

<!-- Modal -->
<div id="cadastro" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastro</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
            <form method="post" role="form">
                <div class="form-group" >
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="exemplo@gmail.com">
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Rogerinho do inga">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="1234">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comida Favorita</label>
                    <input type="text" class="form-control" name="comida" id="comida" placeholder="Lasanha">
                </div>
            <button type="submit" name='enviar' class="btn btn-primary">Registrar</button>
            </form> 
        </div>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--Fim modal-->

</body>
</script>
</html>