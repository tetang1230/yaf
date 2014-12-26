<?php
/**
 * @describe:
 * @author: jichao
 * */

class PicModel
{
    
    const TABLE_NAME = 'pic';

    /**
     *  以下为图片的类型
     */
    const PICUSERSMALL = 1;     //用户小
    const PICUSERBIG = 2;           //用户大
    const PICSHOP = 3;                //实体店
    const PICHONGNIANG = 4;  //案例红娘
    const PICANLIONE = 5;         //案例1
    const PICANLITWO = 6;         //案例2
    const PICACTONE = 7;           //活动1
    const PICACTTWO = 8;           //活动2
    const PICACTTHREE = 9;         //活动3
   
    /**
     * 
     * @param array $data
     * @return Ambigous <Ambigous, :, string>
     */
   public static function addPic($data){
       
       $table =  self::TABLE_NAME;
       
       return DB::insert($data,  $table);
       
   }

    
    public static function getHash($aid, $type)
    {
        $hash = '';

        $sql = 'SELECT id, `hash` FROM `%s` WHERE aid = "%d" AND `type` = "%d" ORDER BY id DESC LIMIT 1';
        $sql = sprintf($sql, self::TABLE_NAME, $aid, $type);
        //echo $sql;

        $row = DB::get($sql);
        if (is_array($row) && isset($row['hash']))
        {
            $hash = $row['hash'];
        }

        return $hash;
    }
    
    /**
     * 
     * @param unknown $data
     * @param unknown $id
     */
    public static function update($data, $aid, $type){
        
        $table = self::TABLE_NAME;
        
        $set = array();
        
        foreach ($data as $field => $value)
        {
            $value = DB::escape($value);
            $set[] = "`{$field}` = '{$value}'";
        }
        $sql = sprintf('UPDATE `%s` SET %s WHERE aid = %d AND type = %d', $table, implode(', ', $set), $aid, $type);
        
        return DB::query($sql);
        
    }

    /**
     *
     * @param unknown $data
     * @param unknown $id
     */
    public static function getOne($aid, $type){
    
        $table = self::TABLE_NAME;
    
        $sql = sprintf('SELECT id FROM `%s` WHERE aid = %d AND type = %d', $table, $aid, $type);
        
        return DB::get($sql);
        
    }
    
    
    /**
     * 
     * @param int $aid
     * @param array $types
     * @return  $array
     */
    public static function getHashs($aid, $types)
    {
        
        $hash = '';
    
        $re = array();
        
        if(is_array($types)){
            
            if(count($types) > 1){
                $typestr = '("' . implode('","', $types) . '")';
            }else{
                $var = array_shift($types);
                $typestr = "('{$var}')";
            }
            
        }
        
        $sql = 'SELECT id, type, hash FROM `%s` WHERE aid = "%d" AND type in %s ORDER BY id';
        $sql = sprintf($sql, self::TABLE_NAME, $aid, $typestr);
        
        $rows = DB::getAll($sql);
        
        return $rows;
    }
}

