<?php
session_start();
include("function.php");
#include("search.php");

if(isset($_GET["q"])) {
  $q	  = 	$_GET["q"];

}else{
$q = "";
}

if(isset($_GET["category"]))
{
  $cat	= 	$_GET["category"];

}else{
$cat = "";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>AdZone - Home</title>
<link rel="stylesheet" href="mainstyle.css" />
<meta name="viewport" initial-scale="1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>

body{
  margin-top: -20px;
}

main{
 float: left;
 margin-top: 10px;
 border: 2px solid lightgreen;
 width: 90%;
 margin-left: 5%;
 padding: 1%;
}

h2 {
 text-align:center;
}

.item {
 border: 2px solid lightgray;
 margin-bottom: 10px;
 padding: 1%;
 width: 30%;
 margin-right: 1%;
 margin-left: 2%;
 display: inline-block;
 text-align: center;
}

a .item  {
 color:black;
}


a .item:hover {
 color: blue;
}

.content{
 float:right;

}

.adtitle {
 min-height: 50px;
 max-height: 50px;
}

.description {
 background-color: lightgray;
 padding: 1%;
}


.item figure img{
 max-height: 150px;
 min-height: 150px;
}

@media screen and (max-width: 769px) {
  body{
    margin-top: -16px;
  }
  main{
    width: 100%;
    margin-left: 0px;
  }

  .item {
    width: 95%;
    margin: 0px;
    margin-left: 2.5%;
    margin-bottom: 10px;
  }

  .adtitle {
    max-height: 24px;
    min-height: 24px;
  }

}

</style>


<?php
if( isset($_SESSION["username"]) ) {
  $userInfo    = "<div class='userinfo'>".$_SESSION["username"]." <br/> </div>";
  $viewProfile = "<a href='profile.php'>Profile</a>";
	$buttons     = "<div><a class='logoutbutton' href='logout.php'>Logout</a></div>";
}else{
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

<div class="search">
<h3>Search</h3>
<form action="homepage.php" method="get">
  <select name="category">
    <option value="">Select Category
      <?php
       echo displayCategories($cat);
       ?>
    </option>
  </select>
  <input type="search" name="q" placeholder="Search..." value="<?php echo $q; ?>">
<button type="submit">Search</button>
</form>
</div>

<h2>Recent Adverts</h2>


<main>
<?php

$query  ="SELECT a.*, c.county, cat.category,  u.username FROM adverts a
    INNER JOIN counties c ON (a.counties = c.id_county)
    INNER JOIN categories cat ON (a.id_category = cat.id_category)
    INNER JOIN users u ON (a.id_user = u.id_user)
    WHERE a.title LIKE '%".$q."%'
    AND a.id_category LIKE '%".$cat."%'
    ORDER BY a.id_advert DESC; ";
if( ! $result = mysqli_query($link, $query) ){
	echo mysqli_error($link);
	exit();
}

if( mysqli_num_rows($result) < 1)
{
	$advert = "not results";
}else{



		$result = mysqli_query($link, $query);

		while($row = mysqli_fetch_array($result))
		{
        echo "<a href='advert.php?idadvert=".$row["id_advert"]."'>";
        echo "<div class='item'>";
	      echo "<div class='adtitle'><h3>" . $row["title"] . "</h3></div>";
        echo "<figure> <img src='". $row["main_picture"] . "' /></figure>";
        echo "<h4>Price: " . $row["price"] . "</h4>";
	      echo "<p>County: " . $row["county"] . "</p>";
        echo "<p>" . $row["category"] . "</p>";

     		echo "</div></a>";

		}
}
		mysqli_free_result($result);
		mysqli_close($link);
?>

</main>

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
