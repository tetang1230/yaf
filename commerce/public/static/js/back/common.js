
//获取某节点下所有form元素的取值,并组织好key,value形式返回
function formParams(obj){                                                                                                                    
    var postParams = {};
    
    //$(".maskContainer input").each(function(){
    obj.find("input").each(function(){
        
        if($(this).attr('type') != 'file' && $(this).attr('type') != 'submit'){
            
            if($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio' ){
                if($(this).is(':checked') == true){
                    postParams[$(this).attr('name')] = $(this).val();
                }
            }else{
                postParams[$(this).attr('name')] = $(this).val();
            }
        }
    });
    
    //$(".maskContainer select").each(function(){
    obj.find("select").each(function(){
        postParams[$(this).attr('name')] = $(this).val();
    }); 
    
    obj.find("textarea").each(function(){
        postParams[$(this).attr('name')] = $(this).val();
    });
    
    
    return postParams;
}


//更新表单的现有元素值
function updateFormValues(obj, jsonData){

    obj.find("input").each(function(){

        if($(this).attr('type') == 'file'){
            //处理text文本框
            if(jsonData[$(this).attr('name')]){
                //$(this).val(jsonData[$(this).attr('name')]);
            	$(this).prev().attr('src', '/f/p?n='+jsonData[$(this).attr('name')]);
            }   
        } 
    	
        if($(this).attr('type') == 'text'){
            //处理text文本框
            if(jsonData[$(this).attr('name')] != ''){
                $(this).val(jsonData[$(this).attr('name')]);
            }   
        }   
            
        if($(this).attr('type') == 'checkbox'){
            //处理checkbox radio
            if(jsonData[$(this).attr('name')] == 1){ 
                $(this).attr('checked', 1); 
            }   
        }   
            
        if($(this).attr('type') == 'radio'){
            if(jsonData[$(this).attr('name')] == $(this).val()){
                $(this).attr('checked', 1); 
            }   
        }   
            
    }); 
        
    obj.find("select").each(function(){
        //处理select框
        //console.debug($(this).attr('name'));
            
        if((jsonData[$(this).attr('name')] - 0) == 0 || jsonData[$(this).attr('name')] == null ||  jsonData[$(this).attr('name')] == undefined){
            $(this).val("-1");
        }else{
            $(this).val(jsonData[$(this).attr('name')]);
        }   
            
    }); 


    obj.find("textarea").each(function(){
        //处理select框
        //console.debug($(this).attr('name'));
        
        if((jsonData[$(this).attr('name')] - 0) == 0 || jsonData[$(this).attr('name')] == null ||  jsonData[$(this).attr('name')] == undefined){

        }else{
            $(this).val(jsonData[$(this).attr('name')]);
        }
        
    });

}


//清空表单的现有元素值
function clearFormValues(obj){

    obj.find("input").each(function(){
                                
        if($(this).attr('type') == 'text'){
            //处理text文本框
            $(this).val('');
        }   
            
        if($(this).attr('type') == 'checkbox'){
            
        	//处理checkbox radio
        	if($(this).is(':checked')){
        		$(this).removeAttr('checked');
        	}
        	
        }   
            
        if($(this).attr('type') == 'radio'){
        	//处理checkbox radio
        	if($(this).is(':checked')){
        		$(this).removeAttr('checked');
        	}
        }
        
        if($(this).attr('type') == 'file'){
        	//处理checkbox radio
        	$(this).prev().attr('src', '/static/images/back/upload.png');
        } 
            
    }); 
        
    obj.find("select").each(function(){
        //处理select框
    	$(this).val("-1");
    }); 


    obj.find("textarea").each(function(){
        //处理select框
        //console.debug($(this).attr('name'));
    	$(this).val('');
        
    });
}

function optionGen(jsonData){
	
	var optionStr = '<option value="-1">请选择</option>';
	
	for(var i =0; i<jsonData.length; i++){
		optionStr += '<option value="'+jsonData[i].groupId + '">' + jsonData[i].groupName + '</option>'; 
	}
	
	return optionStr;
}

//
// ajax 上传文件+ajax post参数
// 
function ajaxFileUpload(url, postParams, fileIds)
{

    $.ajaxFileUpload
    (
        {
            url: url,               //post url
            secureuri: false,
            fileElementId: fileIds, //文件上传id
            dataType: 'json',
            data: postParams,       //其他post参数
            beforeSend:function()
            {
                $("#loading").show();
            },
            complete:function()
            {
                $("#loading").hide();
            },
            success: function (data, status)
            {
                //console.debug(data);
                document.location.reload();
                if(typeof(data.error) != 'undefined')
                {
                    if(data.error != '')
                    {
                        alert(data.error);
                    }else
                    {
                        alert(data.msg);
                    }
                }
            },                 
            error: function (data, status, e)
            {
                alert(e);
            }
        }
    )

    return false;
} 


$(document).ready(function(){

    //对于页面高度的调整
    var sidebarHeight = parseFloat($(window).height()) - parseFloat($(".header").height());                                                  
    var bodyHeight = $("body").height();
    $(".sidebar").css("min-height" , sidebarHeight);
    $(".sidebar").css("height" , bodyHeight);
    var maskHeight = parseFloat($(".sidebar").css("height")) + parseFloat($(".header").height());
    $(".mask").css("height" , maskHeight);   
 
    //每行tr加减选择图片
    $(".detail tbody tr").click(function(){                                                                                                  
        if($(this).hasClass("acitved")){
            $(this).removeClass("acitved")
                .find($("td:first-child img")).attr("src" , "/static/images/back/detaliSelect.jpg");
        } else{
            $(this).siblings().removeClass("acitved")
                .find($("td:first-child img")).attr("src" , "/static/images/back/detaliSelect.jpg");
            $(this).addClass("acitved")
                .find($("td:first-child img")).attr("src" , "/static/images/back/detaliSelectYes.jpg");
        }   
           
    }); 

    //对于图片的上传操作
    $(".btn_upload").click(function(){
        $(this).siblings("input").trigger("click");                                                                                          
    });
    
	// tab切换
	$(".tab li").click(function(){
		var index = $(".tab li").index(this);
		var $form  = $(".tabForm");
		$(this).addClass("current")
			.siblings().removeClass("current");
		$($form[index]).css("display" , "block")
			.siblings().css("display" , "none");
		$('#submit_div').css('display', 'block');
	});
	
	//根据城市code得到实体店相关信息
	$('#cities').change(function(){
		
		var cityCode = $(this).val();
		
		$.getJSON("/back/crmshop?city="+cityCode,function(jsonData){
			
			var optionStr = optionGen(jsonData);
			
			$('#groups').html(optionStr);
			
		});
	});

});
