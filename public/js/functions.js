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
						thisclick.closest('.messageviewerblog').remove();
						alert(res.message);
					}else{
						alert(res.message);
					}
				}
			});
		}
	});
	
	$('.areyousure').click(function() {
    return confirm('Sei sicuro di voler eliminare il tuo blog?');
  });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".input#img_url").change(function(){
    readURL(this);
});

