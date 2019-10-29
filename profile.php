<?php
  session_start();
  include("function.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>AdZone - Profile</title>
  <link rel="stylesheet" href="mainstyle.css" />
  <meta name="viewport" initial-scale="1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  <style>
    body {
      margin-top: -20px;
    }

    .profilepicture img {
      max-width: 200px;
      margin-left: -40px;
    }

    .profile {
      margin-left: 10px;
    }

    .profile .logoutbutton {
      float: left;
      position: relative;
      bottom: 0px;
      margin-top: 20px;
      background-color: black;
      color: white;
    }

    .profile .logoutbutton:hover {
      color: lightgreen;
      border: 2px solid lightgreen;
    }

    @media screen and (max-width: 769px) {
      body {
        margin-top: -16px;
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

  <div class="profile">
    <h2>Profile</h2>
    <?php username: echo $_SESSION["username"]; ?><br />
    <?php user_picture: echo "<figure class='profilepicture'><img src='" . $_SESSION["user_picture"] . "'/></figure>"; ?><br />
    <?php email: echo $_SESSION["email"]; ?> <br />
    <?php firstname: echo $_SESSION["firstname"]; ?> <br />
    <?php lastname: echo $_SESSION["lastname"]; ?> <br />
    <?php county: echo $_SESSION["counties"]; ?><br />

    <?php phone: echo $_SESSION["phone"]; ?> <br />


    <button><a href="editprofile.php">Edit Profile</a></button>
    <div><a class='logoutbutton' href='logout.php'>Logout</a></div>
  </div>

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