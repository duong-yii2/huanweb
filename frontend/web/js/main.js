$(document).ready(function(){
	if (document.getElementsByClassName("check_have_data")) {
	  var objectCheck = document.getElementsByClassName("check_have_data");
	  for (var i = 0; i < objectCheck.length; i++) {
	    if (objectCheck[i].getElementsByClassName("item_child").length === 0 ){
	    	$(objectCheck[i]).parents(".parent_div").css({'display':'none'});
	    }
	  }
	}
	if($('figcaption').length > 0){
		$($('figcaption')).each(function(index,item) {
			let imgWidth = $(item).parents('figure').find('img').width();
			$(item).css('max-width',imgWidth)
		})
	}
});

