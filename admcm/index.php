<?php
    include $_SERVER['DOCUMENT_ROOT']."/common.php";

    if (!isset($_SESSION['username'])) {
        header('Location: ../login/index.php');
    }
    if (isset($_SESSION['isAdmin'])){
        if ($_SESSION['isAdmin'] != "yes") {
            header('Location: ../login/index.php');
        }
    }
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dal & Byeol Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div>

<?php include "./header.php"?>

</div>

</body>
</html>
