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
        <a href="#services" class="w3-bar-item w3-button">Services</a>
        <a href="#about" class="w3-bar-item w3-button">About</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="/login.php" class="w3-bar-item w3-button">Login</a>
        <a href="/login.php" class="w3-bar-item w3-button">Book Now!</a>
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

    <!-- Project Section -->
    <div class="w3-container w3-padding-32" id="services">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Services</h3>
    </div>
    <div class="w3-row-padding" id="services-items">
    </div>

    <!-- About Section -->
    <div class="w3-container w3-padding-32" id="about">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.
      </p>
    </div>

    <div class="w3-row-padding w3-grayscale">
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="imageContainer">
        <img class="image" src="./images/John Doe.png" alt="John" >
      </div>
        <h3>John Doe</h3>
        <p class="w3-opacity">Massagist</p>
        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="imageContainer">
        <img class="image" src="./images/Lorena.jpg" alt="Lorena" >
      </div>
        <h3>Lorena Doe</h3>
        <p class="w3-opacity">Architect</p>
        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <img src="/w3images/team3.jpg" alt="Mike" style="width:100%">
        <h3>Mike Ross</h3>
        <p class="w3-opacity">Architect</p>
        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <img src="/w3images/team4.jpg" alt="Dan" style="width:100%">
        <h3>Dan Star</h3>
        <p class="w3-opacity">Architect</p>
        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
      </div>
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

    <!-- book now Section -->


    <div class="rowBookNow">
      <div class="column">
        <div class="w3-container w3-padding-32" id="booknow">
          <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Book now!</h3>
          <p>Book now!</p>

          <form method="post" name="myform" id="myform" action="/booking.php?r=6"></form>

          <p id=serviceField>
            <label for="service"><i class="fas fa-concierge-bell"></i> Pick a Service:</label><br>
            <select name="service" id="service" size="1"></select>
          </p>

          <p id="pickstaff">
            <label for="staff"><i class="fas fa-user"></i> Pick a staff:</label><br>
            <select name="staff" id="staff" size="1">
              <option value='-'>-</option>
            </select>
          </p>


          <p id="pickdate">
            <label for="thedate"><span class="punchit"></span> Pick a Date:</label><br>
            <input name="thedate" id="thedate" size="11" placeholder="YYYY-MM-DD">
          </p>

          <p id="picktime">
            <label for="daytime"> Pick a Time:</label><br>
            <select name="daytime" id="daytime" size="1">
              <option value='-'>-</option>
            </select>
          </p>


          <p id="clickselectbutton">
            <input type="submit" name="customerinformation" id="customerinformation" value="Enter Customer Information">
          </p>

          <button class="w3-button w3-black w3-section" type="submit">
            <i class="fa fa-paper-plane"></i> BOOK
          </button>
          </form>
        </div>
      </div>
      <div class="column">
        <div id="midcenter">
          <div class="rowStaff">
            <div id="staffselected">
              <p id="stafftext_hold"></p>
              <img id="staffimage_hold" src="">
            </div>
          </div>
          <div class="rowStaff">
            <div id="staffinfo">
              <p><b>Description: </b>
                <p id = "staffDescrip"></p>
              </p>
              <p><b>Phone: </b>
                <p id = "staffPhone"></p>
              </p>
              <p><b>Email: </b>
                <p id = "staffEmail"></p>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  </div>

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
