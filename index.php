<?php

// DB 연결
include $_SERVER['DOCUMENT_ROOT']."/common.php";

// 메인배너 가져오기
$sql_banner_main = "SELECT * FROM banner_main";
$result_banner_main = mysqli_query($conn,$sql_banner_main);

// 결과를 PHP 배열로 변환하여 JSON 형식으로 인코딩
$banner_main = array();
while ($row = mysqli_fetch_assoc($result_banner_main)) {
    $banner_main[] = $row;
}
?>

<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dal & Byeol</title>

</head>
<body>


<div class="w-100 pt-lg-3 pb-lg-1 bg-white">
    <div class="container px-lg-5 text-lg-end text-right">
        <span style="font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"> LogIn &middot; </span>
        <span style="font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"> SignUp &middot; </span>
        <span style="font-size: 13px;font-family: 'NanumGothic';font-weight: bold;"> CustomerService  | </span>

        <a href="#!" ><img style="width: 25px;height: 25px" src="/images/heart.svg"/></a>
        <a href="#!" ><img style="width: 25px;height: 25px" src="/images/truck.svg"/></a>
        <a href="#!" ><img style="width: 25px;height: 25px" src="/images/cart.svg"/></a>
        <a href="#!" ><img style="width: 25px;height: 25px" src="/images/human.svg"/></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container px-4 px-lg-5 ">
        <a class="navbar-brand" href="#!" style="font-size: xx-large;font-weight: bold">Dal & Byeol</a>
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

<div class="bg-dark w-100">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?for ($i=0;$i < count($banner_main);$i++){?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i?>" <?=($i==0)?("class='active  aria-current='true'"):("")?> aria-label="Slide "<?=$i?>"></button>
            <?}?>
        </div>

        <div class="carousel-inner">

            <?for ($i=0;$i < count($banner_main);$i++){?>
            <div class="carousel-item <?=($i==0)?("active"):("")?>">
                <img src="/images/<?=$banner_main[$i]['filename']?>" class="mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><?=$banner_main[$i]['text']?></p>
                </div>
            </div>
            <?}?>
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



<div class="w-100 text-lg-center mt-lg-5">
    <h2 style="font-weight: bold;"> Welcome To Dal&Byeol</h2>
</div>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container px-4 px-lg-5">
        <div class="w-100 bg-light">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Kpop</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="#!">Kmart</a></li>
                <li class="nav-item"><a class="nav-link " aria-current="page" href="#!">Kmask</a></li>
                <li class="nav-item"><a class="nav-link  text-warning" aria-current="page" href="#!">Korea Pasabuy</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-2">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $120.00 - $280.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 bg-dark">

    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>

</body>
</html>

