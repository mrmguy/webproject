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
  <script type="text/javascript">
  </script>
</head>
<body>
  <body>
  <div class = "container">
    <div class="jumbotron">
      <h1>Restaurant Food Tracker</h1> 
      <p>Track where you eat - and decide if it's worth it to go back</p>
    </div>
    <div class = "row">
      <div class = "col-sm-10">
        <nav class="navbar navbar-inverse">
         <div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Your Restaurants</a></li>
            <li class = "emp"><a href="add_listing.php">Add Restaurant</a></li>
            <li><a href="view_all_listings.php">View Public Restaurant Reviews</a></li>
          </ul>
        </div>
    </nav>
      </div>
      <div class = "col-sm-2">
        <p><a href="logout.php" class="btn btn-danger" role="button">Log Out</a></p>
        <h6>Logged in as: <?php echo $_SESSION['valid_user']?></h6>
      </div>
      </div>
    <div class = "row">
      <div class = "col-sm-1">
      </div>
      <div class = "col-sm-9">
        <h2>Your Restaurant Listings</h2>
        <div id = "list"></div>
        <?php
        if (!($stmt = $mysqli->prepare("SELECT id, restaurant_name, description, address, city, state, rating, cost, diners, date_of_visit, show_public FROM restaurant WHERE user = ? ORDER BY id DESC"))) {
         echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
          }
          $user = $_SESSION['valid_user'];
          if (!$stmt->bind_param("s", $user)) {
            echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          if (!$stmt->execute()) {
            echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          $id = NULL;
          $restaurant_name = NULL;
          $description = NULL;
          $address = NULL;
          $city = NULL;
          $state = NULL;
          $rating = NULL;
          $cost = NULL;
          $diners = NULL;
          $visit_date = NULL;
          $show_public = NULL;
          $make_public = NULL;
          $change = NULL;
          if (!$stmt->bind_result($id, $restaurant_name, $description, $address, $city, $state, $rating, $cost, $diners, $visit_date, $show_public)) {
            echo "Binding Output Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          while ($stmt->fetch()) {
            if ($show_public == 1) {
              $make_public = "Public";
              $change = "Change to Private";
            } else {
              $make_public = "Private";
              $change = "Make Public";
            }
            //echo '<form action="change_access.php" method="POST">';
            echo '<table class = "table"><tr><th>Restaurant:</th><td>' . $restaurant_name . '</br>' . $address . '</br>' . $city . ', ' . $state . '</td></tr>
            <tr><th>Visit Date:</th><td>' . $visit_date . '</td></tr>
            <tr><th>Diners:</th><td>' . $diners . '</td></tr>
            <tr><th>Cost:</th><td>$' . $cost . '</td></tr>';

            echo '<input type = "hidden" name = "id" value = "'. $id .'">';
            echo '<tr><th>Description:</th><td>' . $description . '</td></tr>
            <tr><th>Rating:</th><td>';
            for ($i=0; $i < $rating ; $i++) { 
              echo '<img src="spoon.png" alt="spoon" width="50" height = "50">';
            }
            echo $rating . ' out of 10</td></tr>';
            echo '<tr><td colspan="2">This listing is ' . $make_public . '</td></tr>';
            echo '<tr><th>Location:</th><td><iframe width="600" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='. $restaurant_name . '+' .$address . '+'.$city.'+' .$state.'&key=AIzaSyAr52i-uefQ307Ux8RjnK9cRhhvB5aFyVY"></iframe></td></tr>';
            echo '</table></br>';
            //echo '</form>';
            
          } 

          $mysqli->close();
        ?>

      </div>
      <div class = "col-sm-2"></div>

    </div>
  </div>
   <?php
//   $mysqli->close();
 ?>
</body>   
</html>
</body>
</html>