<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Giriş Yap</h2>
        <form action="../netting/islem.php" method="post">
            <div class="input-group">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" id="username" name="kullanici_mail" required>
            </div>
            <div class="input-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="kullanici_password" required>
            </div>
            <button type="submit" name="admingiris">Giriş Yap</button>
        </form>
    </div>
</body>
</html>
