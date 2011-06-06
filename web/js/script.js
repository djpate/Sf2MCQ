$(document).ready(function(){
	
	/* category switcher on home page */
	$(".categorySwitcher").click(function(){
		$("#filterable").find("li.current").removeClass("current");
		$(this).parent().addClass("current");
		var cat = $(this).attr('rel');
		if( cat =="all" ){
			$("#categoryContainer").find("li:hidden").show("slow");
		} else {
			$("#categoryContainer").find("li").each(function(){
				if( !$(this).hasClass(cat) ){
					$(this).hide("slow");
				} else if ( $(this).is(":hidden") ){
					$(this).show("slow");
				}
			});
		}
	});
	/* end category switcher */
	
});
