// JavaScript Document
function resizeHeaderOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 200,		
  headerEl = document.getElementById('header');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("smaller");
	
  } else {
    headerEl.classList.remove("smaller");
	  	
  }
}


window.addEventListener('scroll', resizeHeaderOnScroll);

$(document).ready(function(){
	$(".menuicon").on("click", function(){
		$("header nav ul").toggleClass("open");
		
	});
	
	
	
});