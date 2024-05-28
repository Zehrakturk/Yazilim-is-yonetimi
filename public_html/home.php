<?php
session_start();
if (!isset($_SESSION['CalisanID'])) {
    header("Location: login.php");
    exit();
}

$sayfa = "index";
include('inc/adminhead.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Task List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Task List</li>
        </ol>
        <div class="row">
            <!-- Your cards here -->
        </div>
        <div class="row">
            <!-- Your charts here -->
        </div>
        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4" onclick="window.location.href='gorevekle.php'">
                                    <div class="card-body">Task Add</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Görevleriniz
            </div>
            <div class="card-body">
                <table id="taskTable" class="table">
                    <thead>
                        <tr>
                            <th>Proje Adı</th>
                            <th>Görev Açıklaması</th>
                            <th>Durum</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db.php'; // Veritabanı bağlantınızı içerir

                        $CalisanID = $_SESSION['CalisanID'];

                        // Join the Gorevler and Projeler tables to get the project names
                        $sql = "SELECT p.ProjeAdi, g.GorevAciklamasi, g.Durum, g.BaslangicTarihi, g.BitisTarihi 
                                FROM Gorevler g
                                JOIN Projeler p ON g.ProjeID = p.ProjeID
                                WHERE g.CalisanID='$CalisanID'";
                        $result = mysqli_query($baglanti, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['ProjeAdi'] . "</td>";
                                echo "<td>" . $row['GorevAciklamasi'] . "</td>";
                                echo "<td>" . $row['Durum'] . "</td>";
                                echo "<td>" . $row['BaslangicTarihi'] . "</td>";
                                echo "<td>" . $row['BitisTarihi'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Henüz atanmış bir göreviniz yok.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="https://github.com/Zehrakturk/Yazilim-is-yonetimi" target="_blank">Visit my GitHub Repository</a>

    </div>
</main>
<?php
include('inc/adminfooter.php');
?>
