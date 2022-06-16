<?php
        include "functions.php";
        include "db_connect.php";
        
        $postid = $_POST['postid'];

        $sql = "DELETE FROM posts where postid = $postid ";
        $result =  $conn->query($sql);  

        header("Location: homepage.php");
