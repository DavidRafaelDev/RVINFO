<?php
  //inicia a session
    session_start();
    require_once 'usuario.php';
    // Listar
    $user = new usuario;
    $arrayUser = $user->select();

    // Sair
        if(isset($_GET['sair']) && $_GET['sair'] == 1){
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
    }

        // Verifica se esta logado
        if(!isset($_SESSION['user']) ){
        header("location: index.php");
        exit;
    }

?>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 

    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="estilo/estilo.css">

    <script src="https://kit.fontawesome.com/99ba45e938.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/99ba45e938.js" crossorigin="anonymous"></script>

    <title>O Crud - Home </title>
</head>
<body>
    <!--Deslogar-->
    <div class="row">
        <div class="col-md-1 offset-md-11">
            <a href="?sair=1">Deslogar</a>
        </div>
    </div>

    <!--Logo-->
     <div class="row">
         <div class="col-md-1 offset-md-4">
            <img class="img-logo" src="img/logo.png">
        </div>       
    </div>   
    <!--Tabela-->
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table">
                <thead class="thead">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col"><i class="far fa-user"></i> Nome</th>
                    <th scope="col"><i class="fas fa-envelope"></i> Email</th>
                    <th scope="col"><i class="fas fa-pizza-slice"></i> Comida Favorita</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(is_array($arrayUser)){
                        foreach($arrayUser as $key=> $value){
                    ?>  

                    <tr>
                    <th scope="row"><?= $value['id_usuario'] ;?></th>
                    <td><?= $value['nm_usuario'] ;?></td>
                    <td><?= $value['nm_email'] ;?></td>
                    <td><?= $value['ds_comida'] ;?></td>

                    <?php }
                    } ?>

                    </tr>
                </tbody>
            </table>
        </div>       
    </div>
    
</body>
</html>