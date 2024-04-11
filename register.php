<?php
session_start();

// Inicializácia premennej pre správu
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "jajcay";

    // Vytvorenie pripojenia
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrola pripojenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Získanie hodnôt z formulára
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kontrola, či sa heslá zhodujú
    if ($password != $confirm_password) {
        $message = 'Heslá sa nezhodujú.';
    } else {
        // Hashovanie hesla a pokračovanie v registrácii
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password_hash);

        if ($stmt->execute()) {
            $message = "New record created successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>


<?php if ($message): ?>
    <div id="message"><?php echo $message; ?></div>
<?php endif; ?>

<div class="wrapper">
    <form action="register.php" method="post">
        <h1>Registration</h1>
        <input type="text" name="username" placeholder="username" required autofocus><br>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="confirm_password" placeholder="confirm password" required>
        
        <button type="submit" name="submit">Register</button>
        <a href="index.php" id="Register">Log in</a>
    </form>
</div>

</body>
</html>
