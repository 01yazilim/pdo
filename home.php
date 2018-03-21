<?php 
	require_once 'database-connect.php'; 

		if (!isset($_SESSION["login"]) || !isset($_SESSION["eposta"])) {
			header("Location:login.php");
			exit;
		}else{
				$ip = $_SERVER['REMOTE_ADDR'];
				$sorgu = $db->prepare('SELECT * FROM hesap WHERE eposta=?');
				$sorgu->execute([$_SESSION['eposta']]);
				$result = $sorgu->fetch(PDO::FETCH_ASSOC);
				
				if(!$result){
					header('Location:login.php');
					exit;
				}else{
					if($result['ip']!=$ip){
						header('Location:login.php');
						exit; SErkan Serkan was here!!!
					}else{
						//GEREKLİ İŞLEMLER BURADA YAPILACAK
						//GEREKLİ İŞLEMLER BURADA YAPILACAK
						//GEREKLİ İŞLEMLER BURADA YAPILACAK
					}
				}
				
			}
?>
