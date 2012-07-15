/*

	Javascript for jQuery/JSON "Tooltip" Tutorial
	--------------------------------------
	
	Written for Webappers (www.webappers.com)
	By Zach Dunn (www.buildinternet.com)
	
*/


//JSON banner content array
var banner_data = {
	//Tooltips
	"tooltips" : [
		
		//Remember that the count starts at zero
		
		{
			//Array ID -> 0
			"Title"   : "Oh Yes", 
			"Content" : "That's some good hovering.",
			"ImageURL"   : "yellow-bg.jpg"
		},
		
		{
			//Array ID -> 1
			"Title"   : "Nice", 
			"Content" : "You found link number 2",
			"ImageURL"   : "orange-bg.jpg"
		}
		
	] 
}



// Image Preloader via http://www.innovatingtomorrow.net/2008/04/30/preloading-content-jquery
jQuery.preloadImages = function()
{
  for(var i = 0; i<arguments.length; i++)
  {
    jQuery("<img>").attr("src", arguments[i]);
  }
}

//Actual jQuery starts here on document ready
$(document).ready(function() {
	
	
	//Goes through each tooltip's image URL
	for(var i = 0; i < banner_data.tooltips.length; i++){
		
		image_location = banner_data.tooltips[i].ImageURL;
		
		//Preload if location exists
		if (image_location != ''){
			$.preloadImages(image_location);
		};
		
	};
	
	
	$('a.tooltip').hover(function(){ //when hover starts
		
		//Get the ID of the current tooltip
		active_tooltip = $(this).attr('rel');
		
		//Replace the HTML in the header with data from JSON array
		$('#banner h1').html(banner_data.tooltips[active_tooltip].Title);
		$('#banner p').html(banner_data.tooltips[active_tooltip].Content);
		$('#banner').css("background-image", "url("+ banner_data.tooltips[active_tooltip].ImageURL + ")");
		//$('#banner img').show().attr('src', banner_data.tooltips[active_tooltip].ImageURL);
		
	},
	function(){ //When hover ends
		
		//Reset banner to defaults
		$('#banner h1').html("Go On");
		$('#banner p').html("Hover over a link below");
		$('#banner').css("background-image", '');
		//$('#banner img').hide().attr('src', '');
		
	});
	
});
