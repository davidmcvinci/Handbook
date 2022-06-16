<html>
    <head>
        <title>
           Handbook | Welcome
        </title>
        <link rel="icon" href="graphics/logo.png">
		
		<link rel="preconnect" href="https://fonts.googleapis.com"> 
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&family=Poppins:wght@200;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="lightbox.min.css">

        <style>
			*{
				font-family: Montserrat;
				font-weight: bold, semibold, regular;
			}				
			body{
				margin: 0px;
			}
           .wholebody{
			   width: 100vw;
			   height: 100vh;
			   background-image: url(graphics/bg3.jpg);
			   background-repeat: repeat-x;
			   background-position: center;
               background-size: cover;
			   transition: 2s ease-in;
            }
			.wholebody:before{
				width: 100vw;
			   	height: 100vh;
				position: absolute;
				content:'';
				background: linear-gradient(45deg, #020245, transparent);
				opacity: 0.8;
				background-blend-mode: multiply;
				transition: .7s ease-in;
			}
            a{
				text-decoration: none;
				color: blue;
				transition: 1s;
			}
			a:hover{
				transition: 1s;
				text-decoration: underline;
				color: blue;
				font-weight: bold;
			}
            label{
                color: #545152;
            }
            .entireform{
				float: right;
				width:30vw;
                min-width: 350px;
				height: fit-contents;
				margin-bottom: 100px;
				margin-left: 55vw;
				border-radius:10px;
				position:absolute;
				top: 15vh;
				left: 20px;
				border: 0.1px solid cyan;
				background-color: white;
				opacity: 0.3;
				padding: 20px;
				transition: 1s;
			}
			.entireform:hover{
				border:none;
				background-color: white;
				opacity: .9;
				box-shadow: 0px 0px 20px rgba(0,0,0,20%);
				transition: 1s;
				padding: 30px;
			}
            @media screen and (max-width: 350px) {
                align-items: center;
                justify-contents: center;
            }
            form{
				box-sizing: border-box;	
			}
			form .txt_field{
				position: relative;
				border-bottom: 1px solid black;
				margin: 30px 0; 
			}
			.txt_field input{
				height: 40px;
				width: 100%;
				font-size: 20px;
				padding: 0 5px;
				border: none;
				outline: none;
				font-size: 16px;
				background-color: transparent;
			}
			.txt_field label{
				position: absolute;
				top: 50%;
				left: 5px;
				font-weight: normal;
				font-size: 20px;
				transform: translateY(-50%);
				transition: .5s;
				
			}
			.txt_field span::before{
				content:' ';
				position: absolute;
				top: 40px;
				left: 0;
				width: 0%;
				height: 2px;
				background: blue;
				transition: .5s;
			}
			.txt_field input:focus ~ label,
			.txt_field input:valid ~ label{
				top: -5px;
			}
			.txt_field input:focus ~ span::before,
			.txt_field input:valid ~ span::before{
				width: 100%;	
			}
            
            #signup{
				background-color: blue;
				color: white;
				padding: 10px;
				width: 90%;
				height: 50px;
				border: none;
				border-radius: 10px;
				transition: .5s;
				font-weight: bold;
				font-size: 20px;
			}
			#signup:hover{
				background-color:transparent;
				color: blue;
				border: 1px solid blue;
				transition: .5s;
				cursor: pointer;
			}
			h4{
				color: white;
			}
			.wholebody{
				height: 100%;
				width: 100%;
				display: flex;
				align-items: center;
			}
			.textdiv{
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				width: 48vw;
				position: relative;
				padding: 20px;
				margin: 10px;
				margin-left: 20px;
				height: 450px;
			}
			.firsttext{
				height: fit-content;
				width: 50vw;
			}
			.intro{
				height: fit-content;
				width: fit-content;
			}
			.turanchi{
				float: left;
				margin-top: 30px;
				margin-left: 10px;
				margin-bottom: 40px;
				color: white;
				font-weight: bold;
				font-size: 3.1em;
				text-align: left;
				clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
				transition: .8s;
			}
			.turanchi:hover{
				color: cyan;
				transition: .8s;
				font-size:3.3em;
				cursor: pointer;
			}
			.introparagraph{
				color: white;
				font-size:1.2em;
				margin-top: 20px;
				text-align: left;
			}
			.introparagraph1{
				color: white;
				margin-top: 15px;
				text-align: left;
				font-size: 1.1em;
			}
			.arrowhead{
				width: 15px;
				height: 20px;
				position: relative;
				top: -67px;
				left: 250px;
			}
        </style>
    </head>

    <body>
		<div class="wholebody">
			<div class="textdiv">
					<div class="firsttext">
						<h4 style="margin-left: 10px;">Handbook</h4>
						<header class="turanchi"> Connect with people <br>that matter. </header>
					</div>

					<div class="intro">
						<p class="introparagraph1" > An easy-to-use online platform to enable you communicate
						with your friends and family from...well, anywhere.
						<p class="introparagraph" style="margin-top:40px;font-family: 'Dongle', sans-serif;"><b>Join The Community Now</b></p>
						<div style="position: relative;">
							<img class="arrowhead" style="position: absolute; top: -39px;" src="graphics/arrowhead.png" />
						</div>
					</div>
			</div>

			<div class="entireform">
						<center>
							<form action="signup_process.php" method="post">
								<div class="txt_field">
									<input id="username" name="uid" type="text" required>
									<span></span>
									<label> Name</label>
								</div>
											
								<div class="txt_field">
									<input id="password" name="pwd" type="password" required>
									<span></span>
									<label> Password</label>
								</div>

								<div class="txt_field">
									<input id="rptpassword" name="pwdRepeat" type="password" required>
									<span></span>
									<label> Confirm Password</label>
								</div>
							
								<div class="signupandothers">
									<input id="signup" type="submit" name="submit" value="Sign Up" >
								</div>
								<p><a href="login.php">Log In</a>
							</form>

							<?php
								if (isset($_GET["error"])) {
									if($_GET["error"] == "invalidusername") {
										echo "<b>Invalid Username!</b>";
									}
									else if($_GET["error"] == "passwordsdontmatch") {
										echo "<em>Passwords do not match!</em>";
									}
									else if($_GET["error"] == "stmtfailed") {
										echo "<em>Couldn`t sign you up. Please, try again!</em>";
									}
									else if($_GET["error"] == "usernametaken") {
										echo "<em>Try using a different username!</em>";
									}
									else if($_GET["error"] == "none") {
										echo "<em>You have successfully signed up!</em>";
									}
								}
							?>
						</center>
			</div>
		</div>
    </body>


</html>