function getParameterByName(a){a=a.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");a=RegExp("[\\?&]"+a+"=([^&#]*)").exec(window.location.search);return null==a?"":decodeURIComponent(a[1].replace(/\+/g," "))}var isMobile="none"==$("#checker-notmobile").css("display")?!0:!1;
$(document).ready(function(){$(function(){if(navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPad/i)){var a=document.querySelector('meta[name="viewport"]');a&&(a.content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0",document.body.addEventListener("gesturestart",function(){a.content="width=device-width, minimum-scale=0.25, maximum-scale=1.6"},!1))}});var a=$(window).height();!1===isMobile&&0==$(".companywidget").length&&$(function(){var b=$("#content").outerHeight(!0),
c=$("#header").outerHeight(!0)+10+$(".footer").outerHeight(!0),d=a-b-c,e=Math.ceil($("#content").width()/1.618/3);a>b+c&&(d<e?$("#content .article").css("height",$("#content .article").height()+d):$("#content .article").css("height",$("#content .article").height()+e))});$(".left #ctas .btn-action").click(function(){_gaq.push(["_trackEvent","CTAs","LeftButton"])});$(".right #ctas .btn-action").click(function(){_gaq.push(["_trackEvent","CTAs","RightButton"])});$("#content .article .btn-action").click(function(){_gaq.push(["_trackEvent",
"CTAs","InlineButton"])});$("a.share").click(function(){!1===isMobile?window.open(this.href,"","toolbar=0,status=0,width=626,height=436,scrollbars=yes"):window.open(this.href);return!1});!1===isMobile&&(-1==$("#body").attr("class").indexOf("doublewide")&&-1==$("#body").attr("class").indexOf("plus"))&&$(window).scroll($.throttle(500,function(){0<=$(window).scrollTop()&&$("#ctas").css("top",$(this).scrollTop()+"px")}));!1===isMobile&&(-1==$("#body").attr("class").indexOf("doublewide")&&-1==$("#body").attr("class").indexOf("plus"))&&
$(function(){railHeight=$("#header").height()+10+$("#extra").height();railHeight<a&&$(window).scroll($.throttle(500,function(){0<=$(window).scrollTop()&&$("#ads").css("top",$(this).scrollTop()+"px")}))});$("a[href='#'], a[href='']").click(function(a){a.preventDefault()});$(function(){$(".article a").each(function(){"btn-action"!=$(this).attr("class")&&$(this).attr("target","_blank")})})});