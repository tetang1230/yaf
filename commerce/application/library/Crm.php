<?php
/**
 * @describe:
 * @author: jichao
 * */
class Crm
{
	const SECRET = '你的密钥';

    /**
     * some API is set here
     *
     * 生成的数字签名在追加到请求的参数中去 &sign=[生成的数字签名]
     * */
	const REG_URL     = 'http://avatar.xxoo.com/wxhdReg.action?';
	const ADDRESS_URL = 'http://avatar.xxoo.com/assignWxhd.action?';

    const ALL_CITY    = 'http://avatar.xxoo.com/allHdGetCities.action?';
    const QUERY_CLUE  = 'http://avatar.xxoo.com/allHdReg.action?';
    const SAVE_CLUE   = 'http://avatar.xxoo.com/allHdAssign.action?';
    const SERVICE_API = 'http://avatar.xxoo.com/allHdGetGroups.action?';

    const MAGIC = 1314;

    private static function buildQuery($query)
    {
        $query['entryCode'] = 104;
        $query['_rt_']  = time();
        
        $sign = Crm::getSignature($query, Crm::SECRET);
        $query['sign'] = $sign;

        return http_build_query($query);
    }


    /**
     * @brief getSignature 创建接口请求数字签名
     *
     * @param: $params
     * @param: $secret
     *
     * @return: 数字签名
     */
    public static function getSignature($params, $secret)
	{
		$str = '';  //待签名字符串
		//先将参数以其参数名的字典序升序进行排序
		ksort($params);
		//遍历排序后的参数数组中的每一个key/value对
        foreach ($params as $k => $v)
        {
			//为key/value对生成一个key=value格式的字符串，并拼接到待签名字符串后面
			$str .= "{$k}={$v}";
		}
		//将签名密钥拼接到签名字符串最后面
		$str .= $secret;
		//通过md5算法为签名字符串生成一个md5签名，该签名就是我们要追加的sign参数值
		return md5($str);
	}

    // 从 crm 取城市列表的 map,暂时不考虑性能,现取.
    public static function getCityMap()
    {
        $map = array();
        $req = array();

        $api = self::ALL_CITY . self::buildQuery($req);
        $ct = new CurlTools();
        $json = $ct->get($api);
        $map  = json_decode($json, true);

        return $map;
    }

    /**
     * @brief queryClue 根据用户基本信息从 crm 里面查询线索
     *
     * @param: $condition
     *
     * @return: array 线索信息
     */
    public static function queryClue($condition)
    {
        $clue = array();

        $api = self::QUERY_CLUE . self::buildQuery($condition);
        //echo $api;
        $ct  = new CurlTools();
        $json_str = $ct->get($api);
        $json = json_decode($json_str, true);
        //print_r($json);

        if (1 == $json['result'])
        {
            $clue = $json['groups'];
        }
        else
        {
            $clue = self::MAGIC;
        }

        return $clue;
    }

    /**
     * @brief saveClue 调用 crm 接口保存线索数据
     *
     * @param: $clue
     *
     * @return: array
     */
    public static function saveClue($clue)
    {
        $api = self::SAVE_CLUE . self::buildQuery($clue);

        $ct = new CurlTools();
        $json_str = $ct->get($api);

        return json_decode($json_str, true);
    }

    /**
     * @brief getShopBaseInfo 取实全量实体店基本信息
     *
     * @return: array
     */
    public static function getShopBaseInfo()
    {
        $info = array();
        $req = array();
        
        $api = self::SERVICE_API . self::buildQuery($req);
        
        $ct = new CurlTools();
        $json = $ct->get($api);
        
        $info  = json_decode($json, true);

        return $info;
    }

    /**
     * @brief getShopBaseInfoById 通过 id 取实体店基本信息
     *
     * @param: $shop_id
     *
     * @return: array
     */
    public static function getShopBaseInfoById($shop_id)
    {
        $info = array();

        return $info;
    }

    /**
     * @brief getShopBaseInfoByCityId 通过城市 id 取城市对应的实体店的基本信息
     *
     * @param: $city_id
     *
     * @return: array
     */
    public static function getShopBaseInfoByCityId($city_id)
    {
        $info = array();
        
        $req['city'] = $city_id;
        
        $api = self::SERVICE_API . self::buildQuery($req);

        $ct = new CurlTools();
        $json = $ct->get($api);
        
        $info  = json_decode($json, true);
        
        return $info;
        
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

