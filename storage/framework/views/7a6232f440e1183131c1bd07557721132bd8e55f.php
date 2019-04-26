<?php $__env->startSection('title', 'Back Office'); ?>
<?php $__env->startSection('content'); ?>

	<style type="text/css">
		#block-main-menu-1{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>การแจ้งเตือน</b>
				</div>
			</div>
			<div class="row pb-md-5 mx-md-0" id="renderlistnotification">
				<!-- <div class="col-12 pb-md-2">
					<a href="<?php echo e(URL('#')); ?>">
						<div class="block-new-notification relative">
							<b>มีการสั่งอาหาร 3 รายการ</b>
							<div class="text-secondary font-lg-14 pt-md-1">
								เบอร์โทร : 0988888888
							</div>
							<div class="text-secondary font-lg-14 pt-md-1">
								จัดส่งที่ : สุขสวัสดิ์ 39 อำเภอ พระประแดง, ตำบล บางพึ่ง, สมุทรปราการ
							</div>
							<div class="label-time-notification">
								1 นาที
							</div>
						</div>
					</a>
				</div> -->
				<!-- <div class="col-12 pb-md-2">
					<a href="<?php echo e(URL('#')); ?>">
						<div class="block-new-notification relative">
							<b>มีการสั่งอาหาร 1 รายการ</b>
							<div class="text-secondary font-lg-14 pt-md-1">
								เบอร์โทร : 0988888888
							</div>
							<div class="text-secondary font-lg-14 pt-md-1">
								จัดส่งที่ : สุขสวัสดิ์ 39 อำเภอ พระประแดง, ตำบล บางพึ่ง, สมุทรปราการ
							</div>
							<div class="label-time-notification">
								2 นาที
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 pb-md-2">
					<a href="<?php echo e(URL('#')); ?>">
						<div class="block-default-notification relative">
							<b>มีการสั่งอาหาร 7 รายการ</b>
							<div class="text-secondary font-lg-14 pt-md-1">
								เบอร์โทร : 0988888888
							</div>
							<div class="text-secondary font-lg-14 pt-md-1">
								จัดส่งที่ : สุขสวัสดิ์ 39 อำเภอ พระประแดง, ตำบล บางพึ่ง, สมุทรปราการ
							</div>
							<div class="label-time-notification">
								7 นาที
							</div>
						</div>
					</a>
				</div> -->
			</div>
		</div>
	</div>

	<script src="<?php echo e(URL('js/backoffice/notification.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.main.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>