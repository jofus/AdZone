<?php
  session_start();
  include("function.php")
?>

<!DOCTYPE html>
<html>

<head>
  <title>AdZone - Edit Profile</title>
  <link rel="stylesheet" href="mainstyle.css" />
  <meta name="viewport" initial-scale="1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <style>
    body {
      margin-top: -20px;
    }

    .editprofile {
      margin-left: 10px;
    }

    input,
    select {
      display: block;
      margin-bottom: 10px;
      border: 2px solid lightgray;
      padding: 0.5%;
    }

    input[type=email] {
      opacity: 0.5;
    }

    label {
      font-size: 14px;
    }


    input:focus {
      border: 2px solid black;
    }


    button {
      border: 1px solid black;
      font-size: 14px;
      padding: 1%;
      cursor: pointer;
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

  <form action="process.php" method="post" class="editprofile">

    <h2>Edit Profile</h2>

    <input type="hidden" name="formname" value="editprofile" readonly="readonly">

    Username: <input type="text" value="<?php echo $_SESSION["username"]; ?>" readonly="readonly" name="username" />
    Email: <input type="email" value="<?php echo $_SESSION["email"]; ?>" readonly="readonly" name="email" />
    Firstname: <input type="text" value="<?php echo $_SESSION["firstname"]; ?>" name="firstname" />
    Lastname: <input type="text" value="<?php echo $_SESSION["lastname"]; ?>" name="lastname" />
    County:
    <select name="counties">
      <option value="">Select your county</option>
      <?php
      echo displayCounties($_SESSION["id_county"]);
      ?>
    </select>

    Phone: <input type="tel" value="<?php echo $_SESSION["phone"]; ?>" name="phone" />
    Profile Picture: <input type="file" value="<?php echo $_SESSION["user_picture"]; ?>" name="user_picture" for="pictures" />
    <button type="submit">Update Profile</button>
  </form>
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