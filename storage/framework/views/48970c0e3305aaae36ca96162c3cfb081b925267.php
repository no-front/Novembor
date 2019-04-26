<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/layout-home.css')); ?>"> -->

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Test Home</h1>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>