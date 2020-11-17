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
  
    $query = "UPDATE `users` SET `STATUS` = '$user_state' where ID =  $employee_id";    
    echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
   exit;
}


if(isset($_POST['tender_id'])){
    require 'conn.php';
    $tender_state = $_POST['tender_state'];
    $tender_id = $_POST['tender_id'];
  
    $query = "UPDATE `tender` SET `STATUS` = '$tender_state' where ID_TENDER =  $tender_id";    
    echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
   exit;
}

?>