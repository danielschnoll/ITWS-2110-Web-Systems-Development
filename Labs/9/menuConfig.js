$(document).ready(function() {

	$.ajax({
		 	type: "GET",
		 	url: "websysinfo.JSON",
		 	dataType: "JSON",
		 	success: function(responseData, status){ 
		 	output="";
		 	$.each(responseData.websys_course, function(i, item) {
				$.each(item, function(k, v) {
					leg="'"+v.Title+"'"; 
					leg2="'"+v.Description+"'"; 
					leg3="'"+v.Link+"'"; 
					leg4="'home.php?link="+v.Link+"'"; 
					output += '<a href="#" onclick=" return displayInfo('+leg+', '+leg2+', '+leg3+', '+leg4+');">'+v.Label+': '+v.Title+'</a>';
				});
	  		});
	  	$('#mySidenav').append(output);
		}, error: function(msg) {
	  				// there was a problem
	  	alert("There was a problem: " + msg.status + " " + msg.statusText);
		}
	});
});

function displayInfo(title,des,link,arch){
	$("#spaceFiller").html("");
	$("#spaceFiller").html("<h1 class='infoHead'>"+title+"</h1>");
	$("#spaceFiller").append("<p class='information'>"+des+"</p>");
	$("#spaceFiller").append("<p class='information'><a href='"+link+"'"+des+"'>Content</a></p>");
	$("#spaceFiller").append("<p class='information'><a href='"+arch+"'"+des+"'>Archive</a></p>");

	
}