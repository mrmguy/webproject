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
        <div class ="col-sm-3">


<!-- form entry to log in -->

          <form>
          <fieldset>
            <legend>Log In</legend>
            <p>UserName:</p>
              <p><input type="text" name="user_name" id = "user_name"></p>

              <p>Password:</p>
              <p><input type="password" name="pw" id= "pw"></p>
              
              
              <p><input type="button" onclick= "validate()" value = "Log In"></p>
          </fieldset>

          </form>
          <p>Not a member? <a href="register.php">Register</a></p>
        </div>
        <div class ="col-sm-9">
          </br></br></br></br>
          <div id = "pwcheck"></div>
        </div>


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