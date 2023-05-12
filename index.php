<?php

// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";

if ($device == "mobile"){
    header("Location: /m/index.php");
}
if(isset($_GET['device'])){
    if ($_GET['device'] == "mobile"){
        header("Location: /m/index.php");
    }
}

// 메인배너 가져오기
$sql_banner_main = "SELECT * FROM banner_main";
$result_banner_main = mysqli_query($conn,$sql_banner_main);

$banner_main = array();
while ($row = mysqli_fetch_assoc($result_banner_main)) {
    $banner_main[] = $row;
}

// 상품 가져오기
$sql_product = "SELECT * FROM product";
if (isset($_GET['category'])){
    $sql_product = $sql_product." where category=".$_GET['category'];
}

$result_product = mysqli_query($conn,$sql_product);

$productList = array();
while ($row = mysqli_fetch_assoc($result_product)) {
    $productList[] = $row;
}

?>

<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dal & Byeol</title>
    <style>
        .banner {
            display: block;
            position: relative;
            width: 100%;
            height: 86px;
            overflow: hidden;
            top: -86px;
        }
    </style>
    <script>
    window.onload = function() {
      var banner = document.querySelector('.banner');
      banner.style.top = '0';
    };
  </script>
</head>
<body>

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

<div class="bg-dark w-100 border-bottom">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

            <?php for( $i=0; $i<count($banner_main); $i++){?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" <?= ($i==0)?("class='active' aria-current='true'"):("") ?> aria-label="Slide <?= ($i+1) ?>"></button>
            <?php }?>
        </div>

        <div class="carousel-inner">

            <?php for ($i=0;$i < count($banner_main);$i++){?>
            <div class="carousel-item <?=($i==0)?("active"):("")?>">
                <img src="/images/banner_main/<?= $banner_main[$i]['filename'] ?>" class="mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><?= $banner_main[$i]['text'] ?></p>
                </div>
            </div>
            <?php }?>
        </div>

<!--        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">-->
<!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--            <span class="visually-hidden">Previous</span>-->
<!--        </button>-->
<!--        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">-->
<!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--            <span class="visually-hidden">Next</span>-->
<!--        </button>-->
    </div>
</div>



<!--<div class="w-100 text-lg-center mt-lg-5">-->
<!--    <h2 style="font-weight: bold;"> Welcome To Dal&Byeol</h2>-->
<!--</div>-->

<nav class="navbar navbar-expand-lg navbar-light mt-lg-1">
    <div class="container-xl px-4 px-lg-1">
        <div class="w-100" style="font-weight: bold;font-family: 'NanumGothic'">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active text-warning" aria-current="page" href="/">Korea Pasabuy</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="/?category=100">Kpop</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="/?category=200">Kmart</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="/?category=300">Kmask</a></li>
            </ul>
        </div>
    </div>
</nav>


<section class="py-2">
    <div class="container-xl px-4 px-lg-1 mt-2">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php for($i=0; $i<count($productList);$i++){?>
            <div class="col mb-5">
                <div class="card h-100">
                    <?php if ($productList[$i]['isSale']=="yes"){?>
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <?php }?>
                    <!-- Product image-->
                    <img class="card-img-top" src="/images/product/<?=$productList[$i]['filename']?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?=$productList[$i]['name']?></h5>
                            <!-- Product price-->
                            ₱<?=number_format($productList[$i]['price'])?>
                            <?php if ($productList[$i]['isSale']=="yes"){?>
                            -
                            <?=number_format($productList[$i]['saleprice'])?>
                            <?php }?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/product/productDetail.php?productCode=<?=$productList[$i]['idx']?>">View options</a></div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>

<footer class="py-5 bg-dark">

    <div class="container-xl"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>

</body>
</html>

