<?php
/**
 * @describe:
 * @author: jichao
 * */

class memberAction extends BaseAction
{
    public function run($arg = null)
    {
        $marriageOptions = UserModel::getMarriageOptions();
        $incomeOptions = UserModel::getIncomeOptions();
        $educationOptions = UserModel::getEducationOptions();
        $loveTypeOptions = UserModel::getLoveTypeOptions();
        $houseOptions = UserModel::getHouseOptions();
        $childrenOptions = UserModel::getChildrenOptions();
        
        $this->assign('marriageOption', $marriageOptions);
        $this->assign('incomeOption', $incomeOptions);
        $this->assign('educationOption', $educationOptions);      
        $this->assign('lovetypeOption', $loveTypeOptions);
        $this->assign('houseOption', $houseOptions);
        $this->assign('childrenOption', $childrenOptions);
        
        $searchgender = 1;
        
        if(isset($_GET['searchgender'])){
            $searchgender = DB::escape($_GET['searchgender']);
            $users = UserModel::getUsersByGender(DB::escape($_GET['searchgender']));
        }else{
            $users = UserModel::getUsers();
        }
        
        $this->assign('searchgender', $searchgender);
        $this->assign('users', $users);
        
    }
}

