<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_buku = $_REQUEST['no_buku'];
		$jenis_buku = $_REQUEST['jenis_buku'];
		$judul_buku = $_REQUEST['judul_buku'];
		$pengarang = $_REQUEST['pengarang'];
		$penerbit = $_REQUEST['penerbit'];
		$id_user = $_SESSION['id_user'];

		$sql = mysqli_query($koneksi, "INSERT INTO daftar_buku(no_buku, jenis_buku, judul_buku, pengarang, penerbit, id_user) VALUES('$no_buku', '$jenis_buku', '$judul_buku', '$pengarang', '$penerbit', '$id_user')");

		if($sql == true){
			header('Location: ./admin.php?hlm=daftar_buku');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Buku</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="no_buku" class="col-sm-2 control-label">ID Buku</label>
		<div class="col-sm-3">

		<?php

			$sql = mysqli_query($koneksi, "SELECT no_buku FROM daftar_buku");
				echo '<input type="text" class="form-control" id="no_buku" value="';

			$no_buku = "C001";
			if(mysqli_num_rows($sql) == 0){
				echo $no_buku;
			}

			$result = mysqli_num_rows($sql);
			$counter = 0;
			while(list($no_buku) = mysqli_fetch_array($sql)){
				if (++$counter == $result) {
					$no_buku++;
					echo $no_buku;
				}
			}
				echo '"name="no_buku" placeholder="ID Buku" readonly>';

		?>

		</div>
	</div>
	<div class="form-group">
		<label for="jenis_buku" class="col-sm-2 control-label">Jenis Buku</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="jenis_buku" name="jenis_buku" placeholder="Jenis Buku" required>
		</div>
	</div>
	<div class="form-group">
		<label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Nama Pengarang" required>
		</div>
	</div>
	<div class="form-group">
		<label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Nama Penerbit" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Judul Buku</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku" required>
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
?>
 
