<?php
include $_SERVER['DOCUMENT_ROOT']."/config/dbcon.php";
session_start();
?>


<!--제이쿼리-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- 부트스트랩 CSS -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
<!-- 부트스트랩 JS -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->


<!--폰트-->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-gothic.css" rel="stylesheet">
<!--//-->
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!--noimg 표시-->
<script>
    function replaceMissingImage(element) {
        element.onerror = null; // Prevent infinite loop if "noimg" is also missing
        element.src = '/images/noimg.jpg';
    }
</script>

<?php
// 접속 디바이스 종류 확인
function isMobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $mobile_agents = Array(
        "iphone", "ipod", "ipad", "android", "blackberry",
        "opera mini", "windows ce", "symbian", "palm", "windows phone",
        "iemobile", "mobile", "pda"
    );

    foreach ($mobile_agents as $device) {
        if (stripos($user_agent, $device)) {
            return true;
        }
    }

    return false;
}

if (isMobile()) {
    $device = "mobile";
} else {
    $device = "pc";
}

?>