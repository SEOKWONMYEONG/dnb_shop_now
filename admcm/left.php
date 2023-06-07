
<style>
    /* 왼쪽 메뉴 스타일 */
    aside {
        position: fixed;
        top: 50px;
        left: 0;
        width: 200px;
        height: 100%;
        background-color: #333;
    }

    /* 왼쪽 메뉴 항목 스타일 */
    aside ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    aside ul li {
        padding: 10px;
        color: #fff;
    }
    /* 세로 메뉴 네비게이션 스타일 */
    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        padding: 10px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
    }

    nav ul li a:hover {
        color: #ff0000; /* 마우스 오버 시 색상 변경 예시 */
    }

    .app-sidebar-fixed .app-sidebar {
        position: fixed;
    }
    .app-sidebar {
        width: 220px;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        padding-top: 0px;
        background: #111;
        z-index: 1010;
    }
    .app-sidebar .app-sidebar-content {
        position: relative;
    }
    .ps {
        overflow: hidden!important;
        overflow-anchor: none;
        -ms-overflow-style: none;
        touch-action: auto;
        -ms-touch-action: auto;
    }
    .app-sidebar .menu .menu-profile {
        padding: 20px;
        color: #fff;
        background: #20252a;
        overflow: hidden;
        position: relative;
    }
    .app-sidebar .menu .menu-profile .menu-profile-link {
        margin: -20px;
        padding: 20px;
        display: block;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
    .app-sidebar .menu .menu-profile .menu-profile-cover {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /*background-image: url(/images/logo_face.png);*/
        background-repeat: no-repeat;
        background-size: cover;
    }
    .app-sidebar .menu .menu-profile .menu-profile-image {
        width: 34px;
        height: 34px;
        margin-bottom: 10px;
        overflow: hidden;
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        border-radius: 30px;
    }

    .app-sidebar .menu .menu-profile .menu-profile-image img {
        max-width: 100%;
        max-height: 100%;
    }
    .app-sidebar .menu .menu-profile .menu-profile-info {
        font-size: .875rem;
        position: relative;
    }
    .align-items-center {
        align-items: center!important;
    }
    .app-sidebar .menu .menu-caret {
        display: block;
        width: 20px;
        text-align: center;
        font-size: .6875rem;
        border: none;
        font-family: Font Awesome\ 6 Free!important;
        font-weight: 900;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        margin-left: auto;
    }
    .app-sidebar .menu .menu-header {
        margin: 0;
        padding: 15px 20px 3px;
        line-height: 20px;
        font-size: 11px;
        color: #eee;
        font-weight: 600;
    }
    .app-sidebar .menu .menu-item {
        position: relative;
    }
    .app-sidebar .menu .menu-item.active>.menu-link {
        position: relative;
        z-index: 10;
        color: #999;
        background-color: #111;
    }
    .app-sidebar .menu .menu-item .menu-link {
        padding: 7px 20px;
        line-height: 20px;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    .app-sidebar .menu .menu-item.active>.menu-link .menu-icon {
        color: #00acac;
    }
    .app-sidebar .menu .menu-item .menu-icon {
        width: 14px;
        text-align: center;
        line-height: 20px;
        font-size: .875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }
</style>
<aside>

    <div id="sidebar" class="app-sidebar">
        <div class="app-sidebar-content ps ps--active-y" data-scrollbar="true" data-height="100%" style="height: 100%;">
            <div class="menu">
                <div class="menu-profile">
                    <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image">
                            <img src="/images/logo_face.png" alt="" >
                        </div>
                        <div class="menu-profile-info">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <?=$_SESSION['username']?>
                                </div>
                                <div class="menu-caret ms-auto"></div>
                            </div>
<!--                            <small>Frontend developer</small>-->
                        </div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="/admcm/shopManager" class="menu-link">
                        <div class="menu-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="menu-text">상점관리
<!--                            <span class="menu-label">NEW</span>-->
                        </div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="/admcm/productManager" class="menu-link">
                        <div class="menu-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="menu-text">상품관리
                            <!--                            <span class="menu-label">NEW</span>-->
                        </div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="/admcm/" class="menu-link">
                        <div class="menu-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="menu-text">고객관리
                            <!--                            <span class="menu-label">NEW</span>-->
                        </div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="/admcm/" class="menu-link">
                        <div class="menu-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="menu-text">설정관리
                            <!--                            <span class="menu-label">NEW</span>-->
                        </div>
                    </a>
                </div>

            </div>

<!--            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 889px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 818px;"></div></div></div>-->

    </div>
</aside>


