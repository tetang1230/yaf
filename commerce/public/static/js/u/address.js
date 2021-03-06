var markerArr = [
	{ title: "百合网北京阜成门VIP服务中心", point: "116.361286,39.928504", address: "北京市西城区阜外大街2号万通大厦B座11层", tel: "4008191521" },
    { title: "百合网北京CBDVIP服务中心(直营店)</a>", point: "116.477454,39.919927", address: "北京朝阳区光华路15号泰达时代中心1号楼13层", tel: "4008191521" },
    { title: "百合网北京CBDVIP服务中心", point: "116.476862,39.920003", address: "北京朝阳区光华路15号泰达时代中心1号楼13层", tel: "4008191521" },
    { title: "百合网北京三里屯VIP服务中心", point: "116.460917,39.93849", address: "北京市朝阳区工体北路8号院三里屯SOHO2号楼B座802室", tel: "4008191521" },
    { title: "百合网天津CBD VIP服务中心", point: "117.204508,39.123562", address: "天津市和平区南京路189号津汇广场2座9-10层", tel: "4008191521" },
    { title: "百合网天津信达广场VIP服务中心", point: "117.224737,39.123016", address: "天津市和平区解放北路188号信达广场21层", tel: "4008191521" },
    { title: "百合网上海静安区VIP服务中心", point: "121.470434,31.239233", address: "上海市静安区大田路129号嘉发大厦A幢6楼G座", tel: "4008191521" },
    { title: "百合网上海黄浦区VIP服务中心", point: "121.470946,31.224635", address: "上海市黄浦区淮海中路755号新华联大厦东楼13A座、12E座", tel: "4008191521" },
    { title: "百合网上海徐汇区VIP服务中心", point: "121.464451,31.20904", address: "上海市徐汇区肇嘉浜路366号裕华大厦4楼C/D座", tel: "4008191521" },
    { title: "百合网常州九洲环宇VIP服务中心", point: "119.981196,31.785884", address: "常州市天宁区关河东路66号806室", tel: "4008191521" },
    { title: "百合网南京中山东路VIP服务中心", point: "118.79971,32.046751", address: "南京市中山东路198号龙台国际大厦1608室", tel: "4008191521" },
    { title: "百合网南京苏豪VIP服务中心", point: "118.789917,32.046384", address: "江苏省南京市中山南路8号苏豪大厦16楼", tel: "4008191521" },
    { title: "百合网南通南大街VIP服务中心", point: "120.873744,32.018016", address: "南通南大街89号（南通总部大厦）0901、0902室", tel: "4008191521" },
    { title: "百合网苏州园区VIP服务中心", point: "120.677832,31.324164", address: "苏州市工业园区星海街200号星海国际广场601", tel: "4008191521" },
    { title: "百合网苏州永捷VIP服务中心", point: "120.607073,31.310944", address: "苏州市广济南路19号（与干将西路交汇处）西城永捷1504-1505室", tel: "4008191521" },
    { title: "百合网徐州吉田VIP服务中心", point: "117.285426,34.209215", address: "徐州市云龙区汉风路以西、镜泊西路南侧（市政府西侧）吉田商务广场A栋501、529室", tel: "4008191521" },
    { title: "百合网无锡崇安VIP服务中心", point: "120.304946,31.587643", address: "无锡中山路531号红豆国际大厦1615、1616、1612室", tel: "4008191521" },
    { title: "百合网无锡新区长江北路VIP服务中心", point: "120.343392,31.573338", address: "无锡新区长江北路282号哥伦布广场17楼1708-1712", tel: "4008191521" },
    { title: "百合网盐城钱江VIP服务中心", point: "120.152764,33.36825", address: "盐城市钱江财富广场写字楼A座25楼2501室", tel: "4008191521" },
    { title: "百合网常熟亿源广场VIP服务中心", point: "120.76044,31.667222", address: "常熟海虞北路19号亿源世纪广场B座601室", tel: "4008191521" },
    { title: "百合网昆山正阳桥 VIP服务中心", point: "120.965937,31.384088", address: "昆山市震川西路111号（名仕大厦10楼1003室）", tel: "4008191521" },
    { title: "百合网吴江鸿兴 VIP服务中心", point: "120.657002,31.175631", address: "吴江区鸿兴名邸7--2001号", tel: "4008191521" },
    { title: "百合网扬州瘦西湖 VIP服务中心", point: "119.420077,32.411012", address: "扬州扬子江北路308号（东方百合园建设银行4楼）", tel: "4008191521" },
    { title: "百合网江阴万达VIP服务中心", point: "120.247741,31.904744", address: "江阴市万达广场 芦花路 407号813室", tel: "4008191521" },
    { title: "百合网淮安淮海路VIP服务中心", point: "119.037908,33.605697", address: "淮安市清河区淮海路淮海第一城天枫苑一单元802室", tel: "4008191521" },
    { title: "百合网靖江上海城VIP服务中心", point: "120.272402,32.019692", address: "靖江市上海城衡隆商务中心A座223", tel: "4008191521" },
    { title: "百合网连云港苍梧VIP服务中心", point: "119.206749,34.606324", address: "江苏省连云港市山水丽景广场B座1001-1002", tel: "4008191521" },
    { title: "百合网合肥桐城路VIP服务中心", point: "117.28835,31.87174", address: "合肥市桐城路200号富通时代大厦402室", tel: "4008191521" },
    { title: "百合网合肥市府广场VIP服务中心", point: "117.287351,31.865501", address: "安徽省合肥市庐阳区淮河路与六安路交叉口新华大厦1202", tel: "4008191521" },
    { title: "百合网淮南朝阳路VIP服务中心", point: "117.025052,32.647203", address: "淮南市田家庵区朝阳中路瑞金大厦六楼", tel: "4008191521" },
    { title: "百合网安庆新都会VIP服务中心", point: "117.11254,30.526375", address: "安庆市迎江区皖江大道迎江世纪城启航社1号楼17层", tel: "4008191521" },
    { title: "百合网六安皖西路VIP服务中心", point: "116.506308,31.756475", address: "六安市皖西路华安新宇1号楼503室", tel: "4008191521" },
    { title: "百合网阜阳财富广场VIP服务中心", point: "115.833693,32.911323", address: "阜阳市人民路香港财富广场慧园EF楼3207", tel: "4008191521" },
    { title: "百合网马鞍山八佰伴VIP服务中心", point: "118.514003,31.685461", address: "马鞍山市花山区中央花园5栋1单元1801 ", tel: "4008191521" },
    { title: "百合网芜湖侨鸿国际VIP服务中心", point: "118.3749,31.344258", address: "芜湖市镜湖区侨鸿国际商城1208室", tel: "4008191521" },
    { title: "百合网杭州下城区VIP服务中心", point: "120.175212,30.269919", address: "杭州市凤起路361号国都商务大厦1709室", tel: "4008191521" },
    { title: "百合网杭州钱江新城VIP服务中心", point: "120.214262,30.247607", address: "杭州市江干区富春308号14楼", tel: "4008191521" },
    { title: "百合网杭州城西VIP服务中心", point: "120.124975,30.288141", address: "杭州市西湖区文二西路1号，元茂大厦14层", tel: "4008191521" },
    { title: "百合网温州鹿城VIP服务中心", point: "120.689366,28.017763", address: "温州市车站大道789号第C幢307室", tel: "4008191521" },
    { title: "百合网金华金茂VIP服务中心", point: "119.658929,29.109013", address: "金华市婺城区新华街168号金茂大厦7楼东南侧", tel: "4008191521" },
    { title: "百合网宁波天一广场VIP服务中心", point: "121.562898,29.87363", address: "浙江宁波海曙区药行街42号银亿环球中心B座601", tel: "4008191521" },
    { title: "百合网丽水金贸VIP服务中心", point: "119.939501,28.455768", address: "浙江省丽水市莲都区万丰北路72号金贸大厦1810", tel: "4008191521" },
    { title: "百合网绍兴柯桥VIP服务中心", point: "120.496437,30.091781", address: "绍兴市柯桥区蓝天市心广场一号楼906", tel: "4008191521" },
    { title: "百合网长沙中天广场VIP服务中心", point: "112.98972,28.201352", address: "长沙市芙蓉区五一路中天广场写字楼21040室", tel: "4008191521" },
    { title: "百合网长沙平和堂VIP服务中心", point: "112.983845,28.200421", address: "湖南省长沙市芙蓉区黄兴中路88号湖南平和堂商贸大厦16层第04-05号", tel: "4008191521" },
    { title: "百合网永州舜德摩尔财富中心VIP服务中心", point: "111.608477,26.45553", address: "湖南省永州市冷水滩区舜德摩尔财富中心11楼1102室", tel: "4008191521" },
    { title: "百合网岳阳天伦城VIP服务中心", point: "113.130539,29.374574", address: "岳阳市岳阳楼区建湘南路天伦城银座002幢25层2506室", tel: "4008191521" },
    { title: "百合网武汉海山金谷VIP服务中心", point: "114.344742,30.557657", address: "湖北省武汉市武昌区中北路101号海山金谷一号楼18层1801", tel: "4008191521" },
    { title: "百合网武汉万达VIP服务中心", point: "114.31411,30.570142", address: "武汉市武昌万达SOHO11号楼15楼08—14室", tel: "4008191521" },
    { title: "百合网宜昌夷陵广场VIP服务中心", point: "111.298189,30.707953", address: "湖北省宜昌市西陵区夷陵大道72号九州大厦1938-2", tel: "4008191521" },
    { title: "百合网襄阳万达广场VIP服务中心", point: "112.140729,32.067423", address: "襄阳市万达广场写字楼12楼1202室", tel: "4008191521" },
    { title: "百合网广州天河区VIP服务中心", point: "113.33031,23.140994", address: "广州市天河区天河北路233号中信大厦2607", tel: "4008191521" },
    { title: "百合网广州珠江新城VIP服务中心", point: "113.327982,23.126139", address: "广州市天河区珠江新城花城大道85号高德置地广场A座2606", tel: "4008191521" },
    { title: "百合网广州国际中心VIP服务中心", point: "113.289099,23.13188", address: "广州市越秀区较场东路中华广场写字楼中华国际中心B栋5501室", tel: "4008191521" },
    { title: "百合网东莞会展中心VIP服务中心", point: "113.752346,23.019186", address: "东莞市莞城区南城区元美路华凯广场1506至1512室<br />    ", tel: "4008191521" },
    { title: "百合网东莞环球经贸VIP服务中心", point: "113.763709,23.012684", address: "东莞市南城区东莞大道19号鼎峰卡布斯国际广场A座1101-1104", tel: "4008191521" },
    { title: "百合网佛山百花广场VIP服务中心", point: "113.104739,23.017939", address: "佛山市祖庙路百花广场副楼16楼1603室（肯德基旁）", tel: "4008191521" },
    { title: "百合网深圳中心VIP服务中心", point: "114.074223,22.539283", address: "深圳市福田区彩田路2009号瀚森大厦13层", tel: "4008191521" },
    { title: "百合网深圳国贸VIP服务中心", point: "114.126113,22.546835", address: "深圳市罗湖区人民南路国贸大厦8楼B08-15", tel: "4008191521" },
    { title: "百合网深圳海岸城VIP服务中心", point: "113.940568,22.524294", address: "深圳市南山区海德三道天利中央商务广场A座2501室", tel: "4008191521" },
    { title: "百合网惠州华贸VIP服务中心", point: "114.422536,23.107958", address: "惠州市江北文昌一路7号华贸大厦2座602室", tel: "4008191521" },
    { title: "百合网湛江荣基VIP服务中心", point: "110.41807,21.225625", address: "广东省湛江市开发区观海路183号荣基商务公寓2509室", tel: "4008191521" },
    { title: "百合网江门中信VIP服务中心", point: "113.08909,22.605419", address: "江门市蓬江区迎宾大道131号中信银行大厦第5层508室", tel: "4008191521" },
    { title: "百合网汕头友谊VIP服务中心", point: "116.720303,23.371851", address: "汕头市金平区金砂东路友谊国际大厦1803-1804", tel: "4008191521" },
    { title: "百合网中山假日广场VIP服务中心", point: "113.396494,22.526948", address: "中山市石岐区兴中道6号假日广场第2幢301之2", tel: "4008191521" },
    { title: "百合网珠海国贸VIP服务中心", point: "113.588818,22.260665", address: "珠海市吉大海滨南路47号光大国际贸易中心2610室", tel: "4008191521" },
    { title: "百合网福州茶亭VIP服务中心", point: "119.311375,26.074778", address: "福州市台江区八一七中路和群众路交叉口茶亭国际26楼1号", tel: "4008191521" },
    { title: "百合网福州恒宇国际VIP服务中心", point: "119.31223,26.103146", address: "福州市鼓楼温泉支路与六一中路交叉口恒宇国际大厦B幢810室", tel: "4008191521" },
    { title: "百合网泉州万达VIP服务中心", point: "118.605136,24.888964", address: "泉州市丰泽区宝洲路万达广场万达中心B座501室", tel: "4008191521" },
    { title: "百合网莆田万达VIP服务中心", point: "119.002364,25.424303", address: "福建省莆田市城厢区万达广场8号楼401室 ", tel: "4008191521" },
    { title: "百合网厦门新景中心VIP服务中心", point: "118.127239,24.486088", address: "厦门市思明区嘉禾路25号新景中心C幢908-910室", tel: "4008191521" },
    { title: "百合网厦门轮渡VIP服务中心", point: "118.079906,24.462836", address: "厦门市思明区鹭江道钻石海岸A栋1101室", tel: "4008191521" },
    { title: "百合网北海北京路VIP服务中心", point: "109.13018,21.473276", address: "北海市北京路49号桂成花园B座1101号", tel: "4008191521" },
    { title: "百合网南宁地王VIP服务中心", point: "108.376126,22.822388", address: "南宁市青秀区金湖路59号地王大厦6层(近五象广场)", tel: "4008191521" },
    { title: "百合网南昌财富广场VIP服务中心", point: "115.91101,28.68387", address: "南昌市八一大道财富广场B座2001室", tel: "4008191521" },
    { title: "百合网保定国贸VIP服务中心", point: "115.473724,38.877047", address: "保定市时代路56号国贸大厦18层1806室", tel: "4008191521" },
    { title: "百合网唐山万达VIP服务中心", point: "118.192742,39.631254", address: "唐山市路南区万达广场B座写字楼18层1811-1812 ", tel: "4008191521" },
    { title: "百合网邯郸新世纪VIP服务中心", point: "114.503383,36.616683", address: "邯郸市人民路金世纪商务中心14层15号", tel: "4008191521" },
    { title: "百合网秦皇岛新天地VIP服务中心", point: "119.613107,39.939894", address: "秦皇岛市海港区新天地商务中心B座20层2012-2016", tel: "4008191521" },
    { title: "百合网石家庄长安广场VIP服务中心", point: "114.527763,38.048979", address: "石家庄市中山东路289号长安广场12楼1203室", tel: "4008191521" },
    { title: "百合网石家庄建设北街VIP服务中心", point: "114.518724,38.068136", address: "石家庄市建设北大街223号中浩商务楼A座23层C.D ", tel: "4008191521" },
    { title: "百合网郑州文化路VIP服务中心", point: "113.672963,34.772962", address: "郑州市金水区优胜南路26号国奥大厦12楼1212室", tel: "4008191521" },
    { title: "百合网郑州紫荆山VIP服务中心", point: "113.689114,34.759766", address: "郑州市紫荆山路商城路口裕鸿国际A座2301室", tel: "4008191521" },
    { title: "百合网郑州金水路VIP服务中心", point: "113.71742,34.767913", address: "郑州市金水路299号浦发国际金融中心701-704室", tel: "4008191521" },
    { title: "百合网河南平顶山中兴路VIP服务中心", point: "113.313353,33.747673", address: "平顶山市中兴路北段工行大厦18层", tel: "4008191521" },
    { title: "百合网新乡东方和和VIP服务中心", point: "113.877345,35.310024", address: "新乡市东方文化商业步行街12号楼2单元9楼东户", tel: "4008191521" },
    { title: "百合网焦作华融国际VIP服务中心", point: "113.255528,35.233014", address: "河南省焦作市山阳区塔南路与站前路交叉口华融国际大厦15楼10号", tel: "4008191521" },
    { title: "百合网济南解放桥VIP服务中心", point: "117.053978,36.671521", address: "济南市解放路112号历东商务大厦507室", tel: "4008191521" },
    { title: "百合网济南万达VIP服务中心", point: "117.009045,36.668344", address: "济南市经四路5号万达广场写字楼A座812室", tel: "4008191521" },
    { title: "百合网泰安财富中心VIP服务中心", point: "117.124971,36.196064", address: "泰安市东岳大街53号财富中心404", tel: "4008191521" },
    { title: "百合网淄博王府井VIP服务中心", point: "118.055669,36.812353", address: "淄博市张店区共青团西路71号园林大厦12层1207号", tel: "4008191521" },
    { title: "百合网德州天衢VIP服务中心", point: "116.329207,37.462421", address: "德州市德城区德兴路天衢明郡天翔大厦12楼1210", tel: "4008191521" },
    { title: "百合网潍坊阳光100VIP服务中心", point: "119.131257,36.713532", address: "山东省潍坊市奎文区胜利东街5051号潍坊阳光100城市广场1号楼7-1402号", tel: "4008191521" },
    { title: "百合网青岛书城VIP服务中心", point: "120.412976,36.070773", address: "青岛市香港中路100号中商大厦1208", tel: "4008191521" },
    { title: "百合网青岛中海VIP服务中心", point: "120.379942,36.093881", address: "青岛市市北区延吉路76号中海大厦9层01室", tel: "4008191521" },
    { title: "百合网太原国贸VIP服务中心", point: "112.564365,37.880436", address: "太原市杏花岭区府西街69号山西国贸中心A座905室", tel: "4008191521" },
    { title: "百合网晋中君豪VIP服务中心", point: "112.756454,37.690375", address: "晋中市榆次区君豪写字楼B座1302室", tel: "4008191521" },
    { title: "百合网兰州广场VIP服务中心", point: "103.851366,36.057541", address: "甘肃省兰州市城关区广场南路4-6号国芳大酒店18层1810室", tel: "4008191521" },
    { title: "百合网张掖甘州VIP服务中心", point: "100.46774,38.940674", address: "张掖市甘州市场工商局家属楼下华润万家后向东20米", tel: "4008191521" },
    { title: "百合网西宁夏都VIP服务中心", point: "101.774589,36.657307", address: "西宁市城北区门源路12-20号1号楼3单元31807室", tel: "4008191521" },
    { title: "百合网西安旺座国际VIP服务中心", point: "108.89703,34.242242", address: "西安市高新区唐延路1号旺座国际城C座1203号房", tel: "4008191521" },
    { title: "百合网西安赛格国际VIP服务中心", point: "108.953876,34.229684", address: "西安雁塔区长安中路123号赛格国际购物中心1704", tel: "4008191521" },
    { title: "百合网呼和浩特太伟方恒VIP服务中心", point: "111.721079,40.838894", address: "呼和浩特市新城区新华东街太伟方恒广场C座4楼0431号", tel: "4008191521" },
    { title: "百合网赤峰新天地VIP服务中心", point: "118.922103,42.2758", address: "赤峰市松山区长途汽车站对面新天地广场12号楼6楼", tel: "4008191521" },
    { title: "百合网成都春熙路VIP服务中心", point: "104.087054,30.662416", address: "成都市总府路2号时代广场A座2307", tel: "4008191521" },
    { title: "百合网成都保利中心VIP服务中心", point: "104.076419,30.630857", address: "成都市武侯区锦绣路1号保利中心东一栋908-909室", tel: "4008191521" },
    { title: "百合网乐山时代广场VIP服务中心", point: "103.752876,29.592299", address: "乐山市时代广场一期三楼写字楼329号", tel: "4008191521" },
    { title: "百合网绵阳万达VIP服务中心", point: "104.725678,31.460232", address: "绵阳市万达广场6栋1单元810", tel: "4008191521" },
    { title: "百合网重庆解放碑VIP服务中心", point: "106.583221,29.564437", address: "重庆市渝中区解放碑时代豪苑D座32-3", tel: "4008191521" },
    { title: "百合网重庆凯宾斯基VIP服务中心", point: "106.567456,29.541572", address: "重庆南岸区会展中心凯宾斯基写字楼(国汇中心)11-6", tel: "4008191521" },
    { title: "百合网贵阳星天地VIP服务中心", point: "106.716894,26.582979", address: "贵州省贵阳市南明区中山西路77号华亿大厦1栋1单元17层8号", tel: "4008191521" },
    { title: "百合网贵阳瑞金VIP服务中心", point: "106.71099,26.593495", address: "贵州省贵阳市瑞金北路128号胜鹏大厦15楼", tel: "4008191521" },
    { title: "百合网玉溪永佳VIP服务中心", point: "102.553343,24.363753", address: "云南省玉溪市红塔区玉兴路35号中轴玉玺6层603-2室", tel: "4008191521" },
    { title: "百合网昆明青年路VIP服务中心", point: "102.721145,25.048864", address: "云南省昆明市五华区人民中路20号美亚大厦16楼", tel: "4008191521" },
    { title: "百合网大连人民路VIP服务中心", point: "121.657488,38.930107", address: "大连市中山区明泽街27号时代广场A座810室", tel: "4008191521" },
    { title: "百合网大连星海广场VIP服务中心", point: "121.594643,38.895892", address: "大连市沙河口区会展路65号3单元3层4号", tel: "4008191521" },
    { title: "百合网鞍山铁东区VIP服务中心", point: "122.999696,41.11527", address: "鞍山市铁东区前进路1号国际明珠大厦17层5号", tel: "4008191521" },
    { title: "百合网盘锦水游城VIP服务中心", point: "122.083119,41.130018", address: "盘锦市兴隆台区双兴南路163号（水游城假日酒店5楼商务中心）", tel: "4008191521" },
    { title: "百合网抚顺千金路VIP服务中心", point: "123.879654,41.864043", address: "辽宁省抚顺市新抚区千金路十道街41号楼", tel: "4008191521" },
    { title: "百合网沈阳中山路VIP服务中心", point: "123.420757,41.802919", address: "沈阳市和平区中山路111号亚贸大厦1305", tel: "4008191521" },
    { title: "百合网沈阳财富中心VIP服务中心", point: "123.441334,41.820305", address: "沈阳市沈河区北站路55号财富中心C座1单元12楼", tel: "4008191521" },
    { title: "百合网大庆高新区VIP服务中心", point: "125.169683,46.58812", address: "黑龙江省大庆市高新区服务外包园b1号楼1006室", tel: "4008191521" },
    { title: "百合网哈尔滨西大直街VIP服务中心", point: "126.63181,45.747968", address: "哈尔滨西大直街118号哈特大厦2号楼1710室", tel: "4008191521" },
    { title: "百合网哈尔滨花园街VIP服务中心", point: "126.656158,45.764997", address: "哈市南岗区花园街304号恒运大厦B座8层", tel: "4008191521" },
    { title: "百合网绥化正大街VIP服务中心", point: "126.99583,46.641418", address: "绥化市北林区正大街与中直路交叉口东鑫桂公寓2楼204室", tel: "4008191521" },
    { title: "百合网牡丹江文化广场VIP服务中心", point: "129.623167,44.58775", address: "牡丹江市西安区平安街新宏基大厦19层1909", tel: "4008191521" },
    { title: "百合网鸡西和平大街VIP服务中心", point: "130.97147,45.298791", address: "鸡西市鸡冠区建井和平5号楼1单元1层2号", tel: "4008191521" },
    { title: "百合网佳木斯中山路VIP会员服务中心", point: "130.371887,46.820129", address: "佳木斯市向阳区中山路远大写字楼606室", tel: "4008191521" },
    { title: "百合网齐齐哈尔建华VIP服务中心", point: "123.959576,47.362096", address: "齐齐哈尔中华西路14号（市二院对面南走20米）", tel: "4008191521" },
    { title: "百合网吉林中海大厦VIP服务中心", point: "126.571493,43.837835", address: "吉林市丰满区吉林大街139号中海大厦9层04单元", tel: "4008191521" },
    { title: "百合网松原江北公园VIP服务中心", point: "124.840938,45.177737", address: "松原市宁江区团结街文化路131号", tel: "4008191521" },
    { title: "百合网长春自由大路VIP服务中心", point: "125.350494,43.869188", address: "长春市亚泰大街与自由大路交汇五环国际大厦1703    室", tel: "4008191521" },
    { title: "百合网长春伟峰国际VIP服务中心", point: "125.332915,43.850816", address: "长春市南关区人民大街与繁荣路交汇伟峰国际大厦1906", tel: "4008191521" }
];
