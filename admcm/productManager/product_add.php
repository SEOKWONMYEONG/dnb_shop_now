<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

// 카테고리 가져오기
$sql_category = "SELECT * FROM category";
$result_category = mysqli_query($conn,$sql_category);

$categorytList = array();
while ($row = mysqli_fetch_assoc($result_category)) {
    $categorytList[] = $row;
}

//상품코드 가져오기
$sql_productCode = "SELECT MAX(idx) AS max_idx FROM product";
$result_productCode = mysqli_query($conn,$sql_productCode);
$productCode = mysqli_fetch_assoc($result_productCode);

?>

<div>

    <?php include "../header.php"?>

</div>


<style>
    #option-container {
        margin-top: 10px;
        margin-bottom: 20px;
    }

    #option-container div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    #option-container input[type="text"] {
        flex: 1;
        margin-right: 10px;
    }

    #option-container button {
        background-color: #ccc;
        color: #333;
        border: none;
        padding: 6px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    #option-container button:hover {
        background-color: #999;
    }
</style>
<script>
    // 옵션 추가 함수
    function addOption() {
        var optionContainer = document.getElementById('option-container');

        var newOption = document.createElement('div');
        newOption.innerHTML = `
                <input type="text" name="options[]" placeholder="옵션명">
                <button type="button" onclick="removeOption(this)">제거</button>
            `;

        optionContainer.appendChild(newOption);
    }

    // 옵션 제거 함수
    function removeOption(button) {
        var optionContainer = document.getElementById('option-container');
        var optionDiv = button.parentNode;

        optionContainer.removeChild(optionDiv);
    }
</script>
<div class="container-xl px-5 mt-4">
    <h2>ADD Prodcut</h2>
    <div class="w-100" style="text-align: center;">
        <form id="productForm" method="post" enctype="multipart/form-data">
                <table class="productInfo" width="100%" border="1" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Code</td>
                        <td>
                            <input type="text" name="code" value="<?=($productCode['max_idx']+1)?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category">
                            <?php foreach ($categorytList as $category): ?>
                                <option value="<?=$category['category_code']?>"><?php echo $category['category_name']; ?></option>
                            <?php endforeach; ?>
                            </select>

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
                        <td>Option Setting</td>
                        <td>
                        <div id="option-container">
                            <!-- 초기 옵션 입력란 -->
                            <div>
                                <input type="text" name="options[]" placeholder="옵션명">
                            </div>
                        </div>
                        <button type="button" onclick="addOption()">옵션 추가</button>
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

