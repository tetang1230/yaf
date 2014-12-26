<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxactAction extends BaseAction
{
    public function run($arg = null)
    {

        Yaf_Dispatcher::getInstance()->disableView();
        
        $id = DB::escape($_GET['id']);
        
        $actInfo = ActModel::getActDetail($id);
        
        $types = array(
                PicModel::PICACTONE,
                PicModel::PICACTTWO,
                PicModel::PICACTTHREE,
        );
        
        $picArr = PicModel::getHashs($id, $types);
        
        if(!empty($picArr)){
        
            foreach($picArr as $pic){
        
                if($pic['type'] == PicModel::PICACTONE){
                    $actInfo['actone'] = $pic['hash'];
                }
        
                if($pic['type'] == PicModel::PICACTTWO){
                    $actInfo['acttwo'] = $pic['hash'];
                }
        
                if($pic['type'] == PicModel::PICACTTHREE){
                    $actInfo['actthree'] = $pic['hash'];
                }
            }
        }
        
        
        echo json_encode($actInfo);
        
    }
}

