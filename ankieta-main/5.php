<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers']['pyt10'] = $_POST['pyt10'];
    $_SESSION['answers']['pyt11'] = $_POST['pyt11'];
    $_SESSION['answers']['pyt12'] = $_POST['pyt12'];

    setcookie('pyt10', $_POST['pyt10'],time() + 80000);
    setcookie('pyt11', $_POST['pyt11'],time() + 80000);
    setcookie('pyt12', $_POST['pyt12'],time() + 80000);

    $a = $_SESSION['answers'];

    $stmt = $pdo->prepare("
        INSERT INTO odpowiedzi (
            pyt1, pyt2, pyt3, pyt4, pyt5, pyt6,
            pyt7, pyt8, pyt9, pyt10, pyt11, pyt12
        ) VALUES (
            :p1, :p2, :p3, :p4, :p5, :p6,
            :p7, :p8, :p9, :p10, :p11, :p12
        )
    ");

    $stmt->execute([
        ':p1' => $a['pyt1'],
        ':p2' => $a['pyt2'],
        ':p3' => $a['pyt3'],
        ':p4' => $a['pyt4'],
        ':p5' => $a['pyt5'],
        ':p6' => $a['pyt6'],
        ':p7' => $a['pyt7'],
        ':p8' => $a['pyt8'],
        ':p9' => $a['pyt9'],
        ':p10' => $a['pyt10'],
        ':p11' => $a['pyt11'],
        ':p12' => $a['pyt12'],
    ]);

    session_destroy();
    $success = true;

    foreach(['pyt1','pyt2','pyt3','pyt4','pyt5','pyt6','pyt7','pyt8','pyt9','pyt10','pyt11','pyt12'] as $key) {
        setcookie($key,'',time()-80000);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Koniec</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php if (!isset($success)): ?>
    <form method="post">
        <label>10. Jakie masz hobby?</label><br>
        <input type="text" name="pyt10" value="<?= $_COOKIE['pyt10'] ?? '' ?>" required><br><br>

        <label>11. Czy czesto podrozujesz?</label><br>
        <input type="text" name="pyt11" value="<?= $_COOKIE['pyt11'] ?? '' ?>" required><br><br>

        <label>12. Twoje marzenie?</label><br>
        <input type="text" name="pyt12" value="<?= $_COOKIE['pyt12'] ?? '' ?>" required><br><br>

        <a href="4.php" class="button">Powrot</a>
        <button type="submit">Zakoncz</button>
    </form>
    <?php else: ?>
    <p>JESTEM CWELEM</p>
    <a href="index.php" class="button">Wypelnij ponownie</a>
    <?php endif; ?>
</div>
</body>
</html>
