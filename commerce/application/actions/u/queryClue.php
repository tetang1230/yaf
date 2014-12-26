<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class queryClueAction extends BaseAction
{
    public function run($arg = null)
    {
        Yaf_Dispatcher::getInstance()->disableView();

        $res = array(
            'error' => -1,
            'msg'   => 'error: -1 出错,请重试',
            'data'  => array(),
        );

        do {
            //$res['data'] = $_POST;
            $clue = $_POST;
            $tabel = DB::escape($_COOKIE['_m_']);
            $id    = (int)$_COOKIE['_mid_'];

            $sql = sprintf('SELECT `cityCode` FROM `%s` WHERE id = "%d" LIMIT 1', $tabel, $id);
            $db_res = DB::get($sql);
            $clue['city'] = $db_res['cityCode'];
            $clue['gender'] = DB::escape($_COOKIE['gender']);

            //$res['debug'] = $clue;

            $store_data = Crm::queryClue($clue);
            //$res['store_data'] = $store_data;

            if (is_array($store_data) && count($store_data))
            {
                $res['error'] = 0;
                $res['msg']   = 'OK';
                $res['data']  = $store_data;
            }
            elseif (Crm::MAGIC == $store_data)
            {
                $res['error'] = Crm::MAGIC;
                $res['msg']   = '已成功注册,请静候佳音.';
            }
        } while(0);

        echo json_encode($res);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

