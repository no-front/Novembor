<?php $__env->startSection('title', 'สรุปรายการที่สั่ง - Novemnbor'); ?>
<?php $__env->startSection('content'); ?>

<style type="text/css">
	#dropdownListMenu {
		display: none;
	}
</style>

<div class="container mh-100 bg-shadow pb-md-5">
	<div class="row mb-md-4 mb-lg-5 mb-3" align="center">
		<div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
			<b>สรุปรายการที่สั่ง</b>
		</div>
	</div>
	<!-- <?php if(isset($error)): ?>
	<input type="text" value="<?php echo e($error); ?>" id="response" >
	<?php else: ?>
	<input type="text" value="" id="response" >
	<?php endif; ?> -->
	<form method="post" action="<?php echo e(URL('insertorder/data')); ?>" enctype="multipart/form-data" id="forminsert">
		<div class="row pl-lg-5 pr-lg-5">
			<div class="col-md-7 col-12 pr-md-2 d-none d-md-block">
				<!-- block list order -->
				<div class="row" id="listMyOrder">
				</div>
			</div>

			<div class="col-md-5 col-12 pl-md-2">
				<!-- block price order -->
				<div class="bg-white border-1-ddd font-md-12 pt-md-3 pb-md-3 pl-md-3 pr-md-3 pt-3 pb-3 pl-3 pr-3">
					<div class="mb-md-2">
						<b class="font-weight-bold">จัดส่งที่ : </b>
						<div class="inline" id="locationName"> </div>
					</div>
					<div>
						<b class="font-weight-bold">บ้านเลขที่ / ชื่อหอพัก : </b>
						<div class="inline" id="apartmentName"> </div>
					</div>
				</div>
				<div class="bg-white border-1-ddd pt-md-2 pt-lg-4 pb-md-3 pl-md-3 pr-md-3 pt-3 pb-3 pl-3 pr-3">
					<div class="row">
						<div class="col-md-6 col-6 pt-md-1 pt-lg-2px font-lg-16 font-md-14" id="countMyOrder">

						</div>
						<div class="col-md-6 col-6 font-weight-bold font-lg-20 font-md-16" id="priceMyOrder2" align="right">

						</div>
					</div>
					<div class="row pt-md-2 pt-2">
						<div class="col-md-6 col-6 font-md-14 pt-md-1 pt-lg-0">
							ค่าจัดส่ง
						</div>
						<div class="col-md-6 col-6 font-weight-bold font-lg-20 font-md-16" align="right">
							ฟรี
						</div>
						<div class="col-md-12 col-12 pt-md-3 pt-2">
							<div class="border-b-black-1"></div>
						</div>
					</div>
					<div class="row pt-md-3 pt-2">
						<div class="col-md-6 col-6 font-weight-bold pt-md-1 pt-1 font-lg-18 font-md-14">
							ยอดรวมทั้งหมด
						</div>
						<div class="col-md-6 col-6 font-weight-bold font-lg-22 font-md-18" id="priceMyOrder" align="right">

						</div>
					</div>
					<div class="row pt-md-5 pt-4">
						<div class="col-md-12 mb-md-3 mb-3">
							<a class="btn btn-danger w-100" data-toggle="modal" data-target="#phoneModal">
								ยืนยัน
							</a>
						</div>
						<div class="col-md-12">
							<a href="" class="btn btn-default w-100 font-weight-bold">
								เพิ่มรายการอาหาร
							</a>
						</div>
						<div class="col-md-12 pt-md-3 pt-3 font-lg-14 font-md-12" align="center">
							เพื่อลดค่าจัดส่ง 50%
							<b class="font-weight-bold">
								<u>
									<a href="<?php echo e(URL('login')); ?>">เข้าสู่ระบบ</a>
								</u>
							</b>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 d-md-none mt-3 pb-5">
				<!-- block list order -->
				<div class="row" id="listMyOrder2">
					<div class="col-12">
						
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="usernameVal" name="usernameVal">
		<input type="hidden" id="locationVal" name="locationVal">
		<input type="hidden" id="latVal" name="latVal">
		<input type="hidden" id="lngVal" name="lngVal">
		<input type="hidden" id="homeVal" name="homeVal">
		<input type="hidden" id="productIDVal" name="productIDVal">
		<input type="hidden" id="countVal" name="countVal">
		<input type="hidden" id="phoneVal" name="phoneVal">
		<input type="hidden" id="firebaseID" name="firebaseID">

		<?php echo e(csrf_field()); ?>

	</form>

	<div class="modal fade" id="phoneModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
					<b class="font-weight-bold text-title">เบอร์โทรติดต่อ</b>
					<form>
						<div class="row">
							<div class="col-12 mt-md-3 mt-2" align="left">
								<div class="form-group">
									<label class="mb-sm-1 mb-0 font-md-14 font-weight-bold" for="">เบอร์โทร</label>
									<input type="text" class="form-control font-md-14" id="phone" placeholder="กรอกเบอร์โทร" required>
								</div>
							</div>
							<div class="modal-footer w-100 border-none pb-md-2 pb-2">
								<a class="btn btn-default pl-md-4 pr-md-4 pl-3 pr-3" data-dismiss="modal">
									ยกเลิก
								</a>
								<a class="btn btn-danger pl-md-4 pr-md-4 pl-4 pr-4" id="btnNext">
									เสร็จสิ้น
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

	<div class="modal fade" id="successModal">
		<div class="modal-dialog">
			<div class="modal-content" align="center" id="waitLoadingModal">
				<div class="loader-successorder"></div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo e(URL('js/novembor/myorder.js')); ?>"></script>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>