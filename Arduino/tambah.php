<?php 
include 'koneksi.php';




if (!isset($_GET['data1'])) {
	# code...
	$tbview = mysqli_query($conn, "INSERT INTO `tb_angka` ( `id_card`) VALUES ( 'tes kosong');");
}else{
$tgl = date('Y-m-d');
$a=$_GET['data1'];
	$tbview = mysqli_query($conn, "INSERT INTO `tb_angka` ( `id_card`,tgl) VALUES ( '$a','$tgl');");

}

//header('location:index.php')
 ?>
