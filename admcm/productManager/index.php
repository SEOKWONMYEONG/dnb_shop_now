<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

// 메인배너 가져오기
$sql_product = "SELECT pt.*, ca.category_name FROM product pt LEFT JOIN category ca on ca.category_code = pt.category";
$result_product = mysqli_query($conn,$sql_product);

// 결과를 PHP 배열로 변환하여 JSON 형식으로 인코딩
$productList = array();
while ($row = mysqli_fetch_assoc($result_product)) {
    $productList[] = $row;
}

?>

<div>

    <?php include "../header.php"?>

</div>

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
                    Product Category
                </td>
                <td>
                    <button>검색</button>
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
                        <button onclick="submitForm(<?=$productList[$i]['idx']?>,'product_delete')">삭제</button>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>
</div>
<script>
    function submitForm(idx,mode) {
        var form = $("#productForm");
        var formData = new FormData(form[0]);
        formData.append("mode", mode);
        formData.append("idx", idx);

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