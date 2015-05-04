yaf
===

 1. 数据库,工程目录相关配置在conf/application.ini
	 
	 通过如下方法可以得到配置文件application.ini的内容
	 >Yaf_Application::app()->getConfig()->toArray();

     如果配置文件中是这样写的

	>logger.writers.0.name='Bd\Log\StreamWriter'
logger.writers.0.options.filePath='/tmp/bdapps.log'
logger.writers.0.options.filters.1.name='Bd\Log\StrposFilter'
logger.writers.0.options.filters.1.options.needle='curlPostGet'
logger.writers.0.options.filters.1.options.priority=0
logger.writers.0.options.formatter.name='Bd\Log\FormatterPhpVar'
logger.writers.0.options.formatter.options=''

	那么获取logger可以这样获取

	```
	$arr = Yaf_Application::app()->getConfig()->logger->toArray();
	print_r($arr);exit;
	```

	Yaf_Registry, 对象注册表(或称对象仓库)是一个用于在整个应用空间(application space)内存储对象和值的容器. 通过把对象存储在其中,我们可以在整个项目的任何地方使用同一个对象.这种机制相当于一种全局存储. 我们可以通过Yaf_Registry类的静态方法来使用对象注册表. 另外,由于该类是一个数组对象,你可以使用数组形式来访问其中的类方法
	
	> Yaf_Registry::set('testconfig', $arr); //设置一个全局变量
        print_r(Yaf_Registry::get('testconfig')); //取得一个全局变量

	 
	 
 2. 初始化相关配置在application/Bootstrap.php

    所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用	

 3. controller中的文件名首字母要`大写`,如Back.php。文件中类名以'name' + 'Controller'的形式, name首字母可大写,也可小写如BackController, backController都可以。建议用首字母大写。
	controller中可以批量指定action文件的位置如下：
	```php
	
    /**
     * 后台相关action
     * @var unknown
     */
	public $actions = array(

		'index'           => 'actions/back/index.php',                  //首页欢迎页面
	    
	    //会员相关
	    'member'     => 'actions/back/user/member.php',             //会员页面
	    'adduser'      => 'actions/back/user/adduser.php',              //添加新用户
	    'ajaxuser'     => 'actions/back/user/ajaxuser.php',              // ajax用户详细信息
	    'ajaxdeleteuser' => 'actions/back/user/ajaxdeleteuser.php', //ajax删除用户
	    'ajaxupdateuser' => 'actions/back/user/ajaxupdateuser.php', //ajax删除用户
	    
	    //实体店相关
	    'shop' => 'actions/back/shop/shop.php',   //实体店首页
	    'ajaxaddshop' => 'actions/back/shop/ajaxaddshop.php',   //增加实体店
	    'ajaxshop' => 'actions/back/shop/ajaxshop.php',   //ajax查看实体店详细信息
	    'ajaxupdateshop' => 'actions/back/shop/ajaxupdateshop.php',   //ajax更新实体店信息	    
	    'ajaxdeleteshop' => 'actions/back/shop/ajaxdeleteshop.php',   //ajax删除实体店信息
        
        //成功案例相关
	    'case' => 'actions/back/case/case.php',                      //成功案例首页
	    'ajaxaddcase' => 'actions/back/case/ajaxaddcase.php',        //增加成功案例
	    'ajaxcase' => 'actions/back/case/ajaxcase.php',              //ajax查看成功案例详细信息
	    'ajaxupdatecase' => 'actions/back/case/ajaxupdatecase.php',  //ajax更新成功案例信息	    
	    'ajaxdeletecase' => 'actions/back/case/ajaxdeletecase.php',  //ajax删除成功案例信息
	        
        //活动相关
	    'act' => 'actions/back/act/act.php',                      //活动首页
	    'ajaxaddact' => 'actions/back/act/ajaxaddact.php',        //增加活动
	    'ajaxact' => 'actions/back/act/ajaxact.php',              //ajax查看活动详细信息
	    'ajaxupdateact' => 'actions/back/act/ajaxupdateact.php',  //ajax更新活动信息	    
	    'ajaxdeleteact' => 'actions/back/act/ajaxdeleteact.php',  //ajax删除活动
	    
	        
	    //crm ajax 接口数据
	    'crmcity' => 'actions/back/crm/crmcity.php',
	    'crmshop' => 'actions/back/crm/crmshop.php',
	);
	```
	当然也可以将action直接书写到controller文件中,建议用上面的写法,如果controller中action比较少,可直接写在controller中
	
4 action文件名要小写,文件中类名以'name' + 'Action'的形式,name首字母可大写,可小写,建议首字母大写。
action中如果没有指定渲染的view页面,会默认寻找'name'.phtml。如/back/user/member.php，会自动去寻找views/back/member.phtml.如果想改变默认渲染的位置,可以用如下代码：
	
```php
	
	$this->getView()->display('user/member.html');//表示去寻找views/user/member.phtml,并渲染
	
```
	
	有的时候不需要渲染静态页面,比如只返回json数据,可以通过如下代码来禁止渲染view页面
	
```php
	
	Yaf_Dispatcher::getInstance()->disableView();
	
```

	如下代码是赋值操作,以备模板中使用
	
```php
	
	$this->getView()->assign($key, $value);
	
```
5 view中一些用法
	
	action中assign过来一个shops数组变量，在view中可以像下面这样使用
	
```php
			<?php 
                            if(isset($shops) && !empty($shops)){
                                    $cnt = 1;
                                    foreach($shops as $shop){
                        ?>
						
						<tr id='shop_<?php echo $shop['id'];?>'>
							<td><img src="/static/images/back/detaliSelect.jpg" alt=""></td>
							<td><?php echo $cnt; ?></td>
							<td><?php echo $shop['groupId'];?></td>
							<td><?php echo $shop['cityCode'];?></td>
							<td><?php echo $shop['shop_addr'];?></td>
						</tr>
						
						
						<?php 
					                   $cnt++;
                                    }
                            }
                        ?>
```

view中如何include一个html页面(比如header,footer这些公共资源,所有页面都引入即可)

```php
//shop.phtml
//比如在shop.phtml中引入一个头文件,并将cssArr这个变量assign到back/header.phtml中
<?php
echo Yaf_View_Simple::render('back/header.phtml', array('cssArr'=>array('sy.css')));
?>

```

```html

// back/header.phtml
// 被引入的头文件中可以通过传进来的cssArr变量,来引入一些某些页面独有的css,比如上面shop.phtml需要引入sy.css,这个写法很妙

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>百合实体店-首页</title>
		<link rel="stylesheet" href="/static/css/back/reset.css?v=<?php echo BACK; ?>">
	   <?php 
		if(isset($cssArr)){
		    foreach($cssArr as $css){
		        echo "<link rel='stylesheet' href='/static/css/back/$css?v=".BACK." '>\n";
		    }
		}
		?>
		<script src="/static/js/lib/jquery.js"></script>
		<script src="/static/js/back/ajaxfileupload.js"></script>
	        <script src="/static/js/back/common.js"></script>
	        <script src="/static/js/back/uploadPreview.min.js"></script>
		</head>

```

6 项目目录下library目录下的php文件的类, 都会被自动载入,调用的时候直接使用即可,注意下类的命名方式
文件夹_文件夹_文件夹,例如：apVer5d6d0_User_User
代表library/apVer5d6d0/User/User.php文件中有个类叫apVer5d6d0_User_User




7 需要对异常进行获取,并做相应处理(显示,或者记录日志)时,应做如下配置
 	
 ```php

	1) 对入口文件index.php做如下配置
	
	define("APP_PATH",  __DIR__);  
	$app = new Yaf_Application(APP_PATH . "/conf/application.ini");  
	$app->getDispatcher()->catchException(true); //添加一行这样的代码
	//上面这行等同于在application.ini中添加application.dispatcher.catchException = TRUE
	$app->bootstrap()->run();
	
	2)并添加一个Error controller,进行日志处理
	
	class ErrorController extends Yaf_Controller_Abstract {
	    public function errorAction($exception) {
	        Yaf_Dispatcher::getInstance()->disableView();
	        /* error occurs */
	        switch ($exception->getCode()) {
	            case YAF_ERR_NOTFOUND_MODULE:
	            case YAF_ERR_NOTFOUND_CONTROLLER:
	            case YAF_ERR_NOTFOUND_ACTION:
	            case YAF_ERR_NOTFOUND_VIEW:
	                echo 404, ":", $exception->getMessage();
	                break;
	            default :
	                $message = $exception->getMessage();
	                echo 0, ":", $exception->getMessage();
	                break;
	        }
	    }
	}
	
```

8 plugin用法

	在application中建立plugins文件夹,然后里面建立一个文件,比如Sample.php代码如下

```php
class SamplePlugin extends Yaf_Plugin_Abstract {

    public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
    }

    public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        //print_r($response);exit;
        echo 'routerShutdown <br />';
    }

    public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
       
        echo 'dispatchLoopStartup <br />';
    }

    public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        //print_r()
        //print_r($request->getRequestUri());
        $arr = Yaf_Application::app()->getConfig()->logger->toArray();
        print_r($arr);exit;
        //Yaf_Registry::set('testconfig', $arr);
        //print_r(Yaf_Registry::get('testconfig'));
        echo 'preDispatch <br />';
    }

    public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        //var_dump($request);exit;
        echo 'postDispatch <br />';
    }

    public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
    }
}

	
```

9 通过php.ini中配置环境,自定义自动加载

```conf
[yaf]                                                                                                               
extension=yaf.so
yaf.use_spl_autoload = "On"
yaf.environ="test"
;在application.ini中会自动读取[test:yaf]
;块中的配置文件的东西
;这个功能很好用,你可以在application中,提前写好[test:yaf]和[product:yaf]的配置
;test环境中自动读取test的配置块内容,product会自动读取线上的配置块内容
;当然测试环境上你要yaf.environ="test"
;默认的yaf.environ就是product环境
```	

 下面是一个自动加载的例子
 
 ```
  1) 在www/index.php(项目的入口文件)中,代码如下
     	
     	//定义一个常量,以后要用到
     	define('APPLICATION_ROOT', substr(dirname(__FILE__), 0, -16));
	$app = new Yaf_Application(APPLICATION_ROOT.'/application/conf/application.ini');
	$app->bootstrap()->run();
  
  2) 在和application同级的目录中添加上自定义加载的代码yafCustomLoader.php,代码如下
  	
	/**
	 * 自定义文件加载器，完成在特定文件夹内加载文.
	 */
	class yafCustomLoader
	{
	    const NS_SEPARATOR     = '\\';
	    const PREFIX_SEPARATOR = '_';
	
	    public static function register()
	    {   
	        spl_autoload_register(array(__CLASS__, 'autoload'));
	    }   
	
	    public static function autoload($class)
	    {   
	        $classLoaded = false;
	        //加载Model类,自动加载model类
	        if (substr($class, -5, 5) == 'Model') {
	            $filePath = sprintf('%s/%s.php', APPLICATION_ROOT.'/models', substr($class, 0, -5));
	            if (file_exists($filePath)) {
	                include $filePath;
	                $classLoaded = true;
	            }   
	        }   
	        if (!$classLoaded && PHP_GLOBAL_LIBRARY_DIRECTORY) {
	            $filePath = self::transformClassNameToFilename($class, PHP_GLOBAL_LIBRARY_DIRECTORY);
	            if (file_exists($filePath)) {
	                include $filePath;
	                $classLoaded = true;
	            }   
	        }   
	                                                                                                                                             
	        return true;
	    } 
	   
	    /**
	     * Transform the class name to a filename.
	     *
	     * @param string $class
	     * @param string $directory
	     *
	     * @return string or array
	     */
	     
	    protected static function transformClassNameToFilename($class, $directory)
	    {
	        // $class may contain a namespace portion, in  which case we need
	        // to preserve any underscores in that portion.
	        // 对于用namespace的文件,如何自定义加载
	        
	        $matches = array();
	        preg_match('/(?P<namespace>.+\\\)?(?P<class>[^\\\]+$)/', $class, $matches);
	        //使用正则命名子组将namespace和class分别放到$matches数组中
	        
	
	        $class     = (isset($matches['class'])) ? $matches['class'] : '';
	        $namespace = (isset($matches['namespace'])) ? $matches['namespace'] : '';
	        $class = str_replace(self::PREFIX_SEPARATOR, DIRECTORY_SEPARATOR, $class);
	        $namespace = str_replace(self::NS_SEPARATOR, DIRECTORY_SEPARATOR, $namespace);
	        $returnVal = '';
	        if (is_array($directory)) {
	            $returnVal = array();
	            foreach ($directory as $path) {
	                $path = $path.DIRECTORY_SEPARATOR;
	                $returnVal[] = $path.$namespace.$class.'.php';
	            }
	        } else {
	            $path = $directory.DIRECTORY_SEPARATOR;
	            $returnVal = $path.$namespace.$class.'.php';
	        }
	
	        return $returnVal;
	    }
	}
  3) 在application/Bootstrap.php中添加写初始化的代码,如下
     
	class Bootstrap extends Yaf_Bootstrap_Abstract
	{
	    public function _initRegCustomerLoader()
	    {   
	        include APPLICATION_ROOT.'/yafCustomLoader.php';
	        yafCustomLoader::register();
	    }   
	
	    public function _initConfig()
	    {   
	        //脚本启动时间
	        define('NOW', isset($_SERVER['REQUEST_TIME']) ? $_SERVER['REQUEST_TIME'] : time());
		//模式(1.开发、2.测内、6.测外、7.线上)
	        define('DEVELOP_LEVEL', isset($_SERVER['BHPHP_DEVELOP_LEVEL']) ? $_SERVER['BHPHP_DEVELOP_LEVEL'] : 7); 
	
		//载入配置文件
	        $arrConfig = Yaf_Application::app()->getConfig();
	
	        define('TRACEID', $arrConfig->traceID);
	        define('SYSTEMID', $arrConfig->systemID);
	
		//php全局类库路径
	        if (empty($arrConfig->phpGlobalLibraryDirectory)) {
	            define('PHP_GLOBAL_LIBRARY_DIRECTORY', realpath(APPLICATION_ROOT.'/..').'/BHPhpGlobalLibrary_publish');
	        } else {
	            define('PHP_GLOBAL_LIBRARY_DIRECTORY', $arrConfig->phpGlobalLibraryDirectory);
	        }   
	
		//保存配置文件
	        Yaf_Registry::set('config', $arrConfig);
	
		//配置cache
	        define('APPLICATION_USE_CACHE', $arrConfig->usecache);
	        BH\Cache\MemCached::getInstance()->init($arrConfig->memcache->toArray());
	        
	        
	        BH\Service\UserProfile\UserProfile::$useV2 = true;
	        BH\Service\BHRegister\BHRegister::$useV2 = true;
	        BH\Service\UserInfoModify\UserInfoModify::$useV2 = true;
	    }
	
	    public function _initLogger()
	    {
	        $LogManager = null;
	        $writerConfig = array();
	
	        if (Yaf_Registry::get('config')->logger->writeLog) {
	            $writerConfig = array_merge($writerConfig, Yaf_Registry::get('config')->logger->writers->toArray());
	        }
	
	        $SearchConfig = Yaf_Registry::get('SearchConfig');
	        if (isset($SearchConfig['logger']) && $SearchConfig['logger']['writeLog']) {
	            $writerConfig = array_merge($writerConfig, $SearchConfig['logger']['writers']);
	            unset($SearchConfig);
	        }
	
	        if (!empty($writerConfig)) {
	            BH\Log\Logger::setLogManager(new BH\Log\LogManager(array('writers' => $writerConfig)));
	            unset($writerConfig);
	        }
	    }
	
	    public function getConfig($iniFileName)
	    {
	        return new Yaf_Config_ini(APPLICATION_ROOT.'/application/conf/'.$iniFileName);
	    }
	}                                                                                                            
 4) application/conf/application.ini的配置示例代码如下
 

	[yaf]                                                                                                                                        
	;APPLICATION_PATH is the constant defined in index.php
	;通用配置不需修改
	application.dispatcher.catchException = false
	application.directory = APPLICATION_ROOT"/application/"
	application.library.directory = APPLICATION_ROOT"/library/"
	
	;可以访问的接口版本,只用于手机端服务器
	bhApps.availableApVer.0='5.6.0'
	bhApps.availableApVer.1='5.6.2'
	bhApps.availableApVer.2='5.6.3'
	
	;可以访问的接口,只用于手机端服务器
	bhApps.availableController.0='register'
	bhApps.availableController.1='user'
	bhApps.availableController.2='search'
	bhApps.availableController.3='payment'
	bhApps.availableController.4='bd'
	
	;product section inherit from yaf section
	[product:yaf]
	
	phpGlobalLibraryDirectory='/home/work/bd/bdPhpGlobalLibrary_publish'
	
	usecache=true
	cachePreKey='bhApps_'
	memcache.0.0 = 'memcached.service.bd'
	memcache.0.1 = 30002
	memcache.0.2 = 100 
	
	;日志文件配置
	;logger config
	logger.writeLog=false
	logger.writers.0.name='Bd\Log\StreamWriter'
	logger.writers.0.options.filePath='/tmp/bdapps.log'
	
	logger.writers.0.options.filters.1.name='Bd\Log\StrposFilter'
	logger.writers.0.options.filters.1.options.needle='curlPostGet
	logger.writers.0.options.filters.1.options.priority=0
	
	logger.writers.0.options.formatter.name='Bd\Log\FormatterPhpVar'
	logger.writers.0.options.formatter.options=''
	
	[test:yaf]
	
	//指定类库路径
	traceID=1
	systemID=2
	phpGlobalLibraryDirectory='/home/work/bd/bdPhpGlobalLibrary_develop'
	
	;全局cache配置
	usecache=true
	;memcache.0.0 = '192.168.0.216'
	;memcache.0.1 = 11211
	;memcache.0.2 = 100
	memcache.0.0 = '192.168.22.14'
	memcache.0.1 = 11211
	memcache.0.2 = 100
	
	
	;日志文件配置
	;logger config
	logger.writeLog=true
	logger.writers.0.name='Bd\Log\StreamWriter'
	logger.writers.0.options.filePath='/tmp/plus.log'
	
	logger.writers.0.options.filters.1.name='Bd\Log\StrposFilter'
	logger.writers.0.options.filters.1.options.needle='curlPostGet'
	logger.writers.0.options.filters.1.options.priority=0
	
	logger.writers.0.options.formatter.name='Bd\Log\FormatterPhpVar'
	;logger.writers.0.options.formatter.name='Bd\Log\FormatterBase'
	logger.writers.0.options.formatter.options=''                                                                                                
  


	
10 通过registerLocalNameSpace注册本地类名前缀

```php

class Bootstrap extends Yaf_Bootstrap_Abstract {
    public function _initLoader(Yaf_Dispatcher $dispatcher) {
        /* 注册本地类名前缀, 这部分类名将会在本地类库查找 */
        Yaf_Loader::getInstance()->registerLocalNameSpace(
            array(
                 'Comm',
                 'Tool',
                 'Dr',
                 'Ds',
                 'Dw',
                 'Do',
                 'Cache',
                 'Page',
                 'Pl',
                 'Plc',
                 'V36',
                 'Data',
                 'Zymo',
                 'Rightmod',
                 'Exception',
                 'Pls',
                 'Model'
            )); 
    }
}
```
文件目录结构如下

![library目录结构](https://github.com/tetang1230/yaf/blob/master/pics/lib_tree.png)

下方是示例文件

```php

class Comm_Argchecker_String{
    
    public static function testStr($string){
 	//your code;
    }
}
```
调用时直接Comm_Argchecker_String::testStr();

	
另外例子中将图片存放到数据库表中了(需求比较特殊),一般情况不骗不建议放到数据库中
关键代码如下：

$fileData['bin'] = file_get_contents($file['tmp_name']);//获取图片二进制内容
入库时候要用addslashes处理后再入库

入库图片需要展示的时候,可以专门写一个action处理
参考application/controllers/F.php

```php

$sql = sprintf('SELECT * FROM `%s` WHERE hash = "%s"', PicModel::TABLE_NAME, $hash);
$image_data = DB::get($sql);
if (is_array($image_data) && count($image_data))
{   
header('Content-Type: ' . $image_data['mime']);
//echo htmlspecialchars_decode($image_data['bin'], ENT_QUOTES);
//echo stripcslashes($image_data['bin']);
echo $image_data['bin'];
exit;
} 

```
 

	
yaf总结
以下是nginx site配置文件

```conf
server {
    #listen 80;
    listen 80;
    server_name commerce.com;
    charset utf-8;
    root /home/chester/bd/commerce/trunk/public;
    #最后面的main是和主配置的一样的,这样就能使用主配置的格式了
    access_log logs/commerce.log main;
    location / {
        index index.html index.htm index.php;
    }
    #error_page 404 /404.html;
    # redirect server error pages to the static page /50x.html
    #
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
        root html;
    }
    location ~ /static/ {
        rewrite "^/static/(.*)$" /static/$1 break;
    }
    # 不记录 favicon.ico 错误日志
    location ~ (favicon.ico){
        log_not_found off;
        expires 100d;
        access_log off;
        break;
    }
    # 静态文件设置过期时间
    location ~* \.(ico|css|js|gif|jpe?g|png)(\?[0-9]+)?$ {
        expires 100d;
        break;
    }
    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000

    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param BD_ENV test;
        fastcgi_param  SCRIPT_FILENAME   $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
	
    location ~ / {
        rewrite "^(.*)$" /index.php break; #开启rewrite,所有非php请求地址,全重写到index.php
        fastcgi_pass 127.0.0.1:9000;
	fastcgi_index index.php;
        fastcgi_param BD_ENV test;
	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    
    }

    location ~ /public/ {
        rewrite "^/public/(.*)$" /public/$1 break;
    }
}
```

