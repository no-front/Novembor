<?php $__env->startSection('title', 'Back Office'); ?>
<?php $__env->startSection('content'); ?>

	<style type="text/css">
		#block-main-menu-4{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลผู้ใช้</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อผู้ใช้</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่</th>
							<th>การสั่งซื้อ</th>
						</tr>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="tr">
								<td align="center"><?php echo e($key+1); ?></td>
								<td><?php echo e($value->cookie); ?></td>
								<td align="center"><?php echo e($value->phone); ?></td>
								<td>247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด</td>
								<td align="center">180 บาท</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</table>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.main.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>