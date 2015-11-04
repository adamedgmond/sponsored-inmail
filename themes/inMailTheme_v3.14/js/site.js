function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  	var regexS = "[\\?&]" + name + "=([^&#]*)";
  	var regex = new RegExp(regexS);
  	var results = regex.exec(window.location.search);
  	if (results == null) { return ""; }
  	else { return decodeURIComponent(results[1].replace(/\+/g, " ")); }
}
var isMobile = ($("#checker-notmobile").css("display") == "none" ? true : false);
$(document).ready(function(){
	// adjusts iOS landscape scaling
	$(function(){ 
		if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
    		var viewportmeta = document.querySelector('meta[name="viewport"]');
    		if (viewportmeta) {
        		viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
        		document.body.addEventListener('gesturestart', function () {
            		viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
        		}, false);
    		}
		}
	});
	// sizes content panel
	var windowHeight = $(window).height();
	if (isMobile === false && $('.companywidget').length == 0) {
		$(function(){
			var contentHeight = $("#content").outerHeight(true);
			var notContentHeight = $("#header").outerHeight(true) + 10 + $(".footer").outerHeight(true);
			var remainder = windowHeight - contentHeight - notContentHeight;
			var goldenRatio = Math.ceil(($("#content").width()/1.618)/3);
			if (windowHeight > contentHeight + notContentHeight) {
				if (remainder < goldenRatio) {
					$("#content .article").css('height', $("#content .article").height() + remainder);
				} else {
					$("#content .article").css('height', $("#content .article").height() + goldenRatio);
				}
			}
		});
	}
	// tracks CTA clicks
	$('.left #ctas .btn-action').click(function() {
		_gaq.push(['_trackEvent', 'CTAs', 'LeftButton']);
	});
	$('.right #ctas .btn-action').click(function() {
		_gaq.push(['_trackEvent', 'CTAs', 'RightButton']);
	});
	$('#content .article .btn-action').click(function() {
		_gaq.push(['_trackEvent', 'CTAs', 'InlineButton']);
	});
	// share windows
	$('a.share').click(function() {
		if (isMobile === false) {
			window.open(this.href,'','toolbar=0,status=0,width=626,height=436,scrollbars=yes');
		} else {
			window.open(this.href);
		}
		return false;
	});
	// persistent CTAs
	if (isMobile === false && $("#body").attr('class').indexOf("doublewide") == -1 && $("#body").attr('class').indexOf("plus") == -1) {
		$(window).scroll($.throttle( 500, function() {
			if ($(window).scrollTop() >= 0) {
    			$('#ctas').css('top', $(this).scrollTop() + "px");
			}
		}));
	}
	// conditionally persistent ads
	if (isMobile === false && $("#body").attr('class').indexOf("doublewide") == -1 && $("#body").attr('class').indexOf("plus") == -1) {
		$(function(){
			railHeight = $("#header").height() + 10 + $("#extra").height();
			if (railHeight < windowHeight) {
				$(window).scroll($.throttle( 500, function() {
					if ($(window).scrollTop() >= 0) {
    					$('#ads').css('top', $(this).scrollTop() + "px");
					}
				}));
			}
		});
	}
	// empty hyperlinks do nothing
	$("a[href='#'], a[href='']").click(function(event){
    	event.preventDefault();
    });
	// article hyperlinks open new windows
	$(function(){
		$('.article a').each(function() {
			if ($(this).attr('class') != 'btn-action') {
        		$(this).attr('target', '_blank');
			}
    	});
	});	
});

