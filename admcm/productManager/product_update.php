<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

// 메인배너 가져오기
$sql_product = "SELECT * FROM product where idx='".$_GET['idx']."'";
$result_product = mysqli_query($conn,$sql_product);

$productDetail = array();
$productDetail = mysqli_fetch_assoc($result_product);

?>

<div>

    <?php include "../header.php"?>

</div>

<div class="container-xl mt-4">
    <h2>UPDATE Prodcut</h2>
    <div class="w-100" style="text-align: center;">
        <form id="productForm" method="post" enctype="multipart/form-data">
                <table class="productInfo" width="100%" border="1" cellspacing="1" cellpadding="2">
                    <input type="hidden" name="idx" value="<?=$productDetail['idx']?>">

                    <tr>
                        <td>Code</td>
                        <td>
                            <input type="text" name="code" value="<?=$productDetail['code']?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <input type="text" name="category" value="<?=$productDetail['category']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?=$productDetail['name']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="<?=$productDetail['price']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Sale Price</td>
                        <td>
                            <input type="text" name="saleprice" value="<?=$productDetail['saleprice']?>">
                            <input type="checkbox" id="issale" <?php if($productDetail['isSale']=="yes"){echo "checked";}else{echo "";}?>>
                            <label for="issale">Sale</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Currency</td>
                        <td>
                            <input type="text" name="currency" value="<?=$productDetail['currency']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="hidden" name="filename_ori" value="<?=$productDetail['filename']?>">
                            <?=$productDetail['filename']?>
                            <input type="file" name="filename"> (사이즈 - PC:1920x600)
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" style="width: 100%;" ><?=$productDetail['description']?></textarea>
                        </td>
                    </tr>

                </table>
                <div class="mt-5" style="width: 100%; text-align: center;">
                    <a class="button" onclick="submitForm(<?=$productDetail['idx']?>)">UPDATE</a>
                    <a href="index.php" class="button">LIST</a>
                </div>
        </form>
    </div>
</div>
<style>
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
</style>
<script>


    function submitForm(idx) {
        var form = $("#productForm");
        var formData = new FormData(form[0]);
        formData.append("mode", "product_update");
        formData.append("idx", idx);
        var isChecked = $('#issale').is(':checked');
        formData.append("issale", isChecked);

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

