<?php 

if(isset($_POST['speciality']))
{
    $select_spec = $_POST['select_spec'];
    $speciality = $_POST['speciality'];
    $target_directory = "services/";
  //  print_r($_FILES);
    $target_file = $target_directory.basename($_FILES["file"]["name"]);
    require 'conn.php';
    foreach($speciality as $v) {
    $query = "INSERT INTO `services`(`NAME_SERV`, `SPECID`, `FILE_PATH`) VALUES ('$v', '$select_spec', '$target_file')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));    
    }
    echo 'Добавлено!';
}

if(isset($_POST['services'])){
    $services = $_POST['services'];
    require 'conn.php';
    foreach($services as $v) {
    $query = "INSERT INTO `speciality`(`NAME_SPEC`) VALUES('$v')";
    echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));    
    }
    echo 'Добавлено!';
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    require 'conn.php';
$query = "DELETE FROM `services` WHERE ID = $id";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

}

if(isset($_POST['edit_id'])){
    $edit_id = $_POST['edit_id'];
    $text = $_POST['text'];
    $table_name = $_POST['table_name'];
    $column = $_POST['column'];
    require 'conn.php';
    $query = "UPDATE `$table_name` SET  $column = '$text' WHERE ID = $edit_id";
  
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
        {  
            echo 'Данные обновлены';  
       } 
    
}

function get_list(){

require 'conn.php';
$query = "SELECT ser.ID SERID, ser.NAME_SERV SERNAME, ser.SPECID,  spec.* FROM `speciality` spec, `services` ser WHERE ser.SPECID = spec.ID";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$res  = mysqli_num_rows($result);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Имя сервиса</th>  
                     <th width="40%">Специализация</th>  
                     <th width="10%">Удалить</th>  
                </tr>';  
if($res > 0) {
    foreach($rows as $row) {
           $output .= '  
                <tr>  
                     <td>'.

$row["SERID"].'</td>  
                     <td class="first_name" data-id1="'.$row["ID"].'" contenteditable>'.$row["SERNAME"].'</td>  
                     <td class="last_name" data-id2="'.$row["ID"].'" contenteditable>'.$row["NAME_SPEC"].'</td>  
                     <td><button type="button" name="delete_btn" data-

id3="'.$row["SERID"].'" class="btn btn-xs btn-

danger btn_delete">x</button></td>  
                </tr>  
           ';  
        }       
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" 

class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
} 
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
 

}


?>