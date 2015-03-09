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
	<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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

        <form action="login.php" method="post">
        <fieldset>
        	<legend>Log In</legend>
        	<p>UserName:</p>
            <p><input type="text" name="user_name"></p>

            <p>Password:</p>
            <p><input type="password" name="pw"></p>
            
            
            <p><input type="submit" value = "Log In"></p>
        </fieldset>

        </form>
        </div>
        <div class ="col-sm-6">
        <form action="create_user.php.php">
          <fieldset>
          <legend>Create Account</legend>
          <p>Name:</p>
            <p><input type="text" name="name"></p>
          <p>UserName:</p>
            <p><input type="text" name="user_name"></p>

            <p>Password:</p>
            <p><input type="password" name="pw"></p>
            
            
            <p><input type="submit" value = "Create"></p>
        </fieldset>
        </form>
        </div>


      </div>


    </div>
  </div>
</body>   
</html>