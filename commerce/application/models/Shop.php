<?php
/**
 * @describe:
 * @author: jichao
 * */

class ShopModel{
    
    const TABLE_NAME = 'shop';
    

    /**
     * 得到数据总数量
     * @return Ambigous <multitype:, mixed>
     */
    public static function getAllShopTotal(){
    
        $sql = sprintf('SELECT count(id) as cnt FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
    
        $data = DB::get($sql);
    
        return $data;
    
    }
    
    /**
     * 添加新实体店
     * @param unknown $data
     * @return Ambigous <Ambigous, :, string>
     */
    public static function addShop($data){
    
        $table = self::TABLE_NAME;
    
        return DB::insert($data, $table);
    
    }
    
    /**
     *
     * 得到所有实体店
     *
     * @return multitype:
     */
    public static function getShops(){
    
        $sql = sprintf('SELECT id, groupId, cityCode, shop_addr FROM `%s` WHERE deleted = 0', self::TABLE_NAME);

        // HARD CODE: 加入城市联动
        $city_code = isset($_COOKIE['city_code']) ? DB::escape($_COOKIE['city_code']) : 0;
        if ($city_code > 0)
        {
            $sql .= " AND `cityCode` = '{$city_code}'";
        }
        
        $res = DB::select($sql);
    
        $data = $res->fetchAll();
    
        return $data;
    
    }
    
    /**
     *
     * 得到所有实体店
     *
     * @return multitype:
     */
    public static function getShopByGroupId($groupId){
    
        $sql = sprintf('SELECT id, groupId, cityCode, shop_addr FROM `%s` WHERE groupId = %d AND deleted = 0', self::TABLE_NAME, $groupId);

        $res = DB::select($sql);
    
        $data = $res->fetchAll();
    
        return $data;
    
    }

    /**
        * @brief getShopListData 取实体店列表数据
        *
        * @return: array
     */
    public static function getShopListData()
    {
        $list_data = self::getShops();

        foreach ($list_data as $k => $dt)
        {
            $shop_pic = PicModel::getHash($dt['id'], PicModel::PICSHOP);
            $list_data[$k]['shop_pic'] = $shop_pic;
        }

        return $list_data;
    }
    
    /**
     *
     * 得到实体店详细信息
     *
     * @return multitype:
     */
    public static function getShopDetail($id){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE id = "%d"', self::TABLE_NAME, $id);
        $res = DB::select($sql);
    
        $data = $res->fetch();
        if (is_array($data) && count($data))
        {
            $shop_pic = PicModel::getHash($data['id'], PicModel::PICSHOP);
            $data['shop_pic'] = $shop_pic;

            $act_pic = PicModel::getHash($data['id'], PicModel::PICACTONE);
            $data['act_pic'] = $act_pic;

            $data['case_data'] = CaseModel::getCaseByGroupId($data['id'], $data['groupId']);
        }
    
        return $data;
    
    }
    
    public static function updateShop($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    
    /**
     * 逻辑删除
     * @param unknown $id
     */
    public static function deleteShop($data, $id){
    
        $table = self::TABLE_NAME;
    
        return DB::update($data, $table, $id);
    
    }
    

}

