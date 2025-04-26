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
















// ***********************
// ***********************
// TOP animation
// ***********************
// ***********************

gsap.fromTo(".desc-box > p:nth-of-type(1)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(1)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(2)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(2)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(3)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(3)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(4)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(4)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(5)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(5)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(6)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(6)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(7)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(7)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(8)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(8)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(".desc-box > p:nth-of-type(9)",
	{opacity: 0.0, filter: "blur(10px)", transform: "perspective(100px) translateZ(10px)"},
	{opacity: 1.0, filter: "blur(0px)", transform: "perspective(100px) translateZ(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: ".desc-box > p:nth-of-type(9)",
			start: "top bottom-=10%",
			end: "top bottom-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);



















































gsap.fromTo("#ani1 .reveal-box p:nth-of-type(2n)",
	{y: "2.5em", opacity: 0.0},
	{y: 0, opacity: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top center-=30%",
			end: "top top-=80%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .reveal-box p:nth-of-type(2n+1)",
	{y: "-2.5em", opacity: 0.0},
	{y: 0, opacity: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top center-=10%",
			end: "top top-=60%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .reveal-box p",
	{color: "#000"},
	{color: "#fff", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=150%",
			end: "top top-=300%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .desc-box p",
	{lineHeight: 0, opacity: 0.0},
	{lineHeight: 2.2, opacity: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=250%",
			end: "top top-=320%",
			scrub: 1.5,
			// markers: true,
		}
	}
);





gsap.fromTo("#ani1 .img-box .clip-box:nth-of-type(2)",
	{scale: 0.6},
	{scale: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=10%",
			end: "top top-=150%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .img-box .clip-box:nth-of-type(2)",
	{clipPath: "inset(10%)"},
	{clipPath: "inset(0%)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=100%",
			end: "top top-=300%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .img-box .clip-box:nth-of-type(1)",
	{clipPath: "inset(0 0 0 100%)"},
	{clipPath: "inset(0 0 0 0%)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=150%",
			end: "top top-=350%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .img-box .clip-box:nth-of-type(3)",
	{clipPath: "inset(0 100% 0 0)"},
	{clipPath: "inset(0 0% 0 0)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=150%",
			end: "top top-=350%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .overlap-box",
	{clipPath: "inset(50%)"},
	{clipPath: "inset(0%)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=500%",
			end: "top top-=700%",
			scrub: 3.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani1 .overlap-box",
	{filter: "sepia(1)"},
	{filter: "sepia(0)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani1 .img-box",
			start: "top top-=550%",
			end: "top top-=750%",
			scrub: 3.0,
			// markers: true,
		}
	}
);


































gsap.fromTo("#ani2 .reveal-bg1",
	{width: "50vw"},
	{width: "200vw", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=120%",
			end: "top bottom-=140%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani2 .reveal-bg2",
	{width: "50vw"},
	{width: "200vw", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=130%",
			end: "top bottom-=150%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani2 .reveal-bg3",
	{width: "50vw"},
	{width: "200vw", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=140%",
			end: "top bottom-=160%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani2 .reveal-bg4",
	{width: "0vw"},
	{width: "200vw", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=220%",
			end: "top bottom-=300%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
const ani2_chars1 = document.querySelectorAll("#ani2 .txt-box .sentence-box:nth-of-type(1) p");
ani2_chars1.forEach((char, index) => {
	gsap.fromTo(char,
		{opacity: 0.0, y: 10 * index * index + 50, rotate: 20, scale: 5.0},
		{opacity: 1.0, y: 0, rotate: 0, scale: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani2 .content-box",
				start: "top bottom-=20%",
				end: "top bottom-=120%",
				scrub: 1.0
			}
		}
	);
});
const ani2_chars2 = document.querySelectorAll("#ani2 .txt-box .sentence-box:nth-of-type(2) p");
ani2_chars2.forEach((char, index) => {
	gsap.fromTo(char,
		{opacity: 0.0, y: 10 * index * index + 50, rotate: 20, scale: 5.0},
		{opacity: 1.0, y: 0, rotate: 0, scale: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani2 .content-box",
				start: "top bottom-=80%",
				end: "top bottom-=180%",
				scrub: 1.0
			}
		}
	);
});
gsap.to("#ani2", {
	scrollTrigger: {
		trigger: "#ani2 .content-box",
		start: "top bottom-=180%",
		end: "top bottom-=180%",
		onEnter: () => {
			$("#ani2 .txt-box").addClass("active");
		},
		onLeaveBack: () => {
			$("#ani2 .txt-box").removeClass("active");
		}
	}
});
gsap.fromTo("#ani2 .reveal-bg4",
	{backgroundColor: "#0075ff"},
	{backgroundColor: "#fff", ease: "circ.inOut",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=350%",
			end: "top bottom-=400%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani2 .sentence-box p",
	{color: "#fff"},
	{color: "#333", ease: "circ.inOut",
		scrollTrigger: {
			trigger: "#ani2 .content-box",
			start: "top bottom-=350%",
			end: "top bottom-=400%",
			scrub: 2.0,
			// markers: true,
		}
	}
);

















const slide2 = "#ani3 .wrapper-box .slide-box:nth-of-type(2)";
const slide3 = "#ani3 .wrapper-box .slide-box:nth-of-type(3)";
const slide4 = "#ani3 .wrapper-box .slide-box:nth-of-type(4)";
const slide5 = "#ani3 .wrapper-box .slide-box:nth-of-type(5)";
const slide6 = "#ani3 .wrapper-box .slide-box:nth-of-type(6)";
const slide7 = "#ani3 .wrapper-box .slide-box:nth-of-type(7)";

gsap.fromTo("#ani3 .wrapper-box .slide-box:nth-of-type(1)",
	{y: 0},
	{y: "-100%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=100%",
			end: "top top-=200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide2,
	{scaleY: 0},
	{scaleY: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=100%",
			end: "top top-=200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide2).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=150%",
			end: "top top-=200%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.to(slide2, {
	scrollTrigger: {
		trigger: "#ani3 .container",
		start: "top top-=250%",
		end: "top top-=250%",
		onEnter: () => {$(slide2).css("transform-origin", "left center")},
		onLeaveBack: () => {$(slide2).css("transform-origin", "center bottom")}
	}
});
gsap.fromTo(slide2,
	{scaleX: 1},
	{scaleX: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=300%",
			end: "top top-=400%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide3,
	{scaleX: 0},
	{scaleX: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=300%",
			end: "top top-=400%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide3).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=350%",
			end: "top top-=400%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.to(slide3, {
	scrollTrigger: {
		trigger: "#ani3 .container",
		start: "top top-=450%",
		end: "top top-=450%",
		onEnter: () => {$(slide3).css("transform-origin", "center top")},
		onLeaveBack: () => {$(slide3).css("transform-origin", "right center")}
	}
});
gsap.fromTo(slide3,
	{scaleY: 1},
	{scaleY: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=500%",
			end: "top top-=600%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide4,
	{scaleY: 0},
	{scaleY: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=500%",
			end: "top top-=600%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide4).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=550%",
			end: "top top-=600%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.to(slide4, {
	scrollTrigger: {
		trigger: "#ani3 .container",
		start: "top top-=650%",
		end: "top top-=650%",
		onEnter: () => {$(slide4).css("transform-origin", "right center")},
		onLeaveBack: () => {$(slide4).css("transform-origin", "center bottom")}
	}
});
gsap.fromTo(slide4,
	{scaleX: 1},
	{scaleX: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=700%",
			end: "top top-=800%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide5,
	{scaleX: 0},
	{scaleX: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=700%",
			end: "top top-=800%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide5).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=750%",
			end: "top top-=800%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to(slide5, {
	scrollTrigger: {
		trigger: "#ani3 .container",
		start: "top top-=850%",
		end: "top top-=850%",
		onEnter: () => {$(slide5).css("transform-origin", "center bottom")},
		onLeaveBack: () => {$(slide5).css("transform-origin", "left center")}
	}
});
gsap.fromTo(slide5,
	{scaleY: 1},
	{scaleY: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=900%",
			end: "top top-=1000%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide6,
	{scaleY: 0},
	{scaleY: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=900%",
			end: "top top-=1000%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide6).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=950%",
			end: "top top-=1000%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to(slide6, {
	scrollTrigger: {
		trigger: "#ani3 .container",
		start: "top top-=1050%",
		end: "top top-=1050%",
		onEnter: () => {$(slide6).css("transform-origin", "left center")},
		onLeaveBack: () => {$(slide6).css("transform-origin", "center top")}
	}
});
gsap.fromTo(slide6,
	{scaleX: 1},
	{scaleX: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=1100%",
			end: "top top-=1200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo(slide7,
	{scaleX: 0},
	{scaleX: 1, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=1100%",
			end: "top top-=1200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo($(slide7).find("img").get(),
	{filter: "blur(15px)"},
	{filter: "blur(0px)", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani3 .container",
			start: "top top-=1150%",
			end: "top top-=1200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);





















gsap.fromTo("#ani4 .reveal-box:nth-of-type(1)",
	{opacity: 0.0},
	{opacity: 1.0, duration: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .img-box",
			start: "top center-=0%",
			end: "top center-=20%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani4 .reveal-box:nth-of-type(1) img",
	{scale: 1.2, x: "-20%"},
	{scale: 1.2, x: 0, duration: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .img-box",
			start: "top center-=20%",
			end: "top center-=80%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#ani4", {
	scrollTrigger: {
		trigger: "#ani4 .content-box",
		start: "top top",
		end: "bottom bottom",
		onUpdate: (self) => {
			const scrollY = self.scroll() - self.start;
			gsap.to("#ani4 .reveal-box:nth-of-type(1)", {
				top: scrollY,
			});
		},
		scrub: 1.5,
	}
});
gsap.fromTo("#ani4 .reveal-box:nth-of-type(1)",
	{scale: 1.0, rotate: "-4deg"},
	{scale: 0.8, rotete: 0, duration: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .img-box",
			start: "top center-=80%",
			end: "top center-=100%",
			scrub: 2.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani4 .reveal-box:nth-of-type(2)",
	{opacity: 0.0},
	{opacity: 1.0, duration: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .img-box",
			start: "top center-=100%",
			end: "top center-=120%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani4 .reveal-box:nth-of-type(2) img",
	{scale: 1.2, x: "20%"},
	{scale: 1.2, x: 0, duration: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .img-box",
			start: "top center-=120%",
			end: "top center-=220%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.to("#ani4", {
	scrollTrigger: {
		trigger: "#ani4 .content-box",
		start: "top top",
		end: "bottom bottom",
		onUpdate: (self) => {
			const scrollY = self.scroll() + $(window).height() * 0.3 - self.start;
			gsap.to("#ani4 .reveal-box:nth-of-type(2)", {
				top: scrollY,
			});
		},
		scrub: 1.5,
	}
});





const ani4_chars1 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(1) p");
ani4_chars1.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(1)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
const ani4_chars2 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(2) p");
ani4_chars2.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(2)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
const ani4_chars3 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(3) p");
ani4_chars3.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(3)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
const ani4_chars4 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(4) p");
ani4_chars4.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(4)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
const ani4_chars5 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(5) p");
ani4_chars5.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(5)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
const ani4_chars6 = document.querySelectorAll("#ani4 .sentence-box:nth-of-type(6) p");
ani4_chars6.forEach((char, index) => {
	const offset = index * 10;
	gsap.fromTo(char,
		{opacity: 0.1},
		{opacity: 1.0, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani4 .sentence-box:nth-of-type(6)",
				start: `bottom bottom-=${offset}px`,
				end: `bottom bottom-=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});




gsap.fromTo("#ani4 .bg-circle1",
	{opacity: 0.0, x: "50%", scale: 1.0},
	{opacity: 1.0, x: "50%", scale: 10.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .content-box",
			start: "center+=5% bottom+=20%",
			end: "center+=5% bottom",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani4 .bg-circle2",
	{opacity: 0.0, scale: 1.0},
	{opacity: 1.0, scale: 10.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani4 .content-box",
			start: "center+=20% bottom+=20%",
			end: "center+=20% bottom",
			scrub: 1.0,
			// markers: true,
		}
	}
);
























gsap.to("#ani5 .tit", {
	scrollTrigger: {
		trigger: "#ani5 .content-box",
		start: "top center-=10%",
		end: "top center-=10%",
		onEnter: () => {
			$("#ani5 .tit").addClass("is-show");
		},
		onLeaveBack: () => {
			$("#ani5 .tit").removeClass("is-show");
		}
	}
});
gsap.fromTo("#ani5 .tit",
	{scale: 1.0, y: 0},
	{scale: 30.0, y: "30%", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=50%",
			end: "top top-=200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani5 .tit",
	{opacity: 1.0},
	{opacity: 0.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=150%",
			end: "top top-=200%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani5 .items-box",
	{opacity: 0.0},
	{opacity: 1.0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=200%",
			end: "top top-=250%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
const ani5_chars = document.querySelectorAll("#ani5 .loop-text-box");
const charsArray = Array.from(ani5_chars);
function shuffle(array) {
	for (let i = array.length - 1; i > 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[array[i], array[j]] = [array[j], array[i]];
	}
	return array;
}
function getRandomValue() {
	const minOpacity = 2;
	const maxOpacity = 8;
	const randomDecimal = Math.floor(Math.random() * (maxOpacity - minOpacity + 1)) + minOpacity;
	return randomDecimal / 10;
}
shuffle(charsArray).forEach((char, index) => {
	const viewHeight = $(window).outerHeight();
	const offsetPercentFromPx = (20 / viewHeight) * 100 * index;
	const randomOpacity = getRandomValue();
	gsap.fromTo(char,
		{opacity: 0.0},
		{opacity: randomOpacity, ease: "power1.out",
			scrollTrigger: {
				trigger: "#ani5 .content-box",
				start: `top top-=${offsetPercentFromPx + 200}%`,
				end: `top top-=${offsetPercentFromPx + 250}%`,
				// start: `bottom bottom+=${offset}px`,
				// end: `bottom bottom+=${offset + 100}px`,
				scrub: 1.0,
				// markers: true,
			}
		}
	);
});
gsap.fromTo("#ani5 .reveal-bg1",
	{rotateY: "90deg"},
	{rotateY: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=400%",
			end: "top top-=410%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani5 .reveal-bg2",
	{rotateY: "90deg"},
	{rotateY: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=405%",
			end: "top top-=415%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
gsap.fromTo("#ani5 .reveal-bg3",
	{rotateY: "90deg"},
	{rotateY: 0, ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani5 .content-box",
			start: "top top-=415%",
			end: "top top-=425%",
			scrub: 1.0,
			// markers: true,
		}
	}
);
























gsap.fromTo("#ani6 .content-box",
	{top: 0, z: 0},
	{top: "-100vh", z: "-700px", ease: "power1.out",
		scrollTrigger: {
			trigger: "#ani6",
			start: "top bottom",
			end: "center center",
			scrub: 1.0,
			// markers: true,
		}
	}
);



// gsap.fromTo("#ani3 .wrapper-box .slide-box:nth-of-type(7)",
// 	{y: 0},
// 	{y: "-100%", ease: "power1.out",
// 		scrollTrigger: {
// 			trigger: "#ani3 .container",
// 			start: "top top-=1300%",
// 			end: "top top-=1400%",
// 			scrub: 2.0,
// 			// markers: true,
// 		}
// 	}
// );



// const before_en_txt_bubbles = [...document.querySelectorAll('#works_detail .before_box .en_txt')];
// for (const bubble of before_en_txt_bubbles) {
// 	bubble.innerHTML = spanWrapText(bubble);
// 	bubble.spans = bubble.querySelectorAll('span');
// 	const work_detail_before = gsap.timeline({
// 		scrollTrigger: {
// 			trigger: "#works_detail .tit",
// 			start: "top bottom-=5%",
// 			once: true,
// 			// markers: true,
// 		}
// 	});
// 	work_detail_before.fromTo("#works_detail .before_box .content_box", 0.5,
// 		{opacity: 0, yPercent: 50, scale: 0.3},
// 		{opacity: 1, yPercent: 0, scale: 0.3, ease: "power1.out"}, "<0.3"
// 	).fromTo(bubble.spans, 0.5,
// 		{opacity: 0.0, y: "100%", scale: 1.5},
// 		{opacity: 1.0, y: 0, scale: 1.0, ease: "power1.out", stagger: {amount: 0.5, from: 'random'}}, ">"
// 	);
// }
// gsap.fromTo("#ani2 .reveal-bg",
// 	{clipPath: "inset(0 100% 0 0)"},
// 	{clipPath: "inset(0 0% 0 0)",
// 		scrollTrigger: {
// 			trigger: "#ani2 .content-box",
// 			start: "top center-=0%",
// 			end: "top center-=30%",
// 			scrub: 1.0,
// 			// markers: true,
// 		}
// 	}
// );







// ScrollTrigger.create({
//   trigger: "#ani1",
//   start: "top top", // スクロールの開始位置
//   end: "150vh top", // スクロールの終了位置
//   onUpdate: self => {
//     // スクロール量に応じてscaleを変更
//     const scaleValue = gsap.utils.interpolate(0.8, 1.0, self.progress);
//     gsap.to("#ani1 .img-box .clip-box:nth-of-type(2)", {
//       scale: scaleValue,
//       overwrite: "auto"
//     });
//   }
// });

























gsap.fromTo("#ani0 .carousel-box",
	{rotation: 360},
	{rotation: 120,
		scrollTrigger: {
			trigger: "#ani0 .container",
			start: "top top",
			end: "bottom+=70% bottom",
			scrub: 1.0,
			onUpdate: function(e) {
				console.log(e.progress * 100);
				// let angle = 0;
				// if (carousel !== 'none') {
				// 	let rotateMatch = carousel.match(/rotate\(([-+]?[0-9]*\.?[0-9]+)deg\)/);
				// 	console.log(rotateMatch);
				// // if (transform && transform.includes("rotate")) {
				// // 	const match = transform.match(/rotate\(([-+]?[0-9]*\.?[0-9]+)deg\)/);
				// 	if (rotateMatch) {
				// 		angle = parseFloat(match[1]);
				// 	}
				// }
				// console.log("  angle "+angle);
				// if (angle >= 280 && angle < 281) {
				// 	const pTag = document.querySelector(".en-box p:nth-of-type(1)");
				// 	if (pTag) {
				// 		pTag.textContent = "ITO TAKUTA";
				// 	}
				// }
			},
			// markers: true,
		}
	}
);
// gsap.fromTo("#ani0 .carousel-box .ele:nth-of-type(1) img",
// 	{rotation: 210},
// 	{rotation: 30,
// 		scrollTrigger: {
// 			trigger: "#ani0 .container",
// 			start: "top top",
// 			end: "bottom top",
// 			scrub: 1.0,
// 			markers: true,
// 		}
// 	}
// );











