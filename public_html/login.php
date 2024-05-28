<?php 
session_start(); 
include "db.php";

if (isset($_POST['KullaniciAdi']) && isset($_POST['Sifre'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$KullaniciAdi = validate($_POST['KullaniciAdi']);
	$Sifre = validate($_POST['Sifre']);

	if (empty($KullaniciAdi)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	} else if (empty($Sifre)) {
        header("Location: index.php?error=Password is required");
	    exit();
	} else {
		$sql = "SELECT * FROM Calisanlar WHERE KullaniciAdi='$KullaniciAdi' AND Sifre='$Sifre'";

		$result = mysqli_query($baglanti, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['KullaniciAdi'] === $KullaniciAdi && $row['Sifre'] === $Sifre) {
            	$_SESSION['KullaniciAdi'] = $row['KullaniciAdi'];
            	$_SESSION['Adi'] = $row['Adi'];
            	$_SESSION['CalisanID'] = $row['CalisanID'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
} else {
	header("Location: index.php");
	exit();
}
?>
