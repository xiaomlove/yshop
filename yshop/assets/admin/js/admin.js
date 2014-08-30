$(function(){
	showTime();
	setInterval(showTime, 1000);
	leftNav();
	expandActiveMenu();
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

function expandActiveMenu() {
	$("#left-menu").find(".menu-active").parent().addClass("open").slideDown();
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

function showLoading(){
	
	$("#bgDiv, #loadingImg img").show();
}
function hideLoading(text){
	
	$("#bgDiv, #loadingImg img").hide();
	if(text === true){			
		$("#loadingImg .saveSuccess").show().fadeOut(1500, function(){
			$(this).hide();				
		});

	}
	
}