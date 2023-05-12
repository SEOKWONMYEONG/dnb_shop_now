<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";
?>

<div>

    <?php include "../header.php"?>

</div>


<div class="container-xl px-5 mt-4">
    <h2>ADD Prodcut</h2>
    <div class="w-100" style="text-align: center;">
        <form id="productForm" method="post" enctype="multipart/form-data">
                <table class="productInfo" width="100%" border="1" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Code</td>
                        <td>
                            <input type="text" name="code" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <input type="text" name="category" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Sale Price</td>
                        <td>
                            <input type="text" name="saleprice" value="">
                            <input type="checkbox" id="issale">
                            <label for="issale">Sale</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Currency</td>
                        <td>
                            <input type="text" name="currency" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="filename"> (사이즈 - PC:1920x600)
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" style="width: 100%;" ></textarea>
                        </td>
                    </tr>
                </table>
                <div class="mt-5" style="width: 100%; text-align: center;">
                    <a class="button" onclick="submitForm()">ADD</a>
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


    function submitForm() {
        var form = $("#productForm");
        var formData = new FormData(form[0]);
        formData.append("mode", "product_add");

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

