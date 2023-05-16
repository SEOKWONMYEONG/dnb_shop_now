<?php
// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";

//모바일체크
if ($device == "mobile"){
    header("Location: /m/index.php");
}
if(isset($_GET['device'])){
    if ($_GET['device'] == "mobile"){
        header("Location: /m/index.php");
    }
}

//로그아웃
if(isset($_GET['mode'])){
    if($_GET['mode'] == "logout"){
        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }elseif ($_GET['mode'] == "signup"){
        header('Location: signup.php');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
body {
    font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .login-container {
    background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 400px;
      max-width: 100%;
    }

    .login-container h2 {
    text-align: center;
      margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
    width: 100%;
    padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .login-container button {
    width: 100%;
    padding: 10px;
      background-color: #000000;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .login-container button:hover {
    background-color: #333333;
    }

    .login-container p {
    text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="login-container" style="text-align: center">
    <img src="../images/logo.png" class="pb-5">
    <form id="loginForm" method="post" enctype="multipart/form-data">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" onclick="submitForm()">Login</button>
    </form>
    <p>Not registered? <a href="./signup.php">Sign up</a></p>
  </div>
</body>
</html>

<script>
    function submitForm() {
        var form = $("#loginForm");
        var formData = new FormData(form[0]);
        formData.append("mode", "login");

        $.ajax({
            type : "POST",
            url : "save.php",
            data : formData,

            contentType : false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData : false, // NEEDED, DON'T OMIT THIS
            enctype: 'multipart/form-data',

            success : function(response) {
                if(response == "Success"){
                    alert("LOGIN Success");
                    window.location.href = "../index.php";
                }else{
                    alert(response);
                    location.reload();
                }
            },
            error : function(xhr, status, error) {
                alert("에러 발생: " + error);
            }
        });
    }
</script>
