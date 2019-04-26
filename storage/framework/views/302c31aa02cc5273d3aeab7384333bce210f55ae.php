<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $__env->yieldContent('title'); ?> - Food </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap-grid.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/bootstrap.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/font-awesome/css/all.css')); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/app.css')); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('fonts/fonts.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL('css/novembor.css')); ?>">
	<!-- <script type="text/javascript" src="<?php echo e(URL('js/bootstrap.min.js')); ?>"></script> -->
	<script type="text/javascript" src="<?php echo e(URL('js/jquery-3.3.1.min.js')); ?>"></script>
	
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-firestore.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
	<script type="text/javascript" src="<?php echo e(URL('js/main.js')); ?>"></script>

</head>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.bundle.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL('js/bootstrap.min.js')); ?>"></script>

<body>

	<div class="">
		<div class="headerMain" id="headerMain">
			<div class="container font-white">
				<div class="row mlr-sx-0">
					<div class="col-md-6 col-sm-6 col-6 pl-0 pl-sm-2">
						<a href="<?php echo e(URL('/')); ?>">
							<img src="<?php echo e(URL('img/logo-novembor-white.png')); ?>" class="logo-banner">
						</a>
					</div>
					<div class="col-md-6 col-sm-6 col-6 plr-xs-0 plr-xs-0" align="right">
						<div class="block-right-main" align="center">
							<div class="row align-middle">
								<div class="col">
									<a href="<?php echo e(URL('/')); ?>" class="font-white">
										หน้าหลัก
									</a>
								</div>
								<div class="col">
									<a href="<?php echo e(URL('#')); ?>" class="font-white">
										โปรโมชั่น
									</a>
									<!-- <?php if(Auth::User()): ?>
										<a href="<?php echo e(URL('profile')); ?>" class="font-white">
											โปรไฟล์
										</a>
									<?php else: ?>
										<a href="<?php echo e(URL('login')); ?>" class="font-white">
											เข้าสู่ระบบ
										</a>
									<?php endif; ?> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="block-top-menu" class="">
			<div class="tapTopMain shadow-sm" id="tapTopMain">
				<div class="container font-white">
					<div class="row">
						<div class="col-md-4 col-sm-5 col-7 block-top-menu font-lg-14 font-xs-12">
							<div class="row" align="center">
								<div class="col plr-md-0">
									<a href="<?php echo e(URL('listproduct/alone')); ?>">
										ทานเดี่ยว
									</a>
									<div class="line-top-menu">|</div>
								</div>
								<div class="col plr-md-0">
									<a href="<?php echo e(URL('listproduct/duo')); ?>">
										ทานคู่
									</a>
									<div class="line-top-menu">|</div>
								</div>
								<div class="col plr-md-0">
									<a href="<?php echo e(URL('listproduct/group')); ?>">
										ทานกลุ่ม
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-4 col-4 block-top-menu font-lg-12 textoverflow d-none d-sm-none d-md-block">
							<div class="inline-block pr-md-50 relative textoverflow width70pc">
								จัดส่งที่ : 
								<div class="relative textoverflow inline" id="mainLocation">
									<!-- จัดส่งที่ : 247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด frehghjy h65h67kj j765ju78k89k j76 vrth5h6 h56juh6787k78k -->
								</div>
								<a class="btn-change-location" href="<?php echo e(URL('marklocation')); ?>">
									เปลี่ยน
								</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-7 col-5 block-top-menu" align="right">
							<div class="dropdown" id="dropdownListMenu">
								<a class="dropdownMenuLink pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="vieworder()">
									<div class="relative block-list-order pointer">รายการที่สั่ง 
										<i class="fas fa-caret-down fa-lg"></i>
										<div class="noti-count" id="notiCount" style="display: none;">
											3
										</div>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-order shadow rounded" aria-labelledby="">
									<div class="pt-md-4 pb-md-4 pt-4 pb-4 font-lg-18" align="center" id="listOrderNull">
										ยังไม่มีรายการที่สั่ง
									</div>
								   	<div class="row form-check font-14 mx-md-0 mx-0 px-md-0 px-0" id="contentListOrder">
								   		<div class="col-12">
								   			<div class="row mx-md-0 mx-0 font-lg-14 font-10 text-muted" align="center">
								   				<div class="col-6 px-md-0 px-0">
								   					รายการ
								   				</div>
								   				<div class="col-2 px-md-0 px-0">
								   					จำนวน
								   				</div>
								   				<div class="col-2 px-md-0 px-0">
								   					ราคา
								   				</div>
								   				<div class="col-2 px-md-0 px-0">
								   					ลบ
								   				</div>
								   			</div>
								   		</div>
								   		<div id="renserOrder">
								   			
								   		</div>
								   		<div class="col-12 font-weight-bold">
								   			<div class="row mx-md-0 mx-0">
								   				<div class="col-6 pr-md-0 pr-0 l-lg-3 l-0" align="left">
								   					ค่าจัดส่ง
								   				</div>
								   				<div class="col-2 px-md-0 px-0" align="center">
								   					
								   				</div>
								   				<div class="col-2 px-md-0 px-0" align="center">
								   					ฟรี
								   				</div>
								   				<div class="col-2 px-md-0 px-0" align="center">
								   					
								   				</div>
								   			</div>
								   		</div>
								   		<div class="col-12 font-weight-bold font-18 mt-md-3 mt-2 font-lg-20">
								   			<div class="row mx-md-0 mx-0">
								   				<div class="col-6 px-md-0 px-0" align="center">
								   					รวม
								   				</div>
								   				<div class="col-6 px-md-0 px-0" align="center" id="priceTotal">
								   					0 บาท
								   				</div>
								   			</div>
								   		</div>
								   		<div class="col-12 font-weight-bold mt-md-2 mt-2 font-lg-20">
								   			<div class="row mx-md-0 mx-0">
								   				<div class="col-12 px-md-0 px-0" align="center">
								   					<a class="btn btn-danger w-100" onclick="checkLocation()">
								   						จัดส่ง
								   					</a>
								   					<input type="hidden" id="urlmarklocation" value="<?php echo e(URL('marklocation')); ?>" hidden>
								   					<input type="hidden" id="urlmyorder" value="<?php echo e(URL('myorder')); ?>" hidden>
								   					<input type="hidden" id="urlhome" value="<?php echo e(URL('/')); ?>" hidden>
								   				</div>
								   			</div>
								   		</div>
								   	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tapLocationMain" id="tapLocationMain">
				<div class="container">
					<div class="textoverflow pr-xs-40 relative">
						จัดส่งที่ : 
						<div class="textoverflow relative inline" id="mainLocation2">

						</div>
						<a class="btn-change-location" href="<?php echo e(URL('marklocation')); ?>">
							เปลี่ยน
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<?php echo $__env->yieldContent('content'); ?>
		<div class="footerMain" align="center">
			<div class="blockFooter text-white pt-md-5 pt-md-2 pt-5 font-sm-12">
				<div class="row">
					<div class="col-md-4 col-6 pt-md-1 pt-2">
						<div class="row">
							<div class="col-4 pl-0 pr-0">
								<i class="fab fa-facebook-square fa-2x"></i>
							</div>
							<div class="col-4 pl-0 pr-0">
								<i class="fab fa-line fa-2x"></i>
							</div>
							<div class="col-4 pl-0 pr-0">
								<i class="fas fa-phone fa-2x"></i>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6 pt-md-2 pt-3 pl-0 pr-0">
						โทร 093-482-2657
					</div>
					<div class="col-md-4 col-12 pl-md-2 pr-md-2 pl-5 pr-5 pt-md-0 pt-4">
						<a href="#" class="btn btn-danger w-100">ว่าง</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<script type="text/javascript" src="<?php echo e(URL('js/novembor/main.js')); ?>"></script>
	

</body>
</html>