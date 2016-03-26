function showKandidaat(str) {
	var xhhtp;
	
	if(str.length == 0) { // kui vastus tyhi
		document.getElementById("kandB").innerHTML = "";
		return;
	}	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			var data_json = jQuery.parseJSON(xhttp.responseText);
			document.getElementById("kandB").innerHTML = data_json.Nimi+" "+data_json.Erakond+" "+data_json.Piirkond;	
		}
	};
	xhttp.open("GET", "ajaxResponse?q="+str,true);
	xhttp.send();
}

$(document).ready(function() {
	
	// haale sisestamine
	var request;	
	$("#haal").submit(function(event) {
		
		if(request) {
			request.abort();
		}
	
		var $form = $(this);
		var $input = $form.find("input");
		var serialized = $form.serialize();
	
		$input.prop("disabled", true);

		request = $.ajax({
			url: "haal",
			cache: false,
			type: "post",
			data: serialized,
			success: function(resp) {
				// ...do something
				alert("success");
			},
			complete: function() {
				//$('#loadingImage').hide();	
			}
		});
		request.always(function() {
			$input.prop("disabled",false);
		});
		event.preventDefault();	
	});
});

