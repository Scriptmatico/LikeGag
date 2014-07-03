// JavaScript Document
var ShareWindow= function (j) {
    var g = 640;
    var m = 460;
    var f = window.screen.height / 2 - (m / 2);
    var i = window.screen.width / 2 - (g / 2);
    var l = window.open(j, "Social Share", "status=1,height=" + m + ",width=" + g + ",top=" + f + ",left=" + i + ",resizable=0")
}

jQuery(document).ready(function(){
	jQuery(".btn-twitter").click(function(){
		var t = jQuery(this).attr("data-title");
		var u = jQuery(this).attr("data-url");
		var p = "https://twitter.com/intent/tweet?via=LikeGag&source=tweetbutton&original_referer="+encodeURIComponent(u)+"&text="+t+"&url="+encodeURIComponent(u);
		ShareWindow(p);
	});
	
	jQuery(".btn-facebook").click(function(){
		var u = jQuery(this).attr("data-url");
		var p = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(u);
		ShareWindow(p);
	});
	
	jQuery(".menu-google-plus").click(function(){
		var u = jQuery(this).attr("data-url");
		var p = "https://plus.google.com/share?url="+encodeURIComponent(u);
		ShareWindow(p);
	});
	
	jQuery(".menu-pinterest").click(function(){
		//ToDo add media
		var t = jQuery(this).attr("data-title");
		var u = jQuery(this).attr("data-url");
		var p = "//pinterest.com/pin/create/button/?url="+encodeURIComponent(u)+"&media="+"&description="+t;
		ShareWindow(p);
	});
	
});