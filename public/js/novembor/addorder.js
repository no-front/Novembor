
	// $(document).ready(function(){
	// });

	function clickImage(id) {

		if (getCookie('productIDNVB')) {
			var cookieID = JSON.parse(getCookie('productIDNVB'));
			var total = JSON.parse(getCookie('totalNVB'));
		}else{
			var cookieID = getCookie('productIDNVB');
			var total = getCookie('totalNVB');
		}
		

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		        var obj = JSON.parse(xhttp.responseText);
		        console.log(obj,"7777");
		        $('#imageProductMd').attr('src', ''+obj[0].image+'');
				$('#nameProduct1Md').text(''+obj[0].name+'');
				$('#nameProduct2Md').text(''+obj[0].name+'');
				$('#outputPriceMd').text(''+obj[0].price+' บาท');
				$('#outputCountMd').text('1');
				$('#productIDMd').val(''+obj[0].productID+'');
				$('#priceProductMd').val(obj[0].price);

				var index = cookieID.indexOf($('#productIDMd').val());

				if (index >= 0) {
					var priceDefault = obj[0].price;
					$('#outputCountMd').text(''+total[index]+'');
					$('#outputPriceMd').text('' + total[index] * priceDefault + ' บาท');
				}

				renderDetail(obj[0].detail);
		    }
		};
		if (window.location.pathname.includes("listproduct")) {
			xhttp.open("GET", "../dataproduct?id="+id+"", true);
		}else{
			xhttp.open("GET", "dataproduct?id="+id+"", true);
		}
		xhttp.send();
	}

	function renderDetail(data){
		var element = "";
		for (var i = 0; i < data.length; i++) {
			element = element+"<li>"+data[i].detail+"</li>";
		}
		$('#detailProductMd1').html(element);
		$('#detailProductMd2').html(element);
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









