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
     
			if (!($stmt = $mysqli->prepare("SELECT restaurant_name, description, address, city, state, rating, cost, diners, date_of_visit FROM restaurant WHERE user = ?"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
          
          $user = $_SESSION['valid_user'];
          
          


          if (!$stmt->bind_param("s", $user)) {
            echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }

          if (!$stmt->execute()) {
            echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }

          $restaurant_name = NULL;
          $description = NULL;
          $address = NULL;
          $city = NULL;
          $state = NULL;
          $rating = NULL;
          $cost = NULL;
          $diners = NULL;
          $visit_date = NULL;

          if (!$stmt->bind_result($restaurant_name, $description, $address, $city, $state, $rating, $cost, $diners, $visit_date)) {
            echo "Binding Output Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          
          echo $restaurant_name;
          echo $_SESSION['valid_user'];
          
          while ($stmt->fetch()) {
            echo '<table><tr><td>Restaurant:' . $restaurant_name . '</td><td>Visit Date:' . $visit_date . '</td><td>Diners:' . $diners . '</td><td>Cost:' . $cost . '</td></tr>';
            echo '<tr><td>Description:' . $description . '</td></tr>';
            echo '</table>';
            
           } 

$mysqli->close();
?>
