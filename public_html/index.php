<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        button {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
     <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="KullaniciAdi" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="Sifre" placeholder="Password"><br>

        <button type="submit">Login</button>
     </form>
     <form action="signupform.php" method="get">
        <button type="submit">Sign Up</button>
     </form>
</body>
</html>
