<?php 
include 'koneksi.php';




if (!isset($_GET['data1'])) {
	# code...
	//$tbview = mysqli_query($conn, "INSERT INTO `db_mikrokontroller`.`tb_angka` ( `id_card`) VALUES ( 'tes kosong');");
}else{
$tgl = date('Y-m-d');
$a=$_GET['data1'];
	$sql = mysqli_query($conn, " SELECT * FROM tb_angka WHERE `id_card`='$a'");
	$res= mysqli_fetch_array($sql);

	if($res[1]==$a){
		echo "$res[4]";
	}else{
		echo "0";
	}


}

 ?>
