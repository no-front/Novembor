
	$(document).ready(function(){
		$('#actionUpload').click(function(){
			$('#inputFile').click();
			console.log('actionUpload');
		});
		$('#btnSave').click(function(){

			var name = $('#name');
			var inputFile = $('#inputFile');
			var detail = $('#detail1');
			var cate = $('#cate');
			var price = $('#price');

			console.log(cate.val(), "name");

			switch('') {
			  	case name.val():
			  		name.attr('required','required');
			  		$('#submit').click();
			    	break;
			  	case inputFile.val():
			  		alert('กรุณาอัพโหลดรูปเมนู');
			  		inputFile.focus();
			    	break;
			    case detail.val():
			  		detail.attr('required','required');
			  		$('#submit').click();
			    	break;
			    case price.val():
			  		price.attr('required','required');
			  		$('#submit').click();
			    	break;	
			  	default:
			  		checkType();
			}
		});

		function checkType(){
			var cate = $('#cate');
			if (cate.val() == null){
				alert('กรุณาเลือกประเภทเมนู');
				cate.focus();
			}else{
				$('#submit').click();
			}
		}
	});

	function loadFile(event) {
		var reader = new FileReader();
    	reader.onload = function(){
      		var output = document.getElementById('output');
      		output.src = reader.result;
    	};
    	reader.readAsDataURL(event.target.files[0]);
	}





