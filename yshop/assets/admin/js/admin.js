$(function(){
	showTime();
	setInterval(showTime, 1000);
	leftNav();
	logout();
})


function leftNav() {
	$(".left>ul>li>a").click(function(){
		var $ul = $(this).next("ul");
		var $i = $(this).find(".drop-icon").children("i");
		if($ul.hasClass("open"))
		{
			$ul.removeClass("open").slideUp("fast");
			$i.attr("class", "fa fa-chevron-left");

		}else{
			$ul.addClass("open").slideDown("fast");
			$i.attr("class", "fa fa-chevron-down");
		}	
	})
}

function showTime() {
	var time = new Date();
	$("#time").text(time.toLocaleString());
}

function logout() {
	$(".user-info li:last").click(function(){
		if(confirm('确定退出？')){
			return true;
		} else {
			return false;
		}
	})
}
