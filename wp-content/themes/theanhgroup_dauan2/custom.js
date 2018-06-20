/*jQuery(document).ready(function() {
	$(window).scroll(function(){
	  var sticky = $('.header'),
		  scroll = $(window).scrollTop();

	  if (scroll >=2 ) sticky.addClass('fixed');
	  else sticky.removeClass('fixed');
	});
});*/
//Menu
function openNav() {
    document.getElementById("mySidenav").style.width = "440px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}