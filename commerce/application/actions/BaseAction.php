<?php
/**
 * @describe: 将 action 抽象出一个基类,把常用的方法进行简化.
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
abstract class BaseAction extends Yaf_Action_Abstract
{
    abstract public function run($arg = null);

    protected $city_map = array();

    private function initCityData()
    {
        $current_city_data = array(
            'city_code' => 0,
            'city_name' => '全国',
        );
        //$city_code = $this->getRequestParam('city_code', '');
        $city_code = isset($_COOKIE['city_code']) ? DB::escape($_COOKIE['city_code']) : '';

        if ('' == $city_code)
        {
            setcookie('city_code', '0', 0, '/'); 
        }
        else
        {
            foreach ($this->city_map as $k => $dt)
            {
                if ($city_code == $dt['cityCode'])
                {
                    $current_city_data = array(
                        'city_code' => $city_code,
                        'city_name' => $dt['cityName'],
                    );
                    break;
                }
            }
        }

        $this->assign('current_city_data', $current_city_data);
    }
    
    public function getGroupOptions($groups){
        
        $optionStr = "<option value='-1'>请选择</option>";
        
        foreach($groups as $group){
            $optionStr .= "<option value='{$group['groupId']}'>".$group['groupName']."</option>";
        }
        
        return $optionStr;
    }

    protected function beforeExecute()
    {
        // 满足特定条件的 controller 或 action 可以在此路由
        // 以及初始化一些全局属性.
        
        /**
         * 一些常用公共数据
         */
        
        $marriage = UserModel::getMarriage();
        $income = UserModel::getIncome();
        $education = UserModel::getEducation();
        $loveType = UserModel::getLoveType();
        $house = UserModel::getHouse();
        $children = UserModel::getChildren();
        $gender = UserModel::getGender();
        
        $this->assign('marriage', $marriage);
        $this->assign('income', $income);
        $this->assign('education', $education);
        $this->assign('lovetype', $loveType);
        $this->assign('house', $house);
        $this->assign('children', $children);
        $this->assign('gender', $gender);

        $current_controller = strtolower($this->getRequest()->getControllerName());

        $city_map = Crm::getCityMap();
        $this->city_map = $city_map ? $city_map : [];
        $this->assign('city_map', $city_map);
        

        $this->initCityData();
        
        if ('back' == $current_controller)
        {
            $cityOptions = "<option value='-1'>请选择</option>";
            
            if(!empty($this->city_map)){
                foreach($this->city_map as $value){
                    $cityOptions .="<option value='{$value['cityCode']}'>".$value['cityName']."</option>";
                }
            }
            $this->assign('cityOptions', $cityOptions);

            // 后台操作不会用到,防止与用户端干扰
            setcookie('city_code', '0', 0, '/');
                        
            return AdminModel::auth();
        }

        return true;
    }

    protected function afterExecute()
    {
        return true;
    }

    /**
     * @param mixed $arg,...
     * @return mixed
     */
    public function execute($arg = null)
    {
        if ($this->beforeExecute())
        {
            if ($this->run($arg))
            {
                return $this->afterExecute();
            }
        }
        return $this->afterExecute();
    }

    /**
     * @param $name
     * @param string $defaultValue
     * @return string
     */
    public function getRequestParam($name, $default = '')
    {
        return isset($_REQUEST[$name]) ? DB::escape($_REQUEST[$name]) : $default;
    }

    // 简化 assign 模板变量的操作
    public function assign($key, $value)
    {
        $this->getView()->assign($key, $value);
    }

    // 简写,要写太多的长代码.
    public function display($tpl, array $parameters = NULL)
    {
        $this->getView()->display($tpl);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

