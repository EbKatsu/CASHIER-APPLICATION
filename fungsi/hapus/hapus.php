<?php
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';

	if (!empty($_GET['menu'])) {
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM menu WHERE id_menu=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=menu&&remove=hapus-data"</script>';
	}
	if (!empty($_GET['beban'])) {
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM beban WHERE id_beban=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=beban&&remove=hapus-data"</script>';
	}

	if (!empty($_GET['member'])) {
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM member WHERE member.id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=user1&&remove=hapus-data"</script>';
	}

	if (!empty($_GET['jual'])) {

		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from menu where id_menu=?';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);
		$hasil = $rowI->fetch();

		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if (!empty($_GET['penjualan'])) {

		$sqlI = 'INSERT INTO nota SELECT * FROM penjualan';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);

		$sql = 'DELETE FROM penjualan';
		$row = $config->prepare($sql);
		$row->execute();
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if (!empty($_GET['laporan'])) {

		$sql = 'DELETE FROM nota';
		$row = $config->prepare($sql);
		$row->execute();
		echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
	}
}
