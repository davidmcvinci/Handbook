<HTML>
<head>
	<link rel="icon" href="logo.png">
	<title>
		Handbook
	</title>
	

	<style>
		*{
			font-family:"Segoe UI";
			font-weight: Bold, normal;	
			
		}		
		body{
		   /* padding:10px;*/
		}
		a{
			text-decoration: none;
		}
		.react,.comment{
		    text-decoration:none;
		    color:blue;
		    font-size:20px;
		    font-weight:bold;
		}
		.menubar{
			background-color: white;
			width: 100%;
			height: 40px;
			align-items: center;
			padding: 5px;
			margin-bottom:10px;
		}
		.facebook{
			color: blue;
			font-size: 30px;
			font-weight: bold;
			position: absolute;
			top: 0px;
			left: 20px;
		}
		.menubutton{
			border-radius: 250px;
			background-color: blue;
			height: 50px;
			width: 50px;
			position: absolute;
			top: 15px;
			left: 90%;
		}
		.menupic{
		    height:50px;
		    width:50px;
		    object-fit: cover;
		    border-radius:50%;
		}
		.whatthepersonposted{
			font-family: "Segoe UI";
		}
		.yourpostbar{
			width: 100%;
			height: 170px;
			max-height:120px;
			padding: 5px;
			display: flex;
			align-content: center;
			border-radius: 5px;
		}
		.yourpostpicture{
			width: 120px;
			height: 130px;
			border-radius: 5%;
			background-color: blue;
			float: left;
		}
		.yourbigpic{
			width: 120px;
			height: 130px;
		    object-fit:cover;
		    border-radius:10%;
		}
		.yourpost{
			min-width: 50px;
			width: 100%;
			height:120px;
			float:right;
		}
		.yourpostbox{
			font-size: 15px;
			font-family: "Segoe UI";
			margin-left: 5px;
			margin-right: 10px;
			margin-bottom:10px;
			color: grey;
			outline:none;
			height: 80px;
			width: 98%;
			box-sizing: border-box;
			border-radius: 10px;
			border: 1px solid grey;
			padding: 5px;
		}
		.yourpostbutton{
			height:40px;
			width: 98%;
			font-weight:bold;
			background-color:blue;
			color: white;
			border: none;
			margin-left: 5px;
			margin-right: 10px;
			border-radius:4px;
		}
		.yourpostbutton:hover{
			border: 1px solid blue;
			background-color: white;
			color: blue;
			font-weight: bold;
		}
		.posttext{
			font-size: 10px;			
		}
	
		.timeline{
			display: flex;
			width: 100%;
		/*	flex-direction: row;*/
			background: linear-gradient(45deg, rgb(241, 241, 241), white);
			height: fit-contents;
			padding: 5px;
			position:relative;
			top: 15px;
			
		}
		.menu{
			background-color: white;
			width: 22vw;
			min-width:30px;
			height:100%;
			border-radius: 10px;
			padding: 10px;
			margin-left: 40px;
			box-shadow: 0px 0px 10px rgba(0,0,0,10%);
			
		}
		.allposts{
			padding: 5px;
			width: 70%;
			min-width: 300px;
			height: fit-contents;
			margin-right: 10px;
		}
		.tlpost{
			background-color: white;
			border-radius: 10px;
			height: fit-contents;
			width: 70vw;
			margin-bottom: 10px;
			padding:10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,10%);
		}
			@media screen and (max-width: 650px) {
				.tlpost{
					width:90vw;
				}
				.timeline{
					flex-direction: column;
				}
				.menu{
					margin-left: 5px;
					width: 90vw;
				}
			}
			
		/*	@media screen and (min-width: 520px) {
				.tlpost{
					width:70vw;
				}
				.timeline{
					flex-direction:row;
				}
				.menu{
					width: 22vw;
					margin-left:40px;
				}
			}*/
			
		.postername{
			font-weight: bold;
			font-size: 20px;
		}
		span{
			font-size: 20px;
			color: grey;
		}
		.posterpic{
			border-radius: 50%;
			height: 30px;
			width: 30px;
			float: left;
		}
		.profile,.logout,.settings{
		    color: blue;
		    font-weight: bold;
		    text-decoration:none;
		}
		.afriend{
			display: flex;
			height: 80px;
			align-items:center ;
			margin-bottom: 10px;
			
		}
		.friendspic{
			margin-top: 15px;
			width: 60px;
			height: 80px;
			background-color: blue;
		}
		#friendspicjpg{
			width: 100%;

		}
		.friendsdetails{
			padding: 5px;
		}
		.friendsdetailstext{
			font-size: .95em;
			
			font-weight: bold;
			margin-left: 5px;
		}
		
	</style>
</head>

<body>
	<div class="menubar">
		<p class="facebook"> Handbook
		<div class="menubutton">
			<a href="profile.html">
				<img src="graphics/menu.jpg" class="menupic"/>
			</a>
		</div>
	</div>

	<Hr />

	<div class="yourpostbar">
		<div class="yourpostpicture">
				<img src="graphics/menu.jpg" class="yourbigpic"/>
		</div>

		<div class="yourpost">
			<form action="posts.php">
				<input type="text" placeholder="What`s on your mind?" class="yourpostbox" />
				<input class="yourpostbutton" type="submit" value="Publish Post" />
			</form>
		</div>
	</div>

	<Hr />

	<div class="timeline"> 
		
		<div class="allposts">	
			<div class="tlpost">
				<div class="whoposted">
				<!--in the paragraph below, my php is supposed to get the persons name by itself-->
					<p class="postername"> Mr Maya
				</div>
			
				<div class="whatthepersonposted">
				<!--in the paragraph below, my php is supposed to get the person posted by itself-->
				
					I just want to tell everyone on here that I am very happy to be oppotuned to be a user
					of Handbook. I just want to tell everyone on here that I am very happy to be oppotuned to be a user
					of Handbook. I just want to tell everyone on here that I am very happy to be oppotuned to be a user
					of Handbook 
				</div>

				<Hr />
	
				<div class="reactionsandshii">
					<a href="reactions.html" class="react" ><B>React</B></a> <span>|</span> <a href="comments.html" class="comment" >Comment</a>
				</div>
			</div>

			<div class="tlpost">
				<div class="whoposted">
					<p class="postername"> Derrick Joe
				</div>
			
				<div class="whatthepersonposted">
					<p> I just want to tell everyone on here that I am very happy to be oppotuned to be a user
					of Handbook. I just want to tell everyone on here that I am very happy to be oppotuned to be a user
					of Handbook.	 
				</div>

				<Hr />
	
				<div class="reactionsandshii">
					<a href="reactions.html" class="react" ><B>React</B></a> <span>|</span> <a href="comments.html" class="comment" >Comment</a>
				</div>
			</div>

			<div class="tlpost">
				<div class="whoposted">
					<p class="postername"> Shannon Barry
				</div>
			
				<div class="whatthepersonposted">
				<!-- what the person posted is supposed to reflect dynamically in yhe paragraph below-->
					<p> Handbook is the best, y`all	 
				</div>

				<Hr />
				
				<div class="reactionsandshii">
					<a href="reactions.html" class="react" ><B>React</B></a> <span>|</span> <a href="comments.html" class="comment" >Comment</a>
				</div>
			</div>

		</div>
		
		<div class="menu">
				<a href="friends.html"><b>Your Friends(200)</b></a>
			<center>
			<div class="allfriends">
					<div class="afriend">
						<div class="friendspic">
							<img id="friendspicjpg" src="graphics/friend1.jpg" />
						</div>
						
						<div class="friendsdetails">
						<!--the paragraph below is supposed to link me directly to the php that`ll invoke derrick`s profile-->
							<p class="friendsdetailstext">Derrick Joe</p>
						</div>
					</div>
					
					<div class="afriend">
						<div class="friendspic">
							<img id="friendspicjpg" src="graphics/friend1.jpg" />
						</div>
						
						<div class="friendsdetails">
						<!--each person should have a custom link to his profile(php?)-->
							<p class="friendsdetailstext">Joyce Franklin</p>
						</div>
					</div>
			</div>

			<script>
				function logout_prompt(confirm( )){
                   
				}
			</script>
			<Hr style="margin-top: 30px;">
				<div class="profileandshii">
					<a href="signup.php"action="logout.php" ><b onclick="return confirm('Log out of Handbook?');" style="color:blue;cursor:pointer;"> Logout</b></a> <span>|</span> <a href="settings.html" class="settings">Settings</a></p>
				</div>

			</center>
		</div>
		
		
	</div>	



</body>
</html>