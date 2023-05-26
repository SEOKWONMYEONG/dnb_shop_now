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
        .login-container input[type="date"],
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
        <div>
            <input type="text" id="id" name="id" placeholder="ID" style="width: 75%" required><button type="button" style="width: 24%; margin-left: 1%" onclick="checkUsername()">Check</button>
        </div>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="passwordChk" name="passwordChk" placeholder="Password Check" required>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="text" id="email" name="email" placeholder="Email Address" required>
        <input type="date" id="birth" name="birth" placeholder="Birth Date for event" lang="en" required>
        <input type="text" id="number" name="number" placeholder="Phone Number" required>
        <input type="text" id="address" name="address" placeholder="Address" required>
        <button type="button" onclick="submitForm()">SIGN UP</button>
        <div class="pt-2"></div>
        <button style="background-color: #555555;" onclick="location.href = '/index.php'">CANCEL</button>
    </form>
</div>
</body>
</html>

<script>
    var isDuplicateChecked = false; // 중복 체크 여부 변수

    function submitForm() {
        var form = $("#SignupForm");
        var formData = new FormData(form[0]);

        if (formData.get('id') === ""){
            alert('Please Write ID.');
            document.getElementById('id').focus();
            return false;
        }
        if (formData.get('password') === ""){
            alert('Please Write Password.');
            document.getElementById('password').focus();
            return false;
        }
        if (formData.get('password').length < 4){
            alert('Please Write 4 words longer Password.');
            document.getElementById('password').focus();
            return false;
        }
        if (formData.get('passwordChk') === ""){
            alert('Please Write Password Check.');
            document.getElementById('passwordChk').focus();
            return false;
        }
        if (formData.get('username') === ""){
            alert('Please Write Username.');
            document.getElementById('username').focus();
            return false;
        }
        if (formData.get('email') === ""){
            alert('Please Write Email.');
            document.getElementById('email').focus();
            return false;
        }
        if (!isValidEmail(formData.get('email'))) {
            alert("Please Write Right Email");
            document.getElementById('email').focus();
            return false;
        }

        if (formData.get('birth') === ""){
            alert('Please Write Birth.');
            document.getElementById('birth').focus();
            return false;
        }
        if (formData.get('number') === ""){
            alert('Please Write Number.');
            document.getElementById('number').focus();
            return false;
        }
        if (formData.get('address') === ""){
            alert('Please Write Address.');
            document.getElementById('address').focus();
            return false;
        }

        // 비밀번호 확인 체크
        if (formData.get('password') !== formData.get('passwordChk')) {
            alert('Passwords do not match.');
            document.getElementById('password').focus();
            return false; // 폼 전송 중단
        }


        if (!isDuplicateChecked) {
            alert("Please Check ID Duplicate.");
            document.getElementById("id").focus(); // 중복 체크 버튼으로 포커스 이동
            return false; // 폼 전송 중단
        }else{
            formData.append("mode", "signup");

            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                enctype: 'multipart/form-data',
                success: function (response) {
                    if (response['status'] == "Success") {
                        alert(response['message']);
                        window.location.href = "./index.php";
                    } else {
                        alert(response['message']);
                    }
                },
                error: function (xhr, status, error) {
                    alert("에러 발생: " + error);
                }
            });
        }
    }

    function checkUsername() {
        var form = $("#SignupForm");
        var formData = new FormData(form[0]);
        if (formData.get('id') === "") {
            alert('Please Write ID.');
            document.getElementById('id').focus();
            return false;
        }
        formData.append("mode", "checkid");

        $.ajax({
            type: "POST",
            url: "save.php",
            data: formData,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            enctype: 'multipart/form-data',

            success: function (response) {
                if (response['status'] == "Success") {
                    isDuplicateChecked = true; // 중복 체크 여부 설정
                    alert(response['message']);
                } else {
                    isDuplicateChecked = false; // 중복 체크 여부 설정
                    alert(response['message']);
                }

            },
            error: function (xhr, status, error) {
                alert("에러 발생: " + error);
            }
        });
    }

    function isValidEmail(email) {
        // 간단한 이메일 형식 검사를 수행합니다.
        // 더 정확한 검사를 위해서는 정규표현식 등을 사용해야 합니다.
        var emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }

</script>

