// loading animation
$(window).on('load', function() {
	$('#loader-bg').addClass("is-show");
	var ref = document.referrer;
	// $('#mv_sp')[0].pause();
	if (ref.indexOf('localhosaat') == -1) {
		$('#wrap').css('visibility', 'hidden');
		$('#loader-bg').delay(2700).fadeOut(500);
		$('#wrap').delay(2700).css('visibility', 'visible');
		setTimeout(stopload, 0);
	} else {
		setTimeout(stopload, 500);
	}
});

function stopload() {
	$('#wrap').css('visibility','visible');
}

















$("#menu .right-bottom-box").on("mouseover", () => {
	$("#menu .color-top-layer").addClass("active");
});
$("#menu .right-bottom-box").on("mouseout", () => {
	$("#menu .color-top-layer").removeClass("active");
});





















const spanWrapText = (target) => {
	const nodes = [...target.childNodes];
	let returnText = '';
	for (const node of nodes) {
		if (node.nodeType == 3) {
			const text = node.textContent;
			const splitText = text.split('');
			for (const char of splitText) {
				returnText += `<span>${char}</span>`;
			}
		} else {
			returnText += node.outerHTML;
		}
	}
	return returnText;
};








const first_view_tit_bubbles = [...document.querySelectorAll('#mv_box .desc_box > p')];
for (const bubble of first_view_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const first_view_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#mv_box",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	first_view_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo("#mv_box .left_box > div",
		{opacity: 0.0, filter: "blur(10px)"},
		{opacity: 1.0, filter: "blur(0)", duration: 1.0, ease: "power1.out"}
	).fromTo("#mv_box .business_cat_box",
		{opacity: 0.0, x: 0, y: -30},
		{opacity: 1.0, x: 0, y: 0, duration: 1.0, ease: "power1.out"}, '>1.0'
	).fromTo(bubble.spans,
		{opacity: 0.0, x: 0, y: "random(25, 10)"},
		{opacity: 1.0, x: 0, y: 0, duration: 1.0, ease: "power1.out", stagger: {amount: 0.8, from: 'random'}}, '-=0.3'
	).fromTo("#mv_box .illust",
		{opacity: 0.0, x: 0, y: 20, filter: "blur(2px)"},
		{opacity: 1.0, x: 0, y: 0, filter: "blur(0)", duration: 1.5, ease: "power1.out"}, '-=0.8'
	).fromTo("#mv_box .mv_copy",
		{opacity: 0.0, filter: "blur(2px)"},
		{opacity: 1.0, filter: "blur(0)", duration: 1.5, ease: "power1.out"}, '<'
	).fromTo("#mv_box .bottom_thread",
		{opacity: 0.0, x: 40, y: 40},
		{opacity: 1.0, x: 0, y: 0, duration: 1.5, ease: "power3.out"}, '-=0.2'
	).fromTo("#mv_box .right_thread",
		{opacity: 0.0, x: 50, y: -50},
		{opacity: 1.0, x: 0, y: 0, duration: 1.5, ease: "power3.out"}, '<'
	).to("#mv_box .filter", 0.0, {className: "filter is_start"});
}


















// ***********************
// ***********************
// TOP animation
// ***********************
// ***********************
if (window.innerWidth >= 450) {
	var opac = anime({
		targets: "#mv .info-box .letter",
		opacity: 1.0,
		scale: 1.0,
		easing: "easeInBounce",
		delay: function(el, index) {
			return index * 80;
		},
		direction: "alternate",
		loop: true
	});
} else {
	var opac = anime({
		targets: "#sp-info .letter",
		opacity: 1.0,
		scale: 1.0,
		easing: "easeInBounce",
		delay: function(el, index) {
			return index * 80;
		},
		direction: "alternate",
		loop: true
	});
}
$(document).on("visibilitychange", function() {
	const video = $("video").get(0);
	if (document.visibilityState === "visible") {
		video.play();
	}
});






if (window.innerWidth >= 450) {
	gsap.to("#concept", {
		scrollTrigger: {
			trigger: "#concept .img-box",
			start: "center bottom-=10%",
			end: "center bottom-=10%",
			onEnter: () => {
				$("#concept").addClass("is-show");
			},
			onLeaveBack: () => {
				$("#concept").removeClass("is-show");
			}
		}
	});
} else {
	gsap.to("#concept", {
		scrollTrigger: {
			trigger: "#concept .img-box",
			start: "center bottom-=10%",
			end: "center bottom-=10%",
			onEnter: () => {
				$("#concept").addClass("is-show");
			},
			onLeaveBack: () => {
				$("#concept").removeClass("is-show");
			}
		}
	});
}


// gsap.to("#interior", {
// 	scrollTrigger: {
// 		trigger: "#interior",
// 		start: "top bottom-=10%",
// 		end: "top bottom-=10%",
// 		onEnter: () => {
// 			$("#interior").addClass("is-show");
// 		}
// 	}
// });
// gsap.fromTo("#interior",
// 	{backgroundSize: "100%"},
// 	{backgroundSize: "110%", ease: "power1.out",
// 		scrollTrigger: {
// 			trigger: "#interior",
// 			start: "top bottom-=20%",
// 			end: "bottom top+=20%",
// 			scrub: 1.0,
// 			// markers: true,
// 		}
// 	}
// );
// if (window.innerWidth >= 450) {
// 	gsap.fromTo("#interior",
// 		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
// 		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
// 			scrollTrigger: {
// 				trigger: "#interior",
// 				start: "top center-=20%",
// 				end: "bottom top-=30%",
// 				scrub: 1.0,
// 				// markers: true,
// 			}
// 		}
// 	);
// } else if (window.innerWidth >= 420 && window.innerWidth < 450) {
// 	gsap.fromTo("#interior",
// 		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)", scale: 1.35},
// 		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", scale: 1.35, ease: "power1.out",
// 			scrollTrigger: {
// 				trigger: "#interior",
// 				start: "top center-=20%",
// 				end: "bottom top-=30%",
// 				scrub: 1.0,
// 				// markers: true,
// 			}
// 		}
// 	);
// } else if (window.innerWidth >= 400 && window.innerWidth < 420) {
// 	gsap.fromTo("#interior",
// 		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)", scale: 1.35},
// 		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", scale: 1.35, ease: "power1.out",
// 			scrollTrigger: {
// 				trigger: "#interior",
// 				start: "top center-=20%",
// 				end: "bottom top-=30%",
// 				scrub: 1.0,
// 				// markers: true,
// 			}
// 		}
// 	);
// } else {
// 	gsap.fromTo("#interior",
// 		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)", scale: 1.35},
// 		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", scale: 1.35, ease: "power1.out",
// 			scrollTrigger: {
// 				trigger: "#interior",
// 				start: "top center-=20%",
// 				end: "bottom top-=30%",
// 				scrub: 1.0,
// 				// markers: true,
// 			}
// 		}
// 	);
// }
gsap.to("#back-shot", {
	scrollTrigger: {
		trigger: "#back-shot",
		start: "top bottom-=10%",
		end: "top bottom-=10%",
		onEnter: () => {
			$("#back-shot").addClass("is-show");
		}
	}
});
if (window.innerWidth >= 450) {
	gsap.fromTo("#back-shot",
		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
			scrollTrigger: {
				trigger: "#back-shot",
				start: "top center-=20%",
				end: "bottom top-=30%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
} else {
	gsap.fromTo("#back-shot",
		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)", scale: 1.35},
		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", scale: 1.35, ease: "power1.out",
			scrollTrigger: {
				trigger: "#back-shot",
				start: "top center-=20%",
				end: "bottom top-=30%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
}


gsap.to("#news", {
	scrollTrigger: {
		trigger: "#news",
		start: "top bottom-=10%",
		end: "top bottom-=10%",
		onEnter: () => {
			$("#news").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#news").removeClass("is-show");
		}
	}
});
if (window.innerWidth >= 450) {
	gsap.fromTo("#news .back",
		{opacity: 0.5, transform: "rotate(-3deg)"},
		{opacity: 1.0, transform: "rotate(2deg)", ease: "power1.out",
			scrollTrigger: {
				trigger: "#news",
				start: "top bottom-=10%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
} else {
gsap.fromTo("#news .back",
	{opacity: 1.0, transform: "rotate(-8deg)"},
	{opacity: 1.0, transform: "rotate(8deg)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#news",
			start: "top bottom-=10%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
}

gsap.to("#chef .left-box", {
	scrollTrigger: {
		trigger: "#chef .left-box .main",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .left-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .left-box").removeClass("is-show");
		}
	}
});
gsap.to("#chef .left-box .en", {
	scrollTrigger: {
		trigger: "#chef .left-box .en",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .left-box .en").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .left-box .en").removeClass("is-show");
		}
	}
});
gsap.to("#chef .right-box .img-box", {
	scrollTrigger: {
		trigger: "#chef .right-box .img-box img",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .right-box .img-box img").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .right-box .img-box img").removeClass("is-show");
		}
	}
});
gsap.to("#chef .right-box .img-box", {
	scrollTrigger: {
		trigger: "#chef .right-box .img-box .en",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .right-box .img-box .en").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .right-box .img-box .en").removeClass("is-show");
		}
	}
});
gsap.to("#chef .right-box .txt-box", {
	scrollTrigger: {
		trigger: "#chef .right-box .txt-box",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .right-box .txt-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .right-box .txt-box").removeClass("is-show");
		}
	}
});
gsap.to("#chef .prof-box", {
	scrollTrigger: {
		trigger: "#chef .prof-box",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#chef .prof-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#chef .prof-box").removeClass("is-show");
		}
	}
});


gsap.to("#menu", {
	scrollTrigger: {
		trigger: "#menu",
		start: "top center",
		end: "top center",
		onEnter: () => {
			$("#menu").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#menu").removeClass("is-show");
		}
	}
});
gsap.to("#menu .right-top-box", {
	scrollTrigger: {
		trigger: "#menu .right-top-box",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#menu .right-top-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#menu .right-top-box").removeClass("is-show");
		}
	}
});
gsap.to("#menu .logo", {
	scrollTrigger: {
		trigger: "#menu .logo",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#menu .logo").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#menu .logo").removeClass("is-show");
		}
	}
});
gsap.to("#menu .left-bottom-box", {
	scrollTrigger: {
		trigger: "#menu .left-bottom-box",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#menu .left-bottom-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#menu .left-bottom-box").removeClass("is-show");
		}
	}
});
gsap.to("#menu .right-bottom-box", {
	scrollTrigger: {
		trigger: "#menu .left-bottom-box",
		start: "top bottom-=5%",
		end: "top bottom-=5%",
		onEnter: () => {
			$("#menu .right-bottom-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#menu .right-bottom-box").removeClass("is-show");
		}
	}
});

const floorPlan1 = new Swiper('#menu .swiper', {
	loop: true,
	autoplay: {
		delay: 3000,
		disableOnInteraction: true,
	},
	effect: "creative",
	creativeEffect: {
		prev: {
			opacity: 0.0,
			filter: "blur(300px)",
			translate: ["50%", "30%", -1],
			rotate: [0, 90, -10]
		},
		next: {
			opacity: 0.0,
			translate: ["5%", "-100%", 0],
			rotate: [50, -50, 30]
		},
	},
	speed: 1000,
	grabCursor: false,
	allowTouchMove: false,
	slidesPerView: 1,
	initialSlide: 1,
	pagination: {
		el: '.swiper-pagination',
		type: 'fraction',
		renderFraction: function (currentClass) {
			return '<div class="nav-box"><div class="top-box"><div class="line"></div><p>SLIDE</p></div><div class="bottom-box"><p class="current ' + currentClass + '">0</p><div class="connect-line"></div><p class="total">05</p></div></div>';
		},
		formatFractionCurrent: function (number) {
			return '0' + number;
		}
	},
	breakpoints: {
		600: {
			autoplay: {
				delay: 4000,
				disableOnInteraction: true,
			},
		},
	},
});

gsap.to("#gallery", {
	scrollTrigger: {
		trigger: "#gallery",
		start: "top bottom-=25%",
		end: "top bottom-=25%",
		onEnter: () => {
			$("#gallery").addClass("is-show");
		},
	}
});

gsap.fromTo("#google-map",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#google-map",
			start: "top bottom-=30%",
			end: "top center-=10%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
$("#google-map").mouseenter(function() {
	$("#cursor").hide();
});
$("#google-map").mouseleave(function() {
	$("#cursor").show();
});















$("#news .news-box .news-ele").click(function() {
	var index = $(this).index();
	$("#news .bottom-box .detail-ele").hide();
	$('#news .bottom-box .detail-ele').eq(index).show();
});








































