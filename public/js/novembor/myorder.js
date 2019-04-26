
$(document).ready(function () {
	reloadOrder()
});

function reloadOrder() {
	var user = getCookie("usernameNVB");
	var productID = JSON.parse(getCookie('productIDNVB'));
	var total = JSON.parse(getCookie('totalNVB'));
	var locationNVB = JSON.parse(getCookie('locationNVB'));

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(xhttp.responseText);
			console.log(obj, "responseText");
			var render = "";
			var render2 = "";
			var count = 0;
			var totalPrict = 0;
			var sumPrice = 0;
			for (var i = 0; i < obj.length; i++) {
				var totalPrict = 0;
				var name = obj[i][0].name;
				var price = obj[i][0].price;
				var id = obj[i][0].productID;
				var image = obj[i][0].image;

				count = count + parseInt(total[i]);
				totalPrict = totalPrict + (price * total[i]);
				render += '<div class="col-12">' +
					'<div class="bg-white border-1-ddd mb-md-3 pt-md-3 pb-md-3 pl-md-3 pr-md-3">' +
					'<div class="row">' +
					'<div class="col-md-4">' +
					'<img src="' + image + '" class="w-100 border-1-ddd">' +
					'</div>' +
					'<div class="col-md-4 pt-md-2 pl-md-0 pr-md-0 font-weight-bold font-md-14">' +
					name +
					'</div>' +
					'<div class="col-md-4 pl-md-0 font-weight-bold font-md-14" align="right">' +
					'<div class="row pt-md-1 pt-1 pt-sm-1 pb-3">' +
					'<div class="col-12">' +
					'<div class="block-add-number">' +
					'<div class="row ml-md-0 mr-md-0 ml-0" align="center">' +
					'<div class="col-md-4 col-4 plr-md-0">' +
					'<div class="btn-circle rounded-circle" id="minusOrderMd" onclick="minusMyOrder(' + i + ')">' +
					'<i class="fas fa-minus"></i>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4 col-4 pt-md-1 pt-1 pl-md-0 pr-md-0 font-lg-18" id="outputCountOrder' + i + '">' +
					total[i] +
					'</div>' +
					'<div class="col-md-4 col-4 plr-md-0">' +
					'<div class="btn-circle rounded-circle" id="plusOrderMd" onclick="plusMyOrder(' + i + ')">' +
					'<i class="fas fa-plus"></i>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<input type="hidden" value="' + price + '" id="priceProductOrder' + i + '">' +
					'<input type="hidden" value="' + id + '" id="productIDOrder' + i + '">' +
					'</div>' +
					'<div class="absolute b-lg-0 r-lg-0 pr-md-3 font-weight-bold font-lg-20 font-md-16" id="outputPriceOrder' + i + '">' +
					totalPrict + ' บาท' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>';

				render2 +=

					'<div class="col-12">' +
					'<div class="bg-white border-1-ddd mb-2 pt-2 pb-2 pl-2 pr-2">' +
					'<div class="row ml-0 mr-0 font-weight-bold">' +
					'<div class="col-3 pl-0 pr-0">' +
					'<img src="' + image + '" class="w-100 border-1-ddd">' +
					'</div>' +
					'<div class="col-5 font-sm-14 pl-2 pr-1 pt-2">' +
					name +
					'</div>' +
					'<div class="col-4 textoverflow font-sm-14 pr-sm-2 pr-0 pl-1" align="right">' +
					'<div class="row pt-md-1 pt-1 pt-sm-1 pb-3">' +
					'<div class="col-12 pr-1">' +
					'<div class="block-add-number">' +
					'<div class="row ml-md-0 mr-md-0 mr-0 ml-0" align="center">' +
					'<div class="col-md-4 col-4 offset-1 plr-md-0">' +
					'<button class="btn-circle rounded-circle" id="minusOrderMd2" onclick="minusMyOrder(' + i + ')">' +
					'<i class="fas fa-minus"></i>' +
					'</button>' +
					'</div>' +
					'<div class="col-md-4 col-2 pl-1 pr-1 pt-1 font-lg-14" id="outputCountOrder2' + i + '">' +
					total[i] +
					'</div>' +
					'<div class="col-md-4 col-4 plr-md-0">' +
					'<button class="btn-circle rounded-circle" id="plusOrderMd2" onclick="plusMyOrder(' + i + ')">' +
					'<i class="fas fa-plus"></i>' +
					'</button>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<input type="hidden" value="' + price + '" id="priceProductOrder2' + i + '">' +
					'<input type="hidden" value="' + id + '" id="productIDMd2' + i + '">' +
					'</div>' +
					'<div class="absolute b-lg-0 r-lg-0 pr-sm-2 font-sm-16" id="outputPriceOrder2' + i + '">' +
					totalPrict + ' บาท' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>';
				sumPrice = sumPrice + totalPrict;
			}
			console.log(count, 'count');
			console.log(totalPrict, 'totalPrict');

			$('#listMyOrder').html(render);
			$('#listMyOrder2').html(render2);
			$('#locationName').text(locationNVB.name);
			$('#apartmentName').text(locationNVB.apartment);
			$('#countMyOrder').text('' + count + ' รายการ');
			$('#priceMyOrder').text('' + sumPrice + ' บาท');
			$('#priceMyOrder2').text('' + sumPrice + ' บาท');

		}
	};
	xhttp.open("GET", "listorder?id=" + productID, true);
	xhttp.send();

	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for (var i = 0; i < ca.length; i++) {
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
}

function plusMyOrder(index) {
	var outputCountMd = $('#outputCountOrder' + index + '');
	var outputCountMd2 = $('#outputCountOrder2' + index + '');
	var outputPriceMd = $('#outputPriceOrder' + index + '');
	var priceModal = $('#priceProductOrder' + index + '');

	var count = parseInt(outputCountMd.text());
	var priceTotal = parseInt(outputPriceMd.text());
	var price = priceModal.val();

	count = count + 1;
	priceTotal = price * count;
	outputCountMd.text(count);
	$('#outputPriceOrder' + index + '').text(priceTotal + ' บาท');
	outputCountMd2.text(count);
	$('#outputPriceOrder2' + index + '').text(priceTotal + ' บาท');

	updateOrder(index);

}

function minusMyOrder(index) {

	var outputCountMd = $('#outputCountOrder' + index + '');
	var outputCountMd2 = $('#outputCountOrder2' + index + '');
	var outputPriceMd = $('#outputPriceOrder' + index + '');
	var priceModal = $('#priceProductOrder' + index + '');

	var count = parseInt(outputCountMd.text());
	var priceTotal = parseInt(outputPriceMd.text());
	var price = priceModal.val();

	if (count <= 1) {

	} else {
		count = count - 1;
		priceTotal = price * count;
		outputCountMd.text(count);
		$('#outputPriceOrder' + index + '').text(priceTotal + ' บาท');
		outputCountMd2.text(count);
		$('#outputPriceOrder2' + index + '').text(priceTotal + ' บาท');
	}
	updateOrder(index);
}

function updateOrder(i) {
	var productIDOrder = $('#productIDOrder' + i + '');

	if (getCookie('productIDNVB')) {
		var productID2 = JSON.parse(getCookie('productIDNVB'));
		var total2 = JSON.parse(getCookie('totalNVB'));
	} else {
		var productID2 = getCookie('productIDNVB');
		var total2 = getCookie('totalNVB');
	}

	var index = productID2.indexOf(productIDOrder.val());
	console.log(index, "index");
	console.log(productIDOrder.val(), "index");
	total2[index] = $("#outputCountOrder" + i + "").text();
	var json_str = JSON.stringify(total2);
	var date = new Date();
	date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
	var expires = "expires=" + date.toGMTString();
	document.cookie = "totalNVB=" + json_str + ";" + expires + ";path=/";

	reloadOrder()
	updateNoti();
}

function updateNoti() {
	var updateNoti = JSON.parse(getCookie('totalNVB'));
	var sum = 0;
	for (var i = 0; i < updateNoti.length; i++) {
		sum = sum + parseInt(updateNoti[i]);
	}
	if (sum == 0) {
		document.getElementById('notiCount').style.display = 'none';
		$('#notiCount').text(sum);
	} else {
		document.getElementById('notiCount').style.display = 'block';
		$('#notiCount').text(sum);
	}
}

$('#btnNext').click(function () {
	if ($('#phone').val() == "" || $('#phone').val() == null) {
		$('#submitNext').click();
	} else {
		$('#successModal').modal({
			backdrop: 'static',
			keyboard: false
		});
		if (phonenumber($('#phone').val())) {
			$('#phoneModal').modal('hide');
			insertOrder()
		}
	}
});

function phonenumber(number) {
	var pattern = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
	if (number.match(pattern)) {
		return true;
	} else {
		alert("กรอกเบอร์โทรให้ถูกต้อง");
		return false;
	}
}

function insertOrder() {

	var user = getCookie("usernameNVB");
	var productID = JSON.parse(getCookie('productIDNVB'));
	var total = JSON.parse(getCookie('totalNVB'));
	var locationNVB = JSON.parse(getCookie('locationNVB'));

	console.log(user);
	console.log(productID);
	console.log(total);
	console.log(locationNVB);

	$('#usernameVal').val(user);
	$('#locationVal').val(locationNVB["name"]);
	$('#latVal').val(locationNVB["lat"]);
	$('#lngVal').val(locationNVB["lng"]);
	$('#homeVal').val(locationNVB["apartment"]);
	$('#productIDVal').val(productID);
	$('#countVal').val(total);
	$('#phoneVal').val($('#phone').val());
	

	var saveSum = 0;
	total.forEach(element => {
		saveSum+=parseInt(element);
	});

	var db = firebase.firestore();
	db.collection("orders").add({
			username: user,
			location: locationNVB["name"],
			phone: $('#phone').val(),
			total: saveSum,
			read: false,
			created_at: getCurrentTimestamp()
		})
		.then(function(docRef) {
			console.log("Document written with ID: ", docRef.id);
			$('#firebaseID').val(docRef.id);
			$('#forminsert').submit();
		})
		.catch(function(error) {
			console.error("Error adding document: ", error);
	});
}

function getCurrentTimestamp() {
    
    var currentDate = new Date();

    var date = currentDate.getDate();
    var month = currentDate.getMonth(); //Be careful! January is 0 not 1
    var year = currentDate.getFullYear();
    var hour = currentDate.getHours();
    var minutes = currentDate.getMinutes();
	var seconds = currentDate.getSeconds();

	var sentDate = new Date(year, month, date, hour, minutes, seconds, 0).toISOString();


    return sentDate;
}












