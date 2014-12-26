<?php
/**
 * @describe:
 * @author: jichao
 * */

class shopAction extends BaseAction
{
    public function run($arg = null)
    {
        
        $groupId = -1;
        
        if(isset($_GET['groups'])){
            $groupId = DB::escape($_GET['groups']);
        }

        if($groupId != '-1'){
            
            $shops= ShopModel::getShopByGroupId($groupId);
         
        }else{
            $shops= ShopModel::getShops();
        }
        
        $this->assign('shops', $shops);

    }
}

