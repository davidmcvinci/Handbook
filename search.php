<?php
	include_once 'db_connect.php';
	include_once 'functions.php';

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&family=Poppins:wght@200;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="nav_style.css">
    
    <title>
        <?php 
            $searchinfo = $_POST['searchbar'];
            echo " Showing results for ' ".$searchinfo." ' | Handbook ";
        ?>
    </title>

    <style>
        *{
            font-family: Montserrat;
            font-weight: bold, semibold, regular;
        }
        nav{
            margin-bottom: 50px;
        }
        .search_results_column{
            margin-top: 70px;
            padding: 0px 10px;
            height: fit-content;
            width: 80%;
            display: flex;
            position: absolute;
            flex-direction: column;
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
            span{
				font-size: 10px;
				color: grey;
				font-weight: 600;
			}
			span.commentspan{
				font-size: 13px;
				color: grey;
			}
    </style>
</head>

<body>
        <nav>
			<div class="handbook">
				<p class="handbook"><b>Handbook</b>
			</div>

			<?php
                echo "<div class='navtools'>	
                    <form method='post' action='search.php' class='searchform'>
                        <input type='text' name='searchbar' placeholder= '$searchinfo'>
                        <img src='graphics/searchicon.png' style='height: 20px; margin-top: 7px; margin-left: 5px;'/>
                    </form>
                </div>";
            ?>

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
					<img src="graphics/menu.png" class="menu_icon" style="justify-content: flex-end; width: 20px;margin-left: 55%; ">
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

        <div class='search_results_column'>
            <?php
                if (isset($_POST['submit-search'])) {
                    $search = mysqli_real_escape_string($conn, $_POST['searchbar']);
                        $sql = "SELECT * FROM  posts WHERE post LIKE '%$search%' ";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);
                        
                        echo "<h2>Showing Results for  '".$search."' </h2><br>";  
                            
                        if ($queryResult > 0) {
                            echo "". $queryResult." results found";
                            while ($row = $result->fetch_assoc()) {
                                
                                $id = $row['userid'];
                                $sql2 = "SELECT * from users where UsersId='$id'";
                                $resulta = $conn->query($sql2);
                               
                                while ($row2 = $resulta->fetch_assoc()) {
                                    echo "<div class='atimelinepost'><p>";
                                        echo "<div class='whoposted'>";
                                            echo "<div class='postersprofilepic'>";
                                            echo "</div>";
                        
                                            echo "<div class='postersname'>";    
                                                echo "<b>". $row2['usersUid']. "</b>". "<br>";
                                                echo "<span>". $row['date']. "</span>" ."<br>";
                                            echo "</div>";
                                        echo "</div>";
                        
                                        echo "<div class='whatthepersonpostedtl'>";
                                            echo nl2br($row['post']);
                                        echo "</div>";
                        
                                        echo "<div class='postactions'>
                                            <span class='commentspan' >Comment | </span> 
                                            <button class='likebutton' >Like</button>
                                            </div>";
                                    echo "</div>";
                                }
                            }       
                        }else{
                                echo "There are no results matching your search!";
                        }
                } 
                    
            ?>
        </div>

        <script type="text/javascript" src="javascript/settingsdropdown.js"></script>
</body>

</html>