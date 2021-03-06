<?php
  session_start();
  if (!isset($_SESSION['valid_user'])) {
      header('Location: main.php');
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable informatoin
  $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
     
	if (!($stmt = $mysqli->prepare("INSERT INTO restaurant(restaurant_name, description, address, city, state, rating, cost, diners, date_of_visit, show_public, user) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
  $restaurant_name = $_POST['restaurant_name'];
  $description = $_POST['description'];
  $address = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $rating = $_POST['rating'];
  $cost = $_POST['cost'];
  $diners = $_POST['diners'];
  $user = $_SESSION['valid_user'];
  $visit_date = $_POST['visit_date'];
  $public_share = $_POST['share'];
          
  if (!$stmt->bind_param("sssssiiisis", $restaurant_name, $description, $address, $city, $state, $rating, $cost, $diners, $visit_date, $public_share, $user)) {
    echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }

  if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
  }

$mysqli->close();
header('Location: listing.php')
?>
