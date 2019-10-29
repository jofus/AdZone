<?php
  session_start();
  include("function.php")
?>



<!DOCTYPE html>
<html>

<head>
  <title>AdZone - Log In/Sign Up</title>
  <link rel="stylesheet" href="mainstyle.css" />
  <meta name="viewport" initial-scale="1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script src="validateform.js"></script>

  </script>
  <style>
    header {
      margin-top: -4px;
    }

    /*
Main Content Here
*/

    h1 {
      text-align: center;
    }

    input,
    label,
    select {
      display: block;
      width: 80%;
      margin-left: 10%;
    }

    p {
      margin-bottom: 0px;
    }

    label {
      font-size: 18px;
    }

    input,
    select {

      margin-bottom: 10px;
      border: 2px solid lightgray;
      padding: 1%;
    }

    input:focus {
      border: 2px solid black;
    }


    h2 {
      margin-bottom: 40px;
      text-align: center;
    }

    .login {
      border: 2px solid lightgreen;
      border-radius: 10px;
      border-top-left-radius: 0px;
      background-color: white;
      width: 50%;
      margin-left: 25%;
      padding: 1%;
      z-index: 1;
    }

    .signup {
      border: 2px solid lightgreen;
      border-radius: 10px;
      border-top-left-radius: 0px;
      background-color: white;
      width: 50%;
      margin-left: 25%;
      padding: 1%;
      z-index: 1;
      display: none;
    }

    .tab1 {
      float: left;
      width: 100px;
      height: 50px;
      position: relative;
      bottom: 30px;
      left: 25%;
      padding: 1%;
      text-align: center;
      background-color: lightgreen;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      z-index: 0;
      cursor: pointer;
      font-weight: bold;

    }

    .inactivetab {
      background-color: grey;
      height: 40px;
      color: white;
      bottom: 22px;
      font-weight: 400;
    }

    .tab2 {
      float: left;
      width: 90px;
      height: 40px;
      position: relative;
      bottom: 22px;
      left: 25%;
      padding: 1%;
      text-align: center;
      background-color: grey;
      color: white;
      border-top-right-radius: 10px;
      z-index: 0;
      cursor: pointer;
    }

    .activetab {
      background-color: lightgreen;
      height: 50px;
      bottom: 30px;
      border-top-left-radius: 10px;
      color: black;
      font-weight: bold;
    }

    .inactivetab1 {
      border-top-right-radius: 0px;
    }

    .tab1 p {
      font-size: 16px;
      margin: 0px;
    }

    .tab2 p {
      font-size: 16px;
      margin: 0px;
    }



    button {
      margin-left: 10%;
      border: 1px solid black;
      font-size: 18px;
      padding: 1.5%;
      cursor: pointer;
    }

    @media screen and (max-width: 769px) {

      #mobilemenu {
        top: 40px;
      }

      .login,
      .signup {
        width: 90%;
        margin-left: 5%;
      }

      .tab1 {
        left: 5%;
      }

      .tab2 {
        left: 5%;
      }

      input,
      select {
        height: 35px;
      }


      label:first-of-type {
        margin-top: 40px;
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

  <h2>Log In/Sign Up</h2>
  <div class="tab1">
    <p>Log In</p>
  </div>
  <div class="tab2">
    <p>Sign Up</p>
  </div>
  <br />


  <form action="process.php" method="post" class="login">

    <input type="hidden" name="formname" value="login" readonly="readonly">
    <input type="hidden" name="last_login" readonly="readonly">



    <label for="username">
      <p>Email:</p>
    </label>
    <input type="email" id="email" name="email" placeholder="Enter Your Email" required="required" />
    <span id="_username"></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password 8 - 26 characters" required="required" />
    <span id="_password"></span>
    <div class="buttons">
      <button type="submit">Log In</button>
    </div>
  </form>

  <form action="process.php" method="post" class="signup">

    <input type="hidden" name="formname" value="signup" readonly="readonly">
    <input type="hidden" name="date_registered" readonly="readonly">

    <label for="username">
      <p>Username:</p>
    </label>
    <input type="text" id="username" name="username" placeholder="Enter a username" required="required" />
    <span id="_username"></span>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Your Email" required="required" />
    <span id="_email"></span>

    <label>Your County</label>
    <select name="counties">
      <option value="">Select your county</option>
      <?php
      echo displayCounties($_SESSION["id_county"]);
      ?>
    </select>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password 8 - 26 characters" required="required" />
    <span id="_password"></span>

    <div class="buttons">
      <button type="submit">Submit</button>
    </div>
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
  $(document).ready(function() {

    $(".tab1").click(function() {
      $(".signup").hide();
      $(".login").show();
      $(".tab1").addClass("activetab");
      $(".tab1").removeClass("inactivetab1");
      $(".tab2").addClass("inactivetab");
      $(".tab2").removeClass("activetab");
    });

    $(".tab2").click(function() {
      $(".signup").show();
      $(".tab2").addClass("activetab");
      $(".tab1").removeClass("activetab");
      $(".login").hide();
      $(".tab1").addClass("inactivetab");
      $(".tab1").addClass("inactivetab1");
    });
  });

  $(".togglemenu").click(function() {
    $("#mobilemenu").fadeToggle();
  });
</script>

</html>