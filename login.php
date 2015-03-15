<?php
  session_start();
  // if already logged in go to listings
  if (isset($_SESSION['valid_user'])) {
      header('Location: listing.php');
  }
  // if origin not from main go back to main
  if (empty($_POST['user_name'])) {
    header('Location: main.php');
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable information
  $mysqli = new mysqli($site, $user, $pw, $db); 
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  if (!($stmt = $mysqli->prepare("SELECT user_name FROM users 
  WHERE user_name = ? AND password = ?"))) {
    echo "Prepare failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }
  $user = $_POST['user_name'];
  $password = $_POST['pw'];
  if (!$stmt->bind_param("ss", $user, $password)) {
    echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
  } 
  $user_check = NULL;
  if (!$stmt->bind_result($user_check)) {
    echo "Binding Output Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }
  $stmt->fetch();
  if (!$user_check) {
    echo "*Your username / password is not valid.*";
  }
  else {
    $_SESSION["valid_user"]=$user_check;
    echo "true";
  }
  $mysqli->close();
?>

