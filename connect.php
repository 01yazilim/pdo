<?php
	 try{
		$db = new PDO('mysql:host=localhost:3307;dbname=DATABASENAME','USER','PASSWORD');
	    }catch(PDOException $e){
		echo $e->getMessage(); 
	    }
?>
