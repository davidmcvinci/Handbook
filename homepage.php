<?php
	include_once 'db_connect.php';
	include_once 'functions.php';

	session_start();

	//if (empty($_SESSION['userid'] || $_SESSION['userUid'])) {
	//	header("Location: login.php?error=pleaselogin");
	//	die();
	//}

?>

<html>
	<head>
		<title>
			Handbook
		</title>

		<link rel="preconnect" href="https://fonts.googleapis.com"> 
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&family=Poppins:wght@200;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="lightbox.min.css">
		
		<script type="text/javascript" src="lightbox-plus-jquery.min.js">
		</script>  

		<style>
			*{
				font-family: "Poppins", "Monserrat";
				font-weight: bold, normal;
			}
			nav img, .menuicon, .menu_icon{
				height: 20px;
				width: auto;
			}			
			body{
				margin:0px;
				padding: 0px;
			}
			a{
				text-decoration: none;
				transition: 1s;
				cursor: pointer;
			}
			a:hover{
				text-decoration: underline;
				color: blue;
				font-weight: bold;
				transition: 1s;
			}
			nav{
				background-color: white;
				display: flex;
				height:8vh;
				width: 100vw;
				max-height: 50px;
				padding: 5px 10px 5px 10px;
				box-shadow: 0px 4px 10px 0px rgb(230,230,230);
				text-align: center;
				align-items: center;
				margin-bottom: 20px;
				position: fixed;
				top: 0;
				z-index: 100;
			}
			@media screen and (max-width: 520px) {
				.wholebody{
					flex-direction: column;
				}
				.timeline{
					width: 100vw;
				}
			}
			.handbook{
				color: blue;
				justify-content: flex-start;
				font-size: 1.2em;
				float: left;
			}
			.navtools {
				display: flex;
				width: 24%;
				height: 30px;
				position: absolute;
				top: 7px;
				margin-top: 0px;
				text-align: right;
				align-items: center;
				justify-content: center;
				margin-right: 2vw;
				margin-left: 50vw;
				background-color: white;
				border-radius: 20px;
				border: 1px solid cyan;
				padding:  5px;
				transition: 0.2s;
			}
			.navtools:hover{
				border: 1px solid blue;
				transition: 0.5s;
			}
			.searchform{
				display: flex;
				align-items: center;
				justify-content: center;
				width: 100%;
				position: absolute;
				top: 5px;
			}
			.navtools input{
				position: relative;
				outline: none;
				border-radius: 15px;
				border:  0px solid grey;
				padding: 5px;
				width: 85%;
			}
			.navtools img{
				position: relative;
				margin-right: 5px;
			}
			.littlethings{
				display: flex;
				align-items: center;
				justify-content: space-around;
				float: right;
				height: 6vh;
				padding: 0px 5px;
				width: 300px;
				position: absolute;
				left: calc(calc(50vw + 28%) - 120px);
				background-color: transparent;
			}
			.extras{
				width: 40%;
				border: 0px solid black;
				height: inherit;
				align-items: center;
				justify-content: space-around;
				list-style-type: none;
			}
			li{
				float: left;
			}
			.extras img{
				position: relative;
				top: -5px;
				width: 20px;
				height: auto;
				margin: 10px;
			}
			.entire_notificationopen{
				min-height: 400px;
				padding: 0px 10px;
			}
			.entire_notification{		
				border-radius: 10px;
				position: fixed;
				overflow: scroll;
				top: 72px;
				width: 370px;
				height: 0px;
				display: flex;
				flex-direction: column;
				left: 65vw;
				padding: 0px 10px;
				box-sizing: border-box;
				background-color: #fff;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				z-index: 999;
				transition: min-height 0.7s;
			}
			.a_notif{
				display: flex;
				padding: 5px 0px;
				margin-bottom: 10px;
				jusitify-content: center;
				width: 100%;
				height: fit-content;
				border-bottom: 1px solid #b9b0b1;
			}
			.icon{
				width: 50px;
				height: 50px;
				border-radius: 50%;
				background-color: yellow;
				margin-right: 10px;
			}
			.details{
				width: calc(100% - 60px);
				padding-right: 10px;
			}
			.profilepic{
				position: absolute;
				top: 5px;
				left: 90%;
				float: right;
				border-radius: 50%;
				height: 50px;
				width: 50px;
				background-color: blue;
				background-image: url(graphics/my_portrait.jpg);
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				margin-right: 10px;
				cursor: pointer;
			}
			.settingsdropdown{
				border-radius: 10px;
				position: fixed;
				overflow: hidden;
				top: 72px;
				left: 71%;
				width: 28%;
				max-height: 0;
				box-sizing: border-box;
				padding: 0px 10px;
				background-color: #fff;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				z-index: 999;
				transition: max-height 0.3s;
			}
			.settingsdropdownopen{
				max-height: 350px;
				padding: 10px 10px;
			}
			.settingsdropdown.profilepic .dropdown{
				width: 30px;
				height: 30px;
				background-image:  url(graphics/my_portrait.jpg);
				background-position: center;
				background-size: cover;
			} 
			.aindropdown{
				display: flex;
				width: 100%;
				height: fit-content;
				align-items: center;
				justify-content: center;
				border-bottom: 1px solid grey;
			}
			.bindropdown, .cindropdown, .dindropdown, .eindropdown{
				position: relative;
				align-items: center;
				height: 45px;
				justify-content: center;
				border-bottom: 1px solid grey;
				padding: 5px 10px;
				align-content: center;
				text-align: left;
				vertical-align: middle;
			}
			.wholebody{
				background-color: #FBFCFC;
				display: flex;
				width: 97vw;
			}
			
			.timeline{
				float: left;
				background-color: #FBFCFC;
				height:fit-content;
				width:69vw;
				display: flex;
				flex-direction: column;
				margin-right: 10px;
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
			.iconsinpost{
				display: flex;
				width: 100%;
				height: 30%;
				margin-top: 0px;
				background-color: white;
			}
			.iconsinpost img{
				margin-right: 10px;
				width: 20px;
				height: 15px;
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
			.suggestions{
				float: right;
				background-color: #FBFCFC;
				border-radius: 5%;
				height:fit-contents;
				width:29vw;
				padding: 3px 10px 3px 3px;
				margin-left: 10px;
				margin-top: 60px;
			}
			.asuggestion{
				display: flex;
				background-color: white;
				width: 95%;
				height: fit-contents;
				align-items: center;
				margin-top: 10px;
				border-radius: 15px;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				justify-content: center;
			}
			.suggestionprofilepic{
				float: left;
				border-radius: 50%;
				height:100px;
				width: 110px;
				margin-left: 15px;
				background-color: blue;
				background-image: url(graphics/friend1.jpg);
				background-size: cover;
				background-repeat: no-repeat;
			}
			.suggestioninfo{
				float: right;
				width: 70%;
				text-align: left;
				margin-left: 20px;
			}
			.connectbutton{
				border:1px solid blue; 
				background-color: white;
				border-radius:10px; 
				height: 35px;
				width: 100px;
				}
			.asuggestion button:hover{
				border:none;
				background-color: blue;
				color: white;
				transition: .4s;
			}
			.moresuggestions, .moreposts{
				background-color: blue;
				color: white;
				width: 100%;
				height: 40px;
				margin-top: 15px;
				border: 0px;
				border-radius: 8px;
			}
			.timelineposts{
				width: 90%;
				height: fit-content;
				background-color: transparent;
				margin-left: 20px;
				padding: 0px 0px 10px 0px;
			}
			.latest, .suggestionstext{
				font-size: 1.2em;
				color: blue;
				margin-left: 10px;
			}
			.atimelinepost,.atimelinepost-withpic{
				position: relative;
				width: 100%;
				height: fit-content;
				margin-left: 0px;
				margin-bottom: 15px;
				padding: 10px 10px 10px 10px;
				background-color: white;
				box-shadow: 0px 0px 20px rgb(230,230,230);
				border-radius: 15px;
			}
			.atimelinepost-withpic{
				height: 29vw;	
			}
			.whoposted{
				display: flex;
			}
			.postedpic{
				position: absolute;
				float: left;
				width: 48%;
				height: 28vw;
				align-self: center;
				border-radius: 10px;
				margin-right: 20px;
				background-image: url(graphics/bg1.jpg);
				background-size: cover;
				background-position: center;
			}
			.otherpostdetails{
				float: right;
				width: 48%;
				height: fit-content;
				margin-left: 20px;	
			}
			.postersprofilepic{
				width: 40px;
				height: 40px;
				margin-left: 5px;
				margin-right: 5px;
				border-radius: 50%;
				background-image: url(graphics/bg2.jpg);
				background-size: cover;
				background-repeat: no-repeat;
			}
			.whatthepersonpostedtl{
				color: black;
				margin-left: 20px;
				margin-top: 10px;
			}
			.whatthepersonposted1{
				color: black;
				font-size: .9em;
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
		
			.profilepicdropdown{
				float: left;
				width: 65px;
				height: 65px; 
				background-color: blue;
				background-image: url(graphics/my_portrait.jpg);
				background-position: center;
				background-size: cover;
				margin-right: 10px;
				margin-left: 5px;
				border-radius: 50% ;
			}
			.menuicon{
				position: absolute;
				top: 10px;
				left: 95%;
				cursor: pointer;
			}
			footer{
				background-color: linear-gradient (90deg,rgb(216, 216, 216),grey);
				width: 93vw;
				height: 10%;
				margin-top: 50px;
				padding: 20px;
				text-align: center;
				align-items: center;
				justify-content: center;
			}
			.entiremenu{
				position: fixed;
				top: 380px;
				left: 50vw;
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
			.suggestiontext{
				color:blue; margin-left: 10px; font-size: 1.7vw;
			}
			.suggestioninfo h3{
				font-size: 1.5vw;
			}


			@media screen and (max-width: 700px){
				.wholebody{
					width: 97vw;
					flex-direction: column;
					align-items: center;
				}
				nav{
					display: flex;
					justify-content: flex-end;
				}
				nav p .handbook{
					font-size: 0.8em;
					justify-content: flex-start;
				}
				.navtools {
					position: relative;
					left: 50px;
					top: -3px;
					align-self: center;
					margin-left: 20px;
				}
				.littlethings{
					position: relative;
					display: flex;
					left: -2vw;
					align-items: center;
					width: 200px;
					height: 30px;
				}
				.settingsdropdown{
					position: fixed;
					width: 50vw;
					min-width: 300px;
					top: 17%;
					left: 35vw;
				}
				.extras{
					width: 150px;
					justify-content: space-around;
				}
				.extras img{
					height: 20px;
					width: auto;
				}
				.profilepic{
					position: relative;
					margin: 0px;
					top: -1px;
					left: -40px;
					height: 40px;
					width: 40px;
					align-self: center;
					align-items: flex-end;
					box-sizing: border-box;
				}
				.timeline{
					width: 90vw;
				}
				.suggestions{
					width: 90vw;
				}
				.timelinepost{
					width: 90%;
					height: fit-content;
				}
				.postactions{
					position: absolute;
					top: 85%;
					left: 60vw;
					width: 170px;
					height: 40px;
				}
				.latest, .suggestionstext{
					font-size: 16px;
					color: blue;
					margin-left: 10px;

				}
				.menuicon{
					position: absolute;
					top: 10px;
					left: 90%;
					cursor: pointer;
				}
				.postbutton{
					margin-left: 80%;
				}
				.suggestions{
					margin-top: 0px;
				}
				.suggestioninfo h3{
					font-size: 18px;
				}
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
					<button type="submit" name="submit-search" style="background-color: transparent; border: none; outline: none;"><img src="graphics/searchicon.png" style="height: 20px; margin-top: 7px; margin-left: 5px;"/></button>
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
					<img src="graphics/menu.png" class="menu_icon" style="justify-content: flex-end; margin-left: 55%; ">
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
				<a href="user_profile_connections.php" style="color: black; font-weight: 400; font-size: 1.0EM;">
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
			</form>
		</div>

		<div class="wholebody">
			<div class="timeline">
				<div class="yourpost">
					<form method="POST" action='post_process.php' style="padding: 5px; margin-bottom: 0px;">
						<textarea rows="100" name="post" type="text" placeholder="Make a Post..."></textarea>
						<input type="file" name="post_file" enctype="multipart/form-data" style="width: 40%;">
						<input class="postbutton" name="submit" type="submit" value="Post"> 
					</form>

					<?php
						if (isset($_GET["error"])) {
									if($_GET["error"] == "emptypost") {
										echo "<b>" ."<i>Please, add a post!</i>". "</b>";
									}
								}
					?>
				</div>

				<p class="latest" ><b> Latest</b>

				<div class="timelineposts">
					<?php
						getPostsOntl($conn);		
					?>

					<!--<div class="atimelinepost">
						<div class="whoposted">
							<div class="postersprofilepic">

							</div>
							<div class="postersname">
								<b>David McVinci</b><br>
								<span>August 22, 2021- 18:00pm</span>
							</div>
						</div>

						<div class="whatthepersonposted">
							<p>This is just a sample post from a very happy user who is just excited to be on Handbook. Nothing special. Just gonna add a few more words to see what will happen. Maybe like twenty more pointless words.</p>
						</div>

						
					</div>

					<div class="atimelinepost-withpic" >
							<a href="graphics/bg1.jpg" data-lightbox="hd1" >
								<div class="postedpic" onclick="clickedpostpic()">
								</div>
							</a>
							<div class="otherpostdetails">
								<div class="whoposted">
									
									<div class="postersprofilepic">

									</div>

									<div class="postersname">
										<b>David McVinci</b><br>
										<span>August 22, 2021- 18:00pm</span>
									</div>
								</div>

								<div class="whatthepersonposted1">
									<p>This is just a sample post from a very happy user who is just excited to be on Handbook. Nothing special. Just gonna add a few more words to see what will happen. Maybe like twenty more pointless words.</p>
								</div>
							</div>

							<div class="postactions">
								<span class="commentspan">Comment | </span> 
								<button class="likebutton">Like</button>
								<button class="lovebutton">Love</button>

							</div>
					</div>-->

					<a href="homepage.php">
						<button class="moreposts" style="cursor: pointer;" >
							<b>See More </b>
						</button>
					</a>
				</div>
			</div>

			<div class="suggestions">
				<p class="suggestionstext" ><b> Suggestions</b>
				<center>
					<div class="asuggestion">
						<div class="suggestionprofilepic">
						
						</div>
						<div class="suggestioninfo">
							<h3> Jacob Jones
							<br >
							<span style="color: blue; font-size: 13px; font-weight: normal;"> Creative Designer </span>
							<br />
							<br />
							<button class="connectbutton"> <b>Connect</b> </button>
						</div>
					</div>

					<div class="asuggestion">
						<div class="suggestionprofilepic">
						
						</div>
						<div class="suggestioninfo">
							<h3 > Dominic Pierre
							<br >
							<span style="color: blue; font-size: 13px; font-weight: normal;">I eat Bugs in my code </span>
							<br />
							<br />
							<button class="connectbutton"> <b>Connect</b> </button>
						</div>
					</div>

					<div class="asuggestion">
						<div class="suggestionprofilepic">
						
						</div>
						<div class="suggestioninfo">
							<h3 > Daniella Cubbs
							<br >
							<span style="color: blue; font-size: 13px; font-weight: normal;"> Hello, there </span>
							<br />
							<br />
							<button class="connectbutton"> <b>Connect</b> </button>
						</div>
					</div>

					<a href="suggestions.php">
						<button class="moresuggestions">
							<b>More Suggestions</b>
						</button>
					</a>
				</center>
			</div>
		</div>
				
		<footer>
			<p>Copyright reserved by Handbook.<br> Design by McVinci- 2022</p>
		</footer>

	</body>

	<script type="text/javascript" src="javascript/settingsdropdown.js"></script>
	
<html>