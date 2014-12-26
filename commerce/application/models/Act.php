<?php
/**
 * @describe:
 * @author: jichao
 * */

class ActModel{
    
    const TABLE_NAME = 'activity';
    

    
    /**
     * 得到数据总数量
     * @return Ambigous <multitype:, mixed>
     */
    public static function getAllActTotal(){
    
        $sql = sprintf('SELECT count(id) as cnt FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
    
        $data = DB::get($sql);
    
        return $data;
    
    }
    
    /**
     * 添加活动
     * @param unknown $data
     * @return Ambigous <Ambigous, :, string>
     */
    public static function addAct($data){
    
        $table = self::TABLE_NAME;
    
        return DB::insert($data, $table);
    
    }
    
    /**
     *
     * 得到所有活动
     *
     * @return multitype:
     */
    public static function getActs(){

        $sql = sprintf('SELECT * FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
        
        $data = DB::getAll($sql);
    
        return $data;
    
    }
    
    
    /**
     *
     * 得到所有活动
     *
     * @return multitype:
     */
    public static function getActsByGroupId($groupId){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE groupId = %d AND deleted = 0', self::TABLE_NAME, $groupId);
    
        $data = DB::getAll($sql);
    
        return $data;
    
    }
    
    /**
     *
     * 得到活动详细信息
     *
     * @return multitype:
     */
    public static function getActDetail($id){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE id = %s', self::TABLE_NAME, $id);
        $res = DB::select($sql);
    
        $data = $res->fetch();
    
        return $data;
    
    }
    
    public static function updateAct($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    
    /**
     * 逻辑删除
     * @param unknown $id
     */
    public static function deleteAct($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    
    public static function getActByGroupId($gid)
    {
        $sql = sprintf('SELECT * FROM `%s` WHERE `groupId` = "%d" ORDER BY id DESC LIMIT 1',
            self::TABLE_NAME, $gid);
        return DB::get($sql);
    }
}

