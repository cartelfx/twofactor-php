<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yapma</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    require_once 'config.php';

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isim = $_POST['username'];
        $sifre = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$isim]);
        $user = $stmt->fetch();

        if ($user && password_verify($sifre, $user['password'])) {
            $_SESSION['username'] = $isim;
            header('Location: verify.php');
            exit;
        } else {
            echo '<div class="card">';
            echo '<h1>cartel.live</h1>';
            echo '<div class="error-message">Kullanıcı ismi veya şifre hatalı.</div>';
            echo '<form method="POST" action="">
                    <input type="text" name="username" placeholder="Kullanıcı İsmi" required>
                    <input type="password" name="password" placeholder="Kullanıcı Şifresi" required>
                    <input type="submit" value="Giriş Yap">
                  </form>';
            echo '</div>';
        }
    } else {
        echo '<div class="card">';
        echo '<h1>cartel.live</h1>';
        echo '<form method="POST" action="">
                <input type="text" name="username" placeholder="Kullanıcı İsmi" required>
                <input type="password" name="password" placeholder="Kullanıcı Şifresi" required>
                <input type="submit" value="Login">
              </form>';
        echo '</div>';
    }
    ?>
</body>
</html>