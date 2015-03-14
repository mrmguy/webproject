<?php
  session_start();
  if (isset($_SESSION['valid_user'])) {
      header('Location: listing.php');
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
    var x = document.getElementById("user_name").value;
    var y = document.getElementById("pw").value;
    var valid = true;
    if (x == null || x == "") {
      document.getElementById("ucheck").innerHTML = "You must enter a username.</br>";
      valid = false;
    } else {
      document.getElementById("ucheck").innerHTML = "</br>";
    };
    if (y == null || y == "") {
      document.getElementById("pwcheck").innerHTML = "You must enter a password.</br>";
      valid = false;
    } else {
      document.getElementById("pwcheck").innerHTML = "</br>";
    };
    if (!valid) {
      return;
    }
    else {
      check_pw();
    }
  }
  function check_pw() {
    var rec=new XMLHttpRequest();
    var argument = "user_name=" + encodeURI(document.getElementById('user_name').value)+"&pw="+encodeURI(document.getElementById('pw').value);
    rec.onreadystatechange=function()
    {
    if (rec.readyState==4 && rec.status==200)
      {
        var response = rec.responseText;
        if (response.charAt(0) == "t") {
          window.location.href="listing.php";
        }
        else {
          document.getElementById("ucheck").innerHTML=rec.responseText;
        }
      }
    }

    rec.open("POST","login.php", "true");
    rec.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // rec.setRequestHeader("Content-length", "argument.length");
    // rec.setRequestHeader("Connection", "close");
    rec.send(argument);
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

   <!--  <nav class="navbar navbar-inverse">
      
         <div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="add_listing.php">Add Listing</a></li>
            <li><a href="view_all_listings.php">View Public Listings</a></li>
            <li><a href="#">Page 3</a></li>
            
          </ul>
        </div>
      
    </nav>

      </div>

      <div class = "col-sm-2"


        <p><a href="logout.php" class="btn btn-danger" role="button">Log Out</a></p>
      </div> -->
    <div class = "row">
      <div class = "col-sm-3">
        

      </div>
      <div class = "col-sm-9">
        <h2>Welcome!</h2>
        <hr>
        <p class = "text-info">This website allows you to store information on restaurants that you've gone to.</p>
        <p class = "text-info">It tracks the restaurant and specific location you went to, how many people went with you, how much you spent, what you thought about it, and a rating.</p>
        <p class = "text-info">Your information is private but you can make it available for other reigstered users to see.</p><hr>
        <div class ="col-sm-4">


<!-- form entry to log in -->

          <form>
          <fieldset>
          	<legend>Log In</legend>
          	<p>UserName:</p>
              <p><input type="text" name="user_name" id = "user_name"></p>

              <p>Password:</p>
              <p><input type="password" name="pw" id= "pw"></p>
              
              
              <p><input type="button" onclick= "validate()" class = "btn btn-default btn-lg" value = "Log In"></p>
          </fieldset>

          </form>
          <p>Not a member? <a href="register.php">Register</a></p>
        </div>
        <div class ="col-sm-8">
          </br></br></br></br>
          <div id = "ucheck"></div>
          </br></br></br>
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