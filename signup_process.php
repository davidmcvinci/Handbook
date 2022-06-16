<?php
    
    if (isset($_POST["submit"])) {
     
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdRepeat"];

        require_once 'db_connect.php';
        require_once 'functions.php';

        if(invalidUid($username) !== false) {
            header("location: index.php?error=invalidusername");
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: index.php?error=passwordsdontmatch");
            exit();
        }

        if(uidExists($conn, $username) !== false) {
            header("location: index.php?error=usernametaken");
            exit();
        }

    createUser($conn, $username, $pwd);


    }
    else{
        header("location:index.php");
        exit();
    }