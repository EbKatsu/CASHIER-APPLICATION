<?php
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';
	if (!empty($_GET['pengaturan'])) {
		$nama = htmlentities($_POST['namatoko']);
		$alamat = htmlentities($_POST['alamat']);
		$kontak = htmlentities($_POST['kontak']);
		$pemilik = htmlentities($_POST['pemilik']);
		$id = '1';

		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $kontak;
		$data[] = $pemilik;
		$data[] = $id;
		$sql = 'UPDATE toko SET nama_toko=?, alamat_toko=?, tlp=?, nama_pemilik=? WHERE id_toko = ?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=pengaturan&success=edit-data"</script>';
	}

	if (!empty($_GET['stok'])) {
		$restok = htmlentities($_POST['restok']);
		$id = htmlentities($_POST['id']);
		$dataS[] = $id;
		$sqlS = 'select*from menu WHERE id_menu=?';
		$rowS = $config->prepare($sqlS);
		$rowS->execute($dataS);
		$hasil = $rowS->fetch();

		$stok = $restok + $hasil['stok'];

		$data[] = $stok;
		$data[] = $id;
		$sql = 'UPDATE menu SET stok=? WHERE id_menu=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=menu&success-stok=stok-data"</script>';
	}

	if (!empty($_GET['menu'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$deskripsi = htmlentities($_POST['deskripsi']);
		$jual = htmlentities($_POST['jual']);
		$stok = htmlentities($_POST['stok']);
		$tgl = htmlentities($_POST['tgl']);

		$data[] = $nama;
		$data[] = $deskripsi;
		$data[] = $jual;
		$data[] = $stok;
		$data[] = $tgl;
		$data[] = $id;
		$sql = 'UPDATE menu SET nama_menu=?,deskripsi=?, harga_jual=?, stok=?, tgl_update=?  WHERE id_menu=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=menu/edit&menu=' . $id . '&success=edit-data"</script>';
	}
	if (!empty($_GET['beban'])) {
		$id = htmlentities($_POST['id']);
		$nama_beban = htmlentities($_POST['nama_beban']);
		$biaya = htmlentities($_POST['biaya']);
		$tanggal = htmlentities($_POST['tanggal']);
		$keterangan = htmlentities($_POST['keterangan']);


		$data[] = $nama_beban;
		$data[] = $biaya;
		$data[] = $tanggal;
		$data[] = $keterangan;
		$data[] = $id;

		$sql = 'UPDATE beban SET nama_beban=?,biaya=?,tanggal=?, 
				keterangan=?  WHERE id_beban=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=beban/edit&beban=' . $id . '&success=edit-data"</script>';
	}

	if (!empty($_GET['gambar'])) {
		$id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png");

		if ($_FILES['foto']["error"] > 0) {
			$output['error'] = "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			echo "You can only upload JPG, PNG and GIF file";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";
		} elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";
		} else {
			$target_path = '../../assets/img/user/';
			$target_path = $target_path . basename($_FILES['foto']['name']);
			if (file_exists("$target_path")) {
				echo "<font face='Verdana' size='2' >Ini Terjadi Karena Telah Masuk Nama File Yang Sama,
				<br> Silahkan Rename File terlebih dahulu<br>";

				echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";
			} elseif (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
				//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/' . $foto2 . '');
				//input foto
				$id = $_POST['id'];
				$data[] = $_FILES['foto']['name'];
				$data[] = $id;
				$sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$row = $config->prepare($sql);
				$row->execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			}
		}
	}

	if (!empty($_GET['profil'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$tlp = htmlentities($_POST['tlp']);
		$email = htmlentities($_POST['email']);
		$nik = htmlentities($_POST['nik']);

		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$data[] = $id;
		$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=user1&user1=' . $id . 'success=edit-data"</script>';
	}
	if (!empty($_GET['profil1'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$tlp = htmlentities($_POST['tlp']);
		$email = htmlentities($_POST['email']);
		$nik = htmlentities($_POST['nik']);

		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$data[] = $id;
		$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index2.php?page=user2&success=edit-data"</script>';
	}
	if (!empty($_GET['auth'])) {
		$id = $_POST['id'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$role = $_POST['roles'];

		$data[] = $user;
		$data[] = $pass;
		$data[] = $role;
		$data[] = $id;
		$sql = 'UPDATE login SET user=?,pass=md5(?),roles=? WHERE id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=user1&success=edit-data"</script>';
	}

	if (!empty($_GET['jual'])) {
		$id = htmlentities($_POST['id']);
		$id_menu = htmlentities($_POST['id_menu']);
		$jumlah = htmlentities($_POST['jumlah']);

		$sql_tampil = "select *from menu where menu.id_menu=?";
		$row_tampil = $config->prepare($sql_tampil);
		$row_tampil->execute(array($id_menu));
		$hasil = $row_tampil->fetch();

		if ($hasil['stok'] > $jumlah) {
			$jual = $hasil['harga_jual'];
			$total = $jual * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id_penjualan=?';
			$row1 = $config->prepare($sql1);
			$row1->execute($data1);
			echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
		} else {
			echo '<script>alert("Keranjang Melebihi Stok menu Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}

	if (!empty($_GET['cari_menu'])) {
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
		} else {
			$sql = "select menu.*	from menu 
					where menu.id_menu like '%$cari%' or menu.nama_menu like '%$cari%'";
			$row = $config->prepare($sql);
			$row->execute();
			$hasil1 = $row->fetchAll();
?>
			<table class="table table-stripped" width="100%" id="example2">
				<tr>
					<th>ID menu</th>
					<th>Nama menu</th>
					<th>Harga Jual</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($hasil1 as $hasil) { ?>
					<tr>
						<td><?php echo $hasil['id_menu']; ?></td>
						<td><?php echo $hasil['nama_menu']; ?></td>
						<td><?php echo $hasil['harga_jual']; ?></td>
						<td>
							<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_menu']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>" class="btn btn-success">
								<i class="fa fa-shopping-cart"></i></a>
						</td>
					</tr>
				<?php } ?>
			</table>
<?php
		}
	}
}
