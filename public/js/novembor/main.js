
	$(document).ready(function(){
		var user = getCookie("usernameNVB");
		var productID = getCookie('productIDNVB');
		var total = getCookie('totalNVB');
		var locationNVB = getCookie('locationNVB');
		if (user != "") {
		   	console.log("Welcome again " + user);
		   	console.log("productID " + productID);
		   	console.log("total " + total);
		   	console.log("location " + locationNVB);

		   	if (locationNVB != "" && locationNVB != null) {
		   		console.log('11111');
		   		var getLocation = JSON.parse(getCookie('locationNVB'));
		   		$('#mainLocation').text(getLocation.name);
		   		$('#mainLocation2').text(getLocation.name);
		   	}
		   	else{
		   		$('#mainLocation').text('ยังไม่ระบุ');
		   		$('#mainLocation2').text('ยังไม่ระบุ');
		   	}
		   	
		} else {
		    var randomString = Math.random().toString(36).slice(-10);
			console.log("random", randomString);
		    setCookie("usernameNVB", randomString, 365);
		}

		if (total == '') {
			// document.getElementById('notiCount').style.display = 'none';
			document.getElementById('notiCount').style.display = 'block';
			$('#notiCount').text(0);
			// $('#notiCount').hide();
		}else{
			document.getElementById('notiCount').style.display = 'block';
			// document.getElementById('notiCount').style.display = 'block';
			// $('#notiCount').text(JSON.parse(total).length);
			// // $('#notiCount').show();
			updateNoti();
		}

		function setCookie(cname,cvalue,exdays) {
  			var d = new Date();
  			d.setTime(d.getTime() + (exdays*24*60*60*1000));
  			var expires = "expires=" + d.toGMTString();
  			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
		  	var name = cname + "=";
		  	var decodedCookie = decodeURIComponent(document.cookie);
		  	var ca = decodedCookie.split(';');
		  	for(var i = 0; i < ca.length; i++) {
		  	  	var c = ca[i];
		  	  	while (c.charAt(0) == ' ') {
		  	  	  c = c.substring(1);
		  	  	}
		  	  	if (c.indexOf(name) == 0) {
		  	  	  return c.substring(name.length, c.length);
		  	  	}
		  	}
		  	return "";
		}

		$('.dropdown-menu').click(function(e) {
		    e.stopPropagation();
		});

	});

	function getCookie(cname) {
	  	var name = cname + "=";
	  	var decodedCookie = decodeURIComponent(document.cookie);
	  	var ca = decodedCookie.split(';');
	  	for(var i = 0; i < ca.length; i++) {
	  	  	var c = ca[i];
	  	  	while (c.charAt(0) == ' ') {
	  	  	  c = c.substring(1);
	  	  	}
	  	  	if (c.indexOf(name) == 0) {
	  	  	  return c.substring(name.length, c.length);
	  	  	}
	  	}
	  	return "";
	}

	function plusOrderMd() {
		var outputCountMd = $('#outputCountMd');
		var outputPriceMd = $('#outputPriceMd');
		var priceModal = $('#priceProductMd');

		var count = parseInt(outputCountMd.text());
		var priceTotal = parseInt(outputPriceMd.text());
		var price = priceModal.val();

		count = count + 1;
		priceTotal = price * count;
		outputCountMd.text(count);
		$('#outputPriceMd').text(priceTotal + ' บาท');

	}

	function minusOrderMd() {

		var outputCountMd = $('#outputCountMd');
		var outputPriceMd = $('#outputPriceMd');
		var priceModal = $('#priceProductMd');

		var count = parseInt(outputCountMd.text());
		var priceTotal = parseInt(outputPriceMd.text());
		var price = priceModal.val();

		if (count <= 1) {

		}else{
			count = count - 1;
			priceTotal = price * count;
			outputCountMd.text(count);
			$('#outputPriceMd').text(priceTotal + ' บาท');
		}
	}

	function btnAddOrderMd() {
		var productIDMd = $('#productIDMd');

		if (getCookie('productIDNVB')) {
			var productID = JSON.parse(getCookie('productIDNVB'));
			var total = JSON.parse(getCookie('totalNVB'));
		}else{
			var productID = getCookie('productIDNVB');
			var total = getCookie('totalNVB');
		}

		if (productID.length > 0) {

			if (productID.includes(productIDMd.val())) {

			}else{
				productID.push(productIDMd.val());
				var json_str = JSON.stringify(productID);
	
				var date = new Date();
  				date.setTime(date.getTime() + (1*24*60*60*1000));
  				var expires = "expires=" + date.toGMTString();
  				document.cookie = "productIDNVB=" + json_str + ";" + expires + ";path=/";
			}

		}else{

			var arr = [];
			arr.push(productIDMd.val());
			var json_str = JSON.stringify(arr);

			var date = new Date();
  			date.setTime(date.getTime() + (1*24*60*60*1000));
  			var expires = "expires=" + date.toGMTString();
  			document.cookie = "productIDNVB=" + json_str + ";" + expires + ";path=/";
		}

		if (productID.indexOf(productIDMd.val()) < 0) {
			var arr = [];
			arr.push($("#outputCountMd").text());
			var json_str = JSON.stringify(arr);

			var date = new Date();
  			date.setTime(date.getTime() + (1*24*60*60*1000));
  			var expires = "expires=" + date.toGMTString();
  			document.cookie = "totalNVB=" + json_str + ";" + expires + ";path=/";

		}else{

			var index = productID.indexOf(productIDMd.val());

			total[index] = $("#outputCountMd").text();
			var json_str = JSON.stringify(total);

			var date = new Date();
  			date.setTime(date.getTime() + (1*24*60*60*1000));
  			var expires = "expires=" + date.toGMTString();
  			document.cookie = "totalNVB=" + json_str + ";" + expires + ";path=/";

		}
		updateNoti();

	}

	function updateNoti(){
		var updateNoti = JSON.parse(getCookie('totalNVB'));
		var sum = 0;
		for (var i = 0; i < updateNoti.length; i++) {
			sum = sum + parseInt(updateNoti[i]);
		}
		if (sum == 0) {
			// document.getElementById('notiCount').style.display = 'none';
			document.getElementById('notiCount').style.display = 'block';
			$('#notiCount').text(sum);
		}else{
			document.getElementById('notiCount').style.display = 'block';
			$('#notiCount').text(sum);
		}
		
		
	}

	function vieworder() {

		if (getCookie('productIDNVB')) {
			var productID = JSON.parse(getCookie('productIDNVB'));
			var total = JSON.parse(getCookie('totalNVB'));
		}else{
			var productID = getCookie('productIDNVB');
			var total = getCookie('totalVNB');
		}

		console.log(productID.length);

		if (productID.length <= 0) {
			$('#listOrderNull').show();
			$('#contentListOrder').hide();
		}else{
			$('#listOrderNull').hide();
			$('#contentListOrder').show();
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			        var obj = JSON.parse(xhttp.responseText);
			        var render = "";
			        $('#renserOrder').html('');
			        var priceTotal = 0;
			       	for (var i = 0; i < obj.length; i++) {
			       		console.log(obj[i][0].name,"responseText");
			       		var name = obj[i][0].name;
			       		var price = obj[i][0].price;
			       		var id = obj[i][0].productID;
						render +=   "<div class='col-12 font-weight-bold'>"+
										"<div class='row mx-md-0 mx-0'>"+
											"<div class='col-6 px-md-0 px-0 textoverflow' align='left'>"+
												name+
											"</div>"+
											"<div class='col-2 px-md-0 px-0' align='center'>"+
												total[i]+
											"</div>"+
											"<div class='col-2 px-md-0 px-0' align='center'>"+
												price * total[i]+
											"</div>"+
											"<div class='col-2 px-md-0 px-0 font-lg-24 font-sm-20' align='center'>"+
												"<a class='text-danger' onclick='removeListOrder("+id+")'>"+
													"<i class='fas fa-minus-circle'></i>"+
												"</a>"+
											"</div>"+
										"</div>"+
									"</div>";
						priceTotal = priceTotal + (price * parseInt(total[i]));
			       	}
			       	$('#priceTotal').html(''+priceTotal+' บาท');
			       	$('#renserOrder').html(render);
			    }
			};
			if (window.location.pathname.includes("listproduct")) {
				xhttp.open("GET", "../vieworder?id="+productID+"&total="+total+"", true);
			}else{
				xhttp.open("GET", "vieworder?id="+productID+"&total="+total+"", true);
			}
			xhttp.send();
		}
	}

	function removeListOrder(id){

		var productID = JSON.parse(getCookie('productIDNVB'));
		var total = JSON.parse(getCookie('totalNVB'));

		var index = productID.indexOf(""+id+"");

		Array.prototype.remove = function() {
		    var what, a = arguments, L = a.length, ax;
		    while (L && this.length) {
		        what = a[--L];
		        while ((ax = this.indexOf(what)) !== -1) {
		            this.splice(ax, 1);
		        }
		    }
		    return this;
		};

		console.log(id, "id");
		console.log(index, "index");

		productID.remove(""+id+"");
		total.splice(index,1);

		console.log(productID, "removed");
		console.log(total, "removed");

		var json_str = JSON.stringify(productID);
		var json_str2 = JSON.stringify(total);

		var date = new Date();
  		date.setTime(date.getTime() + (1*24*60*60*1000));
  		var expires = "expires=" + date.toGMTString();
  		document.cookie = "productIDNVB=" + json_str + ";" + expires + ";path=/";

  		var date2 = new Date();
  		date2.setTime(date2.getTime() + (1*24*60*60*1000));
  		var expires2 = "expires=" + date2.toGMTString();
  		document.cookie = "totalNVB=" + json_str2 + ";" + expires2 + ";path=/";

  		updateNoti();
  		vieworder();

	}

	function checkLocation() {
		var locationNVB = getCookie('locationNVB');
		var productID = getCookie('productIDNVB');
		var urlmyorder = $('#urlmyorder').val();
		var urlmarklocation = $('#urlmarklocation').val();
		console.log(productID, "productID");
		if (productID != "" && productID != null && productID != "[]") {
			if (locationNVB != "" && locationNVB != null && locationNVB != "{}") {
				window.location = urlmyorder;
			}else{
				window.location = urlmarklocation;
			}
		}else{
			window.location.reload();
		}
		
	}

	var config = {
		apiKey: "AIzaSyArPoybVYQsjqisKZP6F_UICpqrnlDKBmc",
		authDomain: "novembor-3b325.firebaseapp.com",
		databaseURL: "https://novembor-3b325.firebaseio.com",
		projectId: "novembor-3b325",
		storageBucket: "novembor-3b325.appspot.com",
		messagingSenderId: "696546652986"
	};
	firebase.initializeApp(config);











