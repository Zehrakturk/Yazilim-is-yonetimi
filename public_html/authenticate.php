<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Kullanıcı adı ile eşleşen kayıt var mı kontrol et
    $sql = "SELECT * FROM Calisanlar WHERE KullaniciAdi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kullanici_adi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Şifreyi kontrol et
        if (password_verify($sifre, $row['Sifre'])) {
            // Başarılı giriş
            $_SESSION['kullanici_adi'] = $kullanici_adi;
            echo "Giriş başarılı. Hoş geldiniz, " . $row['Adi'] . " " . $row['Soyadi'];
        } else {
            echo "Geçersiz şifre.";
        }
    } else {
        echo "Kullanıcı adı bulunamadı.";
    }
    $stmt->close();
}
$conn->close();
?>
