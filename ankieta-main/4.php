<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers']['pyt7'] = $_POST['pyt7'];
    $_SESSION['answers']['pyt8'] = $_POST['pyt8'];
    $_SESSION['answers']['pyt9'] = $_POST['pyt9'];

    setcookie('pyt7', $_POST['pyt7'],time() + 80000);
    setcookie('pyt8', $_POST['pyt8'],time() + 80000);
    setcookie('pyt9', $_POST['pyt9'],time() + 80000);
    header("Location: 5.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pytania 7-9</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="post">
        <label>7. Jaki jezyk programowania lubisz najbardziej?</label><br>
        <input type="text" name="pyt7" value="<?= $_COOKIE['pyt7'] ?? '' ?>" required><br><br>

        <label>8. Czy uprawiasz sport?</label><br>
        <input type="text" name="pyt8" value="<?= $_COOKIE['pyt8'] ?? '' ?>" required><br><br>

        <label>9. Twoje ulubione jedzenie?</label><br>
        <input type="text" name="pyt9" value="<?= $_COOKIE['pyt9'] ?? '' ?>" required><br><br>

        <a href="3.php" class="button">Powrot</a>
        <button type="submit">Dalej</button>
    </form>
</div>
</body>
</html>
