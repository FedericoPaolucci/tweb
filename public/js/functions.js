$(document).ready(function(){
	
	$(document).on('click','.deletepost',function(){
		if(confirm('Sei sicuro di voler eliminare il post?')){
			var thisclick = $(this);
			var post_id = thisclick.attr('alt');
			$.ajax({
				type: "POST",
				url: "post_delete",
				data: {
					'id':post_id
				},
				success: function (res){
					if(res.status == 200){
						thisclick.closest('.posts-container').remove();
						alert(res.message);
					}else{
						alert(res.message);
					}
				}
			});
		}
	});
});
