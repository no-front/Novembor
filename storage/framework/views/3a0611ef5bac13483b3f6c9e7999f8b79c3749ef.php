<?php $__env->startSection('title', 'Back Office'); ?>
<?php $__env->startSection('content'); ?>

	<style type="text/css">
		#block-main-menu-2{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col mb-md-5">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลการสั่งซื้อ</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อผู้ใช้</th>
							<th>รายการสั่งซื้อ</th>
							<th>เวลา</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่จัดส่ง</th>
							<th>ราคา</th>
						</tr>
						<?php if(count($orders) > 0): ?>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr pointer" onclick="window.location.href='viewnotification/<?php echo e($value->firebaseID); ?>'">
									<td align="center"><?php echo e($key+1); ?></td>
									<td><?php echo e($value->cookie); ?></td>
									<td>
										<?php $__currentLoopData = $value->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div>- <?php echo e($value2->name); ?></div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td align="center"><?php echo e($value->created_at); ?></td>
									<td align="center"><?php echo e($value->phone); ?></td>
									<td><?php echo e($value->locationName); ?></td>
									<td align="center"><?php echo e($value->totalPrice); ?> บาท</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.main.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>