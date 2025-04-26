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







$(".google-map").mouseenter(function() {
	$("#cursor").hide();
});
$(".google-map").mouseleave(function() {
	$("#cursor").show();
});









$(".ripple-box").each(function() {
	$(this).on('click', function(e) {
		e.preventDefault();
		var target = $(this).data('target');
		var modal = document.getElementById(target);
		$(modal).find('.md-overlay,.md-contents').fadeIn();
	});
});
$('.md-close').on('click',function() {
	$('.md-overlay,.md-contents').fadeOut();
});
$('.close_btn').on('click',function() {
	$('.md-overlay,.md-contents').fadeOut();
});