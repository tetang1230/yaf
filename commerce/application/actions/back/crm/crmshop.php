<?php
/**
 * @describe:
 * @author: jichao
 * */

class crmshopAction extends BaseAction
{
    public function run($arg = null)
    {
        Yaf_Dispatcher::getInstance()->disableView();

        if(isset($_GET['city'])){
            $city = DB::escape($_GET['city']);
            $arr = crm::getShopBaseInfoByCityId($city);
        }else{
            $arr = crm::getShopBaseInfo();
        }

        
        echo json_encode($arr);        
    }
}

