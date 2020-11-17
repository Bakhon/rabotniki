<?php 


require 'conn.php';
$query = "SELECT ser.ID SERID, ser.NAME_SERV SERNAME, ser.SPECID,  spec.* FROM `speciality` spec, `services` ser WHERE ser.SPECID = spec.ID";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$res  = mysqli_num_rows($result);
$output = '';
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
                     <td class="first_name" data-id1="'.$row["SERID"].'" contenteditable>'.$row["SERNAME"].'</td>  
                     <td class="last_name" data-id2="'.$row["ID"].'" contenteditable>'.$row["NAME_SPEC"].'</td>  
                     <td><button type="button" name="delete_btn" data-

id3="'.$row["SERID"].'" class="btn btn-xs btn-

danger btn_delete">x</button></td>  
                </tr>  
           ';  
        }       
   
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

?>