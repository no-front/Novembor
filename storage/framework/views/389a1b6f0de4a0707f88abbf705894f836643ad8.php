<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $__env->yieldContent('title'); ?> - iGift Apllication </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap-grid.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/app.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('fonts/fonts.css')); ?>">

</head>
<body>
	<?php echo $__env->yieldContent('content'); ?>
</body>
</html>