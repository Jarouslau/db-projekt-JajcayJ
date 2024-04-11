<?php
session_start();
unset($_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=index.php">
    <title>Logged Out</title>
    <link rel="stylesheet" href="register.css">
    <style>
        body {
            background-color: #212121; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-message {
            text-align: center;
            background-color: #171717; 
            padding: 20px;
            border: solid black 1px;
            border-radius: 10px;
            color: white; 
        }
    </style>
</head>
<body>
    <div class="logout-message">
        <p>You have logged out and cleaned the session.</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 2000);
    </script>
</body>
</html>
