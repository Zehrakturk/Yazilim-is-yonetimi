<?php
$sunucu = "localhost"; 
$kullanici = "dbusr21360859049"; 
$sifre = "GrujKVdBmXCa"; 
$veritabani = "dbstorage21360859049"; 

// Veritabanı bağlantısı oluşturma
$baglanti = new mysqli($sunucu, $kullanici, $sifre, $veritabani);

// Bağlantıyı kontrol etme
if ($baglanti->connect_error) {
    die("<p>Bağlantı hatası: " . $baglanti->connect_error . "</p>");
} else {
}

// Bağlantıyı kapat

