<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }

    echo '<div class="card">';
    echo '<h1>Hoşgeldin Şehit O.Ç, ' . htmlspecialchars($_SESSION['username']) . '!</h1>';
    echo '</div>';
    ?>
</body>
</html>