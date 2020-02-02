$(document).ready(function() {

    $.ajax({
        type: "GET",
        url: "../../data/cars.json",
        dataType: "json",
        success: function(responseData, status) {
            output = "";
            console.log("HERE!")
            $.each(responseData.vehicles, function(i, vehicles) {
                output += '<div id = "vehicle" style="background-color: navy">\n'
                output += '<img src = "' + vehicles.imgURL + '" height="200px" width="300px">'
                output += '<p style = "color: white">Type of Vehicle: ' + vehicles.type + '</p>\n';
                output += '<p style = "color: white">Brand and Model: ' + '<a href = "'+ vehicles.manURL + '"style = "color: cyan">' + vehicles.brand + '</a></p>\n';
                output += '<p style = "color: white">Year: ' + vehicles.year + '</p>\n';
                output += '<p style = "color: white">Price: ' + vehicles.msrp + '</p>\n';
                output += '</div>\n'
            });
            console.log(output)
            $("<style>").text("#container {margin: 0 auto; width: 80%; display: grid; grid-template-rows: 300px 300px; grid-gap: 20px; background-color: #fff; color: #444;}").appendTo("head");
            $('.container').append(output);
        },
        error: function(msg) {
            // there was a problem
            alert("There was a problem: " + msg.status + " " + msg.statusText);
        }
    });
});