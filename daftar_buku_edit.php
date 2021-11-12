<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_buku = $_REQUEST['id_buku'];
		$jenis_buku = $_REQUEST['jenis_buku'];
		$judul_buku = $_REQUEST['judul_buku'];
		$pengarang = $_REQUEST['pengarang'];
		$penerbit = $_REQUEST['penerbit'];
		$id_user = $_SESSION['id_user'];

		$sql = mysqli_query($koneksi, "UPDATE daftar_buku SET jenis_buku='$jenis_buku', judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', id_user='$id_user' WHERE id_buku='$id_buku'");

		if($sql == true){
			header('Location: ./admin.php?hlm=daftar_buku');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_buku = $_REQUEST['id_buku'];

		$sql = mysqli_query($koneksi, "SELECT * FROM daftar_buku WHERE id_buku='$id_buku'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Data Buku</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="no_buku" class="col-sm-2 control-label">ID Buku</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="no_buku" value="<?php echo $row['no_buku']; ?>"name="no_buku" placeholder="ID Buku" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_buku" class="col-sm-2 control-label">Jenis Buku</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="jenis_buku" name="jenis_buku" value="<?php echo $row['jenis_buku']; ?>" placeholder="Jenis Buku" required>
		</div>
	</div>
	<div class="form-group">
		<label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $row['pengarang']; ?>" placeholder="Nama Pengarang" required>
		</div>
	</div>
	<div class="form-group">
		<label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" placeholder="Nama Penerbit" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Judul Buku</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" placeholder="Judul Buku" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=daftar_buku" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
	}
}
?>
