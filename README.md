yaf
===

1. 数据库,工程目录相关配置在conf/application.ini
2. 初始化相关配置在application/Bootstrap.php

另外例子中将图片存放到数据库表中了(需求比较特殊),一般情况不骗不建议放到数据库中
关键代码如下：

$fileData['bin'] = file_get_contents($file['tmp_name']);//获取图片二进制内容
入库时候要用addslashes处理后再入库

入库图片需要展示的时候,可以专门写一个action处理
参考application/controllers/F.php

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
	
	location ~ / {
        rewrite "^(.*)$" /index.php break;
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

