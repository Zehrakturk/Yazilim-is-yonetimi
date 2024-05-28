<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Görev Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input, select, textarea {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }

        button:hover {
            opacity: .7;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        a {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }

        a:hover {
            opacity: .7;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Yeni Görev Ekle</h2>
        <form action="gorevkaydet.php" method="POST">
            <div class="form-group">
                <label for="projectName">Proje Adı</label>
                <input type="text" class="form-control" id="projectName" name="projectName" required>
            </div>
            <div class="form-group">
                <label for="taskDescription">Görev Açıklaması</label>
                <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="status">Durum</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Bekliyor">Bekliyor</option>
                    <option value="Devam Ediyor">Devam Ediyor</option>
                    <option value="Tamamlandi">Tamamlandi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Başlangıç Tarihi</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">Bitiş Tarihi</label>
                <input type="date" class="form-control" id="endDate" name="endDate" required>
            </div>
            <button type="submit" class="btn btn-primary">Görev Ekle</button>
        </form>
    </div>
</body>
</html>
