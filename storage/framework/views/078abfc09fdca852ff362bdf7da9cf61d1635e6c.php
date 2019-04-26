<?php $__env->startSection('title', 'ระบุตำแหน่งที่จัดส่ง - Novemnbor'); ?>
<?php $__env->startSection('content'); ?>

<style type="text/css">
	#block-map .centerMarker {
  		position: absolute;
  		/*url of the marker*/
  		background: url(http://maps.gstatic.com/mapfiles/markers2/marker.png) no-repeat;
  		/*center the marker*/
  		top: 50%;
  		left: 50%;
  		z-index: 1;
  		/*fix offset when needed*/
  		margin-left: -10px;
  		margin-top: -34px;
  		/*size of the image*/
  		height: 34px;
  		width: 20px;
  		cursor: pointer;
	}
</style>

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="row justify-content-center mb-lg-5 mb-3">
		<div class="col-lg-11 rounded mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title" align="center">
			<b>ลากแผนที่เพื่อเปลี่ยนตำแหน่ง</b>
		</div>
	</div>
	<div id="mylocation">
		
	</div>
	
	<div class="row pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2">
		<div class="col-md-6 align-self-start pl-lg-5 pr-lg-3 font-lg-18">
			<div class="form-group">
		    	<input type="email" class="form-control textoverflow pr-lg-50 font-md-14 font-12 input-for-button" value="" id="textFieldLocation" placeholder="ระบุตำแหน่งมนแผนที่" disabled>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-6 pr-2 pr-md-3 d-none d-md-block">
			<a class="btn btn-danger w-100" onclick="submitLocation()">ยืนยันที่อยู่</a>
		</div>
		<div class="col-md-3 col-sm-6 col-6 pl-2 pl-md-3 d-none d-md-block">
			<a href="" class="btn btn-default w-100">ยกเลิก</a>
		</div>
	</div>
	<div class="row justify-content-center pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2 pb-sm-4 pb-4">
		<div class="col-md-10 align-self-start pl-lg-5 pr-lg-3 font-lg-18">
			<div class="block-map w-100" id="block-map" onmouseup="updateLocation()">

			</div>
			
			<input type="text" id="default_latitude" value="14.987818" placeholder="Latitude" hidden />
			<input type="text" id="default_longitude" value="102.1110193" placeholder="Longitude" hidden />


		</div>
	</div>
	<div class="row pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-2 pr-2 mt-md-3 mt-2 pb-5 d-md-none">
		<div class="col-sm-6 col-6 pr-2 pr-md-3">
			<a class="btn btn-danger w-100" onclick="submitLocation()">ยืนยันที่อยู่</a>
		</div>
		<div class="col-sm-6 col-6 pl-2 pl-md-3">
			<a href="" class="btn btn-default w-100">ยกเลิก</a>
		</div>
	</div>

	<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">ที่อยู่และเบอร์โทรติดต่อ</b>
	        		<form>
	        			<div class="row">
	        				<div class="col-12 mt-md-3 mt-2" align="left">
	        					<div class="form-group">
	        						<label class="mb-sm-1 mb-0 font-md-14 font-weight-bold" for="">ชื่อที่พัก</label>
			    					<input type="text" class="form-control font-md-14" id="apartment" placeholder="กรอกบ้านเลขที่ / ชื่อหอพัก" required>
	        					</div>
	        				</div>
	        				<div class="modal-footer w-100 border-none pb-md-2 pb-2">
        						<a class="btn btn-default pl-md-4 pr-md-4 pl-3 pr-3" data-dismiss="modal">
									ยกเลิก
								</a>
        						<a class="btn btn-danger pl-md-4 pr-md-4 pl-4 pr-4" id="btnNext">
        							ดำเนินการต่อ
								</a>
        						<input id="submitNext" hidden>
      						</div>
	        			</div>
	        		</form>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>
</div>

<script type="text/javascript" src="<?php echo e(URL('js/novembor/marklocation.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC80Dz7LHPgP2CB9BA790xItbWTbJe2tdY&callback=initMap&language=th&region=TH" async defer></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC80Dz7LHPgP2CB9BA790xItbWTbJe2tdY&region=th"> -->
</script>


<?php $__env->stopSection(); ?>







<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>