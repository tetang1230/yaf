$(document).ready(function(){
	$(".btn_upload").click(function(){
		$(this).siblings("input").trigger("click");
	});
});
