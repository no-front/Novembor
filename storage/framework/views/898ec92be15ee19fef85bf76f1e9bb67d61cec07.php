<?php $__env->startSection('title', 'Back Office'); ?>
<?php $__env->startSection('content'); ?>

	<style type="text/css">
		#block-main-menu-3{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>รายละเอียดสินค้า</b>
				</div>
			</div>
			<div class="row mb-md-2">
				<div class="col-6 offset-md-6 align-self-end" align="right">
					<div class="row">
						<div class="col-4 pr-md-2">
							<a href="<?php echo e(URL('admin/addproduct')); ?>" class="btn btn-primary text-white w-100 px-md-0">
								<i class="fas fa-plus-circle fa-md"></i>
								เพิ่มเมนู
							</a>
						</div>
						<div class="col-4 px-md-2">
							<?php if(count($product)>0): ?>
								<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<!-- <?php echo e($value->productID); ?> -->
									<a href="<?php echo e(URL('admin/editproduct/'.$value->productID.'')); ?>" class="btn btn-secondary text-white w-100 px-md-0">
										<i class='fas fa-pen'></i>
										แก้ไข
									</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<a href="<?php echo e(URL('admin/editproduct')); ?>" class="btn btn-secondary text-white w-100 px-md-0">
									<i class='fas fa-pen'></i>
									แก้ไข
								</a>
							<?php endif; ?>
						</div>
						<div class="col-4 pl-md-2">
							<a class="btn text-white w-100 px-md-0" data-toggle="modal" data-target="#modalDelete" style="background-color: #ff0000;">
								<i class="fas fa-trash-alt"></i>
								ลบ
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="row mx-md-0 bg-f0f0f0 py-md-3">
						<?php if(count($product)>0): ?>
							<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-5">
									<img src="<?php echo e($value->image); ?>" class="w-100">
								</div>
								<div class="col-7 pl-md-0">
									<div class="pb-md-2">
										<b>ชื่อเมนู : </b>
										<?php echo e($value->name); ?>

									</div>
									<div class="pb-md-2">
										<b>รายละเอียด</b>
										<div class="pl-md-4">
											<?php $__currentLoopData = $value->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												- <?php echo e($value2); ?> <br>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
									<div class="pb-md-2">
										<b>ประเภท : </b>
										<?php echo e($value->nameTH); ?>

									</div>
									<div class="pb-md-2">
										<b>ราคา : </b>
										<?php echo e($value->price); ?> บาท.
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							No Data.
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalDelete">
	    <div class="modal-dialog">
	      	<div class="modal-content">

	        	<!-- Modal Header -->
	        	<div class="modal-header relative border-none pt-md-4 pt-4 pb-md-4 pl-md-4 pr-md-4" align="center">
	        		<b class="font-weight-bold text-title">แจ้งเตือน</b>
	        		<div class="row">
	        			<div class="col-12 mt-md-3 mt-1 font-lg-18" align="center">
	        				คุณต้องการลบสินค้านี้หรือไม่ ?
	        			</div>
	        			<div class="col">
	        				<div class="row mt-md-4 mb-md-0">
	        					<div class="col-6 pr-md-2">
	        						<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        							<a href="<?php echo e(URL('admin/deleteproduct/'.$value->productID.'')); ?>" class="btn btn-danger w-100">ลบ</a>
	        						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        					</div>
	        					<div class="col-6 pl-md-2">
	        						<a href="<?php echo e(URL('#')); ?>" class="btn btn-default w-100" data-dismiss="modal">ยกเลิก</a>
	        					</div>
	        				</div>
	        			</div>
	 
	        		</div>
	          		<button type="button" class="close absolute btn-close-modal" data-dismiss="modal"><i class="fas fa-times"></i></button>
	        	</div>
	      	</div>
	    </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.main.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>