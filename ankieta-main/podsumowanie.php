<?php
session_start();
$answers = $_SESSION['answers'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podsumowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Koniec!</h1>
    <ul>
        <?php foreach ($answers as $key => $val): ?>
            <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($val) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php" class="button">Wype³nij ponownie</a>
</div>
</body>
</html>
