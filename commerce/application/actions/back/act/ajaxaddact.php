<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxaddactAction extends BaseAction
{
    public function run($arg = null)
    {
        
        Yaf_Dispatcher::getInstance()->disableView();
        
        $data = $fileData = array();
        
        foreach($_POST as $k => $v){
            $data[$k] = DB::escape($v);
        }
        
        $now = date('Y-m-d H:i:s');
        $data['create_time'] = $now;
        $aid = ActModel::addAct($data);
       
        
        if(!empty($_FILES)){

            foreach($_FILES as $k => $file){
            
                if( $file['error'] == 0 )
                {
                    //$fileData['bin'] = addslashes(file_get_contents($file['tmp_name']));
                    $fileData['bin'] = file_get_contents($file['tmp_name']);
                    $fileData['hash'] = md5($fileData['bin']);
                    $fileData['mime'] = $file['type'];
                    $fileData['aid'] = $aid;
                    
                    if($k == 'actone'){
                        $fileData['type'] = PicModel::PICACTONE;
                    }

                    if($k == 'acttwo'){
                        $fileData['type'] = PicModel::PICACTTWO;
                    }

                    if($k == 'actthree'){
                        $fileData['type'] = PicModel::PICANLITHREE;
                    }
                
            
                    $fileData['create_time'] = $now;
            
                    PicModel::addPic($fileData);
                }
            }
        }
    }
}

