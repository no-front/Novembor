
	$(document).ready(function(){
		var email = $("#email");
		var pass = $("#pass");
		var submit = $("#submit");
		var responseEmail = $("#responseEmail");
		var responsePass = $("#responsePass");
		$("#login").click(function(){
			console.log("btn");
			switch("") {
			  	case email.val():
			  		email.attr('required','required');
			  		submit.click();
			    	break;
			  	case pass.val():
			  		pass.attr('required','required');
			  		submit.click();
			    	break;
			  	default:
			  		submit.click();
			  		console.log("default")
			}
		});

		if (responseEmail.text() == "ไม่มี email นี้ในระบบ") {
			responsePass.hide();
			email.focus();
		}
		if (responsePass.text() == "รหัสผ่านไม่ถูกต้อง") {
			responseEmail.hide();
			pass.val() = "";
			pass.focus();
		}

		// function adminLogin(){
		// 	var xhttp = new XMLHttpRequest();
		// 	xhttp.onreadystatechange = function() {
		// 	    if (this.readyState == 4 && this.status == 200) {
		// 	    	// var obj = JSON.parse(xhttp.responseText);
		// 	    	console.log(xhttp.responseText, "44444");
		// 	       	// console.log(obj, "5555");
		// 	    }
		// 	};
		// 	xhttp.open("GET", "admin/?email="+email.val()+"", true);
		// 	xhttp.send();
		// }
		




		// var xhttp = new XMLHttpRequest();
		// xhttp.onreadystatechange = function() {
		//     if (this.readyState == 4 && this.status == 200) {
		//        // Typical action to be performed when the document is ready:
		//        console.log(xhttp.responseText, "5555");
		//        // document.getElementById("demo").innerHTML = xhttp.responseText;
		//     }
		// };
		// xhttp.open("GET", "admin/", true);
		// xhttp.send();
	});