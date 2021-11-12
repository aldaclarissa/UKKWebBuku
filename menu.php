<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href=""> Form Buku</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="./admin.php">Beranda</a></li>
        <li><a href="?hlm=buku">Daftar Buku</a></li>

		<!-- menu yang ada kalo login sebagai admin-->
        <?php
        if( $_SESSION['level'] == 1 ){
        ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=daftar_buku">Data Buku</a></li> <!-- Daftar buku yang ada-->
			<li><a href="./admin.php?hlm=user">Data Login</a></li> <!-- Daftar orang yang login-->
			<?php
			}
			?>
		  </ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $_SESSION['nama']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>
