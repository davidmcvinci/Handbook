<?php

    //include_once ("post_process.php");

    function invalidUid($username) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat) {
        $result;
        if ($pwd !== $pwdRepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function uidExists($conn, $username) {
       $sql = "SELECT * FROM users WHERE usersUid = ?;";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location:index.php?error=stmtfailed");
            exit();
       }

       mysqli_stmt_bind_param($stmt, "s", $username);
       mysqli_stmt_execute($stmt);

       $resultData = mysqli_stmt_get_result($stmt);

       if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
       }
       else{
           $result = false;
           return $result;
       }

       mysqli_stmt_close($stmt);
    }

    function createUser($conn, $username, $pwd) {
        $sql = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("location:index.php?error=stmtfailed1");
             exit();
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt);
        header("location: login.php?error=none");
        exit();
    }

    function loginUser($conn, $username, $pwd) {
        $uidExists = uidExists($conn, $username, $pwd);

        if ($uidExists === false) {
            header("location: login.php?error=Usernamedoesntexist");
            exit();
        }

        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd === false) {
            header("location: login.php?error=wrongpassword");
            exit();
        } 
        else if($checkPwd === true) {
            session_start();
            $_SESSION["userid"] =  $uidExists["usersId"];
            $_SESSION["userUid"] =  $uidExists["usersUid"];
            header("location: homepage.php?");
            echo 'Hi' . $_SESSION["userUid"];
            exit();
        }   
    }

    function emptyInputLogin($username, $pwd) {
        $result;
        if (empty($username) || empty($pwd)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function create_postid () {
            $length = rand(4,19);
            $number = "";
            for ($i=0; $i < $length; $i++) {
                # code...
                $new_rand = rand(0,9);

                $number = $number . $new_rand;
            }
            return $number;
    }
    
    function getPostsOntl($conn) {
        $postid = create_postid();
        $sql = "SELECT * FROM posts order by id desc ";
        $result = $conn->query($sql);
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

                    $postid = $row['postid'];
                    if ($row['userid'] == $_SESSION["userid"]) {
                        echo "<img src='graphics/menu.png' class='menuicon' onclick='menuaction()'>";
                        echo "<div class='entiremenu'>
                                <form class='first' method='POST' action='editPost.php'>
                                    <input type='hidden' name='id' value='".$row['userid'] ."'>
                                    <input type='hidden' name='uid' value='".$row2['usersUid'] ."'>  
                                    <input type='hidden' name='postid' value='".$row['postid'] ."'>    
                                    <input type='hidden' name='date' value='".$row['date'] ."'> 
                                    <input type='hidden' name='message' value='".$row['post'] ."'> 
                                    <button type='submit'>Edit</button>       
                                </form>
                        
                                <div class='second'>
                                    <form class='first' method='POST' action='deletePostsOntl.php'>
                                        <input name='postid' value='".$row['postid'] ."'>
                                        <button type='submit'>Delete</button>
                                    </form>
                                </div>
                        </div>";
                    }else{
                        //this is there I can add the menu for posts thats not yours like share, hide, report, etc
                    }
                   // echo $postid;
                echo "</div>";    
                
            }   
        }      
    }

    function editPostsOntl($conn){
        if (isset($_POST['editpostbutton'])) {
            $id = $_POST['id'];
            $uid = $_POST['uid'];
            $post_id = $_POST['post_id'];
            $date = $_POST['date'];
            $message = $_POST['post'];

            $sql = "UPDATE posts SET post= '$message' WHERE userid= $id and postid= $post_id ";
            $result = $conn->query($sql);
            header("Location: homepage.php");
        }
    }

    function editPostsOnProfile($conn) {
        if (isset($_POST['editpostbutton'])) {
            $id = $_POST['id'];
            $uid = $_POST['uid'];
            $post_id = $_POST['post_id'];
            $date = $_POST['date'];
            $message = $_POST['post'];

            $sql = "UPDATE posts SET post= '$message' WHERE userid= $id and postid= $post_id ";
            $result = $conn->query($sql);
            header("Location: user_profile.php");
        }
    }
    
    /*function likes() {
        $session = $_SESSION["userid"];
        $postid = "111688";
        $result = mysqli_query("SELECT * FROM posts WHERE userid = '1' AND postid = $postid "); 
            
            while ($row = $result->fetch_assoc()) {
                if (mysql_num_rows($result) == 1){
                    echo "<button class='likebutton'>Like</button>";
                }else{
                    echo "wahallaaa";
                }
            }
    }*/

    function displaypostonProfile($conn) {
        $session = $_SESSION["userid"];

        $sql = "SELECT * FROM posts where userid = $session order by id desc ";
        $result = $conn->query($sql);

        
        while ($row = $result->fetch_assoc()) {
            $id = $row['userid'];
            $sql2 = "SELECT * from users where UsersId='$id'";
            $resulta = $conn->query($sql2);
           
            if ($row2 = $resulta->fetch_assoc()) {
                echo "<div class='atimelinepost'><p>";
                    echo "<div class='whoposted'>";
                        echo "<div class='postersprofilepic'>";
                        echo "</div>";

                        echo "<div class='postersname'><p>";
                            echo "<b>". $row2['usersUid']. "</b>". "<br>";
                            echo "<span>". $row['date']. "</span>";
                        echo "</div>";
                     echo "</div>";


                    echo "<div class='whatthepersonposted'>";
                        echo nl2br($row['post']);
                    echo "</div>";

                    echo "<div class='postactions'>
                             <span class='commentspan'>Comment | </span> 
                             <button class='likebutton'>Like</button>
                          </div>";
                    
                    echo "<img src='graphics/menu.png' class='menuicon' onclick='menuaction()'>";

                    echo "<div class='entiremenu'>
                    <form class='first' method='POST' action='editPostOnProfile.php'>
                        <input type='hidden' name='id' value='".$row['userid'] ."'>
                        <input type='hidden' name='uid' value='".$row2['usersUid'] ."'>  
                        <input type='hidden' name='postid' value='".$row['postid'] ."'>    
                        <input type='hidden' name='date' value='".$row['date'] ."'> 
                        <input type='hidden' name='message' value='".$row['post'] ."'> 
                        <button type='submit'>Edit</button>       
                    </form>
            
                    <div class='second'>
                        <form class='first' method='POST' action='deletePostsOnProfile.php'>
                            <input name='postid' value='".$row['postid'] ."'>
                            <button type='submit'>Delete</button>
                        </form>
                    </div>
            </div>";
                echo "</div>";
            }
        } 
    }
