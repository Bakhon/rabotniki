 <?php

require_once '../conn.php';

if(isset($_POST['phone']))
{
     $phone = $_POST['phone'];
     $password = trim($_POST['password']);
     $number = trim(substr($phone, 8, 13));
     $pass = md5($password);
     
     $query = "Select * from users where phone  like '%$number%' and password = '$pass'";    
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     $rows = mysqli_num_rows($result);
     $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
     if($rows > 0)
     {
         foreach($arr as $col)
         session_start();
         $_SESSION['id'] = $col['ID'];
         $_SESSION['NUM'] = $phone;
         $_SESSION['NAME'] = $col['NAME'];
         echo '1';
     }
     else {
         echo '0';
     }
}


?>