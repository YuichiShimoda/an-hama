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








const sauce_tit_bubbles = [...document.querySelectorAll('#sauce h2')];
for (const bubble of sauce_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const sauce_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#sauce h2",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	sauce_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo(bubble.spans,
		{opacity: 0.0, y: "random(25, 10)", transform: "rotateY(-90deg)"},
		{opacity: 1.0, y: 0, transform: "rotateY(0deg)", duration: 1.0, ease: "power1.out", stagger: 0.1}
	);
}
gsap.to("#sauce", {
	scrollTrigger: {
		trigger: "#sauce .main",
		start: "top bottom-=20%",
		end: "bottom top+=25%",
		onEnter: () => {
			$("#sauce .main").addClass("is-show");
		},
		onEnterBack: () => {
			$("#sauce .main").addClass("is-show");
		},
		onLeave: () => {
			$("#sauce .main").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#sauce .main").removeClass("is-show");
		},
	}
});
gsap.to("#sauce", {
	scrollTrigger: {
		trigger: "#sauce .sub",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#sauce .sub").addClass("is-show");
		},
		onEnterBack: () => {
			$("#sauce .sub").addClass("is-show");
		},
		onLeave: () => {
			$("#sauce .sub").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#sauce .sub").removeClass("is-show");
		},
	}
});
gsap.to("#sauce", {
	scrollTrigger: {
		trigger: "#sauce .img-box",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#sauce .img-box .left").addClass("is-show");
		},
		onEnterBack: () => {
			$("#sauce .img-box .left").addClass("is-show");
		},
		onLeave: () => {
			$("#sauce .img-box .left").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#sauce .img-box .left").removeClass("is-show");
		},
	}
});
gsap.to("#sauce", {
	scrollTrigger: {
		trigger: "#sauce .img-box",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#sauce .img-box .right").addClass("is-show");
		},
		onEnterBack: () => {
			$("#sauce .img-box .right").addClass("is-show");
		},
		onLeave: () => {
			$("#sauce .img-box .right").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#sauce .img-box .right").removeClass("is-show");
		},
	}
});
gsap.fromTo("#sauce .txt1-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#sauce .txt1-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#sauce .txt2-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#sauce .txt2-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#sauce",
	{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#sauce",
			start: "bottom center-=10%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#sauce .bg-img-box .img",
	{transform: "rotateZ(5deg)", y: "-10px"},
	{transform: "rotateZ(-10deg)", y: "50px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#sauce .bg-img-box .img",
			start: "top center-=5%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);











const pasta_tit_bubbles = [...document.querySelectorAll('#pasta h2')];
for (const bubble of pasta_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const pasta_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#pasta h2",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	pasta_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo(bubble.spans,
		{opacity: 0.0, y: "random(25, 10)", transform: "rotateY(-90deg)"},
		{opacity: 1.0, y: 0, transform: "rotateY(0deg)", duration: 1.0, ease: "power1.out", stagger: 0.1}
	);
}
gsap.to("#pasta", {
	scrollTrigger: {
		trigger: "#pasta .with-pasta",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#pasta .with-pasta").addClass("is-show");
		},
		onEnterBack: () => {
			$("#pasta .with-pasta").addClass("is-show");
		},
		onLeave: () => {
			$("#pasta .with-pasta").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#pasta .with-pasta").removeClass("is-show");
		},
	}
});
gsap.to("#pasta", {
	scrollTrigger: {
		trigger: "#pasta .fryer",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#pasta .fryer").addClass("is-show");
		},
		onEnterBack: () => {
			$("#pasta .fryer").addClass("is-show");
		},
		onLeave: () => {
			$("#pasta .fryer").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#pasta .fryer").removeClass("is-show");
		},
	}
});
gsap.fromTo("#pasta .top-box .txt-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pasta .top-box .txt-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#pasta .bottom-box .txt-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pasta .bottom-box .txt-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#pasta",
	{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pasta",
			start: "bottom center-=10%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#pasta .bg-img-box",
	{marginTop: "-10px"},
	{marginTop: "50px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pasta .bg-img-box",
			start: "top bottom-=5%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);










const pepper_tit_bubbles = [...document.querySelectorAll('#pepper h2')];
for (const bubble of pepper_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const pepper_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#pepper h2",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	pepper_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo(bubble.spans,
		{opacity: 0.0, y: "random(25, 10)", transform: "rotateY(-90deg)"},
		{opacity: 1.0, y: 0, transform: "rotateY(0deg)", duration: 1.0, ease: "power1.out", stagger: 0.1}
	);
}
gsap.to("#pepper", {
	scrollTrigger: {
		trigger: "#pepper .left-img",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#pepper .left-img").addClass("is-show");
		},
		onEnterBack: () => {
			$("#pepper .left-img").addClass("is-show");
		},
		onLeave: () => {
			$("#pepper .left-img").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#pepper .left-img").removeClass("is-show");
		},
	}
});
gsap.to("#pepper", {
	scrollTrigger: {
		trigger: "#pepper .center-img",
		start: "top bottom-=20%",
		end: "bottom top+=20%",
		onEnter: () => {
			$("#pepper .center-img").addClass("is-show");
		},
		onEnterBack: () => {
			$("#pepper .center-img").addClass("is-show");
		},
		onLeave: () => {
			$("#pepper .center-img").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#pepper .center-img").removeClass("is-show");
		},
	}
});
gsap.to("#pepper", {
	scrollTrigger: {
		trigger: "#pepper .right-img",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#pepper .right-img").addClass("is-show");
		},
		onEnterBack: () => {
			$("#pepper .right-img").addClass("is-show");
		},
		onLeave: () => {
			$("#pepper .right-img").removeClass("is-show");
		},
		onLeaveBack: () => {
			$("#pepper .right-img").removeClass("is-show");
		},
	}
});
gsap.fromTo("#pepper .txt-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pepper .txt-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#pepper",
	{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#pepper",
			start: "bottom center-=10%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);



















const ingredients_tit_bubbles = [...document.querySelectorAll('#ingredients h2')];
for (const bubble of ingredients_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const ingredients_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#ingredients h2",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	ingredients_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo(bubble.spans,
		{opacity: 0.0, y: "random(25, 10)", transform: "rotateY(-90deg)"},
		{opacity: 1.0, y: 0, transform: "rotateY(0deg)", duration: 1.0, ease: "power1.out", stagger: 0.1}
	);
}
if (window.innerWidth >= 1200) {
	gsap.fromTo(".green-pepper",
		{y: "4vh"},
		{y: "-4vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".green-pepper",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".egg",
		{y: "2vh"},
		{y: "-2vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".egg",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".tomato",
		{y: "-3vh"},
		{y: "-7vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".tomato",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".carrot",
		{y: "7vh"},
		{y: "-5vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".carrot",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".corn",
		{y: "2vh"},
		{y: "-6vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".corn",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".vegetable",
		{x: "5%", y: "5vh"},
		{x: "2%", y: "-2vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".vegetable",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".spinach",
		{y: "4vh"},
		{y: "-4vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".spinach",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".onion",
		{y: "10vh"},
		{y: "-2vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".onion",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".wiener",
		{y: "6vh"},
		{y: "-2vh", ease: "power1.out",
			scrollTrigger: {
				trigger: ".wiener",
				start: "top bottom+=5%",
				end: "bottom center-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo("#ingredients .txt-box",
		{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
		{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
			scrollTrigger: {
				trigger: "#ingredients .txt-box",
				start: "top bottom-=5%",
				end: "top bottom-=30%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo("#ingredients",
		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
			scrollTrigger: {
				trigger: "#ingredients",
				start: "bottom center-=10%",
				end: "bottom top+=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
} else if (700 <= window.innerWidth && window.innerWidth < 1200) {
	gsap.fromTo(".green-pepper",
		{y: "40px"},
		{y: "-40px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".green-pepper",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".egg",
		{y: "20px"},
		{y: "-20px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".egg",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".tomato",
		{y: "30px"},
		{y: "-50px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".tomato",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".carrot",
		{y: "50px"},
		{y: "-40px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".carrot",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".corn",
		{y: "0px"},
		{y: "-80px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".corn",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".vegetable",
		{x: "5%", y: "50px"},
		{x: "2%", y: "-20px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".vegetable",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".spinach",
		{y: "40px"},
		{y: "-40px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".spinach",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 2.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".onion",
		{y: "100px"},
		{y: "-20px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".onion",
				start: "top bottom+=5%",
				end: "bottom top-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo(".wiener",
		{y: "60px"},
		{y: "-20px", ease: "power1.out",
			scrollTrigger: {
				trigger: ".wiener",
				start: "top bottom+=5%",
				end: "bottom center-=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo("#ingredients .txt-box",
		{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
		{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
			scrollTrigger: {
				trigger: "#ingredients .txt-box",
				start: "top bottom-=5%",
				end: "top bottom-=30%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
	gsap.fromTo("#ingredients",
		{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
		{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
			scrollTrigger: {
				trigger: "#ingredients",
				start: "bottom center-=10%",
				end: "bottom top+=5%",
				scrub: 1.0,
				// markers: true,
			}
		}
	);
}



















const interior_tit_bubbles = [...document.querySelectorAll('#interior h2')];
for (const bubble of interior_tit_bubbles) {
	bubble.innerHTML = spanWrapText(bubble);
	bubble.spans = bubble.querySelectorAll('span');
	const interior_tit_quote = gsap.timeline({
		scrollTrigger: {
			trigger: "#interior h2",
			start: "top bottom",
			once: true,
			// markers: true,
		},
	});
	interior_tit_quote.from(bubble, {
		opacity: 0.0
	}).fromTo(bubble.spans,
		{opacity: 0.0, y: "random(25, 10)", transform: "rotateY(-90deg)"},
		{opacity: 1.0, y: 0, transform: "rotateY(0deg)", duration: 1.0, ease: "power1.out", stagger: 0.1}
	);
}
gsap.to("#interior", {
	scrollTrigger: {
		trigger: "#interior .interior1-box",
		start: "top bottom-=20%",
		end: "bottom top+=30%",
		onEnter: () => {
			$("#interior .interior1-box").addClass("is-show");
		},
		onEnterBack: () => {
			$("#interior .interior1-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#interior .interior1-box").removeClass("is-show");
		},
	}
});
gsap.to("#interior", {
	scrollTrigger: {
		trigger: "#interior .interior2-box",
		start: "top bottom-=5%",
		end: "top center",
		onEnter: () => {
			$("#interior .interior2-box").addClass("is-show");
		},
		onEnterBack: () => {
			$("#interior .interior2-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#interior .interior2-box").removeClass("is-show");
		},
	}
});
gsap.to("#interior", {
	scrollTrigger: {
		trigger: "#interior .interior3-box",
		start: "top bottom-=5%",
		end: "top bottom-=30%",
		onEnter: () => {
			$("#interior .interior3-box").addClass("is-show");
		},
		onEnterBack: () => {
			$("#interior .interior3-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#interior .interior3-box").removeClass("is-show");
		},
	}
});
gsap.to("#interior", {
	scrollTrigger: {
		trigger: "#interior .interior3-box",
		start: "top bottom-=30%",
		end: "top bottom-=50%",
		onEnter: () => {
			$("#interior .interior4-box").addClass("is-show");
		},
		onEnterBack: () => {
			$("#interior .interior4-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#interior .interior4-box").removeClass("is-show");
		},
	}
});
gsap.to("#interior", {
	scrollTrigger: {
		trigger: "#interior .interior3-box",
		start: "top bottom-=50%",
		end: "top bottom-=70%",
		onEnter: () => {
			$("#interior .interior5-box").addClass("is-show");
		},
		onEnterBack: () => {
			$("#interior .interior5-box").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#interior .interior5-box").removeClass("is-show");
		},
	}
});
gsap.fromTo("#interior .txt-box",
	{clipPath: "inset(0% 100% 0% 0%)", x: "-3vw"},
	{clipPath: "inset(0% 0% 0% 0%)", x: "0%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior .txt-box",
			start: "top bottom-=5%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#interior .interior4-box",
	{marginTop: "-50%"},
	{marginTop: "10px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior .interior3-box",
			start: "top bottom-=20%",
			end: "top bottom-=30%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#interior .interior5-box",
	{marginTop: "-50%"},
	{marginTop: "10px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior .interior3-box",
			start: "top bottom-=30%",
			end: "top bottom-=40%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#interior",
	{opacity: 1.0, filter: "blur(0)", transform: "perspective(100px) translateZ(0px)"},
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior",
			start: "bottom center-=10%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#interior .bg-left-img-box",
	{marginTop: "-10px"},
	{marginTop: "50px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior .bg-left-img-box",
			start: "top bottom-=5%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#interior .bg-right-img-box img",
	{transform: "rotateZ(5deg)"},
	{transform: "rotateZ(-40deg)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#interior .bg-right-img-box",
			start: "top bottom-=5%",
			end: "bottom top-=5%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
// gsap.fromTo("#mirakan .copy-box",
// 	{opacity: 0.0, rotate: -60},
// 	{opacity: 1.0, rotate: 0, ease: "power1.out",
// 		scrollTrigger: {
// 			trigger: "#mirakan",
// 			start: "top bottom-=20%",
// 			end: "top center+=1%",
// 			scrub: 1.0,
// 			// markers: true,
// 		}
// 	}
// );
// gsap.fromTo("#mirakan .food-box",
// 	{opacity: 0.0, rotate: 60},
// 	{opacity: 1.0, rotate: 0, ease: "power1.out",
// 		scrollTrigger: {
// 			trigger: "#mirakan",
// 			start: "top bottom-=20%",
// 			end: "top center+=1%",
// 			scrub: 1.0,
// 			// markers: true,
// 		}
// 	}
// );
// gsap.to("#mirakan .right-box", {
// 	scrollTrigger: {
// 		trigger: "#mirakan .right-box",
// 		start: "top bottom-=1%",
// 		end: "top bottom-=1%",
// 		onEnter: () => {
// 			$("#mirakan .right-box").addClass("is-show");
// 		},
// 		onLeaveBack: () => {
// 			$("#mirakan .right-box").removeClass("is-show");
// 		}
// 	}
// });



