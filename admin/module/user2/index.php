 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php
	$id = $_SESSION['admin']['id_member'];
	$hasil = $lihat->member_edit($id);
	?>
 <section id="main-content">
 	<section class="wrapper">
 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Profil Pengguna Aplikasi</h3>
 				<br>
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Edit Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<div class="col-sm-5">
 					<div class="panel panel-primary">
 						<div class="panel-heading">
 							<h4><i class="fa fa-user"></i> Kelola Pengguna </h4>
 						</div>
 						<div class="panel-body">
 							<div class="box-content">
 								<form class="form-horizontal" method="POST" action="fungsi/edit/edit.php?profil1=edit" enctype="multipart/form-data">
 									<fieldset>
 										<div class="control-group">
 											<label class="control-label" for="typeahead">Nama </label>
 											<div class="input-group">
 												<div class="input-group-addon">
 													<i class="fa fa-user"></i>
 												</div>
 												<input type="text" class="form-control" style="border-radius:0px;" name="nama" data-items="4" value="<?php echo $hasil['nm_member']; ?>" required="required" />
 											</div>
 										</div>
 										<div class="control-group">
 											<label class="control-label" for="typeahead">Email </label>
 											<div class="input-group">
 												<div class="input-group-addon">
 													<i class="fa fa-envelope-square"></i>
 												</div>
 												<input type="email" class="form-control" style="border-radius:0px;" name="email" value="<?php echo $hasil['email']; ?>" required="required" />
 											</div>
 										</div>
 										<div class="control-group">
 											<label class="control-label" for="typeahead">Telepon </label>
 											<div class="input-group">
 												<div class="input-group-addon">
 													<i class="fa fa-phone"></i>
 												</div>
 												<input type="text" class="form-control" style="border-radius:0px;" name="tlp" value="<?php echo $hasil['telepon']; ?>" required="required" />
 											</div>
 										</div>
 										<div class="control-group">
 											<label class="control-label" for="typeahead">NIK ( KTP ) </label>
 											<div class="input-group">
 												<div class="input-group-addon">
 													<i class="fa fa-user"></i>
 												</div>
 												<input type="text" class="form-control" style="border-radius:0px;" name="nik" value="<?php echo $hasil['NIK']; ?>" required="required" />
 											</div>
 										</div>
 										<div class="control-group">
 											<label class="control-label" for="typeahead">Alamat </label>
 											<div class="controls">
 												<textarea name="alamat" rows="3" class="form-control" style="border-radius:0px;" required="required"><?php echo $hasil['alamat_member']; ?></textarea>
 											</div>
 										</div>
 										<br>
 										<div class="form-actions pull-right">
 											<input type="hidden" name="id" value="<?php echo $hasil['id_member']; ?>">
 											<button class="btn btn-primary" name="btn" value="Tambah" style="border-radius:0px;"><i class="fa fa-pencil"></i> Ubah Profil</button>
 										</div>
 									</fieldset>
 								</form>
 							</div>
 						</div>
 					</div>
 				</div>

 			</div>
 		</div>
 		<div class="clearfix" style="padding-top:5%;"></div>
 		</div>
 		</div>
 	</section>
 </section>