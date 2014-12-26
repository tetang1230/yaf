<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class AdminModel
{
    private static $admin_conf = array(
        'id' => 1,
        'user_name' => 'admin',
        'password'  => 'admin',
    );

    public static function auth()
    {
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
            $_SERVER['PHP_AUTH_USER'] != self::$admin_conf['user_name'] ||$_SERVER['PHP_AUTH_PW'] != self::$admin_conf['password'])
        {
            Header("WWW-Authenticate: Basic realm=\"Baihe Admin Systerm Login\"");
            Header("HTTP/1.0 401 Unauthorized");

            echo <<<EOB
            <html><body>
            <h1>Rejected!</h1>
            <big>Wrong Username or Password!</big>
            </body></html>
EOB;
            exit;
        }

        return true;
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

