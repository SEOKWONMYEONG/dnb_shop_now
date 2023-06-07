<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <a class="navbar-brand" href="/admcm">달앤별</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarNav">-->
<!--        <ul class="navbar-nav">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="/admcm/shopManager">상점 관리</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/admcm/productManager">상품 관리</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/admcm">고객 관리</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/admcm">설정</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->

<style>
    /* 상단 회사명 스타일 */
    header {
        background-color: #eee;
        color: #333;
        padding: 10px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1020;
        margin-bottom: 0;
        padding: 0;
        display: flex;
        height: 50px;
    }
    @media (min-width: 768px)
        .navbar-header {
            width: 220px;
            display: flex;
            align-items: center;
        }
        .navbar-nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row;
            flex: 1;
            justify-content: flex-end;
            align-items: center;
        }
        .navbar-nav .navbar-item {
            position: relative;
        }
        .navbar-form {
            padding: 0 15px;
            margin-top: 5px;
            margin-bottom: 5px;

        }
        .navbar-form .form-control {
            width: 220px;
            padding: 5px 5px;
            height: 30px;
            background: #ddd;
            border-color: #ddd;
            border-radius: 30px;
            display: flex;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 0.4375rem 0.75rem;
            font-size: .75rem;
            font-weight: 600;
            line-height: 1.5;
            color: #ddd;
            background-color: #ddd;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 4px;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .navbar-form .btn-search {
            position: absolute;
            right: 10px;
            top: 0;
            bottom: 0;
            border: none;
            background: 0 0;
            border-radius: 0 30px 30px 0;
            display: flex;
            align-items: center;
        }
        .navbar-nav .navbar-item .navbar-link {
            display: block;
            text-decoration: none;
            line-height: 20px;
            padding: 15px;
            border: none;
            color: #333;
        }
        .dropdown-toggle {
            white-space: nowrap;
        }
        .navbar-nav .navbar-item .navbar-link .badge {
            position: absolute;
            top: 8px;
            display: block;
            background: #00acac;
            line-height: 12px;
            font-weight: 600;
            color: #fff;
            padding: 3px 6px;
            font-size: 10.5px;
            border-radius: 30px;
            right: 5px;
        }
</style>

<header>
    <div class="navbar-header" style="font-size: 20px;padding: 10px 20px;height: 50px; vertical-align: center">
        <img src="/images/logo_face.png" width="30px">
        <span style="font-weight: bold; vertical-align: center">Dal And Byeol</span>
        <span>Admin</span>
    </div>
    <div class="navbar-nav">
        <div class="navbar-item navbar-form">
            <form action="" method="POST" name="search"  style="margin-bottom: 0px">
                <div class="form-group"  style="margin-bottom: 0px">
                    <input type="text" class="form-control" placeholder="Enter keyword">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="navbar-item dropdown">
            <a href="#" data-bs-toggle="dropdown" class="navbar-link">
                <i class="fa fa-bell"></i>
                <span class="badge">5</span>
            </a>
            <div class="dropdown-menu media-list dropdown-menu-end">
                <div class="dropdown-header">NOTIFICATIONS (5)</div>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <i class="fa fa-bug media-object bg-gray-500"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">Will Be Updated Soon <i class="fa fa-exclamation-circle text-danger"></i></h6>
                        <div class="text-muted fs-10px">Will Be Updated Soon</div>
                    </div>
                </a>
<!--                <a href="javascript:;" class="dropdown-item media">-->
<!--                    <div class="media-left">-->
<!--                        <i class="fa fa-bug media-object bg-gray-500"></i>-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>-->
<!--                        <div class="text-muted fs-10px">3 minutes ago</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="javascript:;" class="dropdown-item media">-->
<!--                    <div class="media-left">-->
<!--                        <img src="../assets/img/user/user-1.jpg" class="media-object" alt="">-->
<!--                        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <h6 class="media-heading">John Smith</h6>-->
<!--                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>-->
<!--                        <div class="text-muted fs-10px">25 minutes ago</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="javascript:;" class="dropdown-item media">-->
<!--                    <div class="media-left">-->
<!--                        <img src="../assets/img/user/user-2.jpg" class="media-object" alt="">-->
<!--                        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <h6 class="media-heading">Olivia</h6>-->
<!--                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>-->
<!--                        <div class="text-muted fs-10px">35 minutes ago</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="javascript:;" class="dropdown-item media">-->
<!--                    <div class="media-left">-->
<!--                        <i class="fa fa-plus media-object bg-gray-500"></i>-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <h6 class="media-heading"> New User Registered</h6>-->
<!--                        <div class="text-muted fs-10px">1 hour ago</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="javascript:;" class="dropdown-item media">-->
<!--                    <div class="media-left">-->
<!--                        <i class="fa fa-envelope media-object bg-gray-500"></i>-->
<!--                        <i class="fab fa-google text-warning media-object-icon fs-14px"></i>-->
<!--                    </div>-->
<!--                    <div class="media-body">-->
<!--                        <h6 class="media-heading"> New Email From John</h6>-->
<!--                        <div class="text-muted fs-10px">2 hour ago</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <div class="dropdown-footer text-center">-->
<!--                    <a href="javascript:;" class="text-decoration-none">View more</a>-->
<!--                </div>-->
            </div>
        </div>
        <div class="navbar-item navbar-user dropdown">
            <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="/images/logo_face.png" width="30px" alt="">
                <span>
             <?php if(isset($_SESSION['username'])){?>
                <span class="d-none d-md-inline"><?=$_SESSION['username']?> 님</span>
             <?php }else{?>
                <span class="d-none d-md-inline">Adam Schwartz</span>
             <?php }?>
            <b class="caret"></b>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
<!--                <a href="extra_profile.html" class="dropdown-item">Edit Profile</a>-->
<!--                <a href="email_inbox.html" class="dropdown-item d-flex align-items-center">-->
<!--                    Inbox-->
<!--                    <span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>-->
<!--                </a>-->
<!--                <a href="calendar.html" class="dropdown-item">Calendar</a>-->
<!--                <a href="settings.html" class="dropdown-item">Settings</a>-->
<!--                <div class="dropdown-divider"></div>-->
                <a href="/login/?mode=logout" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</header>