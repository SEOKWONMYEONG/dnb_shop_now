<?php
include $_SERVER['DOCUMENT_ROOT']."/config/dbcon.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/common.php";
session_start();

$mode = $_POST['mode'];

if($mode == "login"){
    $username = $_POST['username'];
    $password =$_POST['password'];

    // 아이디 패스워드 입력 체크
    if($username == ""){
        echo "Please Write ID";
        exit;
    }

    if($password == ""){
        echo "Please Write PASSWORD";
        exit;
    }

    // 로그인 정보 가져오기
    $sql_login = "SELECT * FROM member where id ='$username'";
    $result_login = mysqli_query($conn,$sql_login);

    $memberDetail = array();
    $memberDetail = mysqli_fetch_assoc($result_login);

    if (!isset($memberDetail)){
        echo "Invalid ID";
        exit();
    }

    // 로그인 정보 가져오기
    $sql_login = "SELECT * FROM member where id ='$username' and password = '$password'";
    $result_login = mysqli_query($conn,$sql_login);

    $memberDetail = array();
    $memberDetail = mysqli_fetch_assoc($result_login);

    if (!isset($memberDetail)){
        echo "Invalid Password";
    }else{

        $_SESSION['id'] = $memberDetail['id'];
        $_SESSION['username'] = $memberDetail['name'];

        echo "Success";
    }


exit();

}
?>