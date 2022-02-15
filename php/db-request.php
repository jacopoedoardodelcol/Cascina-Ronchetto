<?php
  $con = mysqli_connect("localhost", "root", ""); 
  if (!$con) {
    die("Connection error: " . mysqli_error($con));
  }
  mysqli_select_db($con,"contactdb") or die(mysqli_error());

  echo "<h2>Risultati della ricerca nel database</h2>";
  
  if ($_POST["action"] == 1) {
    // Display all the reservations
    $result = mysqli_query($con,"SELECT * FROM reservations"); 
    while($row = mysqli_fetch_assoc($result)){
      echo "ID: " . $row['id'] . ", Email: " . $row['email'] . 
           ", Nome: " . $row['name'] . ", Attività: " . 
           $row['activity'] . ", Date: " . $row['chosendate'] . 
           ", Note: " . $row['notes'] ."<br>";
    }
  } elseif ($_POST["action"] == 2) { 
    // Display all the reservations for a specific date
    $result = mysqli_query($con,"SELECT * FROM reservations WHERE chosendate = " . 
                          "'" . $_POST['date'] . "'");
    while($row = mysqli_fetch_assoc($result)){
      echo "ID: " . $row['id'] . ", Email: " . $row['email'] . 
           ", Nome: " . $row['name'] . ", Attività: " . 
           $row['activity'] . ", Date: " . $row['chosendate'] . 
           ", Note: " . $row['notes'] ."<br>";
    }
  } elseif ($_POST["action"] == 3) { 
    // Display all the reservations from a specific email
    $result = mysqli_query($con,"SELECT * FROM reservations WHERE email = " . 
                          "'" . $_POST['email'] . "'");
    while($row = mysqli_fetch_assoc($result)){
      echo "ID: " . $row['id'] . ", Email: " . $row['email'] . 
           ", Nome: " . $row['name'] . ", Attività: " . 
           $row['activity'] . ", Date: " . $row['chosendate'] . 
           ", Note: " . $row['notes'] ."<br>";
    }
  } elseif ($_POST["action"] == 4) {
    // Delete all the reservations for a specific date
    $sql = "DELETE FROM reservations WHERE chosendate='" . $_POST["date"] . "'";
    $result = mysqli_query($con,$sql);
    echo "Prenotazioni eliminate";
  } else {
    // Delete all the reservations from a specific email
    $sql = "DELETE FROM reservations WHERE email='" . $_POST["email"] . "'";
    $result = mysqli_query($con,$sql);
    echo "Prenotazioni eliminate";
  }
  echo '<br><br>Ritorna alla <a href="db-admin.php">pagina principale</a> del database';
?>