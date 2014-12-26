<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class debugAction extends BaseAction
{
    public function run($arg = null)
    {
        $rows = DB::getAll('SELECT * FROM user');
        print_r($rows);

        $str = '  <script>alert("Hi,");</script>';
        echo DB::escape($str);

        echo Html::createPager(2, 10, 86);

        $v = $this->getRequestParam('abc', 'd-abc');
        echo $v;

        echo '<br />';
        echo $this->getRequest()->getControllerName();
        echo ' -> ';
        echo $this->getRequest()->getActionName();

        echo '<br />';
        //$url = 'http://www.kuaidi100.com/autonumber/auto?num=100033892580';
        $url = 'http://www.kuaidi100.com/query?type=yuantong&postid=100033892580&id=1&valicode=&temp=0.7580415371339768';
        $ctObj = new CurlTools();
        $str = $ctObj->get($url);
        echo $str;

        echo '<pre>';
        print_r(json_decode($str, true));
        echo '</pre>';

        exit;
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

