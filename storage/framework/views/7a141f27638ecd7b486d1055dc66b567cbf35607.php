<!DOCTYPE html>
<html>
<head>
	<title>  </title>

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap-grid.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/font-awesome/css/all.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('fonts/fonts.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/novembor.css')); ?>">
	<script type="text/javascript" src="<?php echo e(URL('js/jquery-3.3.1.min.js')); ?>"></script>

</head>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.min.js')); ?>"></script>
<body>
	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row">
					<div class="col" align="center">
						<a href="<?php echo e(URL('#')); ?>">
							<img src="<?php echo e(URL('img/logo-novembor-white.png')); ?>" class="logo-banner">
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="container mh-100">
			<div class="row mt-md-5">
				<div class="col-6 offset-md-3 bg-white bg-shadow px-md-4 py-md-4">
					<h3 align="center">เข้าสู่ระบบ</h3>
					<form action="" method="post">
						<div class="row px-md-4 pb-md-2">
							<div class="col-12">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">อีเมล์</label>
			    					<input type="email" name="email" class="form-control font-md-14" id="email" placeholder="กรอกอีเมล์" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
			    					<?php if(isset($error)): ?>
			    						<div id="responseEmail" class="text-danger pt-md-2 font-lg-14"><?php echo e($error); ?></div>
			    					<?php endif; ?>
			  					</div>

							</div>
							<div class="col-12 mb-md-4">
			  					<div class="form-group">
			    					<label class="mb-sm-1 mb-0 font-md-14" for="">รหัสผ่าน</label>
			    					<input type="password" class="form-control font-md-14" name="pass" id="pass" placeholder="กรอกรหัสผ่าน" minlength="6" required>
			    					<?php if(isset($error)): ?>
			    						<div id="responsePass" class="text-danger pt-md-2 font-lg-14"><?php echo e($error); ?></div>
			    					<?php endif; ?>
			  					</div>
							</div>
							<div class="col-6 pr-md-3">
			  					<a class="btn btn-danger w-100" id="login">เข้าสู่ระบบ</a>
							</div>
							<div class="col-6 pl-md-3">
			  					<a href="" class="btn btn-default w-100">ยกเลิก</a>
							</div>
						</div>
						<input type="submit" value="OK" id="submit" name="submit" hidden>
						<?php echo csrf_field(); ?>
					</form>

					<!-- <?php if(isset($error)): ?>
						<input type="" id="response" onchange="response(this)" value="<?php echo e($error); ?>">
					<?php endif; ?> -->
				</div>
			</div>
		</div>

		<div class="footerMain-backoffice" align="center">
			<div class="blockFooter text-white font-sm-12">
				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo e(URL('js/backoffice/adminlogin.js')); ?>"></script>
</body>
</html>