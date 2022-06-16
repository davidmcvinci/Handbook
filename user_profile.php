<?php
	include_once 'db_connect.php';
	include_once 'functions.php';

	session_start();

?>

<html>
<head>
	<title>
		<?php
			$myname = $_SESSION["userUid"];
			echo  $myname . " | Handbook";
		?>
	</title>
	
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&family=Poppins:wght@200;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="lightbox.min.css">
	<link rel="stylesheet" href="nav_style.css">

	<style>
		*{
			font-family: "Poppins", "Monserrat";
			font-weight: bold, normal;
		}
		a{
			text-decoration: none;
		}
		a:hover{
			text-decoration: underline;
		}
		
		body{
			margin:0px;
			padding: 0px;
			background-color: #FAF9F8;
		}
			.wholebody{
				background-color: #FBFCFC;
				display: flex;
				flex-direction: column;
				width: 99vw;
			}
			.cover_photo{
				width: 100%;
				height: 50vh;
				box-sizing: border-box;
				background-image: url(graphics/bg2.jpg);
				object-fit: fill;
				background-position: top;
				background-repeat:repeat-x;
			}
			.cover_photo:before{
				width: 100%;
				height: 50vh;
				box-sizing: border-box;
				background: linear-gradient(0deg, black, transparent);
				position: absolute;
				content:'';
				opacity: 0.7;
				background-blend-mode: multiply;
			}
			.profile_photo{
				width: 19vw;
				height: 19vw;
				border-radius: 50%;
				background: #fff;
				position: absolute;
				background-image: url(graphics/profile_default.png);
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				border: 7px solid white;
				top: 170px;
				left: 2vw;
			}
			.editprofile{
				width: 15%;
				padding: 1px;
				height: 50px;
				border-radius: 15px;
				align-items: center;
				border: none;
				color: white;
				background-color: transparent;
				cursor: pointer;
				position: absolute;
				display: flex;
				top: -130px;
				left: 60vw;
			}
			.namediv{
				position: absolute;
				top: 34vh;
				left: 24vw;
				color: white;
				height: fit-content;
				width: 500px;
			}
			.bio{
				position: relative;
				top: -25px;
				width: 300px;
			}
			.yourpost{
				position: absolute;
				top: 42vh;
				left: 22vw;
				background-color: white;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				width: 70vw;
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
			.display_on_profile{
				width: 70vw;
				height: 20px;
				max-height: 20px;
				position: absolute;
				top: 90vh;
				left: 21vw;
				list-style-type: none;
			}
			.display_on_profile li{
				position: relative;
				margin-right: 10vw;
				color: blue;
				font-weight: 600;
				align-items: center;
			}
			.personal_info{
				background-color: white;
				width: 18vw;
				height: fit-content;
				position: absolute;
				align-items: center;
				top: 50vh;
				left: 2vw;
				padding: 10px; 
				padding-top: 120px;
				box-shadow: 0px 10px 40px #f0f0f0;
			}
			.personal_info img{
				height: 20px;
				width: auto;
				margin-right: 10px;
			}
			.ainpersonalinfo, .binpersonalinfo, .cinpersonalinfo, .dinpersonalinfo{
				display: flex;
				font-size: 1.3vw;
				width: 80%;
				height: 30px;
				padding: 10px;
				align-items: center;
				margin-bottom: 10px;
				border-bottom: 1px solid cyan;
			}
			.atimelinepost{
				position: relative;
				width: 70vw;
				top: 100vh;
				left: 23vw;
				height: fit-content;
				margin-left: 0px;
				margin-bottom: 15px;
				padding: 10px 10px 10px 10px;
				background-color: white;
				box-shadow: 0px 0px 20px rgb(234,234,234);
				border-radius: 15px;
			}
			.whoposted{
				display: flex;
				position: relative;
				top: -10px;
				align-items: center;
				height: 70px;
			}
			.postersname{
				position: relative;
				top: -15px;
			}
			.postersprofilepic{
				position: relative;
				top: -15px;
				left: 5px;
				width: 40px;
				height: 40px;
				margin-left: 5px;
				margin-right: 10px;
				border-radius: 50%;
				background-image: url(graphics/profile_default.png);
				background-size: cover;
				background-repeat: no-repeat;
			}
			.whatthepersonposted{
				position: relative;
				top: -20px;
				color: black;
				margin-left: 45px;
			}
			span{
				font-size: 10px;
				color: grey;
				font-weight: 600;
			}
			span.commentspan{
				font-size: 13px;
				color: grey;
			}
			.postactions{
				position: relative;
				top: 85%;
				left: 80%;
				width: 170px;
				height: 40px;
			}
			.likebutton {
				border-radius: 50%;
				width:30px;
				height: 30px;
				border: 0px;
			}
			.menuicon{
				position: absolute;
				top: 20px;
				left: 95%;
				cursor: pointer;
			}
			.menuicon{
				width: 20px;
				height: auto;
			}
			.entiremenu{
				position: fixed;
				top: 380px;
				left: 80vw;
				border-radius: 5px;
				background: #fff;
				width: 100px;
				height: 0;
				align-items: left;
				box-shadow: 0px 10px 20px #ccc;
				z-index: 999;
				padding: 0px 10px;
				overflow: hidden;
				transition: height 0.3s;
			}
			.entiremenuopen{
				padding: 15px 10px;
				height: 70px;	
			}
			.entiremenu button{
				border: none;
				border-bottom: 1px solid cyan;
				background: none;
				outline: none;
				width: 100%;
				text-align: left;
				margin-bottom: 10px;
			}
			.entiremenu button:hover{
				background: #cbc;
			}
		
	</style>
</head>

<body>
		<nav>
			<div class="handbook">
				<p class="handbook"><b>Handbook</b>
			</div>

			<div class="navtools">	
				<form method="post" action="search.php" class="searchform">
					<input type="text" name="searchbar" placeholder="Search...">
					<img src="graphics/searchicon.png" style="height: 20px; margin-top: 7px; margin-left: 5px;"/>
				</form>
				
			</div>

			<div class="littlethings">			
				<ul class="extras">
					<li><a href="homepage.php"><img src="graphics/home.png"></a></li>
					<li onclick="notification()" style="cursor: pointer;"><img src="graphics/notification.png"></li>
					<li><a href="messages.php"><img src="graphics/message.png"></a></li>
				</ul>
			</div>

			<div class="profilepic" onclick="openmenu()">
			</div>
		</nav>

		<div class="entire_notification">
				<div style="display: flex; width: 97%;  align-items: center; padding: 0px 0px;">
					<h2 style="font-size: 1.2em; color: blue; justify-content: flex-start">Notifications</h2>
					<img src="graphics/menu.png" class="menu_icon" style="justify-content: flex-end; width: 20px; margin-left: 55%; ">
				</div>

				<div class="a_notif">
					<div class="icon">
					</div>
					
					<div class="details">
						This person liked your post<br>
						<span> Aug 13, 2022 | 18:28</span>
					</div>
				</div>
					
				<div class="a_notif">
					<div class="icon">
					</div>
						
					<div class="details">
						John James also commented on a post from David McVinci which you follow<br>
						<span> Aug 21, 2022 | 07:39</span>
					</div>
				</div>

				
		</div>

		<div class="settingsdropdown">
			<div class="aindropdown">
				<div class="profilepicdropdown">
					
				</div>
	
				<?php

					$myname = $_SESSION["userUid"];
					echo "<h3> $myname ";
				?>

				<br><a href="user_profile.php" style="color: blue; font-weight: 500; font-size: 0.7em;">View your profile</a>
			</div>

			<div class="bindropdown">
				<a href="#" style="color: black; font-weight: 400; font-size: 1.0EM;">
				<img src="graphics/connections.png" style="margin-left: 0px; margin-top: 10px; width: 20px;" />
				Connections
				<img src="graphics/rightarrow.png" style="margin-left: 93%; width: 15px; position: relative; top: -20px;"></a>
			</div>

			<div class="cindropdown">
				<a href="#" style="color: black; font-weight: 400; font-size: 1.0EM;">
				<img src="graphics/communities.png" style="margin-left: 0px; margin-top: 10px; width: 20px;" />
				Communities
				<img src="graphics/rightarrow.png" style="margin-left: 93%; width: 15px; position: relative; top: -20px;"></a>
			</div>

			<div class="dindropdown">
				<a href="#" style="color: black; font-weight: 400; font-size: 1.0EM;"> 
				<img src="graphics/settings.png" style="margin-left: 0px; margin-top: 10px; width: 20px;" />
				Settings & Accessibility
				<img src="graphics/rightarrow.png" style="margin-left: 93%; width: 15px; position: relative; top: -20px;">
				</a>
			</div>

			<form class="eindropdown" action="logout_process.php" method="POST">
				<input type="hidden" name="logout" value="$_SESSION['userid']'">
				<img src="graphics/logout (2).png" style="margin-left: 0px; margin-top: 10px; width: 20px;"/>
				<button type="submit" style="background-color: transparent; border: none; outline: none; font-weight: 400; font-size: 1.0EM;">Logout</button>
				<img src="graphics/rightarrow.png" style="margin-left: 93%; width: 15px; position: relative; top: -20px;">
			</form>
		</div>

		<div class="wholebody">

			<div class="cover_photo">
				<?php
					echo "<div class='namediv'><h1> $myname </h1>";
					echo "<div class='bio'>Creative Designer <br></div>";
				?>

				<button class="editprofile">
					<br>Edit Profile<img src="graphics/edit_white.png" style="align-self: center; width: 20px; margin-left: 10px; height: auto; position: absolute; top: 13px; left: 100%">
				</button>
			</div>

			<div class="personal_info">
				<div class="ainpersonalinfo">
					<img src="graphics/location.png">Kaduna, Nigeria
				</div>
				<div class="binpersonalinfo">
					<img src="graphics/work.png">Senior Designer @ Jimenda Press
				</div>
				<div class="cinpersonalinfo">
					<img src="graphics/instagram.png">david_mcvinci
				</div>
				<div class="dinpersonalinfo">
					<img src="graphics/telephone.png">+2349011243724
				</div>
			</div>

			<div class="profile_photo">
			</div>
			
			<div class="yourpost">
				<form method="POST" action='post_process_from_profile.php' enctype="multipart/form-data" style="padding: 5px; margin-bottom: 0px;">
					<textarea rows="100" name="post" type="text" placeholder="Make a Post..."></textarea>
					<input type="file" name="post_file" style="width: 40%;">
					<input class="postbutton" name="submit" type="submit" value="Post" > 
				</form>

				<?php
					if (isset($_GET["error"])) {
						if($_GET["error"] == "emptypost") {
							echo "<i style='font-weight: 600;'>Please, add a post!</i>";
						}
						if($_GET["error"] == "uploadsuccess") {
							echo "<i style='font-weight: 600;'>Image Posted</i>";
						}
						if($_GET["error"] == "wrongfiletype") {
							echo "<i style='font-weight: 600;'>File format not allowed</i>";
						}

					}
				?>
			</div>

			<ul class="display_on_profile">
				<a href="user_profile.php"><li class='timeline'>Timeline</li></a>
				<a href="user_profile_connections.php"><li>Connections</li></a>
				<a href="user_profile_suggestions.php"><li>Suggestions</li></a>
			</ul>

			<div class="indicator" style="background-color: blue; width: 100px; height: 5px; border-radius: 20px; position: absolute; top: 97vh; left: 24vw;">
			</div>
						
			<?php
				displaypostonProfile($conn);
			?>
					
			<?php
				//menuornot()
				echo "<div class='entiremenu'>
					<div class='first'>
						
							<button>Edit</button>
						
					</div>
					<div class='second'>
						<button>Delete</button>
					</div>
				</div>";
			?>

		</div>
		
		
</body>

<script type="text/javascript" src="javascript/settingsdropdown.js"></script>

</html>