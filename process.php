<?php

session_start();

require("dbconnect.php");

include("function.php");

function signUp($username, $email, $password, $counties)
{
     global $link;
     $query = "INSERT INTO users
              (username, email, password, id_county)

              VALUES
              ('".$username."', '".$email."', '".$password."', '".$counties."');";
     mysqli_query($link, $query);
     header("location: signupconfirmation.php");
}



#exit();
if( isset($_POST["formname"]) )
{
    switch($_POST["formname"])
    {
        case "login":
            /* Login */
            $email		=	addslashes($_POST["email"]);
            $password	=	addslashes($_POST["password"]);
            $last_login	=	addslashes($_POST["last_login"]);
            loginUser($email, $password, $last_login);
            break;

        case "signup":
            /* Sign Up */
            $username         = addslashes($_POST["username"]);
            $email		        =	addslashes($_POST["email"]);
            $counties	        =	addslashes($_POST["counties"]);
            $password	        =	addslashes($_POST["password"]);
            signUp($username, $email, $password, $counties);
            break;

        case "placead":
            /* Place AD */


            $target_dir	  =	"images/products/";
          	$target_file	=	$target_dir . basename($_FILES["main_picture"]["name"]) ;
          	$fileExt		  =	strtolower( pathinfo($target_file,PATHINFO_EXTENSION) );
          	$filename	    =	$target_dir . date("YmdHis").$_SESSION["id_user"]."." .$fileExt;

          	#echo $filename;

          	$uploadOk	=	1;
          	$check = getimagesize($_FILES["main_picture"]["tmp_name"]);
          	if($check !== false)
          	{
          		$uploadOk = 1;
          	}else{
          		$uploadOk = 0;
          	}

          	// Check if file already exists
          	if (file_exists($target_file)) {
          		$uploadOk = 0;
          	}

          	$maxsize	= (3000000/1024);
          	#echo $maxsize;
          	// Check file size
          	if ($_FILES["main_picture"]["size"] > 3000000 ) {
          		#echo "Sorry, your file is too large.";
          		$uploadOk = 0;
          	}

          	// Allow certain file formats
          	if( $fileExt!="jpg" && $fileExt!="png" && $fileExt!="jpeg" && $fileExt!="gif")
          	{
          		#echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
          		$uploadOk = 0;
          	}

          	// Check if $uploadOk is set to 0 by an error
          	if ($uploadOk == 0)
          	{
          		echo "Sorry, your file was not uploaded..<br/>";
          		exit();
          		// if everything is ok, try to upload file
          	}else{
          		if (move_uploaded_file($_FILES["main_picture"]["tmp_name"], $filename))
          		{
          			$uploadOk = 1;
          			#echo "The file ". $filename . " has been uploaded..<br/>";
          		}else{
          			$uploadOk = 0;
          			#echo "Sorry, there was an error uploading your file.<br/>";
          		}
          	}

          	if($uploadOk==0){
          		echo "Sorry, your file was not uploaded..<br/>";
          		exit();
          	}else{
                  $id_user	       =	  addslashes($_POST["id_user"]);
                  $title           =    addslashes($_POST["title"]);
                  $description     =	  addslashes($_POST["description"]);
                  $price	         =	  addslashes($_POST["price"]);
                  $location	       =	  addslashes($_POST["location"]);
                  $counties		     =	  addslashes($_POST["counties"]);
                  $id_county       =	  addslashes($_POST["id_county"]);
                  $id_category     =	  addslashes($_POST["id_category"]);
                  $ad_type         =    addslashes($_POST["ad_type"]);
                  $ad_views	       =	  addslashes($_POST["ad_views"]);
                  $date_registered =	  addslashes($_POST["date_registered"]);
                  $date_posted     =	  addslashes($_POST["date_posted"]);
                  placeAd($title, $description, $price, $location, $counties, $id_county, $filename,
                  $id_category, $adtype, $ad_views, $id_user, $date_registered, $date_posted);
              }
            break;

            case "editprofile":
            $target_dir	  =	"images/users/";
            $target_file	=	$target_dir . basename($_FILES["main_picture"]["name"]) ;
            $fileExt		  =	strtolower( pathinfo($target_file,PATHINFO_EXTENSION) );
            $filename	    =	$target_dir . date("YmdHis").$_SESSION["id_user"]."." .$fileExt;

            #echo $filename;

            $uploadOk	=	1;
            $check = getimagesize($_FILES["user_picture"]["tmp_name"]);
            if($check !== false)
            {
              $uploadOk = 1;
            }else{
              $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
              $uploadOk = 0;
            }

            $maxsize	= (3000000/1024);
            #echo $maxsize;
            // Check file size
            if ($_FILES["user_picture"]["size"] > 3000000 ) {
              #echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if( $fileExt!="jpg" && $fileExt!="png" && $fileExt!="jpeg" && $fileExt!="gif")
            {
              #echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
              echo "Sorry, your file was not uploaded..<br/>";
              exit();
              // if everything is ok, try to upload file
            }else{
              if (move_uploaded_file($_FILES["user_picture"]["tmp_name"], $filename))
              {
                $uploadOk = 1;
                #echo "The file ". $filename . " has been uploaded..<br/>";
              }else{
                $uploadOk = 0;
                #echo "Sorry, there was an error uploading your file.<br/>";
              }
            }

            if($uploadOk==0){
              echo "Sorry, your file was not uploaded..<br/>";
              exit();
            }else{
                      $firstname      =   addslashes($_POST["firstname"]);
                      $lastname       =   addslashes($_POST["lastname"]);
                      $email		      =	  addslashes($_POST["email"]);
                      $phone		      =	  addslashes($_POST["phone"]);
                      $user_picture   =   addslashes($_POST["user_picture"]);
                      $id_county	    =	  addslashes($_POST["counties"]);

                      updateUser($firstname, $lastname, $email, $phone, $user_picture, $id_county, $filename);
              }
                      break;
    }
}
else
{
    header("location: homepage.php");
}

function loginUser($email,$password)
{
    global $link;
    $query = "SELECT * FROM users
                       WHERE email  = '$email'
                       AND password = '$password';";

    $result = mysqli_query($link, $query);
    $row 	= mysqli_fetch_array($result);

    if( $row ){
        #echo "check!";
        $_SESSION["id_user"] 	  =  $row["id_user"];
        $_SESSION["username"]   =  $row["username"];
        $_SESSION["email"] 		  =  $row["email"];
        $_SESSION["firstname"]  =  $row["firstname"];
        $_SESSION["lastname"]	  =  $row["lastname"];
        $_SESSION["id_county"]  =  $row["county"];
        $_SESSION["counties"]	  =  $row["county"];
        $_SESSION["phone"]	    =  $row["phone"];

        $_SESSION["user_picture"] =  $row["user_picture"];

        $_SESSION["last_login"] = $row["last_login"];
        header("location: homepage.php");

    }else{
        header("location: loginsignup.php");
    }
}

function placeAd($title, $description, $price, $location, $counties, $id_county, $main_picture, $id_category, $ad_views, $id_user, $date_registered, $date_posted)
{
 global $link;
    $query = "INSERT INTO adverts
              (title, description, price, counties, main_picture, id_category, ad_type, ad_views, id_user, date_registered, date_posted)
               VALUES
              ('".$title."', '".$description."', '".$price."', '".$counties."', '".$main_picture."', '".$id_category."', '".$ad_type."', '".$ad_views."', '".$_SESSION["id_user"]."', '".$date_registered."', '".$date_posted."');";
mysqli_query($link, $query);
     header("location: advert.php");
     #echo $query;
}

function updateUser($firstname, $lastname, $email, $phone, $user_picture, $counties)
{
    global $link;

    if($firstname == "") {
        $firstname = $_SESSION["firstname"];
    }

    if($lastname == "") {
        $lastname = $_SESSION["lastname"];
    }

    if($phone == "") {
        $phone = $_SESSION["phone"];
    }

     if($user_picture == ""){
			$user_picture = $_SESSION["user_picture"];
		}



    $query = "UPDATE users SET
    firstname     = '$firstname',
    lastname      = '$lastname',
    email         = '$email',
    phone         = '$phone',
    user_picture  = '$user_picture',
    id_county     = '$counties'
    WHERE id_user = '".$_SESSION["id_user"]."';";

    mysqli_query($link, $query);


   $_SESSION["email"] 		   = $email;
   $_SESSION["firstname"]	   = $firstname;
   $_SESSION["lastname"]	   = $lastname;
   $_SESSION["phone"]	       = $phone;
   $_SESSION["user_picture"] = $user_picture;
   $_SESSION["id_county"]	   = $counties;
   $_SESSION["counties"]	   = getCountyName($counties);

   header("location: profile.php");

}

?>
