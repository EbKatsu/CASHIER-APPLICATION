 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data User</h3>
 				<br />
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Tambah Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>

 				<?php
					$db_host = 'localhost'; // Nama Server
					$db_user = 'root'; // User Server
					$db_pass = ''; // Password Server
					$db_name = 'db_toko'; // Nama Database

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
					if (!$conn) {
						die('Gagal terhubung MySQL: ' . mysqli_connect_error());
					} ?>


 				<!-- Trigger the modal with a button -->

 				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
 					<i class="fa fa-plus"></i> New User</button>
 				<button type="button" style="margin-right: 0.5pc;" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal2">
 					<i class="fa fa-plus"></i> New login</button>

 				<div class="clearfix"></div>
 				<br />

 				<!-- view member -->
 				<div class="modal-view">
 					<table class="table table-bordered table-striped" id="example1">
 						<thead>
 							<tr style="background:#DFF0D8;color:#333;">
 								<th>No</th>
 								<th>Role User</th>
 								<th>Nama User</th>
 								<th>Alamat User</th>
 								<th>telepon</th>
 								<th>email</th>
 								<th>NIK</th>
 							</tr>
 						</thead>
 						<tbody>

 							<?php
								$hasil = $lihat->member();
								$no = 1;
								foreach ($hasil as $row) {
								?>
 								<tr>
 									<td><?php echo $no; ?></td>
 									<td><?php if ($row['roles'] == 1) echo "Admin";
											elseif ($row['roles'] == 2) {
												echo "Owner";
											}; ?></td>
 									<td><?php echo $row['nm_member']; ?></td>
 									<td><?php echo $row['alamat_member']; ?></td>
 									<td><?php echo $row['telepon']; ?></td>
 									<td><?php echo $row['email']; ?></td>
 									<td><?php echo $row['NIK']; ?></td>
 									<td>
 										<a href="index.php?page=user1/edit&profil=<?php echo $row['id_member']; ?>"><button class="btn btn-warning btn-xs">Edit</button></a>
 										<a href="fungsi/hapus/hapus.php?member=hapus&id=<?php echo $row['id_member']; ?>" onclick="javascript:return confirm('Hapus Data member ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>


 								</tr>
 							<?php
									$no++;
								}
								?>
 						</tbody>

 					</table>
 				</div>
 				<div class="clearfix" style="margin-top:7pc;"></div>
 				<!-- end view member -->
 				<!-- tambah member MODALS-->
 				<!-- Modal -->

 				<div id="myModal" class="modal fade" role="dialog">
 					<div class="modal-dialog">
 						<!-- Modal content-->
 						<div class="modal-content" style=" border-radius:0px;">
 							<div class="modal-header" style="background:#285c64;color:#fff;">
 								<button type="button" class="close" data-dismiss="modal">&times;</button>
 								<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah User</h4>
 							</div>
 							<form action="fungsi/tambah/tambah.php?user=tambah" method="POST">
 								<div class="modal-body">

 									<table class="table table-striped bordered">

 										<tr>
 											<td>Id User</td>
 											<td><input type="text" placeholder="Id User" required class="form-control" name="id"></td>
 										</tr>
 										<tr>
 											<td>Nama User</td>
 											<td><input type="text" placeholder="Nama User" required class="form-control" name="nama"></td>
 										</tr>
 										<tr>
 											<td>Alamat</td>
 											<td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
 										</tr>
 										<tr>
 											<td>Telepon</td>
 											<td><input type="text" placeholder="Telpon" class="form-control" name="tlp"></td>
 										</tr>
 										<tr>
 											<td>Email</td>
 											<td><input type="text" placeholder="Email" required class="form-control" name="email"></td>
 										</tr>
 										<tr>
 											<td>NIK</td>
 											<td><input type="text" placeholder="NIK" required class="form-control" name="nik"></td>
 										</tr>

 									</table>
 								</div>
 								<div class="modal-footer">
 									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
 									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>

 				<div id="myModal2" class="modal fade" role="dialog">
 					<div class="modal-dialog">
 						<!-- Modal content-->
 						<div class="modal-content" style=" border-radius:0px;">
 							<div class="modal-header" style="background:#285c64;color:#fff;">
 								<button type="button" class="close" data-dismiss="modal">&times;</button>
 								<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Login</h4>
 							</div>
 							<form action="fungsi/tambah/tambah.php?auth=tambah" method="POST">
 								<div class="modal-body">

 									<table class="table table-striped bordered">

 										<tr>
 											<td>Id User</td>
 											<td><input type="text" placeholder="Id User" required class="form-control" name="id"></td>
 										</tr>
 										<tr>
 											<td>Username</td>
 											<td><input type="text" placeholder="Username" required class="form-control" name="user"></td>
 										</tr>
 										<tr>
 											<td>Password</td>
 											<td><input type="password" placeholder="Password" required class="form-control" name="pass"></td>
 										</tr>
 										<tr>
 											<td>Role</td>
 											<td>
 												<select class="form-control" style="border-radius:0px; margin-bottom: 5px;" name="roles" required="required">
 													<option value="1"> Admin </option>
 													<option value="2"> Owner </option>
 												</select>
 											</td>
 										</tr>

 									</table>
 								</div>
 								<div class="modal-footer">
 									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
 									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>

 			</div>
 	</section>
 </section>