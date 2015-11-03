<?php
require("dbconnect.php");


function getCountyName($counties)
{
	global $link;
	$query = "SELECT county FROM counties
					WHERE id_county = '$counties';";
	$result = mysqli_query($link, $query);
	$row    = mysqli_fetch_array($result);
	return $row["county"];
}

function displayCounties($countysel)
{
	global $link;
	$query = "SELECT * FROM counties;";
	$result = mysqli_query($link, $query);

	$content = "";
	#
	/* get the number of rows of an array
		echo mysqli_num_rows($result);
	*/
	#exit();

	while( $row = mysqli_fetch_array($result) )
	{
		if($countysel==$row["id_county"]){
			$selected = "selected='selected' ";
		}else{
			$selected = "";
		}

		$content .= "<option value='".$row["id_county"]."' ".$selected.">".$row["county"]."</option>";
	}
	return $content;

}

function displayCategories($cat)
{
	global $link;
	$query = "SELECT * FROM categories;";
	$result = mysqli_query($link, $query);

	$content = "";
	#
	/* get the number of rows of an array
		echo mysqli_num_rows($result);
	*/
	#exit();

	while( $row = mysqli_fetch_array($result) )
	{
		if($cat==$row["id_category"]){
			$selected = "selected='selected' ";
		}else{
			$selected = "";
		}

		$content .= "<option value='".$row["id_category"]."' ".$selected.">".$row["category"]."</option>";
	}
	return $content;

}

function showAdvert($idadvert)
{
	global $link;
	$queryupd	=	"UPDATE adverts SET
								ad_views = (ad_views+1)
								WHERE id_advert = '$idadvert';";
	mysqli_query($link, $queryupd);
	###############################################

	$query 	= "SELECT * FROM adverts
               WHERE id_advert = '$idadvert';
    ";

	$query2 = "SELECT a.*, c.county, cat.category,  u.username, u.phone FROM adverts a
			INNER JOIN counties c ON (a.counties = c.id_county)
			INNER JOIN categories cat ON (a.id_category = cat.id_category)
			INNER JOIN users u ON (a.id_user = u.id_user)
			WHERE id_advert = '$idadvert';
";

	$result 	= mysqli_query($link, $query);
	$result2 = mysqli_query($link, $query2);
	$row		= mysqli_fetch_array($result);
	$row2    = mysqli_fetch_array($result2);
	###############################################
	#print_r($row);

	$advert = '
	<div class="item">
    <h2>'.$row["title"].'</h2>

    <div class="imagecontain">
    <img src="'.$row["main_picture"].'">
    </div>

        <div class="description">
        <p>'.$row["ad_type"].'</p>
				<h2>&#8364;   ' . $row["price"].'</h2>
        <p>County:    ' . $row2["county"] . '</p>
        <p>User:      ' . $row2["username"] . '</p>
				<p>Phone:     ' . $row2["phone"].' </p>
        <b>Views:</b> ' . $row2["ad_views"].'

				<h2>Description: </h2>
			 '.$row["description"].'
       </div>
<div class="userMessage">
			 <form action="mailer.php" method="post">
			 <h3>Message The User</h3>

			 <label for="fullname">Full Name</label>
			 <input type="text" name="fullname" />

			 <label>Phone</label>
			 <input type="text" name="phone" />

			 <label>Email</label>
			 <input type="email" name="email" />

			 <label>Message</label>
			 <textarea name="message"></textarea>

			 <button type="submit">Submit</button>
			 </form>
</div>
	</div>';
	return $advert;
}
?>
