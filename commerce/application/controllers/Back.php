<?php
/**
 * @name IndexController
 * @author jichao
 * @desc 后台
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */

define('BACK', 2);

class BackController extends Yaf_Controller_Abstract {

    /**
     * 后台相关action
     * @var unknown
     */
	public $actions = array(

		'index'           => 'actions/back/index.php',                  //首页欢迎页面
	    
	    //会员相关
	    'member'     => 'actions/back/user/member.php',             //会员页面
	    'adduser'      => 'actions/back/user/adduser.php',              //添加新用户
	    'ajaxuser'     => 'actions/back/user/ajaxuser.php',              // ajax用户详细信息
	    'ajaxdeleteuser' => 'actions/back/user/ajaxdeleteuser.php', //ajax删除用户
	    'ajaxupdateuser' => 'actions/back/user/ajaxupdateuser.php', //ajax删除用户
	    
	    //实体店相关
	    'shop' => 'actions/back/shop/shop.php',   //实体店首页
	    'ajaxaddshop' => 'actions/back/shop/ajaxaddshop.php',   //增加实体店
	    'ajaxshop' => 'actions/back/shop/ajaxshop.php',   //ajax查看实体店详细信息
	    'ajaxupdateshop' => 'actions/back/shop/ajaxupdateshop.php',   //ajax更新实体店信息	    
	    'ajaxdeleteshop' => 'actions/back/shop/ajaxdeleteshop.php',   //ajax删除实体店信息
        
        //成功案例相关
	    'case' => 'actions/back/case/case.php',                      //成功案例首页
	    'ajaxaddcase' => 'actions/back/case/ajaxaddcase.php',        //增加成功案例
	    'ajaxcase' => 'actions/back/case/ajaxcase.php',              //ajax查看成功案例详细信息
	    'ajaxupdatecase' => 'actions/back/case/ajaxupdatecase.php',  //ajax更新成功案例信息	    
	    'ajaxdeletecase' => 'actions/back/case/ajaxdeletecase.php',  //ajax删除成功案例信息
	        
        //活动相关
	    'act' => 'actions/back/act/act.php',                      //活动首页
	    'ajaxaddact' => 'actions/back/act/ajaxaddact.php',        //增加活动
	    'ajaxact' => 'actions/back/act/ajaxact.php',              //ajax查看活动详细信息
	    'ajaxupdateact' => 'actions/back/act/ajaxupdateact.php',  //ajax更新活动信息	    
	    'ajaxdeleteact' => 'actions/back/act/ajaxdeleteact.php',  //ajax删除活动
	    
	        
	    //crm ajax 接口数据
	    'crmcity' => 'actions/back/crm/crmcity.php',
	    'crmshop' => 'actions/back/crm/crmshop.php',
	);
}

