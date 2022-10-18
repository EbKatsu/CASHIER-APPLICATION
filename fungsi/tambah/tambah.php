<?php
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';

	if (!empty($_GET['menu'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$jual = $_POST['jual'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl_input'];

		$data[] = $id;
		$data[] = $nama;
		$data[] = $deskripsi;
		$data[] = $jual;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO menu (id_menu, nama_menu, deskripsi, harga_jual, stok, tgl_input) 
						VALUES (?, ?, ?, ?, ?, ?)';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=menu&success=tambah-data"</script>';
	}

	if (!empty($_GET['beban'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama_beban'];
		$biaya = $_POST['biaya'];
		$tanggal = $_POST['tanggal'];
		$keterangan = $_POST['keterangan'];

		$data[] = $id;
		$data[] = $nama;
		$data[] = $biaya;
		$data[] = $tanggal;
		$data[] = $keterangan;
		$sql = 'INSERT INTO beban (id_beban,nama_beban,biaya,tanggal,keterangan) 
			    VALUES (?,?,?,?,?) ';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=beban&success=tambah-data"</script>';
	}

	if (!empty($_GET['user'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$tlp = $_POST['tlp'];
		$email = $_POST['email'];
		$nik = $_POST['nik'];

		$data[] = $id;
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$sql = 'INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, NIK) 
			    VALUES (?, ?, ?, ?, ?, ?) ';
		$row = $config->prepare($sql);
		$row->execute($data);

		echo '<script>window.location="../../index.php?page=user1&success=tambah-data"</script>';
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
		$sql = 'INSERT INTO login (user, pass, roles, id_member) 
			    VALUES (?, md5(?), ?, ?) ';
		$row = $config->prepare($sql);
		$row->execute($data);

		echo '<script>window.location="../../index.php?page=user1&success=tambah-data"</script>';
	}

	if (!empty($_GET['jual'])) {
		$id = $_GET['id'];
		$kasir =  $_GET['id_kasir'];
		$jumlah = '0';
		$total = '0';
		$tgl = date("Y-m-d");

		$data1[] = $id;
		$data1[] = $kasir;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $tgl;
		$sql1 = 'INSERT INTO penjualan (id_menu,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
		$row1 = $config->prepare($sql1);
		$row1->execute($data1);
		echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
	}
}
