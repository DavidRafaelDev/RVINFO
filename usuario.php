<?php

include_once 'classgeral.php';

class usuario extends classgeral{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $comida;

        // Functions
          public function CadastrarUsuario($nome,$email,$senha,$comida){
            if (empty($nome) || empty($email)  || empty($senha) || empty($comida)){
                return 0;
                exit;
            }
            $sql = "INSERT INTO tb_usuario(nm_usuario, nm_email, cd_senha, ds_comida) VALUES ('$nome' , '$email', '$senha', '$comida')";
            
            $res = $this->query($sql);
            if($res){
               return 1;
            }else{
                return 0;
            }
          }

          public function logar($email,$senha){
                $sql = "SELECT * FROM tb_usuario WHERE nm_email = '$email' AND cd_senha = '$senha'";
                $res = $this->query($sql);
                if(is_array($res)){
                    $dado = $res[0];
                    if($dado['cd_senha'] == $senha){                 
                        return true; // logado  com sucesso  
                    }
            }
          }
          public function select(){
              $sql = "SELECT * FROM tb_usuario";
              $res = $this->query($sql);
              return $res;
          }

}
          