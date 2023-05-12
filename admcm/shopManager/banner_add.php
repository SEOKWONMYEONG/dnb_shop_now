<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";
?>

<div>

    <?php include "../header.php"?>

</div>

<form id="bannerForm" method="post" enctype="multipart/form-data">
    <div class="container-xl mt-4">
        <h2>메인배너 ( 1920 x 600 )</h2>
        <table class="BannerInfo" width="100%" border="1" cellspacing="1" cellpadding="2">
            <tr>
                <td>
                    Banner Code
                </td>
                <td>
                    <input type="text" name="code" value="main" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                    <input type="file" name="filename"> (사이즈 - PC:1920x600)
                </td>
            </tr>
            <tr>
                <td>
                    Text
                </td>
                <td>
                <textarea name="text" style="width: 100%;" ></textarea>
                </td>
            </tr>
        </table>
        <div class="mt-5" style="width: 100%; text-align: center;">
            <a class="button" onclick="submitForm()">ADD</a>
            <a href="index.php" class="button">LIST</a>
        </div>
    </div>
</form>
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
            var form = $("#bannerForm");
            var formData = new FormData(form[0]);
            formData.append("mode", "main_banner_add");

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

