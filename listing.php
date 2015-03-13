<?php
  session_start();
  if (isset($_SESSION['valid_user'])) {
      echo $_SESSION['valid_user'];
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable informatoin
  $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
  <body>
  <div class = "container">

    <div class="jumbotron">
      <h1>Restaurant Tracker</h1> 
      <p>It's the website</p>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
         <div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="add_listing.php">Add Listing</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class = "row">
      <div class = "col-sm-3">
        

      </div>
      <div class = "col-sm-9">
        <h2>Your Restaurant Listings</h2>
        <div id = "list"></div>
        <?php
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
            echo '<table class = "table-bordered"><tr><td>Restaurant:' . $restaurant_name . '</td><td>Visit Date:' . $visit_date . '</td><td>Diners:' . $diners . '</td><td>Cost:' . $cost . '</td></tr>';
            echo '<tr><td>Description:' . $description . '</td></tr><tr><td>' . $rating . '</td></tr>';
            echo '<tr><td>Location:</td><td></td></tr>';
            echo '</table></br>';
            
           } 

$mysqli->close();




        ?>

      </div>


    </div>
  </div>
   <?php
//   $mysqli->close();
 ?>
</body>   
</html>
</body>
</html>