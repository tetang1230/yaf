yaf
===

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

