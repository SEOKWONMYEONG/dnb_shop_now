<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

// 카테고리 가져오기
$sql_category = "SELECT * FROM category";
$result_category = mysqli_query($conn,$sql_category);

$categorytList = array();
while ($row = mysqli_fetch_assoc($result_category)) {
    $categorytList[] = $row;
}

//카테고리 GET 데이터 가져오기
$category = isset($_GET['category']) ? $_GET['category'] : ""; // 현재 페이지 번호

// 페이징 변수 설정
$page = isset($_GET['page']) ? $_GET['page'] : 1; // 현재 페이지 번호
$limit = 10; // 한 페이지에 표시할 항목 수
$offset = ($page - 1) * $limit; // 오프셋 계산

$sql_productCount = "SELECT COUNT(*) as total FROM product pt LEFT JOIN category ca on ca.category_code = pt.category";
if ($category != "") {
    $sql_productCount .= " WHERE pt.category = $category";
}
$result_productCount = mysqli_query($conn,$sql_productCount);

$totalProduct = mysqli_fetch_assoc($result_productCount)['total']; // 전체 데이터 수

// 페이지 수 계산
$totalPages = ceil($totalProduct / $limit);

// 제품 정보 가져오기
$sql_product = "SELECT pt.*, ca.category_name FROM product pt LEFT JOIN category ca on ca.category_code = pt.category";
if ($category != "") {
    $sql_product .= " WHERE pt.category = $category";
}
$sql_product .= " ORDER BY idx DESC";
$sql_product .= " LIMIT $offset, $limit";
$result_product = mysqli_query($conn,$sql_product);

// 결과를 PHP 배열로 변환하여 JSON 형식으로 인코딩
$productList = array();
while ($row = mysqli_fetch_assoc($result_product)) {
    $productList[] = $row;
}

?>

<style>
    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination a {
        margin: 0 5px;
        padding: 5px 10px;
        text-decoration: none;
        background-color: #f2f2f2;
        color: #333;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination .active {
        background-color: #333;
        color: #fff;
    }
    /* 대시보드 내용 스타일 */
    section {
        margin-left: 200px; /* 왼쪽 메뉴 너비와 동일하게 설정 */
        margin-top: 50px;
        padding: 20px;

    }
</style>

<div>

    <?php include "../header.php"?>

</div>

<section>
    <div class="container-xxl px-5 mt-4">
        <h2>Product List</h2>
        <div class="w-100" style="text-align: center;">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td align="right">
                        <button onclick="window.location.href='./product_add.php'" >Add Product</button>
                    </td>
                </tr>
            </table>
            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <td>
                        <label for="category">Product Category</label>
                    </td>
                    <td>
                        <select id="category" onchange="showProducts()">
                            <option value="">전체</option>
                            <?php foreach ($categorytList as $cat): ?>
                                <option value="<?=$cat['category_code']?>" <?php if ($cat['category_code'] === $category) echo "selected"; ?>><?php echo $cat['category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Product Name
                    </td>
                    <td>
                        <input type="text" placeholder="Product Name">
                        <button>검색</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="w-100 mt-4" style="text-align: center;">
            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                <tr style="border: blanchedalmond 2px solid; text-align: center;height: 50px;" >
                    <th width="200px">Image</th>
                    <th width="150px">Code</th>
                    <th width="150px">Category</th>
                    <th width="400px">Name</th>
                    <th width="150px">Price</th>
                    <th width="150px">Sale Price</th>
                    <th width="150px">Currency</th>
                    <th width="auto">Function</th>

                </tr>
                <?php for ($i=0;$i < count($productList);$i++){?>
                    <tr style="border: blanchedalmond 2px solid; text-align: center;" >
                        <input type="hidden" value="<?=$productList[$i]['idx']?>"/>
                        <td>
                            <img style="width: 100px;" src="/images/product/<?=$productList[$i]['filename']?>"/>
                        </td>
                        <td><?=$productList[$i]['code']?></td>
                        <td><?=$productList[$i]['category_name']?></td>
                        <td><?=$productList[$i]['name']?></td>
                        <td><?=$productList[$i]['price']?></td>
                        <td><?=$productList[$i]['saleprice']?></td>
                        <td><?=$productList[$i]['currency']?></td>
                        <td>
                            <button onclick="window.location.href='./product_update.php?idx=<?=$productList[$i]['idx']?>'">수정</button>
                            <button onclick="submitForm(<?=$productList[$i]['code']?>,'product_delete')">삭제</button>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
        <div class="pagination pt-3 pb-5 w-100" style="text-align: center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a class="px-1" href="?page=<?php echo $i; ?>" style="color: black"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
</div>
</section>

<footer class="py-5 bg-dark">
    <div class="container-xl"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>
<?php include $_SERVER['DOCUMENT_ROOT']."/admcm/left.php";?>


<script>
    function submitForm(code,mode) {
        var form = $("#productForm");
        var formData = new FormData(form[0]);
        formData.append("mode", mode);
        formData.append("code", code);

        $.ajax({
            type : "POST",
            url : "save.php",
            data : formData,

            contentType : false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData : false, // NEEDED, DON'T OMIT THIS
            enctype: 'multipart/form-data',

            success : function(response) {
                alert(response);
                window.location.href = "index.php";
            },
            error : function(xhr, status, error) {
                alert("에러 발생: " + error);
            }
        });
    }
</script>

<script>
    function showProducts() {
        var category = document.getElementById("category").value;

        // 현재 페이지의 URL 가져오기
        var currentURL = window.location.href;

        // 변경할 GET 데이터
        var paramName = 'category';
        var paramValue = category;

        // 정규식을 사용하여 기존 GET 데이터 치환
        var regex = new RegExp('([?&])' + paramName + '=.*?(&|$)', 'i');

        var updatedURL;

        if (currentURL.match(regex)) {
            // 기존의 category 파라미터가 있는 경우
            updatedURL = currentURL.replace(regex, '$1' + paramName + '=' + paramValue + '$2');
        } else {
            // 기존의 category 파라미터가 없는 경우 새로 추가
            var separator = currentURL.indexOf('?') !== -1 ? '&' : '?';
            updatedURL = currentURL + separator + paramName + '=' + paramValue;
        }


        // 새로운 URL로 리다이렉트
        window.location.href = updatedURL;
    }
</script>