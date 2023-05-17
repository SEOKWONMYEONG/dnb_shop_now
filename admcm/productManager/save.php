<?php
include $_SERVER['DOCUMENT_ROOT']."/config/dbcon.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

$mode = $_POST['mode'];

if($mode == "product_add"){
    $code = $_POST['code'];
    $category =$_POST['category'];
    $name = $_POST['name'];
    $price =$_POST['price'];
    $saleprice = $_POST['saleprice'];
    $currency =$_POST['currency'];
    $description =$_POST['description'];
    $issale = $_POST['issale'] == "true"? "yes":"no";
    $options = $_POST['options'];


    // 파일 업로드 처리
    $targetDir = $_SERVER['DOCUMENT_ROOT']."/images/product/";  // 파일을 저장할 디렉토리 경로
    $uploadTime = date("YmdHis");  // 현재 시간과 날짜를 이용한 파일명 생성
    $targetFile = $targetDir .$uploadTime."_".basename($_FILES["filename"]["name"]);  // 저장될 파일 경로

    // 파일을 지정한 경로로 이동
    if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFile)) {
        $filename = $uploadTime . "_" . $_FILES["filename"]["name"];

        //상품추가
        $sql = "INSERT INTO product (code, category, name, price, saleprice,isSale, currency,filename,description) VALUES ('$code','$category','$name','$price','$saleprice','$issale','$currency','$filename','$description')";
        mysqli_query($conn,$sql);

        //상품옵션추가
        foreach ($options as $option){
            $sql = "INSERT INTO product_option(fk_product,option_name) VALUES ('$code','$option')";
            mysqli_query($conn,$sql);
        }

        $response = "상품이 등록되었습니다.";
    } else {
        $response =  "상품 등록이 실패하었습니다.";
    }
    echo $response;
}elseif($mode == "product_update"){
    $code = $_POST['code'];
    $category =$_POST['category'];
    $name = $_POST['name'];
    $price =$_POST['price'];
    $saleprice = $_POST['saleprice'];
    $currency =$_POST['currency'];
    $description =$_POST['description'];
    $issale = $_POST['issale'] == "true"? "yes":"no";

    $idx = $_POST['idx'];
    $filename_ori = $_POST['filename_ori'];
    $options = $_POST['options'];

    // 파일 업로드 처리
    $targetDir = $_SERVER['DOCUMENT_ROOT']."/images/product/";  // 파일을 저장할 디렉토리 경로
    $uploadTime = date("YmdHis");  // 현재 시간과 날짜를 이용한 파일명 생성
    $targetFile = $targetDir .$uploadTime."_".basename($_FILES["filename"]["name"]);  // 저장될 파일 경로

    if ($_FILES["filename"]["name"]!=""){
        // 파일을 지정한 경로로 이동
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFile)) {
            $filename = $uploadTime . "_" . $_FILES["filename"]["name"];
            $sql = "UPDATE product SET code = '$code', category = '$category', name = '$name', price = '$price', saleprice = '$saleprice',isSale = '$issale', currency = '$currency',filename = '$filename',description = '$description' where idx =".$idx;
            mysqli_query($conn,$sql);

            //상품옵션 삭제, 추가
            $sql = "DELETE FROM product_option WHERE fk_product = '$code'";
            mysqli_query($conn,$sql);
            foreach ($options as $option){
                $sql = "INSERT INTO product_option(fk_product,option_name) VALUES ('$code','$option')";
                mysqli_query($conn,$sql);
            }

            $response = "상품이 수정되었습니다.";
        } else {
            $response =  "상품 수정이 실패하었습니다.";
        }
    }else{
        $filename = $filename_ori;
        $sql = "UPDATE product SET code = '$code', category = '$category', name = '$name', price = '$price', saleprice = '$saleprice',isSale = '$issale', currency = '$currency',filename = '$filename',description = '$description' where idx =".$idx;
        mysqli_query($conn,$sql);

        //상품옵션 삭제, 추가
        $sql = "DELETE FROM product_option WHERE fk_product = '$code'";
        mysqli_query($conn,$sql);
        foreach ($options as $option){
            $sql = "INSERT INTO product_option(fk_product,option_name) VALUES ('$code','$option')";
            mysqli_query($conn,$sql);
        }

        $response = "상품이 수정되었습니다.";
    }

    echo $response;
}elseif($mode == "product_delete"){
    $code = $_POST['code'];
    $sql = "SELECT * FROM product WHERE code = '$code'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['filename'];

        // 파일 삭제
        $filePath = $_SERVER['DOCUMENT_ROOT']."/images/product/" . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);  // 파일 삭제
        }

        // 데이터베이스에서 해당 데이터 삭제
        $deleteSql = "DELETE FROM product WHERE code = '$code'";
        if ($conn->query($deleteSql) === TRUE) {

            $sql_productOptions = "DELETE FROM product_option WHERE fk_product = '$code'";
            $conn->query($sql_productOptions);

            echo "파일과 데이터가 성공적으로 삭제되었습니다.";
        } else {
            echo "데이터 삭제 실패: " . $conn->error;
        }
    } else {
        echo "해당 데이터를 찾을 수 없습니다.";
    }
}
?>