<?php 
include 'koneksi.php';
	
if (isset($_GET['data1'])) {
	# code...
	$id=$_GET['data1'];
}else{
	$id=0;
}




$tbview = mysqli_query($conn,"SELECT * FROM `tb_guest` WHERE `guest_card`='$id' AND STATUS=1; ");



	
if ($res=mysqli_fetch_array($tbview)) {

	$update= mysqli_query($conn,"UPDATE `tb_guest` SET `STATUS` = '0' WHERE  guest_card='$id';");
	echo "HIGH";
} 
else {

	echo "LOW";
    
}

	
?>