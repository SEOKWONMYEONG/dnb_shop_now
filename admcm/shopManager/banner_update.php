<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";

// 메인배너 가져오기
$sql_banner_main = "SELECT * FROM banner_main where idx='".$_GET['idx']."'";
$result_banner_main = mysqli_query($conn,$sql_banner_main);

$mainBannerDetail = array();
$mainBannerDetail = mysqli_fetch_assoc($result_banner_main);

?>

<div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/admcm">달앤별</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/admcm/shopManager">상점 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admcm">상품 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admcm">고객 관리</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admcm">설정</a>
                </li>
            </ul>
        </div>
    </nav>

</div>

<form id="bannerForm" method="post" enctype="multipart/form-data">
    <div class="container-xl mt-4">
        <h2>메인배너 ( 1920 x 600 )</h2>
        <table class="BannerInfo" width="100%" border="1" cellspacing="1" cellpadding="2">
            <input type="hidden" name="idx" value="<?=$mainBannerDetail['idx']?>">
            <tr>
                <td>
                    Banner Code
                </td>
                <td>
                    <input type="text" name="code" value="<?=$mainBannerDetail['code']?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                    <input type="hidden" name="filename_ori" value="<?=$mainBannerDetail['filename']?>">
                    <?=$mainBannerDetail['filename']?>
                    <input type="file" name="filename"> (사이즈 - PC:1920x600)
                </td>
            </tr>
            <tr>
                <td>
                    Text
                </td>
                <td>
                    <textarea name="text" style="width: 100%;" ><?=$mainBannerDetail['text']?></textarea>
                </td>
            </tr>
        </table>
        <div class="mt-5" style="width: 100%; text-align: center;">
            <a class="button" onclick="submitForm(<?=$mainBannerDetail['idx']?>)">UPDATE</a>
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


    function submitForm(idx) {
        var form = $("#bannerForm");
        var formData = new FormData(form[0]);
        formData.append("mode", "main_banner_update");
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

