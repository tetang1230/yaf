$(document).ready(function(){
	var sidebarHeight = parseFloat($(window).height()) - parseFloat($(".header").height());
	var bodyHeight = $("body").height();
	$(".sidebar").css("min-height" , sidebarHeight);
	$(".sidebar").css("height" , bodyHeight);
	var maskHeight = parseFloat($(".sidebar").css("height")) + parseFloat($(".header").height());
	$(".mask").css("height" , maskHeight);
});