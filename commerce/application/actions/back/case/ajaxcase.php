<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxcaseAction extends BaseAction
{
    public function run($arg = null)
    {

        Yaf_Dispatcher::getInstance()->disableView();
        
        $id = DB::escape($_GET['id']);
        
        $caseInfo = CaseModel::getCaseDetail($id);
        
        $types = array(
                PicModel::PICHONGNIANG,
                PicModel::PICANLIONE,
                PicModel::PICANLITWO,
        );
        
        $picArr = PicModel::getHashs($id, $types);
        
        if(!empty($picArr)){
                
                foreach($picArr as $pic){
                    
                    if($pic['type'] == PicModel::PICHONGNIANG){
                        $caseInfo['hongniang'] = $pic['hash'];
                    }
                    
                    if($pic['type'] == PicModel::PICANLIONE){
                        $caseInfo['anlione'] = $pic['hash'];
                    }
                    
                    if($pic['type'] == PicModel::PICANLITWO){
                        $caseInfo['anlitwo'] = $pic['hash'];
                    }
                }                
            }
        
        echo json_encode($caseInfo);
        
    }
}

