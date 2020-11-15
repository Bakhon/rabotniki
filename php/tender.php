<?php

if(isset($_POST['address'])){
    require '../conn.php';
 
    $city = $_POST['city'];
    $address = $_POST['address'];
    $title = $_POST['title'];
    $text_editor = $_POST['text_editor'];
    $i = $_POST['i'];
    $i1 = $_POST['i1'];
    $i2 = $_POST['i2'];
    $i3 = $_POST['i3'];
    $price = $_POST['price'];
    $date_start = $_POST['date_start'];
    $date_start = date('Y-m-d', strtotime($date_start));
    $date_finish = $_POST['date_finish'];
    $date_finish = date('Y-m-d', strtotime($date_finish));
    $tender_expired = $_POST['tender_expired'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $showphone = $_POST['showphone'];
    $whois = $_POST['whois'];
    $checkboxes = $_POST['checkboxes'];
    $target_directory = "../tender/";
    $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
    
    foreach($checkboxes as $k=>$v) {
        $query = "INSERT INTO `tender`(`ADDRES`, `TITLE`, `DESCRIPTION`, `PATH_FILE`, `CATEGORY`, `WHOIS`, `PRICE`, `DATE_BEGIN`, `DATE_END`, `CONTACT_NAME`, `PHONE`, `SHOW_PHONE`) VALUES('$address', '$title', '$text_editor', '$target_file', '$v', '$whois', '$price','$date_start', '$date_finish', '$username', '$phone', '$showphone') ";      
       // echo $query;    
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
       }
       if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) echo 1;
       else echo 0;


}

?>