<?php



    // 메인배너 가져오기
    $sql_banner_main = "SELECT * FROM banner_main";
    $result_banner_main = mysqli_query($conn,$sql_banner_main);

    // 결과를 PHP 배열로 변환하여 JSON 형식으로 인코딩
    $banner_main = array();
    while ($row = mysqli_fetch_assoc($result_banner_main)) {
        $banner_main[] = $row;
    }

?>




<div class="container mt-4">

    <h2>메인배너</h2>

    <ul class="list-group">
        <?php for ($i=0;$i < count($banner_main);$i++){?>
        <li class="list-group-item d-flex justify-content-between align-items-center">

            <img src="/images/<?=$banner_main[$i]['filename']?>"/><?=$banner_main[$i]['filename']?>
            <span class="badge badge-primary badge-pill"><?=$banner_main[$i]['text']?></span>
        </li>
        <?php }?>
    </ul>

</div>
