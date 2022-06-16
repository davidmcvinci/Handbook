
<?php
	include_once 'db_connect.php';
?>

<html>
	<head>
		<title>
			Handbook- Log In
		</title>
	
		<style type="text/css">
			*{
				font-family:"Segoe UI";
				font-weight:"bold, light";
			}
			body{
				background: linear-gradient(240deg, #f1f1f1, white);
			}
			a{
				text-decoration: none;
				color: blue
			}
			.handbooktext{
				color: blue;
			}
			.entireform{
				width:400px;
				height: fit-contents;
				margin-bottom: 100px;
				border-radius:20px;
				position:relative;
				top: 30px;
				border: 0px solid blue;
				background-color:white;
				padding: 20px;
				transition: 1s;
			}
			.entireform:hover{
				border:none;
				box-shadow: 0px 0px 10px rgba(0,0,0,20%);
				transition: 1s;
				padding: 30px;
			}
			#turanchi {
				position:relative;
				top: 50px;
			}
			.loginandothers{
				margin-top: 50px;
			}
			.signintalk{
				font-size:20px;
				position:relative;
				top:-20px;
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
			#login{
				background-color: blue;
				color: white;
				padding: 10px;
				width: 80%;
				height: 50px;
				border: none;
				border-radius: 15px;
				transition: .5s;
				font-weight: bold;
				font-size: 20px;
			}
			#login:hover{
				background-color: white;
				color: blue;
				border: 1px solid blue;
				transition: .5s;
				cursor: pointer;
			}
			.loginandothers a:hover{
				text-decoration: underline;
				font-size: 17px;
			}
			
		</style>
	</head>
	
	<body>
		<center>
			<div id="turanchi">
				<h1 class="handbooktext"> Handbook</h1>
				<p class="signintalk">Sign in to your Handbook Account
			</div>
			
			<div class="entireform">
				
				<form action="login_process.php" method="post">
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
				
				
					<div class="loginandothers">
						<input id="login" name="submit" type="submit" value="Login">
					
						<p><a href="index.php">Create Account</a> | <a href="passwordreset.html"> Forgot Password</a>
					</div>
				</form>
				<?php
							if (isset($_GET["error"])) {
								if($_GET["error"] == "Usernamedoesntexist") {
									echo "<em>User not found!</em>";
								}
								else if($_GET["error"] == "wrongpassword") {
									echo "<em>Incorrect Password!</em>";
								}
								else if($_GET["error"] == "none") {
									echo "<em>Welcome Back!</em>";
								}
								else if($_GET["error"] == "loggedout") {
									echo "<em>Successfully Logged Out!</em>";
								}
							}
						?>
			</div>
			

		</center>
	</body>
</html>