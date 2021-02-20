$( document ).ready(function(){
checkScroll();
});
$(window).scroll(function() {
checkScroll();
});

function checkScroll(){
	if(window.pageYOffset > 60){
			$('.header').addClass('header_active');
		}else{
			$('.header').removeClass('header_active');
		}
}
