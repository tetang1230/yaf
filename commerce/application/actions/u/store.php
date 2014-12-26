<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class storeAction extends BaseAction
{
    public function run($arg = null)
    {
        $store_list_data = ShopModel::getShopListData();
        //print_r($store_list_data);
        $this->assign('list_data', $store_list_data);

        $store_base_info = array();
        $base_info = Crm::getShopBaseInfo();
        foreach ($base_info as $info)
        {
            $store_base_info[$info['groupId']] = $info;
        }
        $this->assign('store_base_info', $store_base_info);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

