	
	$(document).ready(function(){
		var user = getCookie("usernameNVB");
		console.log(user, "777777777");
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
				var obj = JSON.parse(xhttp.responseText);
				console.log(obj, " get location");
				var render = "";
				for (var i = 0; i < obj.length; i++) {
					render += 
						'<div class="row pl-lg-5 pr-lg-5 pl-2 pr-2 mt-md-1 mt-sm-1 mt-1">'+
							'<div class="col-md-6 textoverflow align-self-start pl-lg-5 pr-lg-50 font-lg-16 font-md-14 font-12 relative">'+
								'<i class="fas fa-map-marker-alt mr-md-2 mr-2"></i>'+
								obj[i].name+
								'<div class="btn-apply-location font-weight-bold">'+
									'<a class="pointer" onclick="applylocation('+obj[i].locationID+')">'+
										'<u>นำไปใช้</u>'+
									'</a>'+
								'</div>'+
							'</div>'+
						'</div>';
				}
		       document.getElementById("mylocation").innerHTML = render;
		    }
		};
		xhttp.open("GET", "mylocation?username=" + user + "", true);
		xhttp.send();
	});

 	var markers = [];
 	var nameLocation = "";

    function initMap(set_lat, set_lng) {
		if (set_lat == null || set_lat == "") {
			set_lat = 14.987818;
			set_lng = 102.1110193;
		}
		// console.log(set_lat, "set_lat");
		
	  	var mapOptions = {
	  	  	zoom: 14,
	  	  	center: new google.maps.LatLng(set_lat, set_lng),
	  	  	mapTypeId: google.maps.MapTypeId.ROADMAP
	  	};	

	  	var map = new google.maps.Map(document.getElementById('block-map'),
	  	  	mapOptions);

	  	var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        // document.getElementById('submit').addEventListener('click', function() {
        //   	geocodePlaceId(geocoder, map, infowindow);
        // });

        google.maps.event.addListener(map,'center_changed', function() {
	  	  	document.getElementById('default_latitude').value = map.getCenter().lat();
	  	  	document.getElementById('default_longitude').value = map.getCenter().lng();
	  	});

    	$( "#block-map" ).mouseup(function() {

    		var input = $('#default_latitude').val() + "," + $('#default_longitude').val();
        	var latlngStr = input.split(',', 2);
        	var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

    		geocoder.geocode({'location': latlng}, function(results, status) {
        	  	if (status === 'OK') {
        	    	if (results[0]) {
        	    		var that = $(this);
        	    		// console.log(that, "999999");
	  	  				if (!that.data('win')) {
	  	  				  	that.data('win', new google.maps.InfoWindow({
	  	  				  	  	content: results[0].formatted_address
	  	  				  	}));
	  	  				  	that.data('win').bindTo('position', map, 'center');
	  	  				}else{
	  	  					that.data('win').close();
	  	  					that.data('win', new google.maps.InfoWindow({
	  	  				  	  	content: results[0].formatted_address
	  	  				  	}));
	  	  				  	that.data('win').bindTo('position', map, 'center');
	  	  				}
	  	  				that.data('win').open(map);
	  	  				$('#textFieldLocation').val(results[0].formatted_address);
	  	  				console.log(results[0].formatted_address, "111111");
        	    	}else {
        	      	window.alert('No results found');
        	    	}
        	  	} else {
        	    	// window.alert('Geocoder failed due to: ' + status);
        	    	console.log('Geocoder failed due to: ' + status);
        	  	}
        	});
		});

	  	$('<div/>').addClass('centerMarker').appendTo(map.getDiv())

	  	.click(function() {
	  		geocodePlaceId(geocoder, map, infowindow);
	  	});
	}

	function geocodePlaceId(geocoder, map, infowindow) {

		var input = $('#default_latitude').val() + "," + $('#default_longitude').val();
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

		console.log(latlng, "latlng");

  		if (markers.length > 0) {
  			markers[0].setMap(null);
  		}
  		markers = [];
        

        console.log(geocoder, "geocoder");
        geocoder.geocode({'location': latlng}, function(results, status) {
          	if (status === 'OK') {
            	if (results[0]) {
              		map.setZoom(16);
              		map.setCenter(results[0].geometry.location);
              		var marker = new google.maps.Marker({
              		  	map: map,
              		  	position: results[0].geometry.location
              		});
              		markers.push(marker);
              		infowindow.setContent(results[0].formatted_address);
              		infowindow.open(map, marker);
              		nameLocation = results[0].formatted_address;
            	}else {
              	window.alert('No results found');
            	}
          	} else {
            window.alert('Geocoder failed due to: ' + status);
          	}
        });
    }

    function submitLocation(){
    	if ($('#textFieldLocation').val() == "" || $('#textFieldLocation').val() == null) {
    		alert('กรุณาระบุที่จัดส่ง');
    	}else{
    		$('#myModal').modal('toggle');
    	}
    }

    $('#btnNext').click(function(){
    	if ($('#apartment').val() == "" || $('#apartment').val() == null) {
    		$('#submitNext').click();
    	}else{
    		var obj = new Object();
   			obj.name = $('#textFieldLocation').val();
   			obj.lat  = $('#default_latitude').val();
   			obj.lng = $('#default_longitude').val();
   			obj.apartment = $('#apartment').val();
   			// obj.tel = $('#phoneOrder').val();
   			var jsonString= JSON.stringify(obj);

   			var date = new Date();
  			date.setTime(date.getTime() + (365*24*60*60*1000));
  			var expires = "expires=" + date.toGMTString();
  			document.cookie = "locationNVB=" + jsonString + ";" + expires + ";path=/";

  			console.log("locationNVB " + getCookie('locationNVB'), "222222");

  			var productID = getCookie('productIDNVB');

  			if (productID != "" && productID != null && productID != "[]") {
  				window.location = $('#urlmyorder').val();
  			}else{
  				window.location = $('#urlhome').val();
  			}
    	}
    });

    function phonenumber(number){
	  	var pattern = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
	  	if(number.match(pattern)){
	      	return true;
	    }else{
	       	alert("กรอกเบอร์โทรให้ถูกต้อง");
	        return false;
	    }
	}

	function applylocation(id) {
		console.log(id,"id location");
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
					var obj = JSON.parse(xhttp.responseText);
					console.log(obj);
					$('#default_latitude').val(obj["latitude"]);
   				$('#default_longitude').val(obj["longtitude"]);
					$('#textFieldLocation').val(obj["name"]);
					$('#apartment').val(obj["home_apartment"]);
					initMap(obj["latitude"], obj["longtitude"]);
		    }
		};
		xhttp.open("GET", "getlocation?id=" + id + "", true);
		xhttp.send();
	}








