<?php
  // session_start();
  // if (!isset($_SESSION['category_table'])) {
  //     $_SESSION['category_table']= 'All';
  // }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');

  //connect to database

// include("sqldb.php");
     



?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="custom.css">
  <script type="text/javascript">
  function validate() {
    var n = document.getElementById("name").value;
    var un = document.getElementById("user_name").value;
    var pass = document.getElementById("pw").value;
    var pass2 = document.getElementById("pw2").value;
    var valid = true;
    if (n == null || n == "") {
      document.getElementById("no_entry").innerHTML = "<p>You must enter a name.</p>";
      valid = false;
    };
    if (un == null || un == "") {
      document.getElementById("no_entry").innerHTML = "You must enter a username.</br>";
      valid = false;
    };
    if (pass == null || pass == "") {
      document.getElementById("no_entry").innerHTML = "You must enter a password.</br>";
      valid = false;
    };
    if (pass2 == null || pass2 == "") {
      document.getElementById("no_entry").innerHTML = "You must confirm password.</br>";
      valid = false;
    };
    if (pass != pass2) {
      document.getElementById("no_entry").innerHTML = "Your passwords do not match</br>";
      valid = false;
    };

    if (!valid) {
      return false;
    }
    // else {
    //   window.location.href="create_user.php";
    // }
  }
  </script>


</head>
<body>
  <div class = "container">

    <div class="jumbotron">
      <h1>Website!</h1> 
      <p>It's the website</p>
    </div>

    <div class = "row">
      <div class = "col-sm-3">
        

      </div>
      <div class = "col-sm-9">
        <div class ="col-sm-6">


<!-- form entry to log in -->

          <form action = "create_user.php" onsubmit="return validate()" method= "POST">
            <fieldset>
            <legend>Create Account</legend>
            <p>Name:</p>
              <p><input type="text" name="name" id="name"></p>
            <p>UserName:</p>
              <p><input type="text" name="user_name" id="user_name"></p>

              <p>Password:</p>
              <p><input type="password" name="pw" id = "pw"></p>
              <p>Confirm Password:</p>
              <p><input type="password" name="pw2" id = "pw2"></p>
              
              <p><input type="submit" value = "Register"></p>
          </fieldset>
          </form>
        </div>
        <div class ="col-sm-6">
          <div id = "no_entry"></div>
        </div>


      </div>


    </div>
  </div>
</body>   
</html>