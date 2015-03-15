<?php
  session_start();
  if (isset($_SESSION['valid_user'])) {
      header('Location: listing.php');
  }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
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
  // check name / password were entereed - password check matches - - password 6 characters - username is not taken
  function validate() {
    var n = document.getElementById("name").value;
    var un = document.getElementById("user_name").value;
    var pass = document.getElementById("pw").value;
    var pass2 = document.getElementById("pw2").value;
    var test =document.getElementById("ucheck").innerHTML;
    var reg_pass = /^.{6,}$/;
    var valid = true;
    if (n == null || n == "") {
      document.getElementById("no_name").innerHTML = "You must enter a name.";
      valid = false;
    } else {
      document.getElementById("no_name").innerHTML = "</br>";
    };
    if (un == null || un == "") {
      document.getElementById("no_user").innerHTML = "You must enter a username.";
      valid = false;
    } else {
      document.getElementById("no_user").innerHTML = "</br>";
    };
    if (pass == null || pass == "") {
      document.getElementById("no_pw").innerHTML = "You must enter a password.";
      valid = false;
    } else if (!reg_pass.test(pass)) {
      document.getElementById("no_pw").innerHTML = "Less than six characters";
      valid = false;
    } 
    else {
      document.getElementById("no_pw").innerHTML = "</br>";
    };
    if (pass2 == null || pass2 == "") {
      document.getElementById("no_pw2").innerHTML = "You must confirm password.";
      valid = false;
    } else {
      document.getElementById("no_pw2").innerHTML = "</br>";
    };
    if (valid) {
      if (pass != pass2) {
        document.getElementById("no_name").innerHTML = "Your passwords do not match.";
        valid = false;
      }
    };
    if (test != "The username is available") {
      valid = false;
    };
    if (!valid) {
      return false;
    }
    else {
      return true;
    }
  }
  // check typed in user_name on each keystroke against already created names
  function check_username() {
    xmlhttp = new XMLHttpRequest();
    var parameter = "user_name=" + encodeURI(document.getElementById('user_name').value);
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("ucheck").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("POST", "check_user.php", "true");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(parameter);
  }
  </script>
</head>
<body>
  <div class = "container">
    <div class="jumbotron">
      <h1>Restaurant Food Tracker</h1> 
      <p>Track where you eat - and decide if it's worth it to go back</p>
    </div>
    <div class = "row">
      <div class = "col-sm-10">
      </div>
      <div class = "col-sm-2">
        <p><a href="logout.php" class="btn btn-success btn-lg" role="button">Back To Log In</a></p>
      </div>
    <div class = "row">
      <div class = "col-sm-3">
      </div>
      <div class = "col-sm-9">
        <div class ="col-sm-5">

<!-- form entry to log in -->

          <form action = "create_user.php" onsubmit="return validate()" method= "POST">
            <fieldset>
            <legend>Create Account</legend>
            <p>Name:</p>
              <p><input type="text" name="name" id="name"></p>
            <p>UserName:</p>
              <p><input type="text" name="user_name" onkeyup="check_username()"  id="user_name"></p>
              <p>Password<small> (min 6 chars):</small></p>
              <p><input type="password" name="pw" id = "pw"></p>
              <p>Confirm Password:</p>
              <p><input type="password" name="pw2" id = "pw2"></p>
              <p><input type="submit" class = "btn btn-default btn-lg" value = "Register"></p>
          </fieldset>
          </form>
        </div>
        <div class ="col-sm-7">
          </br></br></br></br>
          <div id = "no_name"></div>
          </br></br>
          <div id = "no_user"></div>
          </br>
          <div id = "ucheck"></div>
          </br></br>
          <div id = "no_pw"></div>
          </br></br>
          <div id = "no_pw2"></div>
          </br></br>
        </div>
      </div>
    </div>
  </div>
</body>   
</html>