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

  //connect to database

// include("sqldb.php");
     
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
          
          // while ($stmt->fetch()) {
          //   echo '<p>Name:' . $user_check . '</p>';
            
          //  } 

$mysqli->close();
?>

