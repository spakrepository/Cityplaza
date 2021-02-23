jQuery	=	jQuery.noConflict();
jQuery(document).ready(function(){
//jQuery('.ajax-fancybox').magnificPopup({
//  type: 'ajax',
// zoom: {
//    enabled : true,
//    duration : 300,
//    easing: 'ease-in-out'
//    },
//  removalDelay : 300,
//  closeOnContentClick : false,
//  closeOnBgClick : false,
//  showCloseBtn : true
//});
initQuickview();
});

function initQuickview(){
	jQuery(".ajax-fancybox").colorbox({
  			iframe:true,
  			innerWidth:'70%',
  			innerHeight:'70%',
  			fixed: true,
  			fastIframe: false,
  			scrolling: true
  			});
	jQuery('.cboxIframe').contents().find('head').append('<link rel="stylesheet" href="http://localhost/pk/cityplaza/skin/frontend/rwd/default/quickview/quick.css" type="text/css" />');
}

//function initQuickview(){
//	jQuery('.ajax-fancybox').magnificPopup({
//	  type: 'ajax',
//	  zoom: {
//	    enabled : true,
//	    duration : 300,
//	    easing : 'ease-in-out'
//	    },
//	  removalDelay : 300,
//	  closeOnContentClick : false,
//  	  closeOnBgClick : false,
//	  showCloseBtn : true
//	});
//}

function showOptions(id){
	jQuery('#fancybox'+id).trigger('click');
}