<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxshopAction extends BaseAction
{
    public function run($arg = null)
    {

        Yaf_Dispatcher::getInstance()->disableView();
        
        $id = DB::escape($_GET['id']);
        
        $shopInfo = ShopModel::getShopDetail($id);
        
        $types = array(
                PicModel::PICSHOP,
        );
        
        $picArr = PicModel::getHashs($id, $types);
        
        if(!empty($picArr)){
        
            foreach($picArr as $pic){

                $shopInfo['upload_img'] = $pic['hash'];

            }
        }
        
        echo json_encode($shopInfo);
        
    }
}

