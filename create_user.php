<?php
  session_start();
  if (isset($_SESSION['valid_user'])) {
      header('Location: listing.php');
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable informatoin
  $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  if (!($stmt = $mysqli->prepare("INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }
  $user = $_POST['user_name'];
  $password = $_POST['pw'];
  $name = $_POST['name'];
  if (!$stmt->bind_param("sss", $user, $password, $name)) {
    echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }  
  $_SESSION["valid_user"]=$user;  
  $mysqli->close();
  header('Location: add_listing.php')
?>

