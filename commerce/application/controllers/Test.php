<?php
/**
 * @name IndexController
 * @author jichao
 * @desc 后台
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */


class TestController extends Yaf_Controller_Abstract {

    /**
     * 后台相关action
     * @var unknown
     */
	public $actions = array(
		'index' => 'actions/test/index.php',
	);
}

