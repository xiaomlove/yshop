$("#category-body").delegate("li i:even", "click", function(){
	
	categoryExpand(this, true, false, false);
	
});

function categoryExpand(iobj, toggle, expand, close){
	
	var $i = $(iobj),
	$li = $i.parent().parent(),
	$deep = parseInt($li.attr("deep")),
	$id = $li.attr("id"),
	$path = $li.attr('path');
	if($li.find("ul").length == 0 && $li.attr("found") == 0){
		
		$.ajax({
			url: ajaxExpandCategoryUrl,
			data: 'parentId='+$li.attr('id'),
			type: 'POST',
			dataType: 'html',
			async: false,
			success: function(data){
			
				$li.attr("found", "1");
				$li.append(data);
			}
		});
	}


	$children = $li.find("li[path^='"+$path+"-']").filter(function(){
		var $childDeep = parseInt($(this).attr("deep"));
		if($childDeep == ($deep + 1)){
			return true;
		}else{
			return false;
		}
	});

	if($children.hasClass("open")){//要收起

		if((toggle && !expand && !close) || (!toggle && !expand && close)){

			$children.removeClass("open").slideUp();
			$i.attr("class", "fa fa-caret-right");

		}

	}else{//要展开
		if((toggle && !expand && !close) || (!toggle && expand && !close)){
			if($li.children("ul").length){				
				$children.addClass("open").slideDown();
				$li.css("padding-bottom", 0);
				$li.children("ul").css("margin-top", "10px");
				$li.find("li").css({
					'border-right':'0',
					'border-bottom':'0',
					'border-left':'0'
				});
				$i.attr("class", "fa fa-caret-down");
				checkNode($li.get(0));
				$li.children("ul").sortable({
					handle: '.fa-hand-o-up',
					axis: 'y',
					containment: '.category-sub-0',
					placeholder: 'sort-moving'
				})
			}
		}
	}
//	var $ul = $li.find("ul");
//	if($ul.length){
//	$ul.find(".name").each(function(){
//	var iobj = $(this).find("i").get(0);
//	categoryExpand(iobj);
//	})
//	}
}


$(".select-all").on("click", "label", function(){
	var $input = $("#category-body").find("input[type='checkbox']");
	if($(this).children("input").prop("checked")){
		$input.prop("checked", true);
	}else{
		$input.prop("checked", false);
	}
});

$("#category-body").delegate("li>input", "click", function(){
	var li = $(this).parent().get(0);
	checkNode(li);

});

function checkNode(obj){//obj为li的js对象
	var path = $(obj).attr("path");	
	if($(obj).attr("deep")>0){//非顶级

		var parentIdArr = path.split("-");
		var $childArr = $(obj).find("li[path^='"+path+"-']");
		if($(obj).children("input[type='checkbox']").prop("checked")){//自己被选中，
			$childArr.each(function(index, value){
				$(this).children("input[type='checkbox']").prop("checked", true);//将子级选中
			});
		}else{//自己不被选中
			$childArr.each(function(index, value){
				$(this).children("input[type='checkbox']").prop("checked", false);//将子级不选中
			});

		}

	}else{//自己是顶级
		var $childArr = $(obj).find("li[path^='"+path+"-']");
		if($(obj).children("input[type='checkbox']").prop("checked")){//自己被选中
			$childArr.each(function(index, value){
				$(this).children("input[type='checkbox']").prop("checked", true);//将子级选中
			});
		}else{
			$childArr.each(function(index, value){
				$(this).children("input[type='checkbox']").prop("checked", false);//将子级不选中
			});
		}
	}
}

$(".category-sub-0").sortable({
	handle: '.fa-hand-o-up',
	axis: 'y',
	containment: 'parent',
	helper: 'clone',

	placeholder: 'sort-moving'	
});

function expandAll(){
	showLoading();
	$(".name").each(function(){
		var iobj = $(this).find("i").get(0);
		categoryExpand(iobj, false, true, false);
	});
	hideLoading(false);
}

$("#expandAll").click(function(){
	expandAll();
});

function closeAll(){
	$(".name").each(function(){
		var iobj = $(this).find("i").get(0);
		categoryExpand(iobj, false, false, true);
	})
}

$("#closeAll").click(function(){
	closeAll();
});

var sortData = [];
function saveCategorySort(){
	var $liList = $("#category-body").children("ul").children("li");
	if($liList.length){
		
		sortData[0] = [];
		$liList.each(function(){
			addCategorySort(this, 0);
		});
		
	}
}

function addCategorySort(liObj, parentId){

	sortData[parentId].push($(liObj).attr('id'));
	if($(liObj).find("ul").length){
		var $liList = $(liObj).find("ul").find("li");

		if($liList.length){
			sortData[$liList.first().parent().parent().attr("id")] = [];
			$liList.each(function(){				
				addCategorySort(this, $(this).parent().parent().attr("id"));
			})
		}

	}
}


$("#saveCategorySort").click(function(){
	showLoading();
	saveCategorySort();
	var jsonStr = '{';
	for(var i in sortData){

		jsonStr += '"'+i+'":["'+sortData[i]+'"],';
	}
//	console.log(jsonStr);
//	console.log(jsonStr.length);
	jsonStr = jsonStr.substring(0, jsonStr.length-1)+'}';


	json = JSON.parse(jsonStr);

	$.ajax({
		type: 'POST',
		url: ajaxSaveSortUrl,
		data: json,
		dataType: 'html',
		async: false,
		success: function(result){
			hideLoading(true);
			console.log(result);

		}
	})

})

