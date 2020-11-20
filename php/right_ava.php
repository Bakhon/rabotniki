<?php
session_start();
$session_id = $_SESSION['id'];
require '../conn.php';
$id = $_POST['id'];
$query = "Select * from users where id = $id";
//echo $query;
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo '<div class="peer mR-20">
<img src="'.$rows[0]['AVATAR'].'" alt=""  class="w-3r h-3r bdrs-50p">
</div>
<div class="peer">
<h6 class="lh-1 mB-0">'.$rows[0]['NAME'].'</h6>
<i class="fsz-sm lh-1"></i>
</div>';
?>