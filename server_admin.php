<?php 


if(isset($_POST['login'])){
    require 'conn.php';
    
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM `admin` where LOGIN = '$login' and PASS = '$pass'";
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result);  
    if($num_rows > 0){
        echo '1';
    }else {
        echo '0';
    }
}


if(isset($_POST['employee_id'])){
    require 'conn.php';
    $user_state = $_POST['user_state'];
    $employee_id = $_POST['employee_id'];
    if($user_state == 0){
       $user_state = 1; 
    }else {
        $user_state = 0;
    }
    $query = "UPDATE `users` SET `STATUS` = '$user_state' where ID =  $employee_id";    
    echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
   exit;
}

?>