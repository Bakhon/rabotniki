<?php 

session_start();
require_once '../conn.php';
/*
if(isset($_POST['city'])){
    echo 123;
    exit;
}
*/

if(isset($_POST['search_name'])){
    $search_name = $_POST['search_name'];

    $query = "SELECT u.*, us.*, d.NAME title FROM users u, users_speciality us, dic_country d WHERE u.id = us.USER_ID and u.LOCATION = d.ID  and u.NAME LIKE '%$search_name%'";
  //  echo $query;
    // $query = "SELECT u.*, us.* FROM users u, users_speciality us WHERE u.id = us.USER_ID and us.user_speciality = $sid and u.NAME LIKE '%$title%'";
    // $query ="SELECT * FROM `users` where NAME LIKE '%$title%'"; 
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     $num_rows = mysqli_num_rows($result);
     foreach($rows as $row) { 
  echo '<div role="listbox" class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; " aria-expanded="false">
  <div role="presentation" class="tt-dataset tt-dataset-search_data_1">
  <div class="tt-suggestion tt-selectable position-relative"><div class="row align-items-center">
  <div class="col-auto pr-0"><img src="/image/userpic/small/293908.jpg" width="42" class="rounded-circle mr-1"></div>
  <div class="col pl-2 position-static"><a href="/52664" class="text-body stretched-link" rel="52664"><b>'.$row['NAME'].'</b></a></div></div></div>
  </div></div>';
     }


}

if(isset($_POST['text'])){
    $text = $_POST['text'];
    $from_chat = $_POST['from_chat'];
    $to_chat = $_POST['to_chat'];
    $chat_date = $_POST['chat_date'];

    $query = "INSERT INTO `chat`(`FROM_USER`, `TO_USER`, `MSG`, `POST_DATE`) VALUES('$from_chat', '$to_chat', '$text', '$chat_date')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));     
    echo $text;
   exit;
}

if(isset($_POST['review'])){
    $review = $_POST['review'];
    $like = $_POST['like'];
    $dislike = $_POST['dislike'];
    $common = $_POST['common'];
    $from = $_SESSION['id'];
    $post_date = date('d-m-Y');
    $to = $_POST['to'];

    $query = "INSERT INTO `review`(`REV_TENDER`, `LIKE_REV`, `NOTLIKE_REV`, `ALL_CONCL`, `ID_FROM`, `ID_TO`, `DATE_COMMENT`) VALUES('$review', '$like', '$dislike', '$common', '$from', '$to', '$post_date')";
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     $num_rows = mysqli_num_rows($result);
   // header('location: employeeProfile.php?uid=23');

}

if(isset($_POST['about'])){
    $about = $_POST['about'];
    session_start();
    $query = "UPDATE `users` SET ABOUT = '$about' where id = ".$_SESSION['id']; 
   // echo $query; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   }
   

if(isset($_POST['title'])){
    if($_POST['title']) {
    $title = $_POST['title'];
    $sid = $_POST['sid'];
    $query = "SELECT u.*, us.user_id , d.NAME title FROM users u, users_speciality us, dic_country d WHERE u.id = us.USER_ID and u.LOCATION = d.ID and us.user_speciality = $sid and u.NAME LIKE '%$title%'";
   // $query = "SELECT u.*, us.* FROM users u, users_speciality us WHERE u.id = us.USER_ID and us.user_speciality = $sid and u.NAME LIKE '%$title%'";
   // $query ="SELECT * FROM `users` where NAME LIKE '%$title%'"; 
  // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //  print_r($rows);
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
        foreach($rows as $row)
         $html = '<div class="card card-hover mb-4 shadow-sm emp" data="'.$row['ID'].'">
        <div class="card-body pb-1">
            <div class="row">
                 <div class="text-center col-md-auto mb-1 mb-md-0">
                    <img class="rounded" src="Theme/images/employees/143190.jpg" width="110" height="110" alt="Мастер Иван Иванов">             
                         <div class="text-warning mt-2 mb-n1">
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                         </div>                
                        
                         <div class="my-1 small">
                           <a class="text-body unlink" href="#" data-modal="/modal/rank-info">Рейтинг: 75 из 80</a>                
                         </div>

                         <div class="mb-2">
                            <a class="small text-muted unlink" href="#" rel="nofollow">0 отзывов</a>                
                        </div>
                 </div>


                 <div class="col text-center text-md-left position-static">
                    <div>
                         <span  class="icon-pro">PRO</span>
                         <span class="h4 align-middle d-block d-md-inline mt-2 ml-1">
                            <a class="stretched-link" href="employeeProfile.php?uid='.$row['ID'].'">Мастер '.$row['NAME'].' </a>  
                         </span>
                    </div>

                    <div class="my-3">
                        <div class="pr-3 mb-3 mb-md-0 d-md-inline">
                            <svg class="i is-map-marker-alt"><use xlink:href="#s-map-marker-alt" /></use></svg> 
                            '.$row['title'].'                   
                        </div>                      
                    </div>

                    <div class="text-muted small my-3">
                        <span class="text-nowrap d-block d-md-inline">Зарегистрирован 1 месяц назад</span>
                        <span class="px-2 d-none d-md-inline">•</span>
                        <span class="text-nowrap text-success">Сейчас на сайте</span>               
                    </div>

                    <div class="text-left mb-3">
                        Работу выполняю качественно!                                    
                    </div>
                </div>
            </div>
        </div>
    </div>';




    $html .= '<nav><ul class="pagination justify-content-center">';
  
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }  
   

    $prev = $page - 1;
    $next = $page + 1;
    $count_news = 2;
    if($page != 1) {  

     $html .=  '<li class="page-item prev"><a class="page-link" href="employeeByCategory.php?sid='.$sid.'&&page='.$prev.'" data-page="'.$page.'" tabindex="-1"><span aria-hidden="true">&laquo;</span> 
        <span class="sr-only">Previous</span></a></li>'; 
    } 
      //  $query =" SELECT COUNT(*) c FROM `users`"; 
        $query_pag = "SELECT count(*) c from users u, users_speciality, speciality, dic_country d, services where u.ID = users_speciality.USER_ID and users_speciality.USER_SPECIALITY = services.id and services.id = $sid and services.SPECID = speciality.ID and u.LOCATION = d.ID and u.type = 2";
       // echo $query;
        $result_pag = mysqli_query($link, $query_pag) or die("Ошибка " . mysqli_error($link)); 
        $rows_pag = mysqli_fetch_all($result_pag, MYSQLI_ASSOC);
        $kol =  $rows_pag[0]['c'];                           
        $cnt = ceil($kol/$count_news);    
                                                          
        for($i=1;$i<=$cnt;$i++)  {

            if($page == $i) {
                $txt = 'active';
            }else {$txt = '';}
        
      
       $html .=  '<li class="page-item '.$txt.'"><a class="page-link" href="employeeByCategory.php?sid='.$sid.'&&page='.$i.'" data-page="0">'.$i.'</a></li>';

        }
       
         if($page != $cnt) { 
        $html .= '<li class="page-item next"><a class="page-link" href="employeeByCategory.php?sid='.$sid.'&&page='.$next.'" data-page="'.$i.'"><span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span></a></li>
    </ul>
</nav>';


  } 

  echo $html;
exit;
          }
}else {
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }                              
    $count_news = 2;
    $from = ($page-1)*$count_news;  
    $id = $_POST['sid'];
    $query = "SELECT u.*, d.id city_id, d.name city_name from users u, users_speciality, speciality, dic_country d, services where u.ID = users_speciality.USER_ID and users_speciality.USER_SPECIALITY = services.id and services.id = $id and services.SPECID = speciality.ID and u.LOCATION = d.ID and u.id > 0 LIMIT $from,$count_news";
  // $query ="SELECT u.*, d.id city_id, d.name city_name from users u,  users_speciality us, speciality sp, services s, dic_country d where u.LOCATION = d.ID and u.id = us.USER_ID and us.USER_SPECIALITY = s.ID and s.ID = $id and u.id > 0 LIMIT $from,$count_news";  
  // $query = "SELECT u.*, d.id city_id, d.name city_name from users u, users_speciality, speciality, dic_country d where u.ID = users_speciality.USER_ID and users_speciality.USER_SPECIALITY = speciality.id and speciality.id = 4 and u.LOCATION = d.ID and u.id > 0 LIMIT $from,$count_news";  
  //  echo $query;            
   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   $query2 = "SELECT u.* from users u, users_speciality us, speciality sp, services s where u.id = us.USER_ID and us.USER_SPECIALITY = s.ID and s.ID = $id";
   $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
   $num_rows = mysqli_num_rows($result2);
  // $row = mysqli_fetch_row($result);
   $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
   foreach($rows as $row) {
    echo '<div class="card card-hover mb-4 shadow-sm emp" data="'.$row['ID'].'">
        <div class="card-body pb-1">
            <div class="row">
                 <div class="text-center col-md-auto mb-1 mb-md-0">
                    <img class="rounded" src="Theme/images/employees/143190.jpg" width="110" height="110" alt="Мастер Иван Иванов">             
                         <div class="text-warning mt-2 mb-n1">
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                         </div>                
                        
                         <div class="my-1 small">
                           <a class="text-body unlink" href="#" data-modal="/modal/rank-info">Рейтинг: 75 из 80</a>                
                         </div>

                         <div class="mb-2">
                            <a class="small text-muted unlink" href="#" rel="nofollow">0 отзывов</a>                
                        </div>
                 </div>


                 <div class="col text-center text-md-left position-static">
                    <div>
                         <span  class="icon-pro">PRO</span>
                         <span class="h4 align-middle d-block d-md-inline mt-2 ml-1">
                            <a class="stretched-link" href="employeeProfile.php?uid='.$row['ID'].'">Мастер '.$row['NAME'].' </a>  
                         </span>
                    </div>

                    <div class="my-3">
                        <div class="pr-3 mb-3 mb-md-0 d-md-inline">
                            <svg class="i is-map-marker-alt"><use xlink:href="#s-map-marker-alt" /></use></svg> 
                            '.$row['city_name'].'                   
                        </div>                      
                    </div>

                    <div class="text-muted small my-3">
                        <span class="text-nowrap d-block d-md-inline">Зарегистрирован 1 месяц назад</span>
                        <span class="px-2 d-none d-md-inline">•</span>
                        <span class="text-nowrap text-success">Сейчас на сайте</span>               
                    </div>

                    <div class="text-left mb-3">
                        Работу выполняю качественно!                                    
                    </div>
                </div>


            </div>
        </div>
    </div>';

    } }
  //  print_r($rows);        
    exit;
    
}


?>