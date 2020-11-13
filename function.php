<?php 

function Get_avatar($user_id){
    require 'conn.php';
    $query ="SELECT u.* FROM `users` u  where u.id = $user_id"; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row)
    {
        return $row['AVATAR'];
    }
}

function Get_user_profile_data($user_id)
{
    require 'conn.php';
    $query = "SELECT u.*, d.name FROM `users` u, dic_country d where u.location = d.id and u.id = $user_id";
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return  $rows;
}


function Get_user_profile_data_html($user_id)
{
    $result = Get_user_profile_data($user_id);

    $output = '
    <div class="table-responsive">
        <table class="table">
    ';

    foreach($result as $row)
    {
   /*     if($row['user_avatar'] != '')
        {
            $output .= '
            <tr>
                <td colspan="2" align="center" style="padding:16px 0">
                    <img src="'.$row["user_avatar"].'" width="175" class="img-thumbnail img-circle" />
                </td>
            </tr>
            ';
        }
*/
  if($row['TYPE'] == '1') { $type = 'Заказчик';}
  else{ $type = 'Работник'; }
        $output .= '
        <tr>
            <th>Имя</th>
            <td>'.$row["NAME"].'</td>
        </tr>
        <tr>
        <th>Фамилия</th>
        <td>'.$row["LASTNAME"].'</td>
    </tr>
        <tr>
            <th>Номер телефона</th>
            <td>'.$row["PHONE"].'</td>
        </tr>
        <tr>
            <th>Тип профиля</th>
            <td>'.$type.'</td>
        </tr>
        <tr>
            <th>Город</th>
            <td>'.$row["name"].'</td>
        </tr>
        ';
    }
    $output .= '
        </table>
    </div>
    ';

    return $output;
}


/*
function Get_user_avatar($user_id)
{
     


    $query ="SELECT u.*, d.name FROM `users` u, dic_country d where u.location = d.id and u.id = $user_id "; 
    //  echo $query;
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     // $num_rows = mysqli_num_rows($result);
     // $row = mysqli_fetch_row($result);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $query = "
    SELECT user_avatar FROM register_user 
    WHERE register_user_id = '".$user_id."'
    ";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    foreach($result as $row)
    {
        return '<img src="'.$row['user_avatar'].'" width="25" class="img-circle" />';
    }
}
*/


function get_max_photos($session_id){

    require 'conn.php';
    $query = "SELECT max(ID) ID FROM `users_photo` where USER_ID = $session_id";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  

     $num_rows = mysqli_num_rows($result); 
     if($rows[0]['ID'] == NULL){
         $src = '';
     }else {
   $maxid = $rows[0]['ID'];
   
   $query_sec = "SELECT PHOTO_NAME FROM `users_photo` where USER_ID = $session_id and ID = $maxid";

   $result_sec = mysqli_query($link, $query_sec) or die("Ошибка " . mysqli_error($link)); 
   $rows_sec = mysqli_fetch_all($result_sec, MYSQLI_ASSOC); 
   $src = $rows_sec[0]['PHOTO_NAME']; 
     }
    return $src;    
}


function count_photos($session_id){

    require 'conn.php';
    $query = "SELECT * FROM `users_photo` where USER_ID = $session_id";
  //  echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  

     $num_rows = mysqli_num_rows($result); 
    return $num_rows;    
}


function get_photos($session_id){
    require 'conn.php';
    $query = "SELECT * FROM `users_photo` WHERE USER_ID = $session_id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
    echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
    <a id="photo_del" href="'.$row['PHOTO_NAME'].'">
        <img class="img-thumbnail" src="'.$row['PHOTO_NAME'].'" alt="Фото-обои">
    </a> 
    <a data-session="'.$row['USER_ID'].'" data-id="'.$row['ID'].'" id="delete_pics"><i class="fa fa-trash" aria-hidden="true"></i>Удалить<a/>      
 </div>';
    }
}


function get_photos_pick($session_id){
    require 'conn.php';
    $query = "SELECT * FROM `users_photo` WHERE USER_ID = $session_id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
    echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
    <a id="photo_del" href="'.$row['PHOTO_NAME'].'">
        <img class="img-thumbnail" src="'.$row['PHOTO_NAME'].'" alt="Фото-обои">
    </a>        
 </div>';
    }
}


function get_count_photo($user_id){
    require 'conn.php';
    $query = "SELECT * FROM `users_photo` WHERE USER_ID = $user_id";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result); 
    return $num_rows;
}

function get_max_docs($session_id){

    require 'conn.php';
    $query = "SELECT max(ID) ID FROM `documents` where USER_ID = $session_id";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  

     $num_rows = mysqli_num_rows($result); 
     if($rows[0]['ID'] == NULL){
         $src = '';
     }else {
   $maxid = $rows[0]['ID'];
   
   $query_sec = "SELECT DOC_NAME FROM `documents` where USER_ID = $session_id and ID = $maxid";

   $result_sec = mysqli_query($link, $query_sec) or die("Ошибка " . mysqli_error($link)); 
   $rows_sec = mysqli_fetch_all($result_sec, MYSQLI_ASSOC); 
   $src = $rows_sec[0]['DOC_NAME']; 
     }
    return $src;    
}


function count_docs($session_id){

    require 'conn.php';
    $query = "SELECT * FROM `documents` where USER_ID = $session_id";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     $num_rows = mysqli_num_rows($result); 
     return $num_rows;    
}


function get_photos_docs($session_id){
    require 'conn.php';
    $query = "SELECT * FROM `documents` WHERE USER_ID = $session_id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
    echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
    <a id="photo_del" href="'.$row['DOC_NAME'].'">
        <img class="img-thumbnail" src="'.$row['DOC_NAME'].'" alt="Фото-обои">
    </a>        
 </div>';
    }
}

function get_photos_docs_master($session_id){
    require 'conn.php';
    $query = "SELECT * FROM `documents` WHERE USER_ID = $session_id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
    echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
    <a id="docs_del" href="'.$row['DOC_NAME'].'">
        <img class="img-thumbnail" src="'.$row['DOC_NAME'].'" alt="Фото-обои">
    </a> 
    <a data-session="'.$row['USER_ID'].'" data-id="'.$row['ID'].'" id="delete_docs"><i class="fa fa-trash" aria-hidden="true"></i>Удалить<a/>      
 </div>';
    }
}

function get_price($id){
    require 'conn.php';
    $query = "SELECT p.*, s.* FROM `price` p, services s where p.id_service = s.ID and p.id_user = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if($rows) { return $rows[0]['NAME_SERV'];     }
   else { return '';}
}

function get_price_serv($id){
    require 'conn.php';
    $query = "SELECT p.*, s.* FROM `price` p, services s where p.id_service = s.ID and p.id_user = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   foreach($rows as $row)
    echo '
    <div class="list-group-item py-1 pr-3">
        <div class="row">
            <div class="col pr-0">'.$row['TITLE'].'</div>
            <div class="col-auto text-right">
                <b>'.$row['PRICE'].'</b>
                <span class="text-muted middle d-block d-sm-inline">тнг</span>
            </div>
       </div>
    </div>';
      
}

function get_price_ser($id){
    $html = '';
    require 'conn.php';
    $query = "SELECT p.*, s.ID ids, s.NAME_SERV, s.SPECID FROM `price` p, services s where p.id_service = s.ID and p.id_user = $id";
  //  echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   for($i = 0; $i<count($rows);$i++) {
   $vid = $rows[$i]['ids'];
    
   $html .= '<div class="list-group-item py-2">
   <h5 class="m-0 text-center text-sm-left"><b>'.$rows[$i]['NAME_SERV'].'</b></h5>
</div>';
   $qs = "SELECT p.ID ID_S, p.ID_SERVICE, p.TITLE, p.PRICE, p.ID_USER, s.* FROM `price` p, services s where p.id_service = s.ID and p.id_user = $id and s.id = $vid";
   //echo $qs;
   $rs =  mysqli_query($link, $qs) or die("Ошибка " . mysqli_error($link)); 
   $arr = mysqli_fetch_all($rs, MYSQLI_ASSOC);
  // print_r($arr);
   for($j=0;$j<count($arr);$j++) { 
          
   $html .= '<div class="list-group-item py-1 pr-3">
        <div class="row">
            <div class="col pr-0">'.$arr[$j]['TITLE'].'</div>
            <div class="col-auto text-right">
                <b>'.$arr[$j]['PRICE'].'</b>
                <span class="text-muted middle d-block d-sm-inline">тнг</span>
            </div>
            <a data-session="'.$_SESSION['id'].'" data-id="'.$arr[$j]['ID_S'].'" id="delete_price"><i class="fa fa-trash" aria-hidden="true">Удалить</i></a>
       </div>
    </div>';
   }
 }  
 echo $html;
}

function last_date_price($id){
    require 'conn.php';
    $query = "SELECT max(POST_DATE) as post_data FROM `price` WHERE ID_USER = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $data =  $rows[0]['post_data'];
    $timestamp = strtotime($data);
   $new_date_format = date('d.m.Y', $timestamp);
   return $new_date_format;
}

function count_price($id){
    require 'conn.php';
    $query = "SELECT p.* FROM `price` p, services s where  p.id_user = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result); 
    return $num_rows;  
}

?>