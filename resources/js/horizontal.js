ScrollTrigger.matchMedia({
	'(min-width: 1201px)': function() {
		const listWrapperEl = document.querySelector('#horizontal_area1');
		const listEl = document.querySelector('.slide_box');

		gsap.to(listEl, {
			x: () => -(listEl.clientWidth - listWrapperEl.clientWidth),
			ease: 'none',
			scrollTrigger: {
				trigger: '#horizontal_area1',
				start: 'top top',
				end: () => `+=${listEl.clientWidth - listWrapperEl.clientWidth}`,
				scrub: true,
				pin: true,
				anticipatePin: 1,
				invalidateOnRefresh: true,
			},
		});
	}
})



// https://codepen.io/GreenSock/pen/YzqoNOK
$(".innerlink").on("click", function(event) {
	event.preventDefault();
	$(".header_follow").addClass("active");
	var link_tit = $(this).attr('title');
	if (link_tit == 'about') {
		firstHalfClick();
	} else if (link_tit == 'business') {
		firstHalfClick();
	} else if (link_tit == 'company') {
		secondHalfClick();
	} else if (link_tit == 'contact') {
		secondHalfClick();
	}
	var id = $(this).attr('href');
	var left = $(id)[0].offsetLeft;
	setTimeout(function() {
		gsap.to("html", { scrollTo: left, duration: 1.5});
	}, 300);
	setTimeout(function() {
		$(".header_follow").removeClass("active");
	}, 2000);
});



















var activeSwiper = new Swiper('#swiper', {
	loop: false,
	initialSlide: 0,
	slidesPerView: 1,
	autoHeight: true,
	direction: 'vertical',
	speed: 1500,
	draggable: false,
	mousewheel: true,
	mousewheel: {
		releaseOnEdges: false,
		forceToAxis: true,
		// thresholdDelta: 30,
		thresholdTime: 1000,
		sensitivity: 1,
	},
	on: {
		slideChange: function() {
			if (activeSwiper.realIndex == 0) {
				setTimeout(function() {
					var left = $("#swiper")[0].offsetLeft;
					activeSwiper.params.mousewheel.releaseOnEdges = false;
					gsap.to("html", {scrollTo: left, duration: 0.5});
					setTimeout(function() {
						activeSwiper.params.mousewheel.releaseOnEdges = true;
					}, 2000);
				}, 0);
			} else if (activeSwiper.realIndex == 1) {
				setTimeout(function() {
					document.addEventListener('mousewheel', Scroll_ban, {passive: false});
					setTimeout(function() {
						document.removeEventListener('mousewheel', Scroll_ban, {passive: false});
					}, 2000);
					var left = $("#swiper")[0].offsetLeft;
					activeSwiper.params.mousewheel.releaseOnEdges = false;
					gsap.to("html", {scrollTo: left, duration: 0.5});
				}, 0);
			} else if (activeSwiper.realIndex == 2) {
				setTimeout(function() {
					var left = $("#swiper")[0].offsetLeft;
					activeSwiper.params.mousewheel.releaseOnEdges = false;
					gsap.to("html", {scrollTo: left, duration: 0.5});
					setTimeout(function() {
						activeSwiper.params.mousewheel.releaseOnEdges = true;
					}, 2000);
				}, 0);
			}
		},
	},
	allowTouchMove: true,
	autoplay: false,
	simulateTouch: true,
	pagination: {
		el: '#swiper .swiper-pagination',
		clickable: true,
	},
});
var activeSwiperSp = new Swiper('#swiper_s', {
	loop: true,
	initialSlide: 0,
	slidesPerView: 1,
	autoHeight: true,
	direction: 'horizontal',
	speed: 1500,
	draggable: true,
	mousewheel: true,
	mousewheel: {
		releaseOnEdges: false,
		forceToAxis: true,
		// thresholdDelta: 30,
		thresholdTime: 1000,
		sensitivity: 1,
	},
	on: {
		slideChange: function() {
			if (activeSwiperSp.realIndex == 0) {
				setTimeout(function() {
					var left = $("#swiper_s")[0].offsetLeft;
					activeSwiperSp.params.mousewheel.releaseOnEdges = false;
					setTimeout(function() {
						activeSwiperSp.params.mousewheel.releaseOnEdges = true;
					}, 2000);
				}, 0);
			} else if (activeSwiperSp.realIndex == 1) {
				setTimeout(function() {
					document.addEventListener('mousewheel', Scroll_ban, {passive: false});
					setTimeout(function() {
						document.removeEventListener('mousewheel', Scroll_ban, {passive: false});
					}, 2000);
					var left = $("#swiper_s")[0].offsetLeft;
					activeSwiperSp.params.mousewheel.releaseOnEdges = false;
				}, 0);
			} else if (activeSwiperSp.realIndex == 2) {
				setTimeout(function() {
					var left = $("#swiper_s")[0].offsetLeft;
					activeSwiperSp.params.mousewheel.releaseOnEdges = false;
					setTimeout(function() {
						activeSwiperSp.params.mousewheel.releaseOnEdges = true;
					}, 2000);
				}, 0);
			}
		},
	},
	allowTouchMove: true,
	autoplay: false,
	simulateTouch: true,
	pagination: {
		el: '#swiper_s .swiper-pagination',
		clickable: true,
	},
});
function firstHalfClick() {
	activeSwiper.params.speed = 0;
	activeSwiper.slideTo(0);
	activeSwiper.params.speed = 1500;
}
function secondHalfClick() {
	activeSwiper.params.speed = 0;
	activeSwiper.slideTo(2);
	activeSwiper.params.speed = 1500;
}








function Scroll_ban(event) {
	event.preventDefault();
};




window.addEventListener("scroll", function() {
	if (window.matchMedia("(min-width: 1201px)").matches) {
		var left = $("#swiper")[0].offsetLeft;
		var scroll_x = $(".slide_box").css("transform").split("(")[1].split(")")[0].split(",");
		scroll_x = -1*scroll_x[4];
		var windowWidth = $(window).width();
		if (!$(".header_follow").hasClass("active")) {
			// console.log(scroll_x+"___"+(left - windowWidth*0.03)+"---"+activeSwiper.params.mousewheel.releaseOnEdges);
			if (scroll_x <= left - windowWidth*0.03) {
				// console.log("__out");
				activeSwiper.enabled = false;
				activeSwiper.params.mousewheel.releaseOnEdges = false;
				$("#swiper").removeClass("active");
			} else if (left - windowWidth*0.03 < scroll_x && scroll_x < left + windowWidth*0.03) {
				if ($("#swiper").hasClass("active")) {
					// console.log("__iiiiiiiiin");
					if ($(".first").hasClass("swiper-slide-active")) {
						setTimeout(function() {
							activeSwiper.params.mousewheel.releaseOnEdges = true;
						}, 2000);
					} else if ($(".second").hasClass("swiper-slide-active")) {
						activeSwiper.params.mousewheel.releaseOnEdges = false;
					} else if ($(".third").hasClass("swiper-slide-active")) {
						setTimeout(function() {
							activeSwiper.params.mousewheel.releaseOnEdges = true;
						}, 2000);
					}
				} else {
					$("#swiper").addClass("active");
					// console.log("active == OK");
					gsap.to("html", { scrollTo: left, duration: 0.5});
					activeSwiper.enabled = true;
				}
			} else if (left + windowWidth*0.03 <= scroll_x) {
				// console.log("__out");
				activeSwiper.enabled = false;
				activeSwiper.params.mousewheel.releaseOnEdges = false;
				$("#swiper").removeClass("active");
			}
		}
	}
});



