<?php

    include_once 'db_connect.php';
    include_once 'functions.php';
    session_start();

    create_postid ();
    
    if(isset($_POST['submit'])) {
        $userspost = $_POST['post'];
        $session = $_SESSION["userid"];
        $file = $_FILES['post_file'];
        $postid = create_postid();

        //checking if the post is empty
        $result;

            if (preg_match("/^[ ]*$/", $userspost) ) {
                $result = true;
    	    }else{
    	           $result = false;
    	        }
    	//if it is actually empty, go back

            if ($result == true) {
            	header("location: user_profile.php?error=emptypost");
            	
            }else{
        //this is where the post actually starts...being posted
    	    $sql = "INSERT INTO posts (postid, userid, post) VALUES (?, ?, ?);";

    	     $stmt = mysqli_stmt_init($conn);
    	        if (!mysqli_stmt_prepare($stmt, $sql)) {
    	             header("location: user_profile.php?error=stmtfailed");
    	             exit();
    	        }
    	 
    	        mysqli_stmt_bind_param($stmt, "iss",$postid, $session , $userspost);
    	        mysqli_stmt_execute($stmt); 
    	        mysqli_stmt_close($stmt);
    	        header("location: user_profile.php?error=none");
    	        exit(); 
            }

    }else{
        header("Location: user_profile.php");
    }


  //uploading images
    if(isset($_POST['submit'])) {
        $file = $_FILES['post_file'];

        $fileName = $_FILES['post_file']['name'];
        $fileTmpName = $_FILES['post_file']['tmp_name']; 
        $fileSize = $_FILES['post_file']['size'];
        $fileError = $_FILES['post_file']['error'];
        $fileType = $_FILES['post_file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
           if ($fileError === 0) {
               if ($fileSize < 10000000) {
                   $fileNameNew = uniqid('', true). ".". $fileActualExt;
                   $fileDestination = 'uploads/'. $fileNameNew;
                   move_uploaded_file($fileTmpName, $fileDestination);
                   header("Location: user_profile.php?error=uploadsuccess");
               }else{
                header("location: user_profile.php?error=filetoobig");
               }
           }else{
            header("location: user_profile.php?error=erroruploading");
           }
        }else{
            header("location: user_profile.php?error=wrongfiletype");
        }
    }
 
 //the problem be say when you notype textand you no select pishure, e go still tell you "File format not allowed", when you no even click any file at all...