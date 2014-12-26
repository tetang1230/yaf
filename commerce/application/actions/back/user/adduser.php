<?php
/**
 * @describe:
 * @author: jichao
 * */

class adduserAction extends BaseAction
{
    public function run($arg = null)
    {
        
        Yaf_Dispatcher::getInstance()->disableView();
        
        //echo json_encode($_POST);
       
               
        $postData = $fileData = $tmp = array();
        
        //echo json_encode($_POST);exit;
        
       // $postData = DB::escape($_POST);
        
        foreach($_POST as $k => $v){
            $postData[$k] = DB::escape($v);
        }
        
        $aid = UserModel::addUser($postData);
     
        
        $now = date('Y-m-d H:i:s');
        
        if(!empty($_FILES)){

            foreach($_FILES as $k => $file){
            
                if( $file['error'] == 0 )
                {
                    //$fileData['bin'] = addslashes(file_get_contents($file['tmp_name']));
                    $fileData['bin'] = file_get_contents($file['tmp_name']);
                    $fileData['hash'] = md5($fileData['bin']);
                    $fileData['mime'] = $file['type'];
                    $fileData['aid'] = $aid;
            
                    if($k == 'small_img'){
                        $fileData['type'] = PicModel::PICUSERSMALL;
                    }else{
                        $fileData['type'] = PicModel::PICUSERBIG;
                    }
            
                    $fileData['create_time'] = $now;
            
                    PicModel::addPic($fileData);
                }
            }
        }
       
    }
}

