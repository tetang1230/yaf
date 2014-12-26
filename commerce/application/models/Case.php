<?php
/**
 * @describe:
 * @author: jichao
 * */

class CaseModel{
    
    const TABLE_NAME = 'cases';
    
    /**
     * 得到数据总数量
     * @return Ambigous <multitype:, mixed>
     */
    public static function getAllCaseTotal(){
    
        $sql = sprintf('SELECT count(id) as cnt FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
    
        $data = DB::get($sql);
    
        return $data;
    
    }
    
    /**
     * 添加成功案例
     * @param unknown $data
     * @return Ambigous <Ambigous, :, string>
     */
    public static function addCase($data){
    
        $table = self::TABLE_NAME;
    
        return DB::insert($data, $table);
    
    }
    
    /**
     *
     * 得到所有成功案例
     *
     * @return multitype:
     */
    public static function getCases(){

        $sql = sprintf('SELECT * FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
        
        $data = DB::getAll($sql);
    
        return $data;
    
    }
    
    /**
     *
     * 得到所有成功案例
     *
     * @return multitype:
     */
    public static function getCasesByGroupId($groupId){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE groupId = %d AND deleted = 0', self::TABLE_NAME, $groupId);
    
        $data = DB::getAll($sql);
    
        return $data;
    
    }
    
    /**
     *
     * 得到成功案例详细信息
     *
     * @return multitype:
     */
    public static function getCaseDetail($id){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE id = %s', self::TABLE_NAME, $id);
        $res = DB::select($sql);
    
        $data = $res->fetch();
    
        return $data;
    
    }
    
    public static function updateCase($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    
    /**
     * 逻辑删除
     * @param unknown $id
     */
    public static function deleteCase($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    
    public static function getCaseByGroupId($sid, $gid)
    {
        $sql = sprintf('SELECT * FROM `%s` WHERE groupId = "%d" ORDER BY id DESC LIMIT 1',
            self::TABLE_NAME, $gid);
        $case = DB::get($sql);
        if (is_array($case) && count($case))
        {
            $case['case_pic']      = PicModel::getHash($sid, PicModel::PICANLIONE);
            $case['hongliang_pic'] = PicModel::getHash($sid, PicModel::PICHONGNIANG);
        }

        return $case;
    }
}

