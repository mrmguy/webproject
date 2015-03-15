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
  <script type="text/javascript">
  function change_access() {
    alert("hello");
  }





  </script>



</head>
<body>
  <body>
  <div class = "container">

    <div class="jumbotron">
      <h1>Restaurant Tracker</h1> 
      <p>It's the website</p>
    </div>
    <div class = "row">
      <div class = "col-sm-10">

    <nav class="navbar navbar-inverse">
      
         <div>
          <ul class="nav navbar-nav">
            <li><a href="listing.php">Your Restaurants</a></li>
            <li><a href="add_listing.php">Add Restaurant</a></li>
            <li class = "active"><a href="#">View Public Restaurant Reviews</a></li>
            
            
          </ul>
        </div>
      
    </nav>

      </div>

      <div class = "col-sm-2">


        <p><a href="logout.php" class="btn btn-danger" role="button">Log Out</a></p>
        <h6>Logged in as: <?php echo $_SESSION['valid_user']?></h6>
      </div>
    
      
    <div class = "row">
      <div class = "col-sm-3">
        

      </div>
      <div class = "col-sm-9">
        <h2>Public Restaurant Listings</h2>
        <div id = "list"></div>
        <?php
        if (!($stmt = $mysqli->prepare("SELECT restaurant_name, description, address, city, state, rating, cost, diners, date_of_visit, user FROM restaurant WHERE show_public = 1"))) {
         echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
          }
          
          // $user = $_SESSION['valid_user'];
          
          // if (!$stmt->bind_param("s", $user)) {
          //   echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          // }

          if (!$stmt->execute()) {
            echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }

          $user = NULL;
          $restaurant_name = NULL;
          $description = NULL;
          $address = NULL;
          $city = NULL;
          $state = NULL;
          $rating = NULL;
          $cost = NULL;
          $diners = NULL;
          $visit_date = NULL;
          // $show_public = NULL;
          // $make_public = NULL;
          // $change = NULL;

          if (!$stmt->bind_result($restaurant_name, $description, $address, $city, $state, $rating, $cost, $diners, $visit_date, $user)) {
            echo "Binding Output Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          
          

          
          while ($stmt->fetch()) {
            // if ($show_public == 1) {
            //   $make_public = "Public";
            //   $change = "Change to Private";
            // } else {
            //   $make_public = "Private";
            //   $change = "Make Public";
            // }
            // echo '<form action="change_access.php" method="POST">';
            echo '<table class = "table-bordered"><tr><td>Restaurant:' . $restaurant_name . '</td><td>Visit Date:' . $visit_date . '</td><td>Diners:' . $diners . '</td><td>Cost:' . $cost . '</td></tr>';
            //echo '<input type = "hidden" name = "id" value = "'. $id .'">';
            echo '<tr><td>Description:' . $description . '</td></tr><tr><td>Rating:' . $rating . '</td></tr>';
            echo '<tr><td>Location:</td><td></td></tr>';
            echo '</table></br>';
            // echo '</form>';
            
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