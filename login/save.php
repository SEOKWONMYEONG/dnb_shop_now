<?php
include $_SERVER['DOCUMENT_ROOT']."/config/dbcon.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/common.php";
session_start();

$mode = $_POST['mode'];


if($mode == "login"){
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    if (empty($memberDetail)){
        $response = array(
            'status' => 'Failed',
            'message' => "Invalid ID"
        );
    }else{

        $password_hash = hash("sha256", $password);

        // 로그인 정보 가져오기
        $sql_login = "SELECT * FROM member where id ='$username' and password = '$password_hash'";
        $result_login = mysqli_query($conn,$sql_login);

        $memberDetail = array();
        $memberDetail = mysqli_fetch_assoc($result_login);

        if(empty($memberDetail)){
            $response = array(
                'status' => 'Failed',
                'message' => "Invalid Password"
            );
        }else{
            $_SESSION['id'] = $memberDetail['id'];
            $_SESSION['username'] = $memberDetail['name'];
            $_SESSION['isAdmin'] = $memberDetail['isAdmin'];
            $response = array(
                'status' => 'Success',
                'message' => "Welcome To Dal&Byeol"
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}elseif ($mode == "signup"){
    $memberDetail = array();
    $memberDetail = $_POST;

    $password = $memberDetail['password'];
    $password_hash = hash("sha256", $password);

    $sql = "INSERT INTO member (id,password,name,birth,number,address,email,regdate) VALUES ('$memberDetail[id]','$password_hash','$memberDetail[username]','$memberDetail[birth]','$memberDetail[number]','$memberDetail[address]','$memberDetail[email]',NOW())";
    mysqli_query($conn,$sql);

    $response = array(
        'status' => 'Success',
        'message' => "Complete Sign Up"
    );
    // JSON 형식으로 응답
    header('Content-Type: application/json');
    echo json_encode($response);
}elseif ($mode == "checkid") {
    $memberDetail = array();
    $memberDetail = $_POST;

    $sql = "SELECT COUNT(*) AS count FROM member where id = '$memberDetail[id]'";
    $result = mysqli_query($conn,$sql);

    $memberCount = mysqli_fetch_assoc($result);

    if($memberCount['count'] == 0){
        $response = array(
            'status' => 'Success',
            'message' => "Available ID, Proceed with Registration "
        );
    }else{
        $response = array(
            'status' => 'Failed',
            'message' => "Used Id "
        );
    }

    // JSON 형식으로 응답
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>