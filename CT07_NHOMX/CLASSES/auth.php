<?

class Auth{
    
    /* Kiem tra da dang nhap chua?*/
    
    public static function isLoggedIn(){
        return isset($_SESSION['logged_in']) &&
        $_SESSION['logged_in'];
    }
    /* Bat buoc phai dang nhap*/
    public static function requireLogin(){
        if(static::isLoggedIn()){
            // die('Please login to continue !');
            header("Location: login.php");
        }
    }
    /* Tao session sau khi login */
    public static function login()
    {
        session_regenerate_id(true);
        $_SESSION['logged_in'] = true;
    }
    /* Xoa session, cookie sau khi logout*/
    public static function logout()
    {
        if(ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }
}
?>