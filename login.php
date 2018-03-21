<?php 
	require_once 'connect.php'; 
	require_once 'function.php'; 
	 
	if (isset($_POST["login"])) {

		$eposta = cleanInput($_POST['eposta']);
		$sifre  = md5(sha1($_POST['sifre']));
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if (empty($eposta) || empty($sifre)) {
					echo 'Boş Alan Bırakmayın !';
		}else{
			
		$sorgu = $db->prepare('SELECT * FROM hesap WHERE (eposta=? AND sifre=?)');
        $sorgu->execute([$eposta,$sifre]);
			if(!empty($sorgu) && $sorgu->rowCount() > 0 ){
			
			//Session Oluşturuyoruz.
				$_SESSION['eposta'] = $eposta;
				$_SESSION['login'] = 'true';
				
				$sorgu = $db->prepare('UPDATE hesap SET  ip = ? WHERE (eposta = ? && sifre = ?)');
                $guncelle = $sorgu->execute([$ip,$eposta,$sifre]);

                if($guncelle){
                    header("Location:home.php");
                }else{
                    echo 'Güncelleme işlemi başarısız';
                }
			   
			   
			}else{
			   echo 'Hata !';
			}
		}
	}

	ob_end_flush();
?>
