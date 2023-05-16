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
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
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
            width: 600px;
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
    <form id="SignupForm" method="post" enctype="multipart/form-data">
        <input type="text" name="id" placeholder="ID" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password" placeholder="Password Check" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="email" placeholder="Email Address" required>
        <input type="text" name="birth" placeholder="Birth Date for event" required>
        <input type="text" name="number" placeholder="Phone Number" required>
        <input type="text" name="address" placeholder="Address" required>
        <button type="submit" onclick="submitForm()">SIGN UP</button>
        <div class="pt-2"></div>
        <button style="background-color: #555555;" onclick="location.href = '/index.php'">CANCEL</button>
    </form>
</div>
</body>
</html>

<script>
    function submitForm() {
        var form = $("#SignupForm");
        var formData = new FormData(form[0]);
        formData.append("mode", "signup");

        $.ajax({
            type : "POST",
            url : "save.php",
            data : formData,

            contentType : false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData : false, // NEEDED, DON'T OMIT THIS
            enctype: 'multipart/form-data',

            success : function(response) {
                alert(response);
                if(response ="Success"){
                    alert("SIGN UP Success");
                    window.location.href = "./index.php";
                }else{
                    alert(response);
                }


            },
            error : function(xhr, status, error) {
                alert("에러 발생: " + error);
            }
        });
    }
</script>

