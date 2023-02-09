$(document).ready(function(){
var post_id;
var post_body;
var thisclick;
	
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	
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
						thisclick.closest('.messageviewerblog, .messageviewersmall').remove();
						alert(res.message);
					}else{
						alert(res.message);
					}
				}
			});
		}
	});
	
	$('.deletepost_admin').click(function() {
		if(confirm('Sei sicuro di voler eliminare il post?')){
			thisclick = $(this);
			post_id = thisclick.attr('alt');
			post_body = thisclick.attr('altt');
		$('#notifybody').show();
		var notifybody = $('#notifybody');
		notifybody.css({
			position: 'fixed',
			top: '50%',
			left: '50%',
			transform: 'translate(-50%, -50%)'
		});
		}
	});
	
	$('#notifyform').submit(function(event) {
		event.preventDefault();
		var formData = $('#notifyform').serialize();
		$.ajax({
			type: 'POST',
			url: 'post_delete_admin',
			data: formData + "&id=" + post_id + "&postbody=" + post_body,
			success: function(res) {
				if(res.status == 200){
					$('#notifybody').hide();
					thisclick.closest('.messageviewerblog, .messageviewersmall').remove();
					alert(res.message);
				}else{
					$('#notifybody').hide();
					alert(res.message);
				}
				
			}
		});
	});
	
	//ELIMINAZIONE BLOG
	
	$('.deleteblog_admin').click(function() {
		if(confirm('Sei sicuro di voler eliminare il blog?')){
			thisclick = $(this);
			post_id = thisclick.attr('alt');
			post_body = thisclick.attr('altt');
		$('#notifybody2').show();
		var notifybody = $('#notifybody2');
		notifybody.css({
			position: 'fixed',
			top: '50%',
			left: '50%',
			transform: 'translate(-50%, -50%)'
		});
		}
	});
	
	$('#notifyform2').submit(function(event) {
		event.preventDefault();
		var formData = $('#notifyform2').serialize();
		$.ajax({
			type: 'POST',
			url: 'destroy_admin',
			data: formData + "&id=" + post_id + "&subject=" + post_body,
			success: function(res) {
					$('#notifybody2').hide();
					history.go(-1);
				}
		});
	});
	
	
	$('.areyousure').click(function() {
    return confirm('Sei sicuro di voler eliminare il blog?');
  });
  
  	$('.areyousure2').click(function() {
    return confirm('Sei sicuro di voler eliminare questo utente dagli amici?');
  });
  
  
  //ADMIN-> funzione di restituzione delle info per ogni user
	
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

