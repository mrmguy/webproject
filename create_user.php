<?php
  session_start();
  // if (!isset($_SESSION['category_table'])) {
  //     $_SESSION['category_table']= 'All';
  // }
  error_reporting(E_ALL);
  ini_set('display-errors', 'On');
  require 'dbentry.php'; //contains db variable informatoin
  $mysqli = new mysqli($site, $user, $pw, $db); //connect to database
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

      
		if (!($stmt = $mysqli->prepare("INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          
          $user = $_POST['user_name'];
          $password = $_POST['pw'];
          $name = $_POST['name'];
          
          if (!$stmt->bind_param("sss", $user, $password, $name)) {
            echo "Binding Parameters failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }

          if (!$stmt->execute()) {
            echo "Execute failed: (" . $mysqli->erro . ") " . $mysqli->error;
          }
          
          
         $_SESSION["valid_user"]=$user;
          
          
          // while ($stmt->fetch()) {
          //   echo '<p>Name:' . $user_check . '</p>';
            
          //  } 

$mysqli->close();
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



        </div>
        <div class ="col-sm-9">
          
          
          
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