<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class FController extends Yaf_Controller_Abstract
{
    public function pAction($arg = null)
    {
        // 禁止自动渲染模板
        Yaf_Dispatcher::getInstance()->disableView();

        $hash = DB::escape(isset($_GET['n']) ? $_GET['n'] : '');
        do {
            $sql = sprintf('SELECT * FROM `%s` WHERE hash = "%s"', PicModel::TABLE_NAME, $hash);
            $image_data = DB::get($sql);
            if (is_array($image_data) && count($image_data))
            {
                header('Content-Type: ' . $image_data['mime']);
                //echo htmlspecialchars_decode($image_data['bin'], ENT_QUOTES);
                //echo stripcslashes($image_data['bin']);
                echo $image_data['bin'];
                exit;
            }

        } while(0);

        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

