<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class gentlemanDetailAction extends BaseAction
{
    public function run($arg = null)
    {
        $uid = $this->getRequestParam('uid', 0);
        $user_detail = UserModel::getUserDetail($uid);

        setcookie('_m_', 'user', 0, '/');
        setcookie('_mid_', $uid, 0, '/');

        //print_r($user_detail);
        $this->assign('user_detail', $user_detail);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

