<?php
include 'db.php'; // Veritabanı bağlantınızı içerir

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calisanID = $_POST['calisanID'];
    $toplantiOdasiID = $_POST['toplantiOdasiID'];
    $rezervasyonSaati = $_POST['rezervasyonSaati'];
    $rezervasyonTarihi = $_POST['rezervasyonTarihi'];

    // Rezervasyon bilgilerini ToplantiRezervasyonlari tablosuna ekle
    $sql = "INSERT INTO ToplantiRezervasyon (CalisanID, ToplantiOdasiID, RezervasyonSaati, RezervasyonTarihi) 
            VALUES ('$calisanID', '$toplantiOdasiID', '$rezervasyonSaati', '$rezervasyonTarihi')";

    if (mysqli_query($baglanti, $sql)) {
        echo "Rezervasyon başarıyla oluşturuldu.";
        header("Location: home.php"); // Görevler sayfasına yönlendirme
        exit();
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
}
?>
