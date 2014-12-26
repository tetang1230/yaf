$(function(){
    var h_height = $('#fixed_header').height();
    var f_height = $('#fixed_footer').height();
    var diff = (h_height - 0) + (f_height - 0);

    if($(window).width() < 640){
        $('#map').css('height',$(window).height() - 88 - diff).css('top', h_height - 0 + 10);
    }else{
        $('#map').css('height',$(window).height() - 120 -diff).css('top', h_height / 3 + h_height);
    }
});

// 全局容器
var finalArr = [];

var M = {};
M.lon_lat = {
    longitude: 0,
    latitude: 0
};
M.init = function(){
    M.getPoint(title, addr, telephone);
}

M.getPoint = function(title, addr, telephone){
    var geo = new BMap.Geocoder();
    geo.getPoint(addr, function(point){
        if (point) {
            //console.log(point);
            var obj = {
                title: title,
                point: point.lng + ',' + point.lat,
                address: addr,
                tel: telephone
            };

            finalArr[0] = obj;
            //console.log(finalArr);
            
            // 用户有拒绝行为,拒绝后地图装无法初始化
            navigator.geolocation.getCurrentPosition(translatePoint, handleLocationError); //定位
        }
    }/*, ""*/);
}

M.ipLocation = function(){
    var map = new BMap.Map("allmap");
    var city_dt = new BMap.LocalCity();

    //console.log(city_dt);
    city_dt.get(function(result){
        city_name = result.name;
        //console.log(city_name);
        map.centerAndZoom(city_name, 11);
    });
}

function map_init(lng, lat) {
    var map = new BMap.Map("map"); // 创建Map实例
    var point    = new BMap.Point(lng, lat); //地图中心点, 用户当前位置
    var locale_p = new BMap.Point(M.lon_lat.longitude, M.lon_lat.latitude);

    var zoom = 11;
    var distance = (map.getDistance(point, locale_p)).toFixed(2);
    console.log(distance);
    if (distance < 1000)
    {
        zoom = 13;
    }

    map.centerAndZoom(point, zoom); // 初始化地图,设置中心点坐标和地图级别。
    map.enableScrollWheelZoom(true); //启用滚轮放大缩小
    //地图、卫星、混合模式切换
    map.addControl(new BMap.MapTypeControl({mapTypes: [BMAP_NORMAL_MAP, BMAP_SATELLITE_MAP, BMAP_HYBRID_MAP]}));
    //向地图中添加缩放控件

    var ctrlNav = new window.BMap.NavigationControl({
        anchor: BMAP_ANCHOR_TOP_LEFT,
        type: BMAP_NAVIGATION_CONTROL_LARGE
    });
    map.addControl(ctrlNav);
    //向地图中添加缩略图控件
    var ctrlOve = new window.BMap.OverviewMapControl({
        anchor: BMAP_ANCHOR_BOTTOM_RIGHT,
        isOpen: 1
    });
    map.addControl(ctrlOve);
    //向地图中添加比例尺控件
    var ctrlSca = new window.BMap.ScaleControl({
        anchor: BMAP_ANCHOR_BOTTOM_LEFT
    });
    map.addControl(ctrlSca);

    var point  = []; //存放标注点经纬信息的数组
    var marker = []; //存放标注点对象的数组
    var info   = []; //存放提示信息窗口对象的数组
    var searchInfoWindow = []; //存放检索信息窗口对象的数组

    //console.log(finalArr);
    for (var i = 0; i < finalArr.length; i++) {
        var p0 = finalArr[i].point.split(",")[0]; //
        var p1 = finalArr[i].point.split(",")[1]; //按照原数组的point格式将地图点坐标的经纬度分别提出来
        point[i] = new window.BMap.Point(p0, p1); //循环生成新的地图点
        marker[i] = new window.BMap.Marker(point[i]); //按照地图点坐标生成标记
        map.addOverlay(marker[i]);
        marker[i].setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
　　　　//显示marker的title，marker多的话可以注释掉
        var label = new window.BMap.Label(finalArr[i].title, { offset: new window.BMap.Size(20, -10) });
        marker[i].setLabel(label);
        // 创建信息窗口对象
        info[i] = "<p style=’font-size:12px;lineheight:1.8em;’>" + "</br>地址：" + finalArr[i].address + "</br> 电话：" + finalArr[i].tel + "</br></p>";
        //创建百度样式检索信息窗口对象
        searchInfoWindow[i] = new BMapLib.SearchInfoWindow(map, info[i], {
                title  : finalArr[i].title,      //标题
                width  : 290,             //宽度
                height : 55,              //高度
                panel  : "panel",         //检索结果面板
                enableAutoPan : true,     //自动平移
                searchTypes   :[
                    BMAPLIB_TAB_SEARCH,   //周边检索
                    BMAPLIB_TAB_TO_HERE,  //到这里去
                    BMAPLIB_TAB_FROM_HERE //从这里出发
                ]
            });
        //添加点击事件
        marker[i].addEventListener("click",
            (function(k){
                // js 闭包
                return function(){
                    //将被点击marker置为中心
                    //map.centerAndZoom(point[k], 18);
                    //在marker上打开检索信息窗口
                    searchInfoWindow[k].open(marker[k]);
                }
            })(i)
        );
    }

    // 显示用户当前位置
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        //console.log(r);
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var mk = new BMap.Marker(r.point);
            map.addOverlay(mk);
            map.panTo(r.point);
        }
        else {
            //alert('failed' + this.getStatus());
            console.log('failed' + this.getStatus());
        }
    }, {enableHighAccuracy: true});
}

function getAddress(lng, lat, initView){
    var point = new BMap.Point(lng, lat);
    var geoc = new BMap.Geocoder();

    var myaddress = '';
    geoc.getLocation(point, function(rs){
        //console.log(rs);

        var addComp = rs.addressComponents;
        myaddress = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;

        //console.log(myaddress);
        initView(lng, lat, myaddress);
    });
}

function initView(lng, lat, address){
    map_init(lng, lat);
}

// 定位入口
function translatePoint(position){
    //console.log(position);

    var currentLat = position.coords.latitude;
    var currentLon = position.coords.longitude;
    var gpsPoint = new BMap.Point(currentLon, currentLat);
    BMap.Convertor.translate(gpsPoint, 0, initMap); //转换坐标
}

// 百度坐标转化回调
function initMap(point){
    var lng = point.lng;
    var lat = point.lat;
    
    M.lon_lat.longitude = lng;
    M.lon_lat.latitude  = lat;

    getAddress(lng, lat, initView);
}

function handleLocationError(error) { 
    switch (error.code) { 
    case 0: 
        console.log('尝试获取您的位置信息时发生错误：' + error.message); 
        break; 
    case 1: 
        alert('请开启浏览器定位');
        console.log('用户拒绝了获取位置信息请求。'); 
        //M.ipLocation();
        break; 
    case 2: 
        console.log('浏览器无法获取您的位置信息。'); 
        break; 
    case 3: 
        console.log('获取您位置信息超时。'); 
        break; 
    } 
}

// 起动入口
$(function(){
    M.init();
});

