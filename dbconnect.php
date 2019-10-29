<?php
	$link = mysqli_connect("localhost", "root", "", "adverts_website");

	if (mysqli_connect_error()) {
		return false;
	} else {
		mysqli_set_charset($link, "utf8");
		return $link;
	}
?>