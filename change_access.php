<?php
  session_start();
  // if (!isset($_SESSION['category_table'])) {
  //     $_SESSION['category_table']= 'All';
  // }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable informatoin
  $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  $id = $_POST['id']; 
  echo $id;
  echo $_POST['check'];
// toggle availability of movie


  if (!($stmt = $mysqli->prepare("UPDATE restaurant SET show_public = ? WHERE id = ?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
  $check = NULL;
  if ($_POST['check'] === 'Change to Private') {
    $check = 0;
  } else {
    $check = 1;
  }
  if (!$stmt->bind_param("ii", $check, $id)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }

$mysqli->close();
header('Location: listing.php');
?>
