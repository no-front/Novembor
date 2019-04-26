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
					<b>จัดการสินค้า</b>
				</div>
			</div>
			<div class="row mb-md-2">
				<div class="col-6 offset-md-6 align-self-end" align="right">
					<div class="row">
						<div class="col-4 offset-md-8">
							<a href="<?php echo e(URL('admin/addproduct')); ?>" class="btn btn-primary text-white w-100 px-md-0">
								<i class="fas fa-plus-circle fa-md"></i>
								เพิ่มเมนู
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-md-5">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>รูปภาพ</th>
							<th>ชื่อเมนู</th>
							<th>รายละเอียด</th>
							<th>ประเภท</th>
							<th>ราคา</th>
							<th>จำนวนการสั่งซื้อ</th>
							<th> </th>
						</tr>

						<?php if(count($product)>0): ?>
							<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr">
									<td align="center"><?php echo e($key+1); ?></td>
									<td align="center">
										<img src="<?php echo e($product->image); ?>" class="" width="100">
									</td>
									<td align="center"><?php echo e($product->name); ?></td>
									<td>
										<?php $__currentLoopData = $product->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											- <?php echo e($value); ?> <br>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td align="center"><?php echo e($product->nameTH); ?></td>
									<td align="center"><?php echo e($product->price); ?></td>
									<td align="center">128 ครั้ง</td>
									<td align="center">
										<a href="<?php echo e(URL('admin/productdetail/'.$product->productID.'')); ?>"><u>ดูรายละเอียด</u></a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>

						
						<!-- <tr class="tr">
							<td align="center">2</td>
							<td align="center">
								<img src="<?php echo e(URL('img/testFood.jpeg')); ?>" class="border-1-ddd" width="100">
							</td>
							<td align="center">ข้าวผัดกระเพรา</td>
							<td>- ข้าวผัดหมู <br>- น้ำอัดลม 1 ขวด</td>
							<td align="center">ทานกลุ่ม</td>
							<td align="center">239 บาท</td>
							<td align="center">67 ครั้ง</td>
							<td align="center">
								<a href="<?php echo e(URL('admin/productdetail')); ?>"><u>ดูรายละเอียด</u></a>
							</td>
						</tr>
						<tr class="tr">
							<td align="center">3</td>
							<td align="center">
								<img src="<?php echo e(URL('img/testFood.jpeg')); ?>" class="border-1-ddd" width="100">
							</td>
							<td align="center">ข้าวผัดรวมมิตร</td>
							<td>- ข้าวผัดหมู <br>- น้ำอัดลม 1 ขวด</td>
							<td align="center">ทานคู่</td>
							<td align="center">129 บาท</td>
							<td align="center">104 ครั้ง</td>
							<td align="center">
								<a href="<?php echo e(URL('admin/productdetail')); ?>"><u>ดูรายละเอียด</u></a>
							</td>
						</tr> -->
					</table>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.main.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>