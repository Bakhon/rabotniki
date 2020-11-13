<?php

require_once '../conn.php';

if($_POST['photos_id']){
    $photos_id = $_POST['photos_id'];
    $user_id = $_POST['user_id'];
    
    $query = "DELETE FROM `users_photo` WHERE ID = $photos_id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $query2 = "SELECT * FROM `users_photo` where ID = $photos_id";
    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    print_r($rows);
    unlink($rows[0]['PHOTO_NAME']);
  //  header('location: ../pics.php');
}


if($_POST['docs_id']){
  $photos_id = $_POST['docs_id'];
  $user_id = $_POST['user_id'];
  
  $query = "DELETE FROM `documents` WHERE ID = $photos_id";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  $query2 = "SELECT * FROM `documents` where ID = $photos_id";
  $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
  $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
 // print_r($rows);
  unlink($rows[0]['DOCS_NAME']);
//  header('location: ../pics.php');
}


if($_POST['price_id']){
  $photos_id = $_POST['price_id'];
  $user_id = $_POST['user_id'];
  
  $query = "DELETE FROM `price` WHERE ID = $photos_id";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  $query2 = "SELECT * FROM `price` where ID = $photos_id";
  $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
  $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
 // print_r($rows);
  unlink($rows[0]['DOCS_NAME']);
//  header('location: ../pics.php');
}

?>