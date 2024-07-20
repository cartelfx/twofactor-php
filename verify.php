<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doğrulama</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    require_once 'config.php';

    use Sonata\GoogleAuthenticator\GoogleAuthenticator;

    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }

    $username = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            $secret = $user['secret_key'];
            $g = new GoogleAuthenticator();
            $code = $_POST['auth_code'];

            if ($g->checkCode($secret, $code)) {
                header('Location: /home.php');
                $_SESSION['loggedin'] = true;
                exit;
            } else {
                echo '<div class="card">';
                echo '<h1>cartel.live</h1>';
                echo '<div class="error-message">Belirtilen doğrulama kodu yanlış!</div>';
                echo '<form method="POST" action="">
                        <input type="text" name="auth_code" placeholder="Doğrulama Kodu" required>
                        <input type="submit" value="Giriş Yap">
                      </form>';
                echo '</div>';
            }
        }
    } else {
        echo '<div class="card">';
        echo '<h1>cartel.live</h1>';
        echo '<form method="POST" action="">
                <input type="text" name="auth_code" placeholder="Doğrulama Kodu" required>
                <input type="submit" value="Giriş Yap">
              </form>';
        echo '</div>';
    }
    ?>
</body>
</html>