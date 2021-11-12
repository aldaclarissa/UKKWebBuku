<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Kamu harus login dulu';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Buku</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="js/jquery.min.js"></script>


	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>

  </head>

  <body>

    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){
			case 'daftar_buku':
				include "daftar_buku.php";
				break;
			case 'buku':
				include "buku.php";
				break;
			case 'user':
				include "user.php";
				break;
			case 'cetak':
				include "cetak_nota.php";
				break;
		}
	} else {
	?>
      <!-- Tampilan setelah login sebagai admin/user -->
      <div class="jumbotron">
        <h2>FORM BUKU</h2>

        <p>Selamat datang <strong><?php echo $_SESSION['nama']; ?></strong>, kamu login sebagai
			<strong>
			<?php
				if($_SESSION['level'] == 1){
					echo 'Admin.';
				} else {
						echo 'User';
				}
			?>
			</strong>
		</p>
      </div>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>

  </body>

</html>
<?php
}
?>
