<?php
	include 'dbconnect.php';

	$q	= 	$_GET["q"];
	$cat	= 	$_GET["categories"];

	$query = "SELECT * FROM adverts
					WHERE title LIKE '%".$q."%'
					AND id_category LIKE '%".$cat."%';";

	if( ! $result = mysqli_query($link, $query) ){
		echo mysqli_error($link);
		exit();
	}

	if( mysqli_num_rows($result) < 1)
	{
		$advert = "No results";
	}else{


	}
?>
