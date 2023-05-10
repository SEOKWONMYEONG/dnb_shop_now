<?php
// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";

// 제품정보 가져오기
$sql_product = "SELECT * FROM product where code ='".$_GET['productCode']."'";
$result_product = mysqli_query($conn,$sql_product);

$productDetail = array();
$productDetail = mysqli_fetch_assoc($result_product);

// 제품옵션 가져오기
$sql_product_option = "SELECT * FROM product_option where fk_product ='".$productDetail['code']."'";
$result_product_option = mysqli_query($conn,$sql_product_option);

$productOptionDetail = array();
while ($row = mysqli_fetch_assoc($result_product_option)) {
    $productOptionDetail[] = $row;
}

//현재 배치 가져오기

$sql_batch = "SELECT * FROM batch where batch_now ='on'";
$result_batch = mysqli_query($conn,$sql_batch);

$batchDetail = array();
$batchDetail = mysqli_fetch_assoc($result_batch);


?>


<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dal & Byeol</title>

    <style>
        body {
            position: relative;
        }
        .product-container {
            display: flex;
            margin: 0 auto;
            width: 100%;
            justify-content: space-between;
        }
        .product-image {
            flex: 1;
        }
        .product-image img {
            max-width: 100%;
        }
        .product-details {
            flex: 1;
        }

        div[data-spy] {
            height: 500px; /* Set height to demonstrate scrollspy */
            overflow: auto;
        }

        .sticky {
            position: fixed;
            top: 0;

            z-index: 1000; /* Make sure it sits on top */
        }
        .navbar{
            padding: 0px;
        }
        .navbar .nav-pills .nav-item .active{
            background-color: white;
            border-top: 2px solid;
            border-left: 2px solid;
            border-right: 2px solid;
            border-bottom: none;
        }
    </style>


</head>
<body data-spy="scroll" data-target=".navbar">


<div class="banner" style="text-align: center; background-color: #FF5757">
    <a href="/">
        <img src="/images/banner_top/top_banner.png">
    </a>
</div>


<div class="w-100 pt-lg-3 pb-lg-1 bg-white">
    <div class="container-xl px-lg-1 text-lg-end text-right">
        <a href="preparing.php" style="color: black; font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"><span> LogIn </span></a> &middot;
        <a href="preparing.php" style="color: black; font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"><span> SignUp </span></a> &middot;
        <a href="preparing.php" style="color: black; font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"><span> CustomerService </span></a> |

        <a href="preparing.php" ><img style="width: 25px;height: 25px" src="/images/heart.svg"/></a>
        <a href="preparing.php" ><img style="width: 25px;height: 25px" src="/images/truck.svg"/></a>
        <a href="preparing.php" ><img style="width: 25px;height: 25px" src="/images/cart.svg"/></a>
        <a href="preparing.php" ><img style="width: 25px;height: 25px" src="/images/human.svg"/></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-xl px-4 px-lg-1 ">
        <!--        <a class="navbar-brand" href="#!" style="font-size: xx-large;font-weight: bold">Dal & Byeol</a>-->
        <a href="/"><img src="/images/logo.png"></a>
        <div class="w-100 text-lg-center">
            <div class="input-group">
                <div class="w-50 form-outline" style="margin-left: 25%" >
                    <input type="search" id="form1" class="form-control" placeholder="Search" />
                    <!--                            <label class="form-label" for="form1" style="margin-left: 0px;">Search</label>-->
                </div>
                <i class="fa-solid fa-magnifying-glass"></i>
                <button type="button" class="btn ">
                    <img style="width: 20px;height: 20px" src="/images/magnifying-glass-solid.svg"/>
                </button>
            </div>
        </div>


        <div class="collapse navbar-collapse text-lg-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-4o mb-2 mb-lg-0 ms-lg-auto ">
                <li class="nav-item"><a class="nav-link active" aria-current="page" style="font-family: 'NanumGothic';font-weight: bold;" href="#!">Facebook</a></li>
                <li class="nav-item"><a class="nav-link" style="font-family: 'NanumGothic';font-weight: bold;" href="#!">Instagram</a></li>
                <li class="nav-item"><a class="nav-link" style="font-family: 'NanumGothic';font-weight: bold;" href="#!">Coummunity</a></li>
            </ul>

        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light mt-lg-1 mb-3" >
    <div class="container-xl px-4 px-lg-1">
        <div class="w-100" style="font-weight: bold;font-family: 'NanumGothic'">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active text-warning" aria-current="page" href="#!">Korea Pasabuy</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="#!">Kpop</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="#!">Kmart</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="#!">Kmask</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-xl px-4 px-lg-1 mt-2" style="font-weight: bold;font-family: 'NanumGothic';" >
    <p class="border-bottom border-dark border-5">HOME > Kmart</p>
    <div class="product-container px-lg-1 py-lg-1">
        <div class="product-image border border-3" style="width: 555px;height: 555px;" >
            <img class="w-100" src="/images/product/<?=$productDetail['filename']?>" alt="Product Image">
        </div>
        <div class="product-details ml-4" style="font-family: 'NanumGothic';">
            <table style="font-weight: bold;">
                <tr>
                    <td class="pb-3" style="font-size: 20px;">
                        <img src="/images/banner_ads/advertisement.png"/>
                    </td>
                </tr>
                <tr>
                    <td class="pb-2" style="font-weight: bold;font-size: 30px; border-bottom-style: solid;"><?=$productDetail['name']?></td>
                </tr>
                <tr>
                    <td class="pb-5" style="font-weight: bold;font-size: 15px;"><?=$productDetail['description']?></td>
                </tr>

                <tr>
                    <td class="pb-3" style="font-size: 20px;">Price : ₱ <?=number_format($productDetail['price'])?> </td>
                </tr>
                <tr>
                    <td class="pb-3" style="font-size: 20px;">Shipping : Batch <?=$batchDetail['batch_number']?> ( <?=$batchDetail['batch_startdate']?> ~ <?=$batchDetail['batch_enddate']?> )</td>
                </tr>
                <tr>
                    <td class="pb-3" style="font-size: 20px;">Quantity :
                        <input type="text" id="Quantity" min="1" max="1000" style="border: 1px #ddd solid ;width: 300px"> ea
                    </td>
                </tr>
                <tr>
                    <td class="pb-3" style="font-size: 20px;">Option :
                        <select name="options" style="border: 1px #ddd solid;width: 300px">
                            <?php for ($i=0;$i<count($productOptionDetail);$i++){?>
                            <option value="<?=$productOptionDetail[$i]['idx']?>"><?=$productOptionDetail[$i]['option_name']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="height: 120px; vertical-align: bottom;text-align: center;">
                        <button type="button" class="btn btn-danger" style="width: 49%;">BUY</button>
                        <button type="button" class="btn btn-outline-danger" style="width: 49%;">CART</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="container-xl px-4 px-lg-1 mt-2" style="font-weight: bold;font-family: 'NanumGothic';" id="details" >
    <nav id="navbar-example2" class="navbar navbar-light px-3 container-xl" style=" border-bottom:2px solid;">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1" style="color: black;">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2" style="color: black;">Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3" style="color: black;">Q&A</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading4" style="color: black;">Shipping /Exchange / Refund</a>
            </li>
        </ul>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example mt-3" tabindex="0" >
        <h4 id="scrollspyHeading1" style="font-weight: bold;font-family: 'NanumGothic';">Description</h4>
        <p style="height: 500px"><?=$productDetail['description']?></p>
        <h4 id="scrollspyHeading2" style="font-weight: bold;font-family: 'NanumGothic';">Review</h4>
        <p style="height: 500px">Preparing</p>
        <h4 id="scrollspyHeading3" style="font-weight: bold;font-family: 'NanumGothic';">Q&A</h4>
        <p style="height: 500px">Preparing</p>
        <h4 id="scrollspyHeading4" style="font-weight: bold;font-family: 'NanumGothic';">Shipping /Exchange / Refund</h4>
        <p style="height: 500px">Preparing</p>
    </div>
</div>

<footer class="py-5 bg-dark">
    <div class="container-xl"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var navHeight = $('#details').offset().top;

        if (scroll >= navHeight) {
          $('#navbar-example2').addClass('sticky');
        } else {
          $('#navbar-example2').removeClass('sticky');
        }
      });

    </script>

</body>

</html>
