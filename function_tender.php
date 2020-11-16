<?php

function get_cities(){
    require 'conn.php';
    $query ="SELECT * FROM `dic_country` "; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   // print_r($rows);
    foreach($rows as $row){
        echo '<option value=" '.$row['ID'].'">'.$row['NAME'],'</option>';
    }
    
}

function dic_need(){
    require 'conn.php';
    $query ="SELECT * FROM `dic_need`"; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   // print_r($rows);
    foreach($rows as $row){
        echo '<div class="custom-control custom-radio">
        <input type="radio" id="contactChoice'.$row['ID'].'" name="contact" value="'.$row['ID'].'">
        <label  for="contactChoice'.$row['ID'].'">'.$row['NEED_NAME'].'</label>
    </div>';
    }   
}


function dic_category(){
    require 'conn.php';
    $q = "SELECT s.NAME_SPEC FROM `speciality` s, `services` sc where s.ID = sc.SPECID GROUP BY NAME_SPEC";
    $query ="SELECT * FROM `speciality`"; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                  
     foreach ($rows as $row) {                             
      $v = $row['ID'];
      echo '<div class="p-0"><button type="button" class="btn btn-lg text-body btn-block shadow-none py-2 text-left collapsed" data-toggle="collapse" data-target="#first'.$row['ID'].'"><span class="list-icon"><svg class="i is-caret-right"><use xlink:href="#s-caret-right" /></use></svg><svg class="i is-caret-down"><use xlink:href="#s-caret-down" /></use></svg>'.$row['NAME_SPEC'].'</span></button></div>';
      $query2 = "SELECT * FROM `services` WHERE SPECID = $v";
      // echo $query2;
       $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
       $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
       foreach($rows2 as $roww) {
           echo '
           <div id="first'.$row['ID'].'" class="collapse px-3">
               <div class="px-3 pt-2 mb-3 bg-white rounded-lg">
                   <div class="custom-control custom-checkbox pb-2"><input type="checkbox" id="c'.$roww['ID'].'" class="custom-control-input" name="tender_category[]" value="'.$roww['ID'].'"> <label class="custom-control-label" for="c'.$roww['ID'].'">'.$roww['NAME_SERV'].'</label></div>                       
               </div>
           </div>        
       ';
       }
    }
}


function count_tender(){
    require 'conn.php';
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $num_rows = mysqli_num_rows($result);
    return $num_rows;
}

function get_tender($page){
    if($page == ''){
        $page = 1;
    }
    require 'conn.php';
    $count_news = 2;
    $from = ($page-1)*$count_news;  
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER LIMIT $from,$count_news";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
        $post_date = date('d.m.Y', strtotime($row['POST_DATE']));
    echo '<div class="card card-tender mx-n2 mx-sm-0 mb-4 shadow-sm  card-hover" id="t109259">

    <div class="card-body">
        <div class="row">

            <div class="col-auto pr-1 d-none d-md-block text-center pt-1">
                <div class="mb-3">
                    <div class="badge badge-primary">№'.$row['ID_TENDER'].'</div>                
                </div>
                <svg class="text-primary i is-business-time" style="font-size: 70px; padding: 0 10px;"><use xlink:href="#s-business-time" /></use></svg>                            
            </div>

            <div class="col-md position-static">
                <div class="row mb-3">
                    <div class="col position-static pt-1">
                        <a class="stretched-link h5 " href="tenderDetails.php?id='.$row['ID_TENDER'].'">'.$row['TITLE'].'</a>
                    </div>
                </div>
                <div class="middle">
                   '.$row['DESCRIPTION'].'                  
                    <div>
                        <span class="float-right unlink" data-toggle="tooltip" title="Опубликовано"><svg class="mr-1 i ir-clock"><use xlink:href="#r-clock" /></use></svg>
                            '.$post_date.'
                        </span>
                        <div class="mt-3"><svg class="mr-1 i id-signal-4"><use xlink:href="#d-signal-4" /></use></svg>
                            Бюджет до '.$row['PRICE'].' тнг
                        </div>
                    </div>
                </div>                                
            </div>

        </div>
    </div>
    <div class="card-footer middle">
        <div class="row justify-content-sm-between">
            <div class="col-sm-auto mb-2 mb-sm-0 text-center text-sm-left"></div>
            <div class="col-sm-auto text-center text-sm-right unlink">
                <span class="d-inline-block mx-1 text-body" title="Количество просмотров" rel="nofollow" data-toggle="tooltip">
                    <svg class="mr-1 i ir-eye"><use xlink:href="#r-eye" /></use></svg>6</span>                
                    <a class="d-inline-block ml-2 text-body" href="/tender/remont-garazhnogo-boksa-otmostka-shtukaturka-109259" title="Количество предложений" rel="nofollow" data-toggle="tooltip">
                        <svg class="mr-1 i ir-file-alt"><use xlink:href="#r-file-alt" /></use></svg>
                        0 ответов
                    </a>           
                </div>
        </div>
    </div>
</div>';
}
}

function nav_tender($page){

    if($page == ''){
        $page = 1;
    }
    require 'conn.php';
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result);    
    $count_news = 2;                    
    $cnt = ceil($num_rows/$count_news); 
    echo  '<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item prev disabled"><a class="page-link" href="#" data-page="0" tabindex="-1"><span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span></a></li>';
    for($i=1;$i<=$cnt;$i++) 
    {
       
        if($page == $i) {
            $txt = 'active';
        }else {$txt = '';}
   echo '<li class="page-item '.$txt.'"><a class="page-link" href="tender.php?page='.$i.'" data-page="0">'.$i.'</a></li>';
}
echo '<li class="page-item next"><a class="page-link" href="#" data-page="1"><span aria-hidden="true">&raquo;</span>
<span class="sr-only">Next</span></a></li>  </ul>
</nav>';

}


function get_profiles_tender($id){

    require 'conn.php';
    $query = "SELECT ID_USER, POST_DATE, PHONE, CONTACT_NAME, DATE_BEGIN, WHOIS, CATEGORY, PATH_FILE,  TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender` where STATUS = 1 and ID_TENDER = $id GROUP BY ID_USER, POST_DATE, PHONE, CONTACT_NAME, DATE_BEGIN, WHOIS, CATEGORY, PATH_FILE, TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
   // $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 and ID_TENDER = $id  GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result); 
   
    echo '<h1 class="mb-3 text-center text-md-left">'.$rows[0]['TITLE'].'</h1>';
    
    for($i=0;$i<1;$i++) {
        $cat = $rows[$i]['CATEGORY'];
        $phone = $rows[$i]['PHONE'];
        $hidden_num = substr($phone, 0 , 7);
        $q = "SELECT * FROM `services` WHERE ID = $cat";
        $res = mysqli_query($link, $q) or die("Ошибка " . mysqli_error($link)); 
        $arr = mysqli_fetch_all($res, MYSQLI_ASSOC); 
        $date_start =date('d.m.Y', strtotime($rows['DATE_BEGIN']));
        $post_date = strtotime($rows[$i]['POST_DATE']);
        $now_date = date('Y-m-d');
        $nw = strtotime($now_date);
        $cur = $nw - $post_date;
        $current_hour = $cur/3600;
      //  echo $current_hour;
     if($rows[$i]['WHOIS'] == '1') {
         $whois = 'Владелец (или его представитель)';
     }
     if($rows[$i]['WHOIS'] == '2') {
        $whois = 'Подрядчик (ищу на субподряд)';
    }
    if($rows[$i]['WHOIS'] == '3') {
        $whois = 'Посредник (без процента)';
    }
    if($rows[$i]['WHOIS'] == '4') {
        $whois = 'Посредник (с процентом)';
    }
echo '
    <div  class="card-tender card-group mb-4">
        <div class="card border-2">
           
            <div class="card-header bg-primary">
                <div class="row">
                        <div class="col-auto pr-0">
                            <span class="badge badge-tender">№'.$rows[$i]['ID_TENDER'].'</span>
                        </div>
                        <div class="col">
                            <svg class="mr-1 i is-gavel"><use xlink:href="#s-gavel" /></use></svg>
                            <span class="d-sm-none">Тендер открыт</span>
                            <span class="d-none d-sm-inline">Тендер открыт для предложений</span>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto pr-0 d-none d-md-block">
                                <svg class="text-primary i is-business-time" style="font-size: 70px; padding: 0 10px;"><use xlink:href="#s-business-time" /></use></svg>                        
                            </div>
                            <div class="col mx-sm-0">
                                <strong>'.$rows[$i]['DESCRIPTION'].'</strong>

                                <div class="mt-3">
                                    <p>'.$rows[$i]['DESCRIPTION'].'</p>                            
                                </div>

                                <div class="mt-3">
                                    <svg class="mr-1 i id-signal-2"><use xlink:href="#d-signal-2" /></use></svg>
                                    Бюджет до '.$rows[$i]['PRICE'].' тнг
                                </div>

                                <div class="mt-1"><svg class="mr-1 i is-user-tie">
                                    <use xlink:href="#s-user-tie" /></use></svg>
                                   '.$whois.'
                                </div>

                                <div class="mt-1">
                                    <svg class="mr-1 i id-calendar-alt">
                                        <use xlink:href="#d-calendar-alt" /></use></svg>
                                        Можно начать c '.$date_start.'
                                </div>
                                
                                <div class="mt-1">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <svg class="mr-1 i id-folders"><use xlink:href="#d-folders" /></use></svg>                                   
                                         </div>
                                        <div class="col pl-0">
                                            <a href="#">'.$arr[0]['NAME_SERV'].'</a>                                    
                                        </div>
                                    </div>
                                </div>';

                            echo   '<div id="w0" class="mt-3"
                                <a  href="'.$rows[$i]['PATH_FILE'].'">
                                <img src="https://img.icons8.com/ios/50/000000/file--v1.png"/>
                                 Файл</a>                                 
                                </div>';
                                

                             echo    
                            '</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <hr class="m-0 d-lg-none">
                    <div class="card-body text-center">
                        <div class="text-uppercase h2">'.$rows[$i]['CONTACT_NAME'].'</div>                    
                       

                        <div id="w1" class="d-inline-block mb-3 hidden-phone h4 font-weight-normal align-top">
                            <div class="float-left">
                                <svg class="text-primary mr-2 i is-phone-alt"><use xlink:href="#s-phone-alt" /></use></svg>
                            </div>';
                            if($_SESSION) {
                              if($rows[$i]['SHOW_PHONE'] == '1') 
                            {
                          echo '<div class="show_number" style="display: inline-block;">'.$hidden_num.'xxx xxxx<br>
                                <a id="show_n"  class="view-phone small" href="#" data-type="2" >
                                    Показать номер
                                </a>
                                </div>
                                ';

                                echo '<div class="hide_number" style="display:none">'.$rows[$i]['PHONE'].'<br>
                                <a id="hide_n"   class="view-phone small" href="#" data-type="2" >
                                    Скрыть номер
                                </a>
                                </div>
                                ';
                                
                           } }else{
                                echo '<div class="show_number_ses" style="display: inline-block;">'.$hidden_num.'xxx xxxx<br>
                                <a id="show_n_s"  class="view-phone small" href="#" data-type="2" >
                                    Показать номер
                                </a>
                                </div>
                                ';
                                echo '<div class="hide_number_ses" style="display:none">'.$hidden_num.'xxx xxxx<br>
                                <a id="hide_n_s"  class="view-phone small" href="#" data-type="2" >
                                    Скрыть номер
                                </a>
                                </div>
                                ';
                            }
                                echo '
                                
                            <div id="w0" style="display:none" class="alert-info alert hidden_alert" role="alert">
                                Для просмотра номера телефона Вам необходимо 
                                <a href="register.php">зарегистрироваться</a> либо 
                                <a href="login.php">войти</a>.
                            </div>


                        </div>                        
                            
                    </div>
                </div>

            </div>
            <div class="card-footer middle">
                <div class="row">
                    <div class="col text-center text-sm-right">
                        <a class="mr-2" href="#" >
                            <svg class="mr-2 text-danger i is-thumbs-down"><use xlink:href="#s-thumbs-down" /></use></svg>
                            Пожаловаться на тендер
                        </a>                
                        <span class="d-inline-block" data-toggle="tooltip" title="Тендер опубликован">
                            <svg class="mr-1 i ir-clock"><use xlink:href="#r-clock" /></use></svg>
                            '.$current_hour.' часов назад
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    
    }
  
}


function count_tender_comments($id){
     require 'conn.php';
     $query = "SELECT * FROM `tender_comment` WHERE ID_TENDER = $id";
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     $num_rows = mysqli_num_rows($result);
     return $num_rows;
}

function tender_comments($id){
   require 'conn.php';
   $query = "SELECT t.*, u.* FROM `TENDER_COMMENT` t, USERS u where t.id_tender = $id and t.id_user = u.id";
   //echo $query;
   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $num_rows = mysqli_num_rows($result);
   echo ' <div id="offers" class="title text-center bg-light text-dark h4 mb-4">Предложения по тендеру ('.$num_rows.')</div>';
   foreach($rows as $row) {
    $post_data = strtotime($row['POST_DATE']);
    $now_date = date('Y-m-d H:i:s');
    $now_d = strtotime($now_date);
    $now_time = $now_d - $post_data;

    $hour = $now_time/86400;
   
    echo ' <div id="w2" class="mb-5 ">
    <div data-key="890674">
        
        <div class="card mb-4 border-2 mx-n1 mx-sm-0 border-primary">
        <div class="card-body p-4">
            <div class="row justify-content-center">

            <div class="col-auto mb-3 mb-md-0">
                <a href="employeeProfile.html" rel="nofollow" target="_blank">
                    <img class="rounded" src="'.$row['AVATAR'].'" width="150" height="150" alt="Мастер '.$row['LASTNAME'].' '.$row['NAME'].'">
                </a>                
                <div class="text-muted text-nowrap text-center small mt-2">
                    <div>На сайте уже 1 месяц</div>
                    <div class="mt-1">Был 4 часа назад</div>
                </div>
            </div>

            <div class="col-12 col-md">
                <div class="row h-100">
                    <div class="col-lg-8">
                        <div class="h4 text-uppercase text-center text-md-left">
                            <a class="text-body" href="employeeProfile.php" target="_blank">Мастер '.$row['LASTNAME'].' '.$row['NAME'].' </a>                        
                        </div>
                        <div class="mb-3 mt-2 middle row justify-content-center justify-content-md-start">
                            <div class="col-auto py-1">
                                <b>Рейтинг:</b>
                                <a class="text-body" href="#" data-modal="/modal/rank-info">75 из 80</a>                                
                                <span class="text-warning">
                                    <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                                    <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                                    <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                                    <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                                    <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                                </span>                            
                            </div>
                            <div class="col-auto py-1">
                                <a class="text-body font-weight-bold" href="employeeProfile.html" rel="nofollow">
                                    <svg class="mr-2 i is-comment-dots"><use xlink:href="#s-comment-dots" /></use></svg>
                                    '.count_tender_comments($row['ID_TENDER']).' отзывов
                                    </a>                                
                            </div>
                        </div>

                        
                        <div class="mb-3 shadow-sm py-3 px-4 border rounded-xl">                                                                                                                                                                                                    
                            <div class="">
                                <p>'.$row['COMMENT'].' </p>                                                                                                            
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-lg-4 text-center">
                        <span data-toggle="tooltip" title="Опубликовано">
                            <svg class="mr-2 i ir-clock"><use xlink:href="#r-clock" /></use></svg>
                            8 часов назад
                        </span>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>';
}

}


?>