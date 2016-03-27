function showKandidaat(str) {
	var xhhtp;
	document.getElementById("spinner").innerHTML = "";
	if(str.length == 0) { // kui vastus tyhi
		document.getElementById("kandB").innerHTML = "";
		return;
	}	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			var data_json = jQuery.parseJSON(xhttp.responseText);
			document.getElementById("kandB").innerHTML = "<button class=\"btn btn-default\" id=\"haal\" type=\"submit\">"+data_json.Nimi+" "+data_json.Erakond+" "+data_json.Piirkond+"</button>";
	
		} else {
			document.getElementById("kandB").innerHTML = "";
		}
	};
	xhttp.open("GET", "ajaxResponse?q="+str,true);
	xhttp.send();
}

$(document).ready(function() {
	
	// haale sisestamine
	var request;
		
	$(".input-group").on('click','#haal', function() {
		
		if(request) {
			request.abort();
		}
	

		var $input = $("#data");

	
		$input.prop("disabled", true);
		$("#haal").prop("disabled",true);
		var spinner = document.getElementById("spinner");
		spinner.innerHTML = "<span class=\"glyphicon glyphicon-refresh spinning\"></span>";
		request = $.ajax({
			url: "haal",
			cache: false,
			type: "post",
			data: {'haaletus' : $input.val()},
			success: function(resp) {
				spinner.innerHTML = "Hääl kinnitatud." + resp;
			},
			complete: function() {
			},
			error: function(jq,status,message) {
				spinner.innerHTML = jq + " " + status + " " + message;
			}
		});
		request.always(function() {
			//$input.prop("disabled",false);
		});
		event.preventDefault();	
	});
});
