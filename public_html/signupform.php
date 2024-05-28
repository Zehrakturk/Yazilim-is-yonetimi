<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup.php" method="post">
        <h2>Sign Up</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="KullaniciAdi" placeholder="User Name" required><br>

        <label>Name</label>
        <input type="text" name="Adi" placeholder="Name" required><br>

        <label>Surname</label>
        <input type="text" name="Soyadi" placeholder="Surname" required><br>

        <label>Password</label>
        <input type="password" name="Sifre" placeholder="Password" required><br>

        <label>Work Unit</label>
        <input type="text" name="CalismaBirimi" placeholder="Work Unit" required><br>

        <button type="submit">Sign Up</button>
     </form>
</body>
</html>
