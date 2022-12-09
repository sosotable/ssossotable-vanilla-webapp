<?php
class LayoutHandler {
    private static $LayoutHandler=null;
    public function __construct()
    {
    }
    public function createTitle($title) {
        $format='<meta charset="utf-8">'.
    '<meta name="viewport" content="width=device-width, initial-scale=1">'.
    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">'.
    '<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">'.
    '<title>%s</title>'.
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>'.
    '<link rel="icon" href="src/favicon.ico">';
        echo sprintf($format,$title);
    }
    public function createHeader() {
        echo '<nav class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/recommendation" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="60px" height="60px"></a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/rating">음식 평가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/recipe">레시피 추가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/record">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="48px" height="48px"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="text-align: left;">
                    <li class="nav-item">
                        <a class="nav-link " href="http://ssossotable.com/my_info">내 정보</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/friends">친구 목록</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/diary">다이어리</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/my_recipe">나만의 레시피북</a>
                    </li>
                </ul>
                <div class="input-group mb-3 mt-3">
                    <input id="search" type="text" class="form-control" placeholder="음식명을 넣어주세요" aria-label="food-search" aria-describedby="button-addon2">
                    <button onclick="search()" class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
                </div>
            </div>
        </div>
    </nav>';
    }
    public function createFriendsHeader() {
        echo '<header class="masthead mb-auto">
        <div class="inner d-flex justify-content-between">
            <a class="d-flex align-items-center" href="http://ssossotable.com/recommendation"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#friendRequestModal" style="margin: 10px;">
                    <img id="friend-request-notification" src="src/notification.png" width="36px" height="36px"/>
                </a>
            </nav>
        </div>
    </header>';
    }
    public function createFooter() {
        echo '<footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
            <div class="inner">
                <p style="margin: 0;">Created by<a href="http://ssossotable.com" class="footer-link"> ssosso.table.u</a>, of <a href="http://ssossotable.com" class="footer-link">@ssosso.table</a></p>
            </div>
        </footer>';
    }
    public static function factory()
    {
        if (self::$LayoutHandler == null) {
            self::$LayoutHandler = new LayoutHandler();
        }
        return self::$LayoutHandler;
    }
}

?>