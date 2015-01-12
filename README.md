yaf
===

* 数据库,工程目录相关配置在conf/application.ini
* 初始化相关配置在application/Bootstrap.php
* controller中的文件名首字母要`大写`,如Back.php。文件中类名以'name' + 'Controller'的形式, name首字母可大写,也可小写如BackController, backController都可以。建议用首字母大写。
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
	
* action文件名要小写,文件中类名以'name' + 'Action'的形式,name首字母可大写,可小写,建议首字母大写。
action中如果没有指定渲染的view页面,会默认寻找'name'.phtml。如/back/user/member.php，会自动去寻找views/back/member.phtml.如果想改变默认渲染的位置,可以用如下代码：
	
	```php
	$this->getView()->display('user/member.html');//表示去寻找views/user/member.phtml,并渲染
	```
	
	有的时候不需要渲染静态页面,比如只返回json数据,可以通过如下代码来禁止渲染view页面
	
	```php
	Yaf_Dispatcher::getInstance()->disableView();
	```


* 需要对异常进行获取,并做相应处理(显示,或者记录日志)时,应做如下配置
 	
 	```php

	1) 对入口文件index.php做如下配置
	
	define("APP_PATH",  __DIR__);  
	$app = new Yaf_Application(APP_PATH . "/conf/application.ini");  
	$app->getDispatcher()->catchException(true); //添加一行这样的代码
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
    root /home/chester/baihe/commerce/trunk/public;
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
        fastcgi_param BAIHE_ENV test;
        fastcgi_param  SCRIPT_FILENAME   $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
	
    location ~ / {
        rewrite "^(.*)$" /index.php break; #开启rewrite,所有非php请求地址,全重写到index.php
        fastcgi_pass 127.0.0.1:9000;
		fastcgi_index index.php;
        fastcgi_param BAIHE_ENV test;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    
    }

    location ~ /public/ {
        rewrite "^/public/(.*)$" /public/$1 break;
    }
}
```

