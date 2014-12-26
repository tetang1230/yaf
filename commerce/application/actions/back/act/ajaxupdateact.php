<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxupdateactAction extends BaseAction
{
    public function run($arg = null)
    {
      
        Yaf_Dispatcher::getInstance()->disableView();
        
        $data = array();
        $id = DB::escape($_GET['id']);
        
        foreach($_POST as $k => $v){
            $data[$k] = DB::escape($v);
        }
        
        $re = ActModel::updateAct($data, $id);
        
        $type = '';
        $fileData = array();
        
        if(!empty($_FILES)){
        
            foreach($_FILES as $k => $file){
        
                if( $file['error'] == 0 )
                {
                    //$fileData['bin'] = addslashes(file_get_contents($file['tmp_name']));
                    $fileData['bin'] = file_get_contents($file['tmp_name']);
                    $fileData['hash'] = md5($fileData['bin']);
                    $fileData['mime'] = $file['type'];
                    //$fileData['aid'] = $id;
        
                    if($k == 'actone'){
                        $type = PicModel::PICACTONE;
                    }
                    
                    if($k == 'acttwo'){
                        $type = PicModel::PICACTTWO;
                    }
                    
                    if($k == 'actthree'){
                        $type = PicModel::PICACTTHREE;
                    }
                    
                    $picData = PicModel::getOne ( $id, $type );
                    
                    if (is_array ( $picData ) && ! empty ( $picData )) {
                        PicModel::update ( $fileData, $id, $type );
                    } else {
                        
                        $fileData ['aid'] = $id;
                        
                        $fileData ['type'] = $type;
                        
                        $fileData ['create_time'] = date ( 'Y-m-d H:i:s' );
                        
                        PicModel::addPic ( $fileData );
                    }
        
                }
            }
        }
        
        echo json_encode($re);
        
    }
}

