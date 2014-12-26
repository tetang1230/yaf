<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxdeleteactAction extends BaseAction
{
    public function run($arg = null)
    {
            Yaf_Dispatcher::getInstance()->disableView();
        
            $id = DB::escape($_GET['id']);
        
            $data = array(
                    'deleted' => 1,
            );
            
            $re = ActModel::deleteAct($data, $id);
            echo json_encode($re);
    }
}

