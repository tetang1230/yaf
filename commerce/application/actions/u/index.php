<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class indexAction extends BaseAction
{
    public function run($arg = null)
    {
        $gender = 1;
        setcookie(C_GENDER_NAME, $gender, 0, '/');

        $user_info = UserModel::getUserListDataByGender(($gender + 1) %2);
        //print_r($user_info);
        $this->assign('user_info', $user_info);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

