function ajaxDelete(){
	$("#tbody").find(".delete").each(function(){
		$(this).click(function(){
			var id = $(this).parents("tr").attr("id");
			var obj = this;
			$.ajax({
				url: deleteUrl,
				type: 'GET',
				data: 'id='+id,
				success: function(data){
					var result = data.toString();
					if(result === '1'){
						$("#"+id).remove();
					}else{
						console.log(data);
					}
				}
			})
		})
	})
}