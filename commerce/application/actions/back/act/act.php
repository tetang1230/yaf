<?php
/**
 * @describe:
 * @author: jichao
 * */

class actAction extends BaseAction
{
    public function run($arg = null)
    {

        $groupId = -1;
        
        if(isset($_GET['groups']) && $_GET['groups'] != -1){
            $groupId = DB::escape($_GET['groups']);
            $acts = ActModel::getActsByGroupId($groupId);
        }else{
            $acts= ActModel::getActs();
        }
        
        $this->assign('acts', $acts);
        
        $groups = crm::getShopBaseInfo();
        
        $optionStr = $this->getGroupOptions($groups);
        
        $this->assign('groupOptions', $optionStr);
    }
}

