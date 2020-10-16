<?php 
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
  require_once "inc/config.php"; 
  
  Page::ForceIndex();
?>

<!DOCTYPE html>
<html>
<title>Bonita Services!</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen">

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="index.php" class="w3-bar-item w3-button"><b></b> Bonita Beauty Services!</a>
      <!-- Float links to the right. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a href="#services" class="w3-bar-item w3-button">Services</a>
        <a href="#about" class="w3-bar-item w3-button">About</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="register.php" class="w3-bar-item w3-button">Register</a>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="./images/logo.png" alt="Architecture" width="550" height="600">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="logo-text"><b>Bonita Beauty </b><br>Login</br></span>
        <div class="logincontainer">
          <!--id: used in the js-->
          <!--class: used in the css-->
          <form id="loginForm" class="form">
                  <label>Email</label>
                  <input type="email" id="email" placeholder="Enter email">
  
                  <label>Password</label>
                  <input type="password" id="password" placeholder="Enter password">

              <button id="submit" type="submit">Submit</button>
          </form>
  
      </div>
    </div>
  </header>

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width:1564px">
 <!-- Project Section -->
 <div class="w3-container w3-padding-32" id="services">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Services</h3>
    </div>
    <div class="w3-row-padding" id="services-items">
    </div>

    <!-- About Section -->
    <div class="w3-container w3-padding-32" id="about">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
      <p>Bonita Beauty Services is a remarkable project with the purpose to aggregate value to the beauty industry by gathering professionals and clients together in a friendly and reliable environment. In this website, professionals are able to advertise their services, while you, our most valuable customers can quickly choose from a range of services and professionals that better suit your needs and agenda!!!
      </p>
    </div>

    <div class="w3-row-padding w3-grayscale" id = "about-items">
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-32" id="contact">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
      <p>Contact</p>
      <form action="/action_page.php" target="_blank">

        <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
        <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
        <button class="w3-button w3-black w3-section" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </form>
    </div>


  <!-- End page content -->
  </div>


  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-16">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
        class="w3-hover-text-green">Sarah and Natascha </a></p>
  </footer>
  <script src="main.js"></script>
</body>

</html>