<?php 
  $con = mysqli_connect("localhost", "root", ""); 
  if (!$con) {
    die("Connection error: " . mysqli_error($con));
  }
  mysqli_select_db($con, "contactdb");

  $USERS = array();

  $result = mysqli_query($con, "SELECT * FROM admins"); 
  while($row = mysqli_fetch_assoc($result)){
    $USERS[$row['username']] = $row['password'];
  }
  
  function check_logged(){ 
    global $_SESSION, $USERS; 
    if (!isset($_SESSION["logged"]) || !array_key_exists($_SESSION["logged"],$USERS)) { 
      header("Location: login-admin.php"); 
    }; 
  }; 
?>