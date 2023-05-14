<?php

// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";


// Limited 상품 가져오기
$sql_product_limited = "SELECT * FROM product where isLimited = 'yes'";

$result_product_limited = mysqli_query($conn,$sql_product_limited);

$productList_limited = array();
while ($row = mysqli_fetch_assoc($result_product_limited)) {
    $productList_limited[] = $row;
}
// Limited 상품 가져오기
$sql_product_limited = "SELECT * FROM product where isLimited = 'yes'";

$result_product_limited = mysqli_query($conn,$sql_product_limited);

$productList_limited = array();
while ($row = mysqli_fetch_assoc($result_product_limited)) {
    $productList_limited[] = $row;
}
// Kpop 상품 가져오기
$sql_product_kpop = "SELECT * FROM product where category = '100'";

$result_product_kpop = mysqli_query($conn,$sql_product_kpop);

$productList_kpop = array();
while ($row = mysqli_fetch_assoc($result_product_kpop)) {
    $productList_kpop[] = $row;
}
// kmerch 상품 가져오기
$sql_product_kmart = "SELECT * FROM product where category = '200'";

$result_product_kmart = mysqli_query($conn,$sql_product_kmart);

$productList_kmart = array();
while ($row = mysqli_fetch_assoc($result_product_kmart)) {
    $productList_kmart[] = $row;
}
// kmask 상품 가져오기
$sql_product_kmask = "SELECT * FROM product where category = '300'";

$result_product_kmask = mysqli_query($conn,$sql_product_kmask);

$productList_kmask = array();
while ($row = mysqli_fetch_assoc($result_product_kmask)) {
    $productList_kmask[] = $row;
}
// Limited 상품 가져오기
$sql_product_sale = "SELECT * FROM product where isSale = 'yes'";

$result_product_sale = mysqli_query($conn,$sql_product_sale);

$productList_sale = array();
while ($row = mysqli_fetch_assoc($result_product_sale)) {
    $productList_sale[] = $row;
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="overflow:hidden;">

<div class="container px-0 py-0">
    <div class="mheader" >
        <div style="height: 56px;">
            <span style="line-height: 56px;vertical-align: middle;color: white;font-size: 25px;font-weight: bold; flex-shrink: 0;" onclick="location.reload()"><img style="width: 50px;margin-bottom: 5px;  margin-left: 50px;padding-right: 6px;" src="/images/logo_face.png" style="width:auto;height:30px;margin-left:-20px;padding-right:6px;">Dal & Byeol</span>
        </div>
        <div class="mBtn"><a href="javascript:;">메뉴열기</a></div>
    </div>

    <div class="container px-0" >
        <ul class="nav nav-tabs nav-pills nav-fill px-0" id="myTab" role="tablist"  style="border: black;background: black" >
            <li class="nav-item" role="presentation" style="border: black;background: black;">
                <button class="w-100 nav-link active" style="border: black;background: black;color: white"  id="limited-tab" data-bs-toggle="tab" data-bs-target="#limited" type="button" role="tab" aria-controls="limited" aria-selected="true">Limited</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="w-100 nav-link" style="background: black;color: white" id="kpop-tab" data-bs-toggle="tab" data-bs-target="#kpop" type="button" role="tab" aria-controls="kpop" aria-selected="false">Kpop</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="w-100 nav-link" style="background: black;color: white"  id="kmart-tab" data-bs-toggle="tab" data-bs-target="#kmart" type="button" role="tab" aria-controls="kmart" aria-selected="false">kmerch</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="w-100 nav-link" style="background: black;color: white" id="kmask-tab" data-bs-toggle="tab" data-bs-target="#kmask" type="button" role="tab" aria-controls="kmask" aria-selected="false">Kmask</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="w-100 nav-link" style="background: black;color: white" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">SALE</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="limited" role="tabpanel" aria-labelledby="limited-tab">
                <div style="position: relative;overflow-x: hidden;overflow-y:auto;height: 100%">
                    <table style="width: 100%;" class="mt-3">
                        <thead>
                        <tr>
                            <th class="pl-3" style="font-size: 14px">Product</th>
                            <th class="pr-3" style="text-align: right;font-size: 14px">Unit Price</th>
                        </tr>
                        </thead>
                    </table>
                    <table style="width: 100%;" >
                        <?php foreach ($productList_limited as $product) {?>
                            <tr >
                                <td style="width: 20%"><img src='/images/product/<?=$product["filename"]?>' class='img-responsive' style='width:100%' alt='Image'></td>
                                <td class="px-3" style="font-weight: bold"><?=$product["name"]?></td>
                                <td class="pr-3">₱<?=number_format($product["price"])?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="kpop" role="tabpanel" aria-labelledby="kpop-tab">
                <div style="position: relative;overflow-x: hidden;overflow-y:auto;height: 100%">
                    <table style="width: 100%;" class="mt-3">
                        <thead>
                        <tr>
                            <th class="pl-3" style="font-size: 14px">Product</th>
                            <th class="pr-3" style="text-align: right;font-size: 14px">Unit Price</th>
                        </tr>
                        </thead>
                    </table>
                    <table style="width: 100%;" >
                        <?php foreach ($productList_kpop as $product) {?>
                            <tr >
                                <td style="width: 20%"><img src='/images/product/<?=$product["filename"]?>' class='img-responsive' style='width:100%' alt='Image'></td>
                                <td class="px-3" style="font-weight: bold"><?=$product["name"]?></td>
                                <td class="pr-3">₱<?=number_format($product["price"])?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="kmart" role="tabpanel" aria-labelledby="kmart-tab">
                <div style="position: relative;overflow-x: hidden;overflow-y:auto;height: 100%">
                    <table style="width: 100%;" class="mt-3">
                        <thead>
                        <tr>
                            <th class="pl-3" style="font-size: 14px">Product</th>
                            <th class="pr-3" style="text-align: right;font-size: 14px">Unit Price</th>
                        </tr>
                        </thead>
                    </table>
                    <table style="width: 100%;" >
                        <?php foreach ($productList_kmart as $product) {?>
                            <tr >
                                <td style="width: 20%"><img src='/images/product/<?=$product["filename"]?>' class='img-responsive' style='width:100%' alt='Image'></td>
                                <td class="px-3" style="font-weight: bold"><?=$product["name"]?></td>
                                <td class="pr-3">₱<?=number_format($product["price"])?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="kmask" role="tabpanel" aria-labelledby="kmask-tab">
                <div style="position: relative;overflow-x: hidden;overflow-y:auto;height: 100%">
                    <table style="width: 100%;" class="mt-3">
                        <thead>
                        <tr>
                            <th class="pl-3" style="font-size: 14px">Product</th>
                            <th class="pr-3" style="text-align: right;font-size: 14px">Unit Price</th>
                        </tr>
                        </thead>
                    </table>
                    <table style="width: 100%;" >
                        <?php foreach ($productList_kmask as $product) {?>
                            <tr >
                                <td style="width: 20%"><img src='/images/product/<?=$product["filename"]?>' class='img-responsive' style='width:100%' alt='Image'></td>
                                <td class="px-3" style="font-weight: bold"><?=$product["name"]?></td>
                                <td class="pr-3">₱<?=number_format($product["price"])?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                <div style="position: relative;overflow-x: hidden;overflow-y:auto;height: 100%">
                    <table style="width: 100%;" class="mt-3">
                        <thead>
                        <tr>
                            <th class="pl-3" style="font-size: 14px">Product</th>
                            <th class="pr-3" style="text-align: right;font-size: 14px">Unit Price</th>
                        </tr>
                        </thead>
                    </table>
                    <table style="width: 100%;" >
                        <?php foreach ($productList_sale as $product) {?>
                            <tr >
                                <td style="width: 20%"><img src='/images/product/<?=$product["filename"]?>' class='img-responsive' style='width:100%' alt='Image'></td>
                                <td class="px-3" style="font-weight: bold"><?=$product["name"]?></td>
                                <td class="pr-3">₱<?=number_format($product["price"])?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap">
    <header>
        <nav class="mNav">
            <ul class="sub">
                <div class="closeBtn"><a href="javascript:;">메뉴닫기</a></div>
                <li><a href="/m/">HOME</a></li>
                <li><a href="https://www.facebook.com/dalandbyeol">FACEBOOK</a></li>
                <li><a href="https://www.instagram.com/dalandbyeolkr/">INSTAGRAM</a></li>
            </ul>
        </nav>
        <div class="bg-shadow"></div>
    </header>
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
    @media (max-width: 576px) {
        .nav-pills .nav-link {
            font-size: 0.8rem;
            padding: 0.5rem;
        }
    }
    .nav-pills {
        overflow-x: auto;
        white-space: nowrap;

    }
    .nav-link:hover {
        border: black;
        background: black;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        border: black;
        border-color:black;

    }
    button:focus {
        outline: none;
    }
    /* main */
    /**, body { box-sizing: border-box; font-family: 'Montserrat', sans-serif; }*/
    /*html { font-size: 62.5%; }*/

    header { background: #fff; height: 70px;  display: flex; justify-content: space-between; line-height: 70px; padding: 0 20px; }
    .mBtn a { position: fixed;z-index: 1000;display: block; text-indent: -9999px;top: -5px;left:10px; width: 30px; height: 30px; background: url('/images/menu.png') no-repeat;background-size: 30px 30px; margin-top: 20px; }
    .mNav { z-index: 2; position: fixed; background-color: #fff; top: 0; right: -100%; width: 60%; height: 100%; transition: all 0.3s ease; }
    .mNav.on { right: 0; }
    .bg-shadow { position: fixed; top: 0; right: 0; width: 100%; height: 100%; z-index: 1; background: rgba(0, 0, 0, 0.7); display: none; cursor: pointer; }

    .sub { position: relative; padding-top: 30px; }
    .closeBtn { position: absolute; top: 0; right: 0; display: block; }
    .closeBtn a { display: block; text-indent: -9999px; width: 24px; height: 24px; background: url('/images/close.png') no-repeat; margin-top: 25px; margin-right: 20px; }
    .sub li a { display: block; font-size: 1.4rem; color: #333; padding: 10px 20px; border-bottom: 1px solid #d1d4d8; }
</style>


<script>
    const navtab = {

        init: function(){
            this.motab();
        },
        motab: function() {
            let mBtn = $(".mBtn");
            let closeBtn = $(".closeBtn");

            // 모바일 버튼 클릭
            $(mBtn).click(function(){
                $(".mNav").addClass("on");
                $(".bg-shadow").css("display", "block");
            });
            // 화면 클릭
            $(".bg-shadow").click(function(){
                $(".mNav").removeClass("on");
                $(".bg-shadow").css("display", "none");
            });
            // 닫기 버튼 클릭
            $(closeBtn).click(function(){
                $(".mNav").removeClass("on");
                $(".bg-shadow").css("display", "none");
            });
        }
    }

    $(document).ready(function(){
        navtab.init();
    })

</script>