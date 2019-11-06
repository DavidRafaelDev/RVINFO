<?php 
	require 'conexao.php';
	class ClassGeral {
		
		private $DB;
		protected function query($sql){
			try {
			    $this->DB = new DB();
	        	$query = $this->DB->connectDB()->prepare($sql);
	            if($query->execute()){
	            	if(method_exists($query, 'rowCount') && $query->rowCount() > 0){
	            		$fetch = $query->fetch(PDO::FETCH_ASSOC);
	            		//se tem linhas afetadas mas nao é um array (insert/ update)
	            		if(!is_array($fetch)){ return 1; }
	            		//se for um array...
	            		$array[] = $fetch;
		            	while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
		            		$array[] = $fetch;
		            	}
		            	return $array;
		            }
	            }else{
	            	return false;
	            }
			}catch(PDOException $e){
			    echo $e->getMessage();
			}
        }
	}