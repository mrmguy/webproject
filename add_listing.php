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
    return true;
    // var n = document.getElementById("name").value;
    // var un = document.getElementById("user_name").value;
    // var pass = document.getElementById("pw").value;
    // var pass2 = document.getElementById("pw2").value;
    // var valid = true;
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

    // if (!valid) {
    //   return false;
    // }
    // else {
    //   window.location.href="create_user.php";
    // }
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
      <div class = "col-sm-3">
        

      </div>
      <div class = "col-sm-9">
        

<!-- form entry to log in -->

          <form action="add_listing_db.php" onsubmit="return validate()" method="POST">
          <fieldset>
            <legend>Add restaurant</legend>
            <p>Restaurant Name(required):</p>
              <p><input type="text" name="restaurant_name" id = "restaurant_name"></p>

              <p>Visit Date:</p>
              <p><input type="date" name="visit_date" id= "visit_date"></p>
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
              <p><textarea name="description" id="description" rows="10" cols="80"></textarea></textarea></p>
              <p><input type="submit" value = "Add"></p>
          </fieldset>

          </form>
          
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