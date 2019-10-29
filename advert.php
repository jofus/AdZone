<?php
  include 'dbconnect.php';
  include 'function.php';

  if (!isset($_GET["idadvert"])) {
    header("location: homepage.php");
    exit();
  }
?>


<!DOCTYPE html>
<html>

<head>
  <title>AdZone - Adverts</title>
  <link rel="stylesheet" href="mainstyle.css" />
  <meta name="viewport" initial-scale="1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <style>
    .item {
      float: left;
      border: 2px solid lightgray;
      margin-bottom: 10px;
      padding: 1%;
      width: 80%;
      margin-left: 10%;
      margin-top: 10px;
    }


    .description {
      display: inline-block;
      float: right;
      background-color: lightgray;
      padding: 1%;
      width: 69%;
    }

    .imagecontain {
      display: inline-block;
      float: left;
      width: 30%;
      margin-right: 1%;
    }

    .item img {
      max-width: 100%;
    }

    input,
    label,
    button {
      display: block;
      margin-bottom: 2px;
    }

    .userMessage {
      float: left;
      width: 100%;
    }

    @media screen and (max-width: 769px) {

      .imagecontain,
      .description {
        width: 100%;
      }
    }
  </style>

  <?php
    if (isset($_SESSION["username"])) {
      $userInfo    = "<div class='userinfo'>" . $_SESSION["username"] . " <br/> </div>";
      $viewProfile = "<a href='profile.php'>Profile</a>";
      $buttons     = "<div><a class='logoutbutton' href='logout.php'>Logout</a></div>";
    } else {
      $buttons     = "";
      $userInfo    = "";
      $viewProfile = "<a href='loginsignup.php'>Login / Sign Up</a>";
    }
  ?>
</head>

<body>
  <header>

    <div class="title">
      <?php echo $userInfo ?> <h1>AdZone</h1> <?php echo $buttons; ?>
    </div>

  </header>
  <nav>
    <ul>
      <li><a href="homepage.php">Home</a></li>
      <li><?php echo $viewProfile ?></li>
      <li><a href="place-ad.php">Place An Ad</a></li>
    </ul>
  </nav>

  <div class="mobilenav">
    <div class="togglemenu">
      <div></div>
      <div></div>
      <div></div>
    </div>


  </div>

  <nav id="mobilemenu">
    <ul>
      <li><a href="homepage.php">Home</a></li>
      <li><?php echo $viewProfile ?></li>
      <li><a href="place-ad.php">Place An Ad</a></li>
    </ul>
  </nav>

  <?php
    echo showAdvert($_GET["idadvert"]);
  ?>

  <footer>
    <hr />

    <div class="footertext">
      <p>About Us</p>
      <p>Contact Us</p>
      <p>Terms of Service</p>
      <p>Locations</p>
    </div>

    <div class="footertext">
      <p>About Us</p>
      <p>Contact Us</p>
      <p>Terms of Service</p>
      <p>Locations</p>
    </div>

    <div class="footertext">
      <p>About Us</p>
      <p>Contact Us</p>
      <p>Terms of Service</p>
      <p>Locations</p>
    </div>

    <div class="footertext">
      <p>About Us</p>
      <p>Contact Us</p>
      <p>Terms of Service</p>
      <p>Locations</p>
    </div>

    <hr />
  </footer>
</body>

<script>
  $(".togglemenu").click(function() {
    $("#mobilemenu").fadeToggle();
  });
</script>

</html>