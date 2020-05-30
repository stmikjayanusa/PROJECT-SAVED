<?php 
include 'koneksi.php';
$tbview = mysqli_query($conn, "SELECT * FROM tb_angka;");
while ($res= mysqli_fetch_array($tbview)) {
echo "$res[0] _______ ";


echo "<br>";echo "<br>";

}
 ?>

 <form>
 	<table>
 		<tr>
 			<td>
 				 <a href="tambah.php?data1=satu"><input type="button" name="linktambah" value="TAMBAH"></a>
 			</td>
 		</tr>
 	</table>
 </form>