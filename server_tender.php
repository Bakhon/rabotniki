<?php
session_start();
if(isset($_POST['address'])){
    require 'conn.php';
    $tender_id = $_POST['tender_id'];
    $text = $_POST['text'];
    $str = strip_tags($text);
    $we_need = $_POST['we_need'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $title = $_POST['title_tender'];
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
    $target_directory = "tender/";
    $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $post_date = date('Y-m-d');
    if($_SESSION['id']){
        $id_user = $_SESSION['id'];
    }else{
        $id_user = '0';
        echo '3';
        exit;
    }
    
    foreach($checkboxes as $k=>$v) {
        $query = "INSERT INTO `tender`(`ADDRES`, `WE_NEED`, `TITLE`, `DESCRIPTION`, `PATH_FILE`, `CATEGORY`, `WHOIS`, `PRICE`, `DATE_BEGIN`, `DATE_END`, `CONTACT_NAME`, `PHONE`, `SHOW_PHONE`, `POST_DATE`, `STATUS`, `ID_USER`, `ID_TENDER` ) VALUES('$address', '$we_need', '$title', '$str', '$target_file', '$v', '$whois', '$price','$date_start', '$date_finish', '$username', '$phone', '$showphone', '$post_date', '0', '$id_user', '$tender_id' ) ";      
       // echo $query;    
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
       }
       move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
       
       if($_SESSION['id']){
           echo 1;
       }else{
           echo '2';
       }


}

if(isset($_POST['title'])){
    require 'conn.php';
    require 'function_tender.php';
    $page_id = $_POST['page_id'];
    $title = $_POST['title'];
    $tender_id = $_POST['tender_id'];
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 and (TITLE LIKE '%$title%' or ID_TENDER LIKE '%$tender_id%') GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($rows as $row)
    {
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
                        <a class="stretched-link h5 " href="tenderDetails.html">'.$row['TITLE'].'</a>
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
 if($rows) {    
     nav_tender($page_id); }

}

if(isset($_POST['budget'])){
    require 'conn.php';
    require 'function_tender.php';
    $budget = $_POST['budget'];
    $budget = $budget[0];
    $page_id = $_POST['page_id'];
    $title = $_POST['title'];
    $tender_id = $_POST['tender_id'];

    if($budget == '50000'){
        $start = 0;
        $finish = 49999;
    }
    else if($budget == '150000')
    {
        $start = 50000;
        $finish = 150000;
    } else if($budget == '') {
        $start = '0';
        $finish = '1000000';
    }
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 and (PRICE BETWEEN '$start' and '$finish') GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
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
                        <a class="stretched-link h5 " href="tenderDetails.html">'.$row['TITLE'].'</a>
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
    if($rows) {    
        nav_tender($page_id); }

}

if(isset($_POST['customer'])){

    require 'conn.php';
    require 'function_tender.php';
    $customer = $_POST['customer'];
    $customer = $customer[0];
    $page_id = $_POST['page_id'];
    $query = "SELECT TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER FROM `tender`  where STATUS = 1 and WHOIS LIKE '%$customer%' GROUP BY TITLE, DESCRIPTION, PRICE, POST_DATE, ID_TENDER";
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
                        <a class="stretched-link h5 " href="tenderDetails.html">'.$row['TITLE'].'</a>
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
    if($rows) {    
        nav_tender($page_id); }

}

if(isset($_POST['comment'])){
    require 'conn.php';
    $comment = $_POST['comment'];
    $userid  = $_POST['user'];
    $tender_id = $_POST['tender_id'];
    $post_date = date('Y-m-d H:i:s');
   $query = "INSERT INTO `TENDER_COMMENT`(`COMMENT`, `ID_USER`, `ID_TENDER`, `POST_DATE`) VALUES ('$comment', '$userid', '$tender_id', '$post_date')"; 
  // echo $query;  
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     echo '1';
}


?>