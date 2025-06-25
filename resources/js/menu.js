// loading animation
$(window).on('load', function() {
	$('#loader-bg').addClass("is-show");
	var ref = document.referrer;
	// $('#mv_sp')[0].pause();
	if (ref.indexOf('localhosaat') == -1) {
		$('#wrap').css('visibility', 'hidden');
		$('#loader-bg').delay(700).fadeOut(500);
		$('#wrap').delay(700).css('visibility', 'visible');
		setTimeout(stopload, 0);
	} else {
		setTimeout(stopload, 500);
	}
});

function stopload() {
	$('#wrap').css('visibility','visible');
}
$(document).on("visibilitychange", function() {
	const video1 = $("#mirakan video").get(0);
	const video2 = $("#miranezu video").get(0);
	const video3 = $("#mila-egg video").get(0);
	const video4 = $("#spinach video").get(0);
	const video5 = $("#hama-chan video").get(0);
	if (document.visibilityState === "visible") {
		video1.play();
		video2.play();
		video3.play();
		video4.play();
		video5.play();
	}
});










$('a[href^="#"]').click(function(e) {
	e.preventDefault();
	var speed = 1000;
	var href= $(this).attr("href");
	var target = $(href == "#" || href == "" ? 'html' : href);
	var windowWidth = $(window).width();
	if (location.pathname.includes('service')) {
		if (windowWidth >= 700) {
			var headerHeight = 0;
		} else {
			var headerHeight = 0;
		}
	} else {
		if (windowWidth >= 700) {
			var headerHeight = 0;
		} else {
			var headerHeight = 0;
		}
	}
	var position = target.offset().top - headerHeight;
	$('body,html').animate({scrollTop:position}, speed, 'swing');
	location.hash = href;
	return false;
});

$(".nav-box a").hover(function() {
	var $this = $(this);
	$this.addClass("hovered");
	$this.prevAll().addClass("previous");
	$this.nextAll().addClass("next");
}, function() {
	$(".nav-box a").removeClass("hovered previous next");
});















gsap.to("#mirakan", {
	scrollTrigger: {
		trigger: "#mirakan .base-box",
		start: "center bottom-=1%",
		onEnter: () => {
			$("#mirakan .top-content-box").addClass("is-show");
		},
	}
});
gsap.fromTo("#mirakan .copy-box",
	{opacity: 0.0, rotate: -60},
	{opacity: 1.0, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#mirakan",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#mirakan .food-box",
	{opacity: 0.0, rotate: 60},
	{opacity: 0.2, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#mirakan",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#mirakan .right-box", {
	scrollTrigger: {
		trigger: "#mirakan .right-box",
		start: "top bottom-=1%",
		end: "top bottom-=1%",
		onEnter: () => {
			$("#mirakan .right-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#mirakan .right-box").removeClass("is-show");
		}
	}
});



gsap.to("#miranezu", {
	scrollTrigger: {
		trigger: "#miranezu .base-box",
		start: "center bottom-=1%",
		onEnter: () => {
			$("#miranezu .top-content-box").addClass("is-show");
		},
	}
});
gsap.fromTo("#miranezu .base-box",
	{opacity: 0.0, y: "-30vh"},
	{opacity: 1.0, y: "0", ease: "power1.out",
		scrollTrigger: {
			trigger: "#miranezu",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#miranezu .copy-box",
	{opacity: 0.0, rotate: -60},
	{opacity: 1.0, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#miranezu",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#miranezu .food-box",
	{opacity: 0.0, rotate: 60},
	{opacity: 0.5, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#miranezu",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#miranezu .right-box", {
	scrollTrigger: {
		trigger: "#miranezu .right-box",
		start: "top bottom-=1%",
		end: "top bottom-=1%",
		onEnter: () => {
			$("#miranezu .right-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#miranezu .right-box").removeClass("is-show");
		}
	}
});



gsap.to("#mila-egg", {
	scrollTrigger: {
		trigger: "#mila-egg .base-box",
		start: "center bottom-=1%",
		onEnter: () => {
			$("#mila-egg .top-content-box").addClass("is-show");
		},
	}
});
gsap.fromTo("#mila-egg .base-box",
	{opacity: 0.0, y: "-30vh"},
	{opacity: 1.0, y: "0", ease: "power1.out",
		scrollTrigger: {
			trigger: "#mila-egg",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#mila-egg .copy-box",
	{opacity: 0.0, rotate: -60},
	{opacity: 1.0, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#mila-egg",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#mila-egg .food-box",
	{opacity: 0.0, rotate: 60},
	{opacity: 0.15, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#mila-egg",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#mila-egg .right-box", {
	scrollTrigger: {
		trigger: "#mila-egg .right-box",
		start: "top bottom-=1%",
		end: "top bottom-=1%",
		onEnter: () => {
			$("#mila-egg .right-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#mila-egg .right-box").removeClass("is-show");
		}
	}
});



gsap.to("#spinach", {
	scrollTrigger: {
		trigger: "#spinach .base-box",
		start: "center bottom-=1%",
		onEnter: () => {
			$("#spinach .top-content-box").addClass("is-show");
		},
	}
});
gsap.fromTo("#spinach .base-box",
	{opacity: 0.0, y: "-30vh"},
	{opacity: 1.0, y: "0", ease: "power1.out",
		scrollTrigger: {
			trigger: "#spinach",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#spinach .copy-box",
	{opacity: 0.0, rotate: -60},
	{opacity: 1.0, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#spinach",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#spinach .food-box",
	{opacity: 0.0, rotate: 60},
	{opacity: 0.4, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#spinach",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#spinach .right-box", {
	scrollTrigger: {
		trigger: "#spinach .right-box",
		start: "top bottom-=1%",
		end: "top bottom-=1%",
		onEnter: () => {
			$("#spinach .right-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#spinach .right-box").removeClass("is-show");
		}
	}
});



gsap.to("#hama-chan", {
	scrollTrigger: {
		trigger: "#hama-chan .base-box",
		start: "center bottom-=1%",
		onEnter: () => {
			$("#hama-chan .top-content-box").addClass("is-show");
		},
	}
});
gsap.fromTo("#hama-chan .base-box",
	{opacity: 0.0, y: "-30vh"},
	{opacity: 1.0, y: "0", ease: "power1.out",
		scrollTrigger: {
			trigger: "#hama-chan",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#hama-chan .copy-box",
	{opacity: 0.0, rotate: -60},
	{opacity: 1.0, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#hama-chan",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#hama-chan .food-box",
	{opacity: 0.0, rotate: 60},
	{opacity: 0.15, rotate: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#hama-chan",
			start: "top bottom-=20%",
			end: "top center+=1%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#hama-chan .right-box", {
	scrollTrigger: {
		trigger: "#hama-chan .right-box",
		start: "top bottom-=1%",
		end: "top bottom-=1%",
		onEnter: () => {
			$("#hama-chan .right-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#hama-chan .right-box").removeClass("is-show");
		}
	}
});













gsap.to("#topping", {
	scrollTrigger: {
		trigger: "#gallery",
		start: "bottom bottom-=1%",
		end: "bottom bottom-=1%",
		onEnter: () => {
			$("#topping").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#topping").addClass("is-show");
		}
	}
});
$('#topping').on('click',function() {
	$("#weekly-modal").find('.md-overlay,.md-contents').fadeIn();
});