<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class storeDetailAction extends BaseAction
{
    public function run($arg = null)
    {
        $sid = $this->getRequestParam('sid', 0);
        $store_detail = ShopModel::getShopDetail($sid);


        setcookie('_m_', 'shop', 0, '/');
        setcookie('_mid_', $sid, 0, '/');

        //print_r($store_detail);
        $this->assign('store_detail', $store_detail);

        $base_info = Crm::getShopBaseInfoByCityId($store_detail['cityCode']);
        $base_detail = array();
        foreach ($base_info as $info)
        {
            $base_detail[$info['groupId']] = $info;
        }
        $this->assign('base_detail', $base_detail);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

