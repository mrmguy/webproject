<?php
  session_start();
  if (isset($_SESSION['valid_user'])) {
      echo $_SESSION['valid_user'];
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  // require 'dbentry.php'; //contains db variable informatoin
  // $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  // if ($mysqli->connect_errno) {
  //   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  // }

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
  function validate() {
    var restaurant = document.getElementById("restaurant_name").value;
    var visit_date = document.getElementById("visit_date").value;
    var street = document.getElementById("street").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var diners = document.getElementById("diners").value;
    var cost = document.getElementById("cost").value;
    var rating = document.getElementById("rating").value;
    var description = document.getElementById("description").value;
    var valid = true;
    if (restaurant == null || restaurant == "") {
      document.getElementById("no_restaurant").innerHTML = "You must enter a restaurant name.";
      valid = false;
    } else {
      document.getElementById("no_restaurant").innerHTML = "</br>";
    };
    var reg_date = /^\d\d\d\d-(\d)?\d-(\d)?\d$/;
    if (!reg_date.test(visit_date)) {
      document.getElementById("no_visit_date").innerHTML = "You must enter a date in the correct format.";
      valid = false;
    } else {
      document.getElementById("no_visit_date").innerHTML = "</br>";
    };
    if (street == null || street == "") {
      document.getElementById("no_street").innerHTML = "You must enter a street address.";
      valid = false;
    } else {
      document.getElementById("no_street").innerHTML = "</br>";
    };
    if (city == null || city == "") {
      document.getElementById("no_city").innerHTML = "You must enter a city.";
      valid = false;
    } else {
      document.getElementById("no_city").innerHTML = "</br>";
    };
    var reg_state = /^[a-zA-Z][a-zA-Z]$/;
    if (!reg_state.test(state)) {
      document.getElementById("no_state").innerHTML = "You must enter a state in XX format.";
      valid = false;
    } else {
      document.getElementById("no_state").innerHTML = "</br>";
    };


    var reg_diners = /^\d+$/;
    if (!reg_diners.test(diners)) {
      document.getElementById("no_diners").innerHTML = "You must enter a valid number of diners";
      valid = false;
    } else {
      document.getElementById("no_diners").innerHTML = "</br>";
    };

    var reg_cost = /^\$?\d+\.?\d?\d?$/;
    if (!reg_cost.test(cost)) {
      document.getElementById("no_cost").innerHTML = "You must enter a valid dollar amount";
      valid = false;
    } else {
      document.getElementById("no_cost").innerHTML = "</br>";
    };

    var reg_rating = /^(10|[0-9])$/;
    if (!reg_rating.test(rating)) {
      document.getElementById("no_rating").innerHTML = "You must enter a rating 1-10";
      valid = false;
    } else {
      document.getElementById("no_rating").innerHTML = "</br>";
    };
    if (description == null || description == "") {
      document.getElementById("no_description").innerHTML = "You must enter a description.";
      valid = false;
    } else {
      document.getElementById("no_description").innerHTML = "</br>";
    };

    // if (n == null || n == "") {
    //   document.getElementById("no_entry").innerHTML = "<p>You must enter a name.</p>";
    //   valid = false;
    // };
    // if (un == null || un == "") {
    //   document.getElementById("no_entry").innerHTML = "You must enter a username.</br>";
    //   valid = false;
    // };
    // if (pass == null || pass == "") {
    //   document.getElementById("no_entry").innerHTML = "You must enter a password.</br>";
    //   valid = false;
    // };
    // if (pass2 == null || pass2 == "") {
    //   document.getElementById("no_entry").innerHTML = "You must confirm password.</br>";
    //   valid = false;
    // };
    // if (pass != pass2) {
    //   document.getElementById("no_entry").innerHTML = "Your passwords do not match</br>";
    //   valid = false;
    // };

    if (!valid) {
      return false;
    }
    else {
      return true;
    }
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
            <li class = "active"><a href="#">Add Restaurant</a></li>
            <li><a href="view_all_listings.php">View Public Restaurant Reviews</a></li>
            
            
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
        <div class = "row">
          <div class = "col-sm-5">
            <form action="add_listing_db.php" onsubmit="return validate()" method="POST">
          <fieldset>
            <legend>Add restaurant</legend>
            <p>Restaurant Name(required):</p>
              <p><input type="text" name="restaurant_name" id = "restaurant_name"></p>

              <p>Visit Date:</p>
              <p><input type="text" name="visit_date" id= "visit_date"></p>
              <p>Street address:</p>
              <p><input type="text" name="street" id= "street"></p>
              <p>City:</p>
              <p><input type="text" name="city" id= "city"></p>
              <p>State:</p>
              <p><input type="text" name="state" id= "state"></p>
              <p>Diners:</p>
              <p><input type="text" name="diners" id= "diners"></p>
              <p>Cost:</p>
              <p><input type="text" name="cost" id= "cost"></p>
              <p>Rating:</p>
              <p><input type="number" name="rating" id= "rating" min="1" max="10"></p>
              <p>Description of visit:</p>
              <p><textarea name="description" id="description" rows="10" cols="40"></textarea></textarea></p>
              <p><input type="submit" value = "Add"></p>
          </fieldset>

          </form>
          </div>
          <div class = "col-sm-7" id="errors">
            </br></br></br></br>
          <div id = "no_restaurant"></div>
          </br></br>
          <div id = "no_visit_date"></div>

          </br></br>
          <div id = "no_street"></div>
          </br>
          <div id = "no_city"></div>
          </br></br>
          <div id = "no_state"></div>
          </br></br>
          <div id = "no_diners"></div>
          </br></br>
          <div id = "no_cost"></div>
          </br></br>
          <div id = "no_rating"></div>
          </br></br>
          <div id = "no_description"></div>
          </br></br>
          </div>

        </div>
        

<!-- form entry to log in -->

          
          
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