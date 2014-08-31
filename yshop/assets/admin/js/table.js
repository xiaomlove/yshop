$("#per-page").change(function(){
		getData(dataUrl);
});
$("#search").on({
	blur: function(){	
		var keywords = $(this).val();
		if($.trim(keywords) == '' && $("#searched").length){
			getData(dataUrl,  $(".pagination").find(".active").children("a").text());
			$("#searched").remove();
		}
		
	}
});

$(".search").delegate("i", "click", function(){
	var keywords = $(this).prev().val();
	if($.trim(keywords) != ''){
		if($("#searched").length < 1){
			$(this).parent().append('<input type="hidden" id="searched" name="search">');
		}
		getData(dataUrl);
	}
});

$("#select-all").click(function(){
	var $checkbox = $("#tbody").find(".my-checkbox");
	if($(this).prop("checked")){
		$checkbox.prop("checked", true);
	}else{
		$checkbox.prop("checked", false);
	}
});



function getData(dataUrl, page, sortField, sortType){
	console.log(arguments);
	var page = arguments[1]? arguments[1]: 1;
	var perPage = $("#per-page").val();
	var search = $.trim($("#search").val());
	var keywords = search == ''? null: encodeURIComponent(search);
	var sortField = arguments[2]? arguments[2]: 'id';
	var sortType = arguments[3]? arguments[3]: 'DESC';
	
	$.ajax({
		url: arguments[0],
		data: 'keywords='+keywords+'&sortField='+sortField+'&sortType='+sortType+'&page='+page+'&perPage='+perPage,
		type: 'GET',
		async: false,
		dataType: 'html',
		success: function(data){
			$("#tbody").html(data);
			var count = null;
			var $count = $("#count");
			if($count.length > 0){
				count = $count.val();
			}else{
				count = 0;
			}
			
			setCount(count, page, perPage);
		},
	})
	
}

function setCount(count, page, perPage){
	var count = parseInt(count);//总记录数
	var page = parseInt(page);//当前页
	var perPage = parseInt(perPage);//每页显示数
	$("#total").text(count);
	var totalPage = Math.ceil(count/perPage);//总页数
	$("#totalPage").text(totalPage);
	var begin = (page-1)*perPage+1;//
	$("#begin").text(begin);
	var end = begin + perPage -1 > count? count: begin + perPage - 1;	
	$("#end").text(end);

//	if(count>=1){
		if(totalPage <= 10){
			endPage = totalPage;
			beginPage = 1;
		}else{
			if(page - 5 <= 0){
				endPage = 10;
				beginPage = 1;
			}else{
				if(page + 5 > totalPage){
					endPage = totalPage;
					beginPage = endPage - 9;
				}else{
					endPage = page + 4;
					beginPage = page - 5;
				}
			}
		}

		var html = '<ul class="pagination">';
		if(page == 1 || count == 0){
			html += '<li class="disabled"><a>首页</a></li><li class="disabled"><a>&laquo;</a></li>';
		}else{
			html += '<li><a>首页</a></li><li><a>&laquo;</a></li>';
		}
		for(var i = beginPage; i <= endPage; i++){
			
			if(i == page){
				html += '<li class="active"><a>'+ i +'</a></li>';
			}else{
				html += '<li><a>'+ i +'</a></li>';
			}
			
		}
		if(page == endPage || count == 0){
			html += '<li class="disabled"><a>&raquo;</a></li><li class="disabled"><a>尾页</a></li>';
		}else{	
			html += '<li><a>&raquo;</a></li><li><a>尾页</a></li>';
		}
		html += '</ul>';
		
		html += '<div class="goto"><input type="text" value="'+page+'" style="width:35px"><button class="btn btn-primary btn-xs">跳转</button></div>';
		$("#pagination").html(html);

		var $liList = $(".pagination").find("li");
		if($liList.length){
			var $table = $("#table");
			var $th = $table.find("th").filter(function(){
					return $(this).hasClass("asc") || $(this).hasClass("desc");
				})
			var sortField = null;
			var sortType = null;
			if($th.length){
				sortField = $th.attr("id");
				sortType = $th.attr("class");
			}
			$liList.each(function(index, value){
				if(index == 0){
					if(!$(this).hasClass("disabled")){
						$(this).click(function(){getData(dataUrl, 1, sortField, sortType)});
					}
				}else if(index == 1){
					if(!$(this).hasClass("disabled")){
						$(this).click(function(){getData(dataUrl, page - 1, sortField, sortType)});
					}
				}else if(index == ($liList.length - 2)){
					if(!$(this).hasClass("disabled")){
						$(this).click(function(){getData(dataUrl, page + 1, sortField, sortType)});
					}
				}else if(index == ($liList.length - 1)){
					if(!$(this).hasClass("disabled")){
						$(this).click(function(){getData(dataUrl, totalPage, sortField, sortType)});
					}
				}else if($(this).find("a").text() != page){
					$(this).click(function(){getData(dataUrl, $(this).find("a").text(), sortField, sortType)});
				}
			});
			$("#pagination").find(".goto").children("button").click(function(){
				var $input = $(this).prev();
				var value = parseInt($input.val());
				if(value !== parseInt($input.get(0).defaultValue)){
					if(value > totalPage){
						value = totalPage;
					}else if(value < 1){
						value = 1;
					}
					getData(dataUrl, value);
				}
			})

		}
//	}
	
}

function sortField(){
//		console.log(arguments);
	if(arguments.length){
		for(var i in arguments){
			var sortField = arguments[i];
			var th = document.getElementById(sortField);
			th.style.cursor = "pointer";
			th.onclick = (function(sortField){
				return function(){
					if($(this).attr("class") == "asc"){
						$(this).parent().children("th").removeAttr("class").find("i").remove();//全部清除
						getData(dataUrl, 1, sortField, "desc");
						$(this).attr("class", "desc").append('<i class="fa fa-sort-desc" style="margin-left:5px"></i>');
						
					}else{
						$(this).parent().children("th").removeAttr("class").find("i").remove();
						getData(dataUrl, 1, sortField, "asc");
						$(this).attr("class", "asc").append('<i class="fa fa-sort-asc" style="margin-left:5px"></i>');
					}
				}
			})(sortField);
		}
	}
	
}


	
