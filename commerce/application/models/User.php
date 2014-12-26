<?php
/**
 * @describe:
 * @author: jichao
 * */

class UserModel
{
    
    const TABLE_NAME = 'user';
    
    private static $marriage = array(
        1 => '未婚',
        2 => '离异',
        3 => '丧偶',
    );
    
    private static $income = array(
        1 => '2000以下',
        2 => '2000-3000',
        3 => '3000-4000',
        4 => '4000-5000',
        5 => '5000-7000',
        6 => '7000-10000',
        7 => '10000-15000',
        8 => '15000-20000',
        9 => '20000-25000',
        10 => '25000-30000',
        11 => '30000-50000',
        12 => '50000以上',
    );

    private static $education = array(
        1 => '初中',
        2 => '中专/职高/技校',
        3 => '高中',
        4 => '大专',
        5 => '本科',
        6 => '硕士',
        7 => '博士',
        8 => '博士后',
    );
    
    private static $love_type = array(
        1 => '哲学家型',
        2 => '作家型',
        3 => '记者型',
        4 => '教师型',
        5 => '学者型',
        6 => '专家型',
        7 => '发明家型',
        8 => '领袖型',
        9 => '照顾者型',
        10 => '公务员型',
        11 => '主人型',
        12 => '将军型',
        13 => '艺术家型',
        14 => '冒险家型',
        15 => '表演者型',
        16 => '挑战者型',
    );
    
    private static $house = array(
        1 => '以后再告诉你',
        2 => '与父母同住',
        3 => '租房',
        4 => '已购房',
        5 => '住单位房',
        6 => '住亲戚家',
    );
    
    private static $children = array(
        1 => '有',
        2 => '没有',   
    );
    
    private static $gender = array(
            0 => '女',
            1 => '男',
    );

    private static $appDb = null;
    
    
    /**
     * 得到数据总数量
     * @return Ambigous <multitype:, mixed>
     */
    public static function getAllUsersTotal(){
        
        $sql = sprintf('SELECT count(id) as cnt FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
        
        $data = DB::get($sql);
        
        return $data;
        
    }
    

    /**
     * 通过性别得到数据总数量
     * @return Ambigous <multitype:, mixed>
     */
    public static function getAllUsersByGenderTotal($gender){
    
        $sql = sprintf('SELECT count(id) as cnt FROM `%s` WHERE gender = %d AND deleted = 0', self::TABLE_NAME, $gender);
    
        $data = DB::get($sql);
    
        return $data;
    
    }
    
    /**
     * 
     * @param unknown $gender
     * @return multitype:
     */
    public static function getUsersByGender($gender){
        
        $sql = sprintf('SELECT id, name, height, age, gender, education, marriage, love_type, consultant_info_me, authentic_real_name, authentic_education, authentic_legacy FROM %s WHERE 1 AND deleted = 0', self::TABLE_NAME);
        if (-1 != $gender)
        {
            $sql .= " AND `gender` = '{$gender}' ";
        }
        
        // hard code: 加入城市限制
        $city_code = isset($_COOKIE['city_code']) ? DB::escape($_COOKIE['city_code']) : 0;
        if ($city_code > 0)
        {
            $sql .= " AND `cityCode` = '{$city_code}'";
        }
        
        $data = DB::getAll($sql);
        
        return $data;
        
    }

    /**
        * @brief getUserListDataByGender 取用户列表页数据
        *
        * @param: $gender
        *
        * @return: array
     */
    public static function getUserListDataByGender($gender)
    {
        $list_data = self::getUsersByGender($gender);

        foreach ($list_data as $k => $dt)
        {
            $small_pic = PicModel::getHash($dt['id'], PicModel::PICUSERSMALL);
            $list_data[$k]['small_pic'] = $small_pic;
        }

        return $list_data;
    }
    
    /**
     * 
     * 得到所有男性用户
     * 
     * @return multitype:
     */
    public static function getUsers(){
        
        $sql = sprintf('SELECT id, name, height, age, gender, education, marriage, love_type, consultant_info_me, authentic_real_name, authentic_education, authentic_legacy FROM `%s` WHERE deleted = 0', self::TABLE_NAME);
        
        $data = DB::getAll($sql);

        return $data;
        
    }
    
    /**
     *
     * 得到某一基本用户信息
     * @param $id
     * @return array
     */
    public static function getUserInfo($id){
    
        $sql = sprintf('SELECT * FROM `%s` WHERE id =  %d AND deleted = 0', self::TABLE_NAME, $id);
        $res = DB::select($sql);
    
        $data = $res->fetch();
    
        return $data;
    
    }

    /**
     * @brief getUserDetail 取用户详细信息,有图片
     *
     * @param: $uid
     *
     * @return: array
     */
    public static function getUserDetail($uid)
    {
        $user_detail = self::getUserInfo($uid);
        $small_pic = PicModel::getHash($uid, PicModel::PICUSERSMALL);
        $big_pic   = PicModel::getHash($uid, PicModel::PICUSERBIG);

        $user_detail['small_pic'] = $small_pic;
        $user_detail['big_pic']   = $big_pic;

        return $user_detail;
    }
    
    public static function updateUser($data, $id){
        
        $table = self::TABLE_NAME;
        
        return DB::update($data, $table, $id);
        
    }
    
    
    /**
     * 逻辑删除
     * @param unknown $id
     */
    public static function deleteUser($data, $id){
        
        $table = self::TABLE_NAME;
        
        return DB::update($data, $table, $id);
        
    }

    
    /**
     * 添加新用户
     * @param unknown $data
     * @return Ambigous <Ambigous, :, string>
     */
    public static function addUser($data){

        $table = self::TABLE_NAME;
        
        return DB::insert($data, $table);
    
    }
    
    public static function getMarriage(){
        return self::$marriage;
    }
    
    public static function getIncome(){
        return self::$income;
    }
    
    public static function getEducation(){
        return self::$education;
    }
    
    public static function getLoveType(){
        return self::$love_type;
    }
    
    public static function getHouse(){
        return self::$house;
    }
    
    public static function getChildren(){
        return self::$children;
    }
    
    public static function getGender(){
        return self::$gender;
    }
    
    public static function getMarriageOptions(){
        return BackTools::optionCreate(self::$marriage);
    }
    
    public static function getIncomeOptions(){
        return BackTools::optionCreate(self::$income);
    }
    
    public static function getEducationOptions(){
        return BackTools::optionCreate(self::$education);
    }
    
    public static function getLoveTypeOptions(){
        return BackTools::optionCreate(self::$love_type);
    }
    
    public static function getHouseOptions(){
        return BackTools::optionCreate(self::$house);
    }
    
    public static function getChildrenOptions(){
        return BackTools::optionCreate(self::$children);
    }
    
}

