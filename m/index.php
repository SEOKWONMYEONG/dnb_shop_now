<?php

// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container px-0 py-0">
    <div class="mheader" >
        <div style="height: 56px;">
            <span style="line-height: 56px;vertical-align: middle;color: white;font-size: 25px;font-weight: bold; flex-shrink: 0;" onclick="location.reload()"><img style="width: 50px;margin-bottom: 5px;  margin-left: 50px;padding-right: 6px;" src="/images/logo_face.png" style="width:auto;height:30px;margin-left:-20px;padding-right:6px;">Dal & Byeol</span>
        </div>
        <div class="mheaderTabBar" style="width: 100%;background-color: #000000 !important">
            <a style="color: white" href="/m/">Limited</a>
            <a style="color: white" href="/m/">Kpop</a>
            <a style="color: white" href="/m/">Kmart</a>
            <a style="color: white" href="/m/">Kmask</a>
            <a style="color: white" href="/m/">SALE</a>
        </div>
    </div>
    <div>

    </div>
<!--    <div class="mheader" style="position: fixed; width: 100%; z-index: 999;top: 0;left: 0;overflow: auto;">-->
<!--        <img style="width: 50px;margin-top: 10px;margin-left: 50px;padding-right: 6px;" src="/images/logo_face.png">-->
<!--    </div>-->
<!--    <div class="mheaderMenu" style="position: fixed; width: 100%; z-index: 998;top: 0;left: 0;overflow: auto;padding-top: 70px;">-->
<!--        <img style="width: 50px;margin-top: 10px;margin-left: 50px;padding-right: 6px;" src="/images/logo_face.png">-->
<!--    </div>-->

    <div style="position: relative;overflow-x: hidden;overflow-y:auto;padding-top: 70px;height: 100%">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th class="pl-3" style="font-size: 8px">Product</th>
                    <th class="pr-3" style="text-align: right;font-size: 8px">Unit Price</th>
                </tr>
            </thead>
        </table>
        <?php
        // 이 부분에 데이터베이스에서 상품 데이터를 가져오는 코드를 작성해야 합니다.
        // 아래는 예시 데이터입니다.
        $products = [
            ["name" => "상품1", "price" => "10000", "image" => "image1.jpg"],
            ["name" => "상품2", "price" => "20000", "image" => "image2.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품3", "price" => "30000", "image" => "image3.jpg"],
            ["name" => "상품10", "price" => "30000", "image" => "image3.jpg"],
        ];
        foreach ($products as $product) {
            echo "<div class='col-sm-4'>";
            echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>" . $product["name"] . "</div>";
            echo "<div class='panel-body'><img src='" . $product["image"] . "' class='img-responsive' style='width:100%' alt='Image'></div>";
            echo "<div class='panel-footer'>" . $product["price"] . "원</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

</div>
</body>
</html>

<style>
    .mheader {
        height:56px;
        padding: 0 16px 0 72px;

        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        box-sizing: border-box;
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        width: 100%;
        margin: 0;
        padding: 0;
        border: none;
        min-height: 64px;
        max-height: 1000px;
        z-index: 3;
        background-color: #000000;
        color: rgb(255,255,255);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
        transition-duration: .2s;
        transition-timing-function: cubic-bezier(.4,0,.2,1);
        transition-property: max-height,box-shadow
    }
    .mheaderTabBar {


    }

</style>