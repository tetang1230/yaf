$(document).ready(function(){
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
});
