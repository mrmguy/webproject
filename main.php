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
	<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="custom.css">
  <script type="text/javascript">
  function check_pw() {
    var rec=new XMLHttpRequest();
    var argument = "user_name=" + encodeURI(document.getElementById('user_name').value)+"&pw="+encodeURI(document.getElementById('pw').value);
    rec.onreadystatechange=function()
    {
    if (rec.readyState==4 && rec.status==200)
      {
      document.getElementById("pwcheck").innerHTML=rec.responseText;
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
      <h1>Website!</h1> 
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
              
              
              <p><input type="button" onclick= "check_pw()" value = "Log In"></p>
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