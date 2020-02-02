$(document).ready(function(){
	//adding an onclick event to the image
	$("#site").click(function(){
		//adds the border and styling to the playlist
		$(".outline").css({"overflow":"hidden", "min-height":"0px", "border-style":"solid", "border-color":"red"});

		//adds <ul> tags to respective containers (divs/headers)
		$("<ul>").appendTo("#title").css({"width":"150px", "list-style":"none", "float":"left",	"padding-right":"25px",	"padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	$("<ul>").appendTo("#artist").css({"width":"150px", "list-style":"none", "float":"left", "padding-right":"25px", "padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	$("<ul>").appendTo("#album").css({"width":"150px", "list-style":"none", "float":"left",	"padding-right":"25px",	"padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	$("<ul>").appendTo("#date").css({"width":"150px", "list-style":"none", "float":"left",	"padding-right":"25px",	"padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	//since a <ul> tag was already created for me, I just edited its css
   	  	$("#genres ul").css({"width":"150px", "list-style":"none", "float":"left", "padding-right":"25px", "padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	$("<ul>").appendTo("#artist_link").css({"width":"150px", "list-style":"none", "float":"left", "padding-right":"25px", "padding-left":"0px", "margin":"0px", "width": "auto"});
   	  	$("<ul>").appendTo("#cover").css({"width":"150px", "list-style":"none", "float":"left",	"padding-right":"25px",	"padding-left":"0px", "margin":"0px", "width": "auto"});

		$.ajax({
			//gets the json file and checks if that process went ok
	   	 	type: "GET",
	   	 	url: "lab4.json",
	   	 	dataType: "json",
	   	 	success: function(responseData, status){
		   	  	//go through each element in my 'playlist' array and output information to respective spots in the html
	    	 	$.each(responseData.playlist, function(i, item) {
	    	 		//using jquery selectors for styling slightly different to each <li> element added

		        	$("<li>"+item.track_name+"</li>").appendTo("#title ul").css({"height":"150px", "padding":"10px", "font-variant":"small-caps", "color":"green", "font-size":"85%"});
		        	$("<li>"+item.artist+"</li>").appendTo("#artist ul").css({"height":"150px",	"padding":"10px", "font-weight":"bold"});
		        	$("<li>"+item.album+"</li>").appendTo("#album ul").css({"height":"150px", "padding":"10px", "font-style":"italic"});
		        	$("<li>"+item.date+"</li>").appendTo("#date ul").css({"height":"150px",	"padding":"10px", "font-size":"75%"});
		        	$("<li>"+item.genres+"</li>").appendTo("#genres ul").css({"height":"150px", "padding":"10px", "font-size":"75%", "list-style-type":"circle"});
		        	$("<li><a href="+item.artist_site_url+">"+item.artist+" link</a></li>").appendTo("#artist_link ul").css({"height":"150px", "padding":"10px"});
		        	$("<li><img src="+item.album_art_url+" alt="+item.album+" style=width:150px;height:150px;></li>").appendTo("#cover ul");
	      		});
	    	}, error: function(msg) {
	      		//output for if an error occurred
	      		alert("There was a problem: " + msg.status + " " + msg.statusText);
	    	}
	  	});
	});
});