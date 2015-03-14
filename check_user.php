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
			WHERE user_name = ?"))) {
            echo "Prepare failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          $user = $_POST['user_name'];
         
          if (!$stmt->bind_param("s", $user)) {
            echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }

          if (!$stmt->execute()) {
            echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          
          
          $uname = NULL;

          if (!$stmt->bind_result($uname)) {
            echo "Binding Output Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          $stmt->fetch();
          

          if ($uname === $user) {
            echo "*The username " . $user . " is already taken.*";
          }
          else {
            echo "The username is available";
          }
          
          // while ($stmt->fetch()) {
          //   echo '<p>Name:' . $user_check . '</p>';
            
          //  } 

$mysqli->close();
?>