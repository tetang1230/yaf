<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class saveClueAction extends BaseAction
{
    public function run($arg = null)
    {
        Yaf_Dispatcher::getInstance()->disableView();

        $res = array(
            'error' => -1,
            'msg'   => 'error: -1 出错了,请重试',
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

            $response = Crm::saveClue($clue);
            if (! is_array($response) && count($response) <= 0)
            {
                break; 
            }

            $res['error'] = 0;
            if (1 == $response['result'])
            {
                $res['msg']   = 'OK';
            }
            elseif (0 == $response['result'])
            {
                $res['msg'] = $response['msg'];
            }
        } while(0);

        echo json_encode($res);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

