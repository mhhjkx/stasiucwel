<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers']['pyt4'] = $_POST['pyt4'];
    $_SESSION['answers']['pyt5'] = $_POST['pyt5'];
    $_SESSION['answers']['pyt6'] = $_POST['pyt6'];

    setcookie('pyt4', $_POST['pyt4'],time() + 80000);
    setcookie('pyt5', $_POST['pyt5'],time() + 80000);
    setcookie('pyt6', $_POST['pyt6'],time() + 80000);
    header("Location: 4.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pytania 4-6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="post">
        <label>4. Czy lubisz PHP?</label><br>
        <input type="text" name="pyt4" value="<?= $_COOKIE['pyt4'] ?? '' ?>" required><br><br>

        <label>5. Co robisz w wolnym czasie?</label><br>
        <input type="text" name="pyt5" value="<?= $_COOKIE['pyt5'] ?? '' ?>" required><br><br>

        <label>6. Ulubiona pora roku?</label><br>
        <input type="text" name="pyt6" value="<?= $_COOKIE['pyt6'] ?? '' ?>" required><br><br>

        <a href="2.php" class="button">Powrot</a>
        <button type="submit">Dalej</button>
    </form>
</div>
</body>
</html>
