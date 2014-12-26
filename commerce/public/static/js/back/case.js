

$(function(){

	var uid = '';
	var add = '';
	var edit = '';
	
	$("#eachuser tr").click(function(){
		if($(this).attr('class') == 'acitved'){
			uid = $(this).attr('id').split('_')[1];
		}else{
			uid = null;
		}
		
	});
	
	
	//添加和更新操作
	$("#btn_submit").click(function(){
			
			var error = 0;
			var needAth = $(".needAth");
			
			//检查必填项
			needAth.each(function(){
				if($(this).val() == ""){
					$(this).css("border" , "2px solid #f1736a");
					error--;
				}else{
					$(this).css("border" , "1px solid #abaeb5");
				}
			});

			if(error >= 0){
				
				//不是增加就是更新
				if(add == 1){
					//添加
                    var url = '/back/ajaxaddcase';
                    var postParams = formParams($(".maskContainer"));
                    var fileIds = ['hongniang', 'anlione', 'anlitwo'];
                    //console.debug(postParams);return false;
				    ajaxFileUpload(url, postParams, fileIds);

				}else{
					//更新
					
						var url = '/back/ajaxupdatecase?id='+uid;
						var updateParams = formParams($('.maskContainer'));
						var fileIds = ['hongniang', 'anlione', 'anlitwo'];
					    ajaxFileUpload(url, updateParams, fileIds);
					
						/*
						var updateParams = formParams($('.maskContainer'));
					
						$.post('/back/ajaxupdatecase?id='+uid, updateParams,function(data) {
							   		console.debug(updateParams);
							   		document.location.reload();
							 	},
							 'json'
						);
						*/
				}
				
				//ajax post 文件 以及相关参数
				//success();
			}else{
				alert("请检查基本资料和简介中必填项是否都填写完毕！")
			}
			
			return false
		});
		
	
		//弹出"添加,编辑"层
		$("#add , #edit").click(function(){
			
			clearFormValues($(".maskContainer"));
			
			if($(this).attr('id') == 'edit'){
				
				//如果当前为编辑操作
				edit = 1;
				add = 0;
				
				//编辑单条用户信息
				if((uid - 0) == 0){
					alert("先选择,再进行此操作.");
					return false;
				}
				
				$.getJSON("/back/ajaxcase?id="+uid,function(jsonData){

				    updateFormValues($('.maskContainer'), jsonData);	
				    

				});
			}else{
				//如果当前为添加操作
				edit = 0;
				add = 1;
			}
			
			$(".mask").css("display" , "block");
			$(".mask .maskContainer").css("display" , "block");
		});
		
		//调出删除弹层
		$("#delete").click(function(){
			
			if(uid == null || uid ==''){
				alert("先选择,再进行此操作.");
				return false;
			}
			
			$(".mask").css("display" , "block");
			$(".mask .deleteConfirm").css("display" , "block");
		});
		
		
		//删除操作
		$(".closeMask").click(function(){
			
			if($(this).attr('id') == 'btn_deleteConfirm'){
				$.getJSON("/back/ajaxdeletecase?id="+uid,function(jsonData){
					if(jsonData == false){
						alert('删除失败');
					}
				});
				
				document.location.reload(); 
			}
			
			$(".mask").css("display" , "none");
			$(".mask .maskContainer").css("display" , "none");
			$(".mask .maskAddSuccess").css("display" , "none");
			
			return false;
		});
		
		new uploadPreview({ UpBtn: "hongniang",  ImgShow: "imghongniang"});
		new uploadPreview({ UpBtn: "anlione",  ImgShow: "imgone"});
		new uploadPreview({ UpBtn: "anlitwo",  ImgShow: "imgtwo"});
		
});


	// 提交成功弹出层
	function success(){
		$(".maskContainer").css("display" , "none");
		$(".maskAddSuccess").css("display" , "block");
	}
