<?php

include $_SERVER['DOCUMENT_ROOT'] . "/common.php";
include $_SERVER['DOCUMENT_ROOT']."/admcm/left.php";

// 메인배너 가져오기
$sql_banner_main = "SELECT * FROM banner_main";
$result_banner_main = mysqli_query($conn,$sql_banner_main);

// 결과를 PHP 배열로 변환하여 JSON 형식으로 인코딩
$banner_main = array();
while ($row = mysqli_fetch_assoc($result_banner_main)) {
    $banner_main[] = $row;
}

?>

<div>
    <?php include "../header.php"?>
</div>

<style>
    section {
        margin-left: 200px; /* 왼쪽 메뉴 너비와 동일하게 설정 */
        margin-top: 50px;
        padding: 20px;

    }
</style>
<section>
    <div class="container-xl mt-4">
        <h2>메인배너 ( 1920 x 600 )</h2>
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
                <td style="font-weight: bold;">Main Banner List</td>
                <td align="right">
                    <button onclick="window.location.href='./banner_add.php'" >Add Banner</button>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr style="border: blanchedalmond 2px solid; text-align: center;height: 50px;" >
                <th width="100px">Banner Code</th>
                <th width="700px">Banner Image</th>
                <th width="100px">Filename</th>
                <th width="auto">Function</th>
            </tr>
            <?php for ($i=0;$i < count($banner_main);$i++){?>
                <tr style="border: blanchedalmond 2px solid; text-align: center;" >
                    <input type="hidden" value="<?=$banner_main[$i]['idx']?>"/>
                    <td><?=$banner_main[$i]['code']?></td>
                    <td>
                        <img style="width: 500px;" src="/images/banner_main/<?=$banner_main[$i]['filename']?>"/>
                    </td>
                    <td>
                        <?=$banner_main[$i]['filename']?>
                    </td>
                    <td>
                        <button onclick="window.location.href='./banner_update.php?idx=<?=$banner_main[$i]['idx']?>'">수정</button>
                        <button onclick="submitForm(<?=$banner_main[$i]['idx']?>,'main_banner_delete')">삭제</button>
                    </td>
                </tr>
            <?php }?>
        </table>
</div>
</section>

<script>
    function submitForm(idx,mode) {
        var form = $("#bannerForm");
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