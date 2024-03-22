<?php
session_start();

// Inicializácia premennej pre správu
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Tu zadajte heslo k databáze
    $dbname = "jajcay";

    // Vytvorenie pripojenia
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrola pripojenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $message = "Connected successfully";
    }

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $message .= " New record created successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
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

<!-- Tu zobrazíme správu ak existuje -->
<?php if ($message): ?>
    <div id="message"><?php echo $message; ?></div>
<?php endif; ?>

<div class="wrapper">
    <form action="register.php" method="post">
        <h1>Registration</h1>
        <input type="text" name="username" placeholder="username" required autofocus><br>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit" name="submit">Register</button>
        <a href="index.php" id="Register">Log in</a>
    </form>
</div>

</body>
</html>
