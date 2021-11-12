<?php
    if( empty( $_SESSION['id_user'] ) ){

    	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    	header('Location: ./');
    	die();
    } else {
?>

<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container">

<?php

    $id_buku = $_REQUEST['id_buku'];

    $sql = mysqli_query($koneksi, "SELECT no_buku, judul_buku, jenis_buku, pengarang, penerbit, id_user FROM daftar_buku WHERE id_buku='$id_buku'");

    list($no_buku, $judul_buku, $jenis_buku, $pengarang, $penerbit, $id_user) = mysqli_fetch_array($sql);

    echo '
        <center><h3>Form Buku</h3></center>
        <hr/>
        <h4>ID Buku : <b>'.$no_buku.'</b></h4>
        <table class="table table-bordered">
         <thead>
         <tr class="info">
         <th width="10%">Id Buku</th> 
         <th width="20%">Judul Buku</th>
         <th width="20%">Jenis Buku</th>
         <th width="10%">Pengarang</th>
         <th width="10%">Penerbit</th>
         </tr>
         </thead>
         <tbody>

           <tr>
             <td>'.$no_buku.'</td>
             <td>'.$judul_buku.'</td>
             <td>'.$jenis_buku.'</td>
             <td>'.$pengarang.'</td>
             <td>'.$penerbit.'</td>
             <tr/>

        </tbody>
    </table>

    <div style="margin: 0 0 50px 75%;">
        <p style="margin-bottom: 60px;">Admin</p>
        <p>';

        $sql = mysqli_query($koneksi, "SELECT nama FROM user WHERE id_user='$id_user'");
        list($judul_buku) = mysqli_fetch_array($sql);

        echo "<b><u>$judul_buku</u></b>";

        echo '</p>
    </div>

    <center>-------------------- Terima Kasih ------------------- </center>

    </div>
</body>
</html>';
}
?>
