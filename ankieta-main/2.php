<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers']['pyt1'] = $_POST['pyt1'];
    $_SESSION['answers']['pyt2'] = $_POST['pyt2'];
    $_SESSION['answers']['pyt3'] = $_POST['pyt3'];

    setcookie('pyt1', $_POST['pyt1'],time() + 80000);
    setcookie('pyt2', $_POST['pyt2'],time() + 80000);
    setcookie('pyt3', $_POST['pyt3'],time() + 80000);
    header("Location: 3.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pytania 1-3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="post">
        <label>1. Jak sie nazywasz?</label><br>
        <input type="text" name="pyt1" value="<?= $_COOKIE['pyt1'] ?? '' ?>" required><br><br>

        <label>2. Ile masz lat?</label><br>
        <input type="text" name="pyt2" value="<?= $_COOKIE['pyt2'] ?? '' ?>" required><br><br>

        <label>3. Twoj ulubiony kolor?</label><br>
        <input type="text" name="pyt3" value="<?= $_COOKIE['pyt2'] ?? '' ?>" required><br><br>

        <button type="submit">Dalej</button>
    </form>
</div>
</body>
</html>
