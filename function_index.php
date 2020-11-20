<?php

function count_active_emp(){
   require 'conn.php';
   $query = "SELECT COUNT(*) as emp FROM `users` where type = 2 and STATUS = 1";
   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   return $rows[0]['emp'];
}

function tender_index()
{
    require 'conn.php';
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender` where STATUS = 1 GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER LIMIT 2";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row){
        $date_tender = date('d.m.Y', strtotime($row['POST_DATE']));
        echo ' <div class="card card-tender mx-n2 mx-sm-0 mb-4 shadow-sm border-white card-hover">
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
                                '.$date_tender.'
                            </span>
                            <div class="mt-3"><svg class="mr-1 i id-signal-4"><use xlink:href="#d-signal-4" /></use></svg>
                                Бюджет до '.$row['PRICE'].' тнг
                            </div>
                        </div>
                    </div>                                
                </div>

            </div>
        </div>
    </div>';
    }
}

function index_rabotniki()
{
    require 'conn.php';
    $query = "SELECT * FROM `users` where type = 2 LIMIT 2";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row) {
    echo ' <div class="card card-hover mb-4 shadow-sm">
    <div class="card-body pb-1">
        <div class="row">
             <div class="text-center col-md-auto mb-1 mb-md-0">
                <img class="rounded" src="'.$row['AVATAR'].'" width="110" height="110" alt="'.$row['LASTNAME'].' '.$row['NAME'].'">             
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
                        <a class="stretched-link" href="employeeProfile.php?uid='.$row['ID'].'">Мастер '.$row['LASTNAME'].' '.$row['NAME'].'</a>  
                     </span>
                </div>

                <div class="my-3">
                    <div class="pr-3 mb-3 mb-md-0 d-md-inline">
                        <svg class="i is-map-marker-alt"><use xlink:href="#s-map-marker-alt" /></use></svg> 
                        Нур-Султан                    
                    </div>
                    <button class="btn btn-link text-success font-weight-bold p-0 unlink" >
                        <svg class="mr-1 i is-shield-check"><use xlink:href="#s-shield-check" /></use></svg>
                        Личность подтверждена
                    </button> 
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
</div>
';
}
}

function services_index(){
     require 'conn.php';
     $query = "SELECT * FROM `services` ORDER BY `NAME_SERV` ASC LIMIT 6";
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     foreach($rows as $row) {
        echo ' <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
        <div>
            <div class="mb-2">
                <img src="Theme/images/categoryes/2.png" alt="Ремонт квартиры или комнаты">                    
            </div>
            <a class="stretched-link text-body" href="catalog.php">'.$row['NAME_SERV'].'<a>               
         </div>
    </div>';
     }

}
?>