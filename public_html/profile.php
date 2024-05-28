<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>User Profile</h3>
            </div>
            <div class="card-body">
            <?php
                session_start();
                include "db.php";

                // Kullanıcı oturum açmışsa
                if (isset($_SESSION['KullaniciAdi'])) {
                    // Kullanıcı bilgilerini doğrudan yazdır
                    echo "Welcome, " . $_SESSION['KullaniciAdi'] . "!";
                    echo "<br>Kullanıcı İsmi: " . $_SESSION['Adi'];
                    echo "<br><a href='logout.php'>Logout</a>";
                } else {
                    // Kullanıcı oturum açmamışsa, index.php sayfasına yönlendir
                    header("Location: index.php");
                    exit();
                }
                ?>

            </div>
        </div>
    </div>
</body>
</html>
