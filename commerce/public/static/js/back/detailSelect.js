$(document).ready(function(){
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
});