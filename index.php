<?php
   session_start();   //otvorenie session
   
    //kontrola ci uz bol potvrdeny formular a ci boli vyplnene obidva udaje aj username aj password
   if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {

        //connect string do DB
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "jajcay";

        // Create connection
        $conn = new mysqli($servername, $username, 
            $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        //echo "Connected successfully";

        //vyber hesla z DB podla usera, ktory sa prihlasuje
        $sql = "SELECT password FROM user where username ='".$_POST['username']."'";
        $result = $conn->query($sql);

        //ak vrati select viac ako 0 riadkov, user existuje
        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          //if($row["password"]==$_POST['password']) {
            if(password_verify($_POST['password'],$row["password"])) {
                $_SESSION['valid'] = true; //ulozenie session
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $_POST['username'];

                //presmerovanie na dalsiu stranku
                header("Location: welcome.php", true, 301);
                exit();
          } else {
            echo "wrong password";
          }
        } else {
          echo "wrong username";
        }
    
    $conn->close();

    
   
}     
echo '<style>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");

body {
    font-family: "Open Sans", sans-serif;
}
</style>';

       
   //formular            
   echo '<html>';
   echo '<head>';
   echo '<title>Login Form</title>';
   echo '<link rel="stylesheet" href="stly.css">';
   echo '</head>';
   echo '<body>';
   echo '<div class="login-form">';
   echo '<h2>Log in</h2>';
   echo '<form action="index.php" method="post">';
   echo '<input type="text" name="username" placeholder="username" required autofocus>';
   echo '<input type="password" name="password" placeholder="password" required>';
   echo '<input type="submit" name="login" value="Sign in" style="width: 270px; height: 45px; cursor: pointer; font-family: "Montserrat"; border-radius: 20px;">';
   echo '<form action = "register.php" method = "post">';
   echo '<a href="register.php" id="Register">are you new?</a>';
   echo '</form>';
   echo '</div>';
   echo '</body>';
   echo '</html>';
   
           
?>