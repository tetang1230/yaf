var query_data = {};
var clue = {};
clue.query = function(){
    var api = '/u/queryclue';
    query_data['city'] = $.cookie('city_code');

    $.post(api, query_data, function(json_str){
        var json = window.JSON.parse(json_str);
        if (0 == json.error)
        {
            crm.build_store(json.data); 
            $(".mask").css("display" , "block");
        }
        else
        {
            alert(json.msg);
        }
    });
}

clue.save = function(){
    var api = '/u/saveclue';
    query_data['city'] = $.cookie('city_code');

    if (query_data.groupId)
    {
        $.post(api, query_data, function(json_str){
            var json = window.JSON.parse(json_str);
            if (0 == json.error || 1 == json.error)
            {
                $(".chooseStore").css("display" , "none");
                $(".chooseStoreSucceed").css("display" , "block");

                if (1 == json.error)
                {
                    alert(json.msg);
                }
            }
            else
            {
                alert(json.msg);
            }
        });
    }
}

var crm = {};
crm.build_store = function(data){
    var html = '';
    for (var k in data)
    {
        var obj = data[k]; 
        html += '<label gid="' + obj.groupId + '" for="store_' + obj.groupId + '" class="store">' + obj.groupName + '</label>';
        html += '<input id="store_' + obj.groupId +'" type="radio" value="' + obj.groupId + '" gid="' + obj.groupId + '" />';
    }

    $('#crm_store').html(html);
    setTimeout(function(){
        $('.store').unbind('click').bind('click', function(){
            $('.store').removeClass("storeActived");
            $(this).addClass("storeActived");

            var groupId = $(this).attr('gid');
            query_data['groupId'] = groupId;
        });
    }, 800);
    
}

$(function() {
	$paddingTop = $(".title_headerWrapper").height();
	$(".content").css("padding-top" , $paddingTop);
	$(".confirm , .confirmStore").bind("click" , function(event){
		event.preventDefault();
	});
	$(window).bind("scroll" , function(){
		if($(window).scrollTop() > 0){
			$(".title_headerWrapper").css("border-bottom" , "2px solid #ed6c00");
		}
		else{
			$(".title_headerWrapper").css("border" , "none");
		}
	});
	//$(".store").bind("click" , function(){
	//	$(this).addClass("storeActived")
	//		.siblings().removeClass("storeActived");
	//});
	$(".btn_storeSex").bind("click" , function(){
		$(this).addClass("storeFormSexActived")
			.siblings().removeClass("storeFormSexActived");
        var gender = $(this).attr('gender');
        $.cookie('gender', gender, {path: '/'});
	});

	$(".select_city").bind("click" , function(){
        var code = $(this).attr('code');
        $.cookie('city_code', code, {path: '/'});
        var city_name = $(this).html();
        $('#current_city').html('&middot;' + city_name);

        //$('#citySelect').hide();
        window.location.reload();
	});

	$(".confirmStore").bind("click" , function(){
        clue.save();
	});

	$(".btn_citySelect").bind("click" , function(event){
		event.preventDefault();
		$(".citySelect").css("display" , "block");
		var myScroll = new IScroll('#citySelect', {momentum:false , bounce:false ,click:true});
		document.addEventListener('touchmove', function (e) { e.preventDefault(); }, true);
	});
});

$(document).ready(function(){
    $('#userName, #mobile').focus(function(){
        $(this).css('border-bottom', '1px #999 solid');
    });
});

$(window).load(function(){
	$paddingBottom = $(".nav_footerWrapper").height();
	$(".content").css("padding-bottom" , $paddingBottom);
	var bodyheight = $("body").height();
	$(".mask").css("height" , bodyheight);
	$(".confirm").bind("click" , function(event){
		event.preventDefault();
		$(window).bind("touchmove" , function(event){
			event.preventDefault();
		});

        var userName = $('#userName').val();
        var mobile   = $('#mobile').val();
        if (userName && mobile)
        {
            if (! /^1[3|4|5|8|7]\d{9}$/.test(mobile))
            {
                alert('亲,输入的电话号码有误,请认真恋爱.');
                $('#mobile').css('border-bottom', '2px red solid');
                return false;
            }

            query_data['userName'] = userName;
            query_data['mobile']   = mobile;
            clue.query();
        }
        else
        {
            $('#userName, #mobile').css('border-bottom', '2px red solid');
        }
	});
});
