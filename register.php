<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Olma</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    require_once 'config.php';

    use Sonata\GoogleAuthenticator\GoogleAuthenticator;
    use Sonata\GoogleAuthenticator\GoogleQrUrl;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $g = new GoogleAuthenticator();
        $secret = $g->generateSecret();

        $stmt = $pdo->prepare("INSERT INTO users (username, password, secret_key) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $secret]);

        $qrCodeUrl = GoogleQrUrl::generate($username, $secret, 'cartel.live');

        echo '<div class="card">';
        echo '<h1>Google Authenticator Kurulum</h1>';
        echo '<p>QR Kodu: <img src="' . $qrCodeUrl . '" alt="QR Code"></p>';
        echo '<p>Secret Kod: ' . $secret . '</p>';
        echo '<p>Lütfen kodu Google Authenticator uygulamasında taratın veya Secret kodu girin.</p>';
        echo '<a href="login.php">İşlem Tamamlandı.</a>';
        echo '</div>';
    } else {
        echo '<div class="card">';
        echo '<h1>cartel.live</h1>';
        echo '<form method="POST" action="">
                <input type="text" name="username" placeholder="Kullanıcı İsmi" required>
                <input type="password" name="password" placeholder="Kullanıcı Şifresi" required>
                <input type="submit" value="Oluştur">
              </form>';
        echo '</div>';
    }
    ?>
</body>
</html>