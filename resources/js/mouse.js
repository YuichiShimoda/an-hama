$(window).on("load", function() {
	let cursor = document.querySelector("#cursor");
	let insideElement = cursor.querySelector("#cursor .inside");
	$(document).on("mousemove", function(event) {
		let rect = insideElement.getBoundingClientRect();
		cursor.style.top = (event.clientY - rect.height / 2) + "px";
		cursor.style.left = (event.clientX - rect.width / 2) + "px";
	});
});












$("canvas").on("click", function() {
	$(this).addClass("is-show");
	setTimeout(function() {
		$("canvas").removeClass("is-show");
	}, 500);
});
$(".click-canvas").on("click", function() {
	var clickedElement = $(event.target);
	if (!clickedElement.closest(".not-click-canvas").length) {
		$("canvas").addClass("is-show");
		setTimeout(function() {
			$("canvas").removeClass("is-show");
		}, 500);
	}
});
var c = document.getElementById("c");
var ctx = c.getContext("2d");
var cH;
var cW;
var bgColor = "#FF6138";
var animations = [];
var circles = [];

var colorPicker = (function() {
	var colors = ["#FF6138", "#FFBE53", "#b92928", "#f8bebc"];
	var index = 0;
	function next() {
		index = index++ < colors.length-1 ? index : 0;
		return colors[index];
	}
	function current() {
		return colors[index]
	}
	return {
		next: next,
		current: current
	}
})();

function removeAnimation(animation) {
	var index = animations.indexOf(animation);
	if (index > -1) animations.splice(index, 1);
}

function calcPageFillRadius(x, y) {
	var l = Math.max(x - 0, cW - x);
	var h = Math.max(y - 0, cH - y);
	return Math.sqrt(Math.pow(l, 2) + Math.pow(h, 2));
}

function addClickListeners() {
	document.addEventListener("touchstart", handleEvent);
	document.addEventListener("mousedown", handleEvent);
};

function handleEvent(e) {
		if (e.touches) {
			e.preventDefault();
			e = e.touches[0];
		}
		var currentColor = colorPicker.current();
		var nextColor = colorPicker.next();
		var targetR = calcPageFillRadius(e.clientX, e.clientY);
		var rippleSize = Math.min(200, (cW * .4));
		if (cW >= 1200) {
			rippleSize = Math.min(160, cW * 0.4);
		} else if (cW >= 1000) {
			rippleSize = Math.min(140, cW * 0.4);
		} else if (cW >= 700) {
			rippleSize = Math.min(120, cW * 0.4);
		} else if (cW >= 450) {
			rippleSize = Math.min(100, cW * 0.4);
		} else {
			rippleSize = Math.min(70, cW * 0.4);
		}
		var minCoverDuration = 750;

		var pageFill = new Circle({
			x: e.clientX,
			y: e.clientY,
			r: 0,
			fill: nextColor
		});
		var fillAnimation = anime({
			targets: pageFill,
			r: targetR,
			duration:  Math.max(targetR / 2 , minCoverDuration ),
			easing: "easeOutQuart",
			complete: function(){
				bgColor = pageFill.fill;
				removeAnimation(fillAnimation);
			}
		});

		var ripple = new Circle({
			x: e.clientX,
			y: e.clientY,
			r: 0,
			fill: currentColor,
			stroke: {
				width: 3,
				color: currentColor
			},
			opacity: 1
		});
		var rippleAnimation = anime({
			targets: ripple,
			r: rippleSize,
			opacity: 0,
			easing: "easeOutExpo",
			duration: 900,
			complete: removeAnimation
		});

		var particles = [];
		let particleRadius = anime.random(24, 48);
		if (cW >= 1200) {
			particleRadius = anime.random(22, 44);
		} else if (cW >= 1000) {
			particleRadius = anime.random(20, 40);
		} else if (cW >= 700) {
			particleRadius = anime.random(18, 36);
		} else if (cW >= 450) {
			particleRadius = anime.random(14, 28);
		} else {
			particleRadius = anime.random(10, 20);
		}
		for (var i=0; i<32; i++) {
			var particle = new Circle({
				x: e.clientX,
				y: e.clientY,
				fill: currentColor,
				r: particleRadius
			})
			particles.push(particle);
		}
		var particlesAnimation = anime({
			targets: particles,
			x: function(particle){
				return particle.x + anime.random(rippleSize, -rippleSize);
			},
			y: function(particle){
				return particle.y + anime.random(rippleSize * 1.15, -rippleSize * 1.15);
			},
			r: 0,
			easing: "easeOutExpo",
			duration: anime.random(1000,1300),
			complete: removeAnimation
		});
		animations.push(fillAnimation, rippleAnimation, particlesAnimation);
}

function extend(a, b){
	for(var key in b) {
		if(b.hasOwnProperty(key)) {
			a[key] = b[key];
		}
	}
	return a;
}

var Circle = function(opts) {
	extend(this, opts);
}

Circle.prototype.draw = function() {
	ctx.globalAlpha = this.opacity || 1;
	ctx.beginPath();
	ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false);
	if (this.stroke) {
		ctx.strokeStyle = this.stroke.color;
		ctx.lineWidth = this.stroke.width;
		ctx.stroke();
	}
	if (this.fill) {
		ctx.fillStyle = this.fill;
		ctx.fill();
	}
	ctx.closePath();
	ctx.globalAlpha = 1;
}

var animate = anime({
	duration: Infinity,
	update: function() {
		ctx.fillStyle = bgColor;
		ctx.fillRect(0, 0, cW, cH);
		animations.forEach(function(anim) {
			anim.animatables.forEach(function(animatable) {
				animatable.target.draw();
			});
		});
	}
});

var resizeCanvas = function() {
	cW = window.innerWidth;
	cH = window.innerHeight;
	c.width = cW * devicePixelRatio;
	c.height = cH * devicePixelRatio;
	ctx.scale(devicePixelRatio, devicePixelRatio);
};

(function init() {
	resizeCanvas();
	if (window.CP) {
		// CodePen's loop detection was causin' problems
		// and I have no idea why, so...
		window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
	}
	window.addEventListener("resize", resizeCanvas);
	addClickListeners();
	if (!!window.location.pathname.match(/fullcpgrid/)) {
		startFauxClicking();
	}
	handleInactiveUser();
})();

function handleInactiveUser() {
	var inactive = setTimeout(function(){
		fauxClick(cW/2, cH/2);
	}, 2000);

	function clearInactiveTimeout() {
		clearTimeout(inactive);
		document.removeEventListener("mousedown", clearInactiveTimeout);
		document.removeEventListener("touchstart", clearInactiveTimeout);
	}

	document.addEventListener("mousedown", clearInactiveTimeout);
	document.addEventListener("touchstart", clearInactiveTimeout);
}

function startFauxClicking() {
	setTimeout(function(){
		fauxClick(anime.random( cW * .2, cW * .8), anime.random(cH * .2, cH * .8));
		startFauxClicking();
	}, anime.random(200, 900));
}

function fauxClick(x, y) {
	var fauxClick = new Event("mousedown");
	fauxClick.clientX = x;
	fauxClick.clientY = y;
	document.dispatchEvent(fauxClick);
}