<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class viewMapAction extends BaseAction
{
    public function run($arg = null)
    {
        //$addr = $this->getRequestParam('addr');
        //$this->assign('addr', $addr);

        $tabel = isset($_COOKIE['_m_']) ? DB::escape($_COOKIE['_m_']) : '';
        $id    = (int)$_COOKIE['_mid_'];
        if ('shop' != $tabel)
        {
            header('Location: /u'); 
            exit;
        }

        $store_detail = ShopModel::getShopDetail($id);
        $this->assign('store_detail', $store_detail);
        //print_r($store_detail);

        $base_info = Crm::getShopBaseInfoByCityId($store_detail['cityCode']);
        $base_detail = array();
        foreach ($base_info as $info)
        {
            $base_detail[$info['groupId']] = $info;
        }
        $this->assign('base_detail', $base_detail);
        //print_r($base_detail);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

