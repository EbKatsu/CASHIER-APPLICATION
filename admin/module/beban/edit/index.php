 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php 
	$id = $_GET['beban'];
	$hasil = $lihat -> beban_edit($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=beban"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Details Beban</h3>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<table class="table table-striped">
							<form action="fungsi/edit/edit.php?beban=edit" method="POST">
								<tr>
									<td>ID Beban</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_beban'];?>" name="id"></td>
								</tr>
								<tr>
									<td>Nama beban</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nama_beban'];?>" name="nama_beban"></td>
								</tr>
								<tr>
									<td>Biaya</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['biaya'];?>" name="biaya"></td>
								</tr>
								<tr>
									<td>Tanggal Update</td>
									<td><input type="date"  class="form-control" value="<?php echo  $hasil['tanggal'];?>" name="tanggal"></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['keterangan'];?>" name="keterangan"></td>
								</tr>
								<tr>
									<td></td>
									<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
								</tr>
							</form>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
