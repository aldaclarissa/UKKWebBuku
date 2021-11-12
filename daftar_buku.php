<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Kamu harus login dulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'daftar_buku_baru.php';
				break;
			case 'edit':
				include 'daftar_buku_edit.php';
				break;
			case 'hapus':
				include 'daftar_buku_hapus.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	} else {

		echo '

			<div class="container">
				<h3 style="margin-bottom: -20px;">Data Buku</h3>
					<a href="./admin.php?hlm=daftar_buku&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="10%">Id Buku</th> 
					 <th width="20%">Judul Buku</th>
					 <th width="20%">Jenis Buku</th>
					 <th width="10%">Pengarang</th>
					 <th width="10%">Penerbit</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM daftar_buku");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['no_buku'].'</td>
					 <td>'.$row['judul_buku'].'</td>
					 <td>'.$row['jenis_buku'].'</td>
					 <td>'.$row['pengarang'].'</td>
					 <td>'.$row['penerbit'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Kamu yakin akan menghapus data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					<a href="?hlm=cetak&id_buku='.$row['id_buku'].'" class="btn btn-info btn-s" target="_blank">Cetak Form</a>

					 <a href="?hlm=daftar_buku&aksi=edit&id_buku='.$row['id_buku'].'" class="btn btn-warning btn-s">Ubah</a>

					 <a href="?hlm=daftar_buku&aksi=hapus&submit=yes&id_buku='.$row['id_buku'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {

				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=daftar_buku&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
		</div>';
	}
}
?>
