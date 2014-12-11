$(".collapse").collapse('hide');
 
$(window).load(function() {
  $('.flexslider').flexslider({
	animation: "slide",
	controlNav: true,
	prevText: ' ',           //String: Set the text for the "previous" directionNav item
	nextText: ' ',
    /* animation: false,
    animationLoop: false,
	slideshow: false,
    itemWidth: 400,
    itemMargin: 10,
	controlNav: true,
    minItems: 1,
    maxItems: 3,
	prevText: '<i class="icon-double-angle-left"></i>',           //String: Set the text for the "previous" directionNav item
	nextText: '<i class="icon-double-angle-right"></i>', */
  });
});

$(document).on('click','.open-thumbnail',function(){
	if( $(this).hasClass('ok')){
		$(this).removeClass('ok');
		$(this).prev().removeClass('auto');
		$(this).html('<i class="icon-angle-down"></i>');
	}else{
		$(this).addClass('ok');
		$(this).prev().addClass('auto');
		$(this).html('<i class="icon-angle-up"></i>');
	}
});

function social_share(data) {
	window.open( data, "fbshare", "height=450,width=760,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" );
}