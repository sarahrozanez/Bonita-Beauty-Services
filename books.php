<?php
	// Allow the config
	define('__CONFIG__', true);

	// Require the config
  require_once "inc/config.php"; 
  Page::ForceLogin();

  $User = new User($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
  <heah>
  <script src="./beauty_services.js"></script>
  <title>Bonita Services!</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen">
  <script src="./beauty_services.js"></script>
</head>

<body>
<script type="text/javascript" src="js/beauty_services.js"></script>
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="#home" class="w3-bar-item w3-button"><b></b> Bonita Beauty Services!</a>
      <!-- Float links to the right. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a href="./index.php/#services" class="w3-bar-item w3-button">Services</a>
        <a href="./index.php/#about" class="w3-bar-item w3-button">About</a>
        <a href="./index.php/#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="./index.php/#rowBookNow" class="w3-bar-item w3-button">Book Now!</a>
        <a id = "optionBooks" href="./books.php" class="w3-bar-item w3-button">Your Books</a>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="./images/logo.png" alt="Architecture" width="550" height="600">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="logo-text"><b>Bonita Beauty </b><br>Services</br></span>
      <p>Hello <?php echo $User->email; ?></p>
    </div>
  </header>

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width:1564px">


  <!-- End page content -->
  </div>


  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-16">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
        class="w3-hover-text-green">Sarah and Natascha </a></p>
  </footer>
<script src="main.js"></script>
<script src="./beauty_services.js"></script>

</body>

</html>
