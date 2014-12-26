<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
define('U_STATIC_VERSION', 201412181750);
define('C_GENDER_NAME', 'gender');

class UController extends Yaf_Controller_Abstract
{
    public $actions = array(
        // 用户端页面
        'index'             => 'actions/u/index.php',
        'ladydetail'        => 'actions/u/ladyDetail.php',
        'gentleman'         => 'actions/u/gentleman.php',
        'gentlemandetail'   => 'actions/u/gentlemanDetail.php',
        'store'             => 'actions/u/store.php',
        'storedetail'       => 'actions/u/storeDetail.php',
        // 用户端数据交互
        'queryclue'        => 'actions/u/queryClue.php',
        'saveclue'         => 'actions/u/saveClue.php',
        // vip 体验
        'vip'               => 'actions/u/vip.php',
        // 查看地图
        'viewmap'           => 'actions/u/viewMap.php',
    );
}
/* vi:set ts=4 sw=4 et fdm=marker: */

