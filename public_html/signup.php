<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $KullaniciAdi = validate($_POST['KullaniciAdi']);
    $Adi = validate($_POST['Adi']);
    $Soyadi = validate($_POST['Soyadi']);
    $Sifre = validate($_POST['Sifre']);
    $CalismaBirimi = validate($_POST['CalismaBirimi']);

    // Form verilerini doğrula
    if (empty($KullaniciAdi) || empty($Adi) || empty($Soyadi) || empty($Sifre) || empty($CalismaBirimi)) {
        header("Location: signup.php?error=All fields are required");
        exit();
    } else {
        // Kullanıcı adının benzersiz olup olmadığını kontrol et
        $sql = "SELECT * FROM Calisanlar WHERE KullaniciAdi='$KullaniciAdi'";
        $result = mysqli_query($baglanti, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=Username already exists");
            exit();
        } else {
            // Kullanıcıyı veritabanına ekle
            $sql = "INSERT INTO Calisanlar (KullaniciAdi, Adi, Soyadi, Sifre, CalismaBirimi) VALUES ('$KullaniciAdi', '$Adi', '$Soyadi', '$Sifre', '$CalismaBirimi')";
            if (mysqli_query($baglanti, $sql)) {
                header("Location: index.php?success=Sign up successful. You can now log in");
                exit();
            } else {
                header("Location: signup.php?error=Something went wrong. Please try again later");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
