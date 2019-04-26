<!DOCTYPE html>
<html>

<head>
	<title> <?php echo $__env->yieldContent('title'); ?> </title>

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap-grid.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/font-awesome/css/all.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('fonts/fonts.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/novembor.css')); ?>">
	<script type="text/javascript" src="<?php echo e(URL('js/jquery-3.3.1.min.js')); ?>"></script>

	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-firestore.js"></script>

	<script src="<?php echo e(URL('js/push-notification/push.js')); ?>"></script>

	<script src="<?php echo e(URL('js/backoffice/main.js')); ?>"></script>
	<script src="<?php echo e(URL('js/jquery.timeago.js')); ?>" type="text/javascript"></script>



</head>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.min.js')); ?>"></script>

<body>

	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row">
					<div class="col">
						<a href="<?php echo e(URL('admin/home')); ?>">
							<img src="<?php echo e(URL('img/logo-novembor-white.png')); ?>" class="logo-banner">
						</a>
					</div>
					<div class="col pt-md-4" align="right">
						<a href="<?php echo e(URL('/admin/logout')); ?>">ออกจากระบบ</a>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row bg-shadow">
				<div class="col-md-3 bg-backoffice border-aaa mh-100">
					<div class="row">
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-1">
							<a href="<?php echo e(URL('admin/home')); ?>">
								<i class="fas fa-bell fa-lg pl-md-1"></i>
								แจ้งเตือน
							</a>
							<div class="icon-notification-backoffice" id="count-notification" style="display:none;">
								2
							</div>
						</div>
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-2">
							<a href="<?php echo e(URL('admin/orderinformation')); ?>">
								<i class="fas fa-shopping-cart fa-lg"></i>
								ข้อมูลการสั่งซื้อ
							</a>
						</div>
						<div class="col-12 py-md-2 block-main-menu" id="block-main-menu-3">
							<a href="<?php echo e(URL('admin/manageproducts')); ?>">
								<i class="fas fa-list-alt fa-lg pl-md-1"></i>
								จัดการสินค้า
							</a>
						</div>
						<!-- <div class="col-12 py-md-2 block-main-menu" id="block-main-menu-4">
							<a href="<?php echo e(URL('admin/datauser')); ?>">
								<i class="fas fa-users fa-lg"></i>
								ข้อมูลผู้ใช้
							</a>
						</div> -->
					</div>
				</div>
				<div class="col-md-9 bg-white pt-md-4">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</div>
		</div>


		<div class="footerMain-backoffice" align="center">
			<div class="blockFooter text-white font-sm-12">

			</div>
		</div>
	</div>
</body>


</html>