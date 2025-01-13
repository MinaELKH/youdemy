<?php
namespace config ;
class Session {

    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function exists($key) {
        return isset($_SESSION[$key]);
    }


    public static function isLoggedIn() {
        return self::exists('logged_in') && self::get('logged_in') === true;
    }


    public static function hasRole($role) {
        return self::get('role') === $role;
    }

 
    public static function destroy() {
        session_unset();  // supprime toutes les variables de session
        session_destroy(); // détruit la session
    }
}

?>
