function showKandidaat(str) {
	var xhttp;
	document.getElementById("spinner").innerHTML = "";
	if(str.length === 0) { // kui vastus tyhi
		document.getElementById("kandB").innerHTML = "";
		return;
	}	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState === 4 && xhttp.status === 200) {
			var data_json = jQuery.parseJSON(xhttp.responseText);
			document.getElementById("kandB").innerHTML = "<button class=\"btn btn-default\" id=\"haal\" type=\"submit\">Hääleta</button><h4>Kandidaat: "+data_json.Nimi+", "+data_json.Erakond+", "+data_json.Piirkond+"</h4>";
	
		} else {
			document.getElementById("kandB").innerHTML = "";
		}
	};
	xhttp.open("GET", "ajaxResponse?q="+str,true);
	xhttp.send();
}

function pollKandidaat() {
	var box = document.getElementById("ajutine");
	
	$.ajax({
		type: "GET",
		url: "http://valimised16.cs.ut.ee/index.php/sait/pollResponse",
		async: true,
		cache: false,
		timeout:50000,
		
		success: function(data) {
			box.innerHTML = data;
			setTimeout(pollKandidaat,5000);
		},
		error: function(textStatus, errorThrown) {	
			box.innerHTML = textStatus + " " + errorThrown;
			setTimeout(pollKandidaat,15000);
		}
	});
}

function pollVotes() {

	if(window.location.pathname != "/index.php/sait/tulemused") {
		return;
	}

	$.ajax({
		type: "GET",
		url: "http://valimised16.cs.ut.ee/index.php/sait/getVotesLive",
		async: true,
		timeout: 50000,

		success: function(data) {
			var data_json = jQuery.parseJSON(data);
			var htmlContent = "";
			$.each(data_json, function(k, v) {
				htmlContent += "<tr><td scope=\"row\">"+v.Number+"</td><td>"+v.Nimi+"</td><td>"+v.Erakond+"</td><td>"+v.Piirkond+"</td><td>"+v.votes+"</td></tr>";
			});
			$('.searchable').html(htmlContent);	

			setTimeout(pollVotes,5000);			
		},
		error: function(textStatus, errorThrown) {
			setTimeout(pollVotes,10000);
		
		}
	});
}



$(document).ready(function() {
	
	// long polling
	pollKandidaat();
	//pollVotes();

	// haale sisestamine
	var request;
		
	$("#kandB").on('click','#haal', function() {
		
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
