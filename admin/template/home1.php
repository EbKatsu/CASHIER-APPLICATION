 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-9">
 				<div class="row" style="margin-left:1pc;margin-right:1pc;">
 					<h1>DASHBOARD</h1>
 					<hr>

 					<?php
						$sql = " select * from menu where stok <= 3";
						$row = $config->prepare($sql);
						$row->execute();
						$r = $row->rowCount();
						if ($r > 0) {
						?>
 					<?php
							echo "
							<div class='alert alert-warning'>
								<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> menu yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
							</div>
							";
						}
						?>
 					<?php $hasil_menu = $lihat->menu_row(); ?>
 					<?php $hasil_beban = $lihat->beban_row(); ?>
 					<?php $stok = $lihat->menu_stok_row(); ?>
 					<?php $jual = $lihat->jual_row(); ?>

 					<div class="row">

 						<!--STATUS PANELS -->
 						<div class="col-md-3">
 							<div class="panel panel-primary">
 								<div class="panel-heading">
 									<h5><i class="fa fa-desktop"></i> menu</h5>
 								</div>
 								<div class="panel-body">
 									<center>
 										<h1><?php echo number_format($hasil_menu); ?></h1>
 									</center>
 								</div>
 								<div class="panel-footer">
 									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=menu'>Tabel menu <i class='fa fa-angle-double-right'></i></a></h4>
 								</div>
 							</div>
 						</div>

 						<!--STATUS PANELS -->
 						<div class="col-md-3">
 							<div class="panel panel-primary">
 								<div class="panel-heading">
 									<h5><i class="fa fa-desktop"></i> Beban</h5>
 								</div>
 								<div class="panel-body">
 									<center>
 										<h1><?php echo number_format($hasil_beban); ?></h1>
 									</center>
 								</div>
 								<div class="panel-footer">
 									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=beban'>Tabel Beban <i class='fa fa-angle-double-right'></i></a></h4>
 								</div>
 							</div>
 						</div>

 						<!-- STATUS PANELS -->
 						<div class="col-md-3">
 							<div class="panel panel-primary">
 								<div class="panel-heading">
 									<h5><i class="fa fa-desktop"></i> Stok menu</h5>
 								</div>
 								<div class="panel-body">
 									<center>
 										<h1><?php echo number_format($stok['jml']); ?></h1>
 									</center>
 								</div>
 								<div class="panel-footer">
 									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=menu'>Tabel menu <i class='fa fa-angle-double-right'></i></a></h4>
 								</div>
 							</div>
 						</div>

 						<!-- STATUS PANELS -->
 						<div class="col-md-3">
 							<div class="panel panel-primary">
 								<div class="panel-heading">
 									<h5><i class="fa fa-desktop"></i> Telah Terjual</h5>
 								</div>
 								<div class="panel-body">
 									<center>
 										<h1><?php echo number_format($jual['stok']); ?></h1>
 									</center>
 								</div>
 								<div class="panel-footer">
 									<h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=laporan'>Tabel laporan <i class='fa fa-angle-double-right'></i></a></h4>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>

 			<!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

 			<! --/row -->
 				<div class="clearfix" style="padding-top:18%;"></div>
 	</section>
 </section>