// Bundle of slideshow functions - ER

(function(b){b.fn.slideshow=function(k){var a={display_marker:!0};

	return this.each(function(){k&&b.extend(a,k);
	var c=b(this),d=c.find(".slideshow-slides li");
	if(d.size()>1){c.find(".control").show();
	c.hover(function(){c.find(".control").animate({opacity:1})}).mouseleave(function(){c.find(".control").animate({opacity:0.3})});
	var j=b('<div class="indicators" style="width:'+c.find(".slideshow-slides li").size()*18+'px;"></div>');

	d.each(function(a){a==0?j.append(b('<div class="indicator active">&nbsp;</div>')):
	j.append(b('<div class="indicator">&nbsp;</div>'))});
	c.append(j);
	c.find(".slideshow-slides").jCarouselLite({indicatorClass:".indicators",
		circular:!0,
		btnNext:".next",btnPrev:".prev",btnGo:c.find(".indicators div.indicator"),
		speed:1000,
		visible:1,
		auto:1E4})}d=c.find(".slideshow-slides li[data-url]");
		
d.find(".block-link").height()<d.height()/2&&d.click(function(){event.preventDefault();
document.location=b(this).attr("data-url")});
d.addClass("pointer")})}})(jQuery);

//var GB;
//GB||(GB={});
//GB.Taste.Newsletter=function(b){return{setup:function(){b.each(function(b,a){var c,d,j;
//c=$(a).find("form");
//GB.Usermeta.data();
//d=$(a).find("span.error_message");
//j=$(a).find("span.post_message");
//c.submit(function(){var a=$(this);
//$.ajax({url:"/api/v2/register_simple",data:a.serialize(),dataType:"json",success:function(b){b.success?(GB.Notify.publish("event/newsletter/signup"),a.fadeOut(500,function(){d.text("");
//
//d.fadeIn()})):b.msg[0].indexOf("Already Exists")<-1?a.fadeOut(500,function(){d.text("");
//
//
//d.fadeIn()}):(j.fadeIn(),j.text("Thank you for subscribing."))},error:function(){}});
//$("#btn_join_newsletter").hide()})})}}};
//
//(function(b){b.fn.gridfy=function(k){var a={};
//k&&b.extend(a,k);
//return this.each(function(){var a=b(this);
//b.each(a.children("div:not(.gridfied)"),function(a,c){var d=b(c),i={row:0,col:0};
//i.col=parseInt(d.attr("data-col")||1);
//i.row=parseInt(d.attr("data-row")||1);
//i.col>1&&d.innerWidth(d.innerWidth()*i.col+14*(i.col-1));
//i.row>1&&d.innerHeight(d.innerHeight()*i.row+15*(i.row-1));
//d.attr("data-url")&&d.addClass("pointer");
//d.addClass("gridfied")});
//var d=a.find("div.grid-cell[data-url]");
//d.find(".block-link").height()<
//d.height()/2&&a.find("div.grid-cell[data-url]").click(function(a){a.preventDefault();
//document.location=b(this).attr("data-url")})})}})(jQuery);
