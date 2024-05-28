<?php
include 'db.php'; // Veritabanı bağlantısını içerir
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST['projectName'];
    $taskDescription = $_POST['taskDescription'];
    $status = $_POST['status'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $CalisanID = $_SESSION['CalisanID'];

    // Formdan gelen verileri kontrol et
    echo "Proje Adı: $projectName<br>";
    echo "Görev Açıklaması: $taskDescription<br>";
    echo "Durum: $status<br>";
    echo "Başlangıç Tarihi: $startDate<br>";
    echo "Bitiş Tarihi: $endDate<br>";

    // Durum değerini kontrol et
    $validStatuses = ['Bekliyor', 'Devam Ediyor', 'Tamamlandi'];
    if (!in_array($status, $validStatuses)) {
        die('Geçersiz durum değeri: ' . htmlspecialchars($status));
    }

    // ProjeID'yi almak için Projeler tablosunda ProjeAdi'ne göre sorgulama yapalım
    $sql = "SELECT ProjeID FROM Projeler WHERE ProjeAdi='$projectName'";
    $result = mysqli_query($baglanti, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ProjeID = $row['ProjeID'];

        // Yeni görevi eklemek için SQL sorgusu
        $sql = "INSERT INTO Gorevler (ProjeID, CalisanID, GorevAciklamasi, Durum, BaslangicTarihi, BitisTarihi)
                VALUES ('$ProjeID', '$CalisanID', '$taskDescription', '$status', '$startDate', '$endDate')";

        if (mysqli_query($baglanti, $sql)) {
            echo "Yeni görev başarıyla eklendi.";
            header("Location: home.php"); // Görevler sayfasına yönlendirme
            exit();
        } else {
            echo "Hata: " . mysqli_error($baglanti);
        }
    } else {
        echo "Hata: Proje bulunamadı.";
    }
}
?>
