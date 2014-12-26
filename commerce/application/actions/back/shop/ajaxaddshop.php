<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxaddshopAction extends BaseAction
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
        
        $aid = ShopModel::addShop($data);
        
        if(!empty($_FILES)){

            foreach($_FILES as $k => $file){
            
                if( $file['error'] == 0 )
                {
                    //$fileData['bin'] = addslashes(file_get_contents($file['tmp_name']));
                    $fileData['bin'] = file_get_contents($file['tmp_name']);
                    $fileData['hash'] = md5($fileData['bin']);
                    $fileData['mime'] = $file['type'];
                    $fileData['aid'] = $aid;
            
                    $fileData['type'] = PicModel::PICSHOP;
            
                    $fileData['create_time'] = $now;
            
                    PicModel::addPic($fileData);
                }
            }
        }
    }
}

