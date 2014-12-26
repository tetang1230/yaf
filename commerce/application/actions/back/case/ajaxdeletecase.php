<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxdeletecaseAction extends BaseAction
{
    public function run($arg = null)
    {
            Yaf_Dispatcher::getInstance()->disableView();
        
            $id = DB::escape($_GET['id']);
        
            $data = array(
                    'deleted' => 1,
            );
            
            $re = CaseModel::deleteCase($data, $id);
            echo json_encode($re);
    }
}

