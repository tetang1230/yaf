<?php 
class BackTools{
    
    public static function optionCreate($data, $checked = false){
        
        $str = '<option value="-1">请选择</option>';
        
        if(!empty($data)){
            
            foreach ($data as $k => $v){
                
                if($checked != false){
                    
                    if($checked == $k){
                        $str .= "<option value=$k checked>$v</option>\n";
                    }else{
                        $str .= "<option value=$k>$v</option>\n";
                    }
                    
                }else{
                    $str .= "<option value=$k>$v</option>\n";
                }
                
            }
        }
        
        return $str;
    }    
}

?>