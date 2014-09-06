$(function(){
	showTime();
	setInterval(showTime, 1000);
	leftNav();
//	expandActiveMenu();
	logout();
});


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
	$("#left-menu").find(".menu-active").parent().addClass("open").slideDown()
	.prev().find(".drop-icon").children("i").attr("class", "fa fa-chevron-down");
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
function getObjectURL(file) {
	if(file.type.indexOf("image") == 0){
		if(file.size < 1024000){
			if(file.type.indexOf("jpeg") !== 6){
				alert("请使用jpg格式的图片");
				return false;
			}else{
				var url = null ; 
			    if (window.createObjectURL!=undefined) { // basic
			        url = window.createObjectURL(file) ;
			    } else if (window.URL!=undefined) { // mozilla(firefox)
			        url = window.URL.createObjectURL(file) ;
			    } else if (window.webkitURL!=undefined) { // webkit or chrome
			        url = window.webkitURL.createObjectURL(file) ;
			    }
			    return url ;
			}
		}else{
			alert('图片应该小于1M');
			
			return false;
		}
	}else{
		alert("不是图片");
		return false;
	}
    
}

/*单张图片预览上传
 * @param inputId input框的id
 * @param imgWrapId 包裹预览图片的元素(一般为div)的id
 * 
 * */
function previewUploadImg(inputId, imgWrapId){
	$("#"+inputId).change(function(){
		var url = getObjectURL(this.files[0]);
		if(url){
			$("#cancle-img").remove();
			var $div = $("#"+imgWrapId);
			if($("#img-preview").length == 0){
				$div.append('<img style="max-width: 100px;max-height:50px;position:absolute;z-index:99" id="img-preview" src="">');
			}
			var $img = $("#img-preview");
			$img.attr("src", url).mouseover(function(){
				if($div.find("#cancle-img").length<=0){
					$div.append("<i class='fa fa-times fa-2x' id='cancle-img'></i>");
					var $cancle = $("#cancle-img");
					$cancle.css({
						"color": "red",
						"position": "absolute",
						"z-index": "99",
						"top": "-15px",
						"left": ($img.outerWidth()+10)+"px",
						"cursor": "pointer",
					}).click(function(){
						$("#brand_logo_img").val('');
						$img.attr("src", "");
						$cancle.remove();
								
					});
				}
			})
			.mouseout(function(e){
				var offset = $img.offset();
				$("body").on("mousemove", function(event){
					var e = event? event: window.event;
					if(e.pageX > offset.left + 50 + $img.width() || 
							e.pageY > offset.top + 50 + $img.height() ||
							e.pageX < offset.left - 50 || e.pageY < offset.top - 50){
						$("#cancle-img").remove();
						$("body").off("mousemove");
						
					}
				});
			})
			
		}else{
			$("#"+inputId).val('');
		}
	});
}

/*删除编辑时的图片
 * @param imgId 待删除图片id
 * @param wrapId 包裹图上容器的id
 * @param actionUrl 删除操作的请求url
 * 
 * */
function delImg(imgId, wrapId, actionUrl){
	var $wrap = $("#"+wrapId);
	var $img = $("#"+imgId);
	$img.mouseover(function(){
		if($wrap.find("#cancle-img").length<=0){
			$wrap.append("<i class='fa fa-times fa-2x' id='cancle-img'></i>");
			var $cancle = $("#cancle-img");
			$cancle.css({
				"color": "red",
				"position": "absolute",
				"z-index": "99",
				"top": "-15px",
				"left": ($img.outerWidth()+10)+"px",
				"cursor": "pointer",
			}).click(function(){
				if(confirm('确定后即刻删除，无须保存！')){
					$.ajax({
						url: actionUrl,
						success: function(result){
							if(result.toString() === '1'){
								$img.attr("src", "");
								$cancle.remove();
							}else{
								alert(result);
							}
						}
					})
				}
				
				
						
			});
		}
	})
	.mouseout(function(e){
		var offset = $img.offset();
		$("body").on("mousemove", function(event){
			var e = event? event: window.event;
			if(e.pageX > offset.left + 50 + $img.width() || 
					e.pageY > offset.top + 50 + $img.height() ||
					e.pageX < offset.left - 50 || e.pageY < offset.top - 50){
				$("#cancle-img").remove();
				$("body").off("mousemove");
				
			}
		});
	})
}
