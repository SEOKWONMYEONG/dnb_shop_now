<?php
include $_SERVER['DOCUMENT_ROOT']."/config/dbcon.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

$mode = $_POST['mode'];


if($mode == "main_banner_add"){
    $code = $_POST['code'];
    $text =$_POST['text'];

    // 파일 업로드 처리
    $targetDir = $_SERVER['DOCUMENT_ROOT']."/images/banner_main/";  // 파일을 저장할 디렉토리 경로
    $uploadTime = date("YmdHis");  // 현재 시간과 날짜를 이용한 파일명 생성
    $targetFile = $targetDir .$uploadTime."_".basename($_FILES["filename"]["name"]);  // 저장될 파일 경로

    // 파일을 지정한 경로로 이동
    if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFile)) {
        $filename = $uploadTime . "_" . $_FILES["filename"]["name"];
        $sql = "INSERT INTO banner_main (code, filename, text) VALUES ('$code', '$filename','$text')";

        mysqli_query($conn,$sql);
        $response = "배너가 등록되었습니다.";
    } else {
        $response =  "배너가 등록이 실패하었습니다.";
    }
    echo $response;
}elseif($mode == "main_banner_delete"){
    $idx = $_POST['idx'];
    $sql = "SELECT * FROM banner_main WHERE idx = '$idx'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['filename'];

        // 파일 삭제
        $filePath = $_SERVER['DOCUMENT_ROOT']."/images/banner_main/" . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);  // 파일 삭제
        }

        // 데이터베이스에서 해당 데이터 삭제
        $deleteSql = "DELETE FROM banner_main WHERE idx = '$idx'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "파일과 데이터가 성공적으로 삭제되었습니다.";
        } else {
            echo "데이터 삭제 실패: " . $conn->error;
        }
    } else {
        echo "해당 데이터를 찾을 수 없습니다.";
    }
}
?>