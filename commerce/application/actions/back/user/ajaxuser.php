<?php
/**
 * @describe:
 * @author: jichao
 * */

class ajaxuserAction extends BaseAction
{
    public function run($arg = null)
    {
            Yaf_Dispatcher::getInstance()->disableView();
        
            $id = DB::escape($_GET['id']);

            $userinfo = UserModel::getUserInfo($id);
            
            $types = array(
                    PicModel::PICUSERSMALL,
                    PicModel::PICUSERBIG,
            );
            
            $picArr = PicModel::getHashs($id, $types);

            if(!empty($picArr)){
                
                foreach($picArr as $pic){
                    
                    if($pic['type'] == PicModel::PICUSERSMALL){
                        $userinfo['small_img'] = $pic['hash'];
                    }
                    
                    if($pic['type'] == PicModel::PICUSERBIG){
                        $userinfo['big_img'] = $pic['hash'];
                    }
                }                
            }
            
            echo json_encode($userinfo);
    }
}

