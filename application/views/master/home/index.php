<?php 
if ($level=='1') {
  include('admin.php');
}elseif ($level=='2') {
  include('FrontCrew.php');
}else{
  include('guest.php');
}
 ?>
