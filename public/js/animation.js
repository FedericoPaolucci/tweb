//COMPARSA / SCOMPARSA ELEMENTI HOMEPAGE FOOTER
$(function() {
    $(".link-footer").click(function(e) {
		var activeid= " ";
		var id_click = e.target.id;
		$( ".auth-container" ).each(function() {
			
			var choose=$("#" + this.id).hasClass("active");
			if (choose){
				activeid = this.id;
			}
		});
			
		if(activeid==id_click){
			$("#"+id_click).addClass("hidden").removeClass("active");
			$("#homesection").addClass("active").removeClass("hidden");
		}
		else{
			$("#"+activeid).addClass("hidden").removeClass("active");
			$("#"+id_click).addClass("active").removeClass("hidden");
		}

    });
});
