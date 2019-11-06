<?php 
	define('DB_NAME','id11493138_crud');
	define('DB_USER','id11493138_david');
	define('DB_PW','senha2019');
	define('DB_HOST','localhost');
	class DB{
        
            public function connectDB(){
            
                try{
                    $con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PW);
                    $con->exec("set names utf8");
                    return $con;
                }catch(PDOException $erro){
                    return $erro->getMessage();
                }
            
        }
    }