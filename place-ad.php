<?php
session_start();
include("function.php")
?>


<!DOCTYPE html>
<html>
<head>
<title>AdZone - Place An Ad</title>
<link rel="stylesheet" href="mainstyle.css" />
<meta name="viewport" initial-scale="1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>


header {
 margin-top: -4px;
}

/*
Main Content Here
*/

form {
border: 2px solid lightgreen;
 background-color: white;
 width: 50%;
 margin-left: 25%;
 padding: 1%;
 z-index: 1;
}

h2 {
 text-align: center;
}

label, p{
 display: block;
 margin-left: 10%;
}

input, select {
 margin-bottom: 10px;
 width: 80%;
 margin-left: 10%;
 border: 2px solid lightgray;
 padding: 1%;
}

input:focus {
 border: 2px solid black;
}


input[type="checkbox"] {
 margin-left: -29%;
}

select {
 display: block;
 margin-bottom: 10px;
 width: 80%;
 margin-left: 10%;

}

textarea {
 width: 80%;
 max-width: 80%;
 margin-left: 10%;
 border: 2px solid lightgray;
 padding: 1%;
 min-height: 200px;
}

textarea:focus {
 border: 2px solid black;
}


button {
 border: 1px solid black;
 font-size: 18px;
 padding: 1.5%;
 cursor: pointer;
 margin-left: 10%;
}

@media screen and (max-width: 769px){
  form {
    width: 90%;
    margin-left: 5%;
  }
}
</style>


<?php
if( isset($_SESSION["username"]) ) {
  $userInfo    = "<div class='userinfo'>".$_SESSION["username"]."</div>";
  $viewProfile = "<a href='profile.php'>Profile</a>";
	$buttons     = "<div><a class='logoutbutton' href='logout.php'>Logout</a></div>";
  $submitAd    = "<button type='submit'>Submit Ad</button>";

}else{
	$buttons     = "";
  $userInfo    = "";
  $viewProfile = "<a href='loginsignup.php'>Login / Sign Up</a>";
  $submitAd    = "You must <a href='loginsignup.php'>Log In / Sign Up</a> to sumbit an advert";

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

<h2>Place An Ad</h2>

<form action="process.php" method="post" class="placead" enctype="multipart/form-data">
    <input type="hidden" name="formname" value="placead" readonly="readonly">
    <input type="hidden" name="id_user" readonly="readonly">
    <input type="hidden" name="ad_views" readonly="readonly">
    <input type="hidden" name="date_registered" readonly="readonly">
    <input type="hidden" name="date_posted" readonly="readonly">



    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Title of your advert" required="required"/>

    <label for="price">Price</label>
    <input type="tel" name="price" id="price" placeholder="The price of the item" required="required"/>

    <select for="id_category" name="id_category" required="required">
    <option>Category</option>
    <?php
        echo displayCategories($_SESSION["id_category"]);
     ?>
    </select>


<!--
  <label>Ad Type</label>
  <select name="ad_type">
	<option value="S">For Sale</option>
	<option value="W">Wanted</option>
  </select>
-->
    <label for="description">Description</label>
    <textarea for="description" name="description" placeholder="A description will help to make a sale" required="required"></textarea>

    <label>County</label>
    <select name="counties">
     <option value="">Select your county</option>
        <?php
            echo displayCounties($_SESSION["id_county"]);
        ?>
    </select>
<!--
    <p>Contact By:</p>
    <label for="phone">Phone</label>
    <input type="checkbox" for="phone" name="contact_byphone"/>

    <label>Email</label>
    <input type="checkbox" for="email" name="message_center"/>
-->
    <label>Add Photos</label>
    <input type="file" name="main_picture" for="pictures" />

    <div class="buttons">
    <?php echo $submitAd; ?>
    </div>
 </form>

 <footer>
 <hr/>

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

 <hr/>
 </footer>
</body>

<script>
$(".togglemenu").click(function(){
        $("#mobilemenu").fadeToggle();
});
</script>
</html>
