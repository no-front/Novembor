	
	$(document).ready(function() {
		
		window.onscroll = function() {scrollFunction()};
		var tapTopMain = document.getElementById('tapTopMain');
		var blockTopMmenu = document.getElementById('block-top-menu');

		var screen = document.documentElement.clientWidth;

		function scrollFunction() {
			if (screen < 767.9) {
				if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
					document.getElementById('headerMain').style.height = "95px";
					blockTopMmenu.style.width = "100%";
					blockTopMmenu.style.position = "fixed";
			        blockTopMmenu.style.top = "0px";
			        blockTopMmenu.style.left = "0px";
			        blockTopMmenu.style.zIndex = "2";
				}
				else{
					document.getElementById('headerMain').style.height = "50px";
					blockTopMmenu.style.width = "100%";
					blockTopMmenu.style.position = "relative";
				}
 			}
 			else{
 				if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
			    	document.getElementById('headerMain').style.height = "115px";
			        tapTopMain.style.position = "fixed";
			        tapTopMain.style.width = "100%";
			        tapTopMain.style.top = "0px";
			        tapTopMain.style.left = "0px";
			        tapTopMain.style.zIndex = "2";
			    }else {
			    	document.getElementById('headerMain').style.height = "70px";
			    	tapTopMain.style.position = "relative";
			    	tapTopMain.style.width = "100%";
			    }
 			}
 		}
		function topFunction() {
		    document.body.scrollTop = 0;
		    document.documentElement.scrollTop = 0;
		}
		

		// -------------------- home --------------------

		function myMap() {
			var mapProp= {center:new google.maps.LatLng(51.508742,-0.120850),zoom:5,};
			var map=new google.maps.Map(document.getElementById("block-map"),mapProp);

			}


	});

	

	