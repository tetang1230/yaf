<?php
/**
 * @describe:
 * @author: jichao
 * */

class caseAction extends BaseAction
{
    public function run($arg = null)
    {
        
        if(isset($_GET['groups']) && !$_GET['groups'] != -1){

            $groupId = DB::escape($_GET['groups']);
            
            $cases = CaseModel::getCasesByGroupId($groupId);
            
        }else{
            $cases= CaseModel::getCases();
        }
            
        
        $this->assign('cases', $cases);
        
        $groups = crm::getShopBaseInfo();

        $optionStr = $this->getGroupOptions($groups);
    
        $this->assign('groupOptions', $optionStr);
        
    }
}

