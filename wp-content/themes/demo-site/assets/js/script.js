/*!
 *	Author: B360 Digital Marketing
	name: script.js	
	requires: jquery	
 */

$(document).ready(function() {  

	// Mobile responsive nav
	$('.stellarnav').stellarNav({
		theme: 'plain',
		menuLabel: '',
		breakpoint: 991,
		position: 'right',
		openingSpeed: 250,
		closingSpeed: 250,
	});

	// Move to ID attr (id="id-name" attr with "a href='#join-form'")
	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top
		}, 900, 'swing', function () {
			// window.location.hash = target;
		});
	});

	// AOS Animate
	// AOS.init();

	var swiper = new Swiper(".mySwiper", {
		slidesPerView: 3,
		spaceBetween: 30,
		freeMode: true,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
	});

});