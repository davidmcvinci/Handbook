<?php
	include 'functions.php';
	include 'db_connect.php';
	//include 'homepage.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.yourpost{
				background-color: white;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				width: 90%;
				height: fit-content;
				margin-top: 70px;
				margin-left: 20px;
				border-radius: 10px;
				padding: 10px;
			}
			textarea{
				font-family: "Montserrat";
				font-size: 13px;
				border-top:  0px;
				border-left:  0px;
				border-right:  0px;
				border-bottom: 1PX SOLID #ccc;
				outline: none;
				width: 100%;
				color: grey;
				height: 100PX;
				margin-bottom: 10px;
				resize: none;		
			}
			.postbutton{
				margin-left: 85%; 
				position: relative;
				top: -28px;
				width: 70px; 
				height: 30px; 
				background-color:blue;
				color: white;
				font-weight: bold;
				border: none;
				border-radius: 5px;
			}
			.yourpost input{
				margin-bottom: 0;
			}
	</style>
</head>
<body>
	<?php
		$id = $_POST['id'];
		$uid = $_POST['uid'];
		$post_id = $_POST['postid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		echo "<form method='POST' action='". editPostsOnProfile($conn)."' style='padding: 5px; margin-bottom: 0px;'>
				<textarea rows='100' name='post' type='text' > ".$message. "</textarea>
				<input type='hidden' name='id' value='".$id."'>
				<input type='hidden' name='post_id' value='".$post_id."'>
				<input type='file' name='post_file' enctype='multipart/form-data' style='width: 40%;'>
				<input class='postbutton' name='editpostbutton' type='submit' value='Edit' > 
			</form>
       ";
	?>
</body>
</html>