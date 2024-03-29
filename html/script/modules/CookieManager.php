<?php
    class CookieManager {

        private static $CookieManager=null;
        public function __construct()
        {
        }

        public function refreshCookie() {
            if ((CookieManager::factory())->checkCookie()) {
                echo "<meta http-equiv='refresh' content='0;url=http://ssossotable.com/index'>";
                exit;
            } else {
                (CookieManager::factory())->setCookie(
                    $_COOKIE['user_id'],
                    $_COOKIE['user_name'],
                    $_COOKIE['user_nickname'],
                    $_COOKIE['user_image']
                );
            }
        }

        public function checkCookie() {
            return !isset($_COOKIE['user_name']);
        }
        public function setCookie($user_id,$user_name,$user_nickname,$user_image) {
            setcookie('user_id',$user_id,time()+3600,'/');
            setcookie('user_name',$user_name,time()+(3600),'/');
            setcookie('user_nickname',$user_nickname,time()+3600,'/');
            setcookie('user_image',$user_image,time()+3600,'/');
        }
        public function checkUserCookie() {
            if(isset($_COOKIE['user_name'])) {
                $user_name = $_COOKIE['user_name'];
                echo "<meta http-equiv='refresh' content='0;url=http://ssossotable.com/recommendation'>";
                exit;
            }
        }
        public static function factory()
        {
            if (self::$CookieManager == null) {
                self::$CookieManager = new CookieManager();
            }

            return self::$CookieManager;
        }

        public function getUserId()
        {
            return $_COOKIE['user_id'];
        }
        public function getUserName()
        {
            return $_COOKIE['user_name'];
        }
        public function getUserNickname()
        {
            return $_COOKIE['user_nickname'];
        }
    }
?>