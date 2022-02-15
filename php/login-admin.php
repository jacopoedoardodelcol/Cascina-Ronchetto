<?php
  session_start(); 
  include("password-admin.php"); 
  if (isset($_POST["ac"]) && $_POST["ac"]=="log") { 
    if (isset($USERS[$_POST["username"]]) && $USERS[$_POST["username"]]==$_POST["password"]) { 
      $_SESSION["logged"]=$_POST["username"]; 
     } else { 
      echo '<p>Username o password sbagliati</p>'; 
     }; 
  }; 
  if (isset($_SESSION["logged"]) && array_key_exists($_SESSION["logged"],$USERS)) {
    header("Location: db-admin.php");
  } else {
    echo '<form action="login-admin.php" method="post">';
    echo '  <input type="hidden" name="ac" id="ac" value="log">'; 
    echo '  Username: <input type="text" name="username" id="username"><br>'; 
    echo '  Password: <input type="password" name="password" id="password"><br>'; 
    echo '  <input type="submit" value="Login">'; 
    echo '</form>';
  }; 
?>