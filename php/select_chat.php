<?php
session_start();
$session_id = $_SESSION['id'];
if(isset($_POST['id'])) {
    require '../conn.php';
    $id = $_POST['id'];
    //$query = "SELECT * FROM `chat` WHERE FROM_USER = $id";
    $query = "SELECT c.*,  u.ID, u.LASTNAME, u.NAME, u.AVATAR, u.POST_DATE post FROM `chat` c, users u WHERE c.FROM_USER = $id and c.TO_USER = $session_id and c.FROM_USER = u.id UNION ALL SELECT c.*,  u.ID, u.LASTNAME, u.NAME, u.AVATAR, u.POST_DATE post FROM `chat` c, users u WHERE c.TO_USER = $id and c.FROM_USER = $session_id and c.FROM_USER = u.id ORDER BY 1 ASC";
  //  $query = "SELECT * FROM `chat` WHERE FROM_USER = $id and TO_USER = $session_id UNION ALL SELECT * FROM `chat` WHERE TO_USER = $id and FROM_USER = $session_id ORDER BY 6 ASC";
   // $query = "SELECT * FROM `chat` WHERE FROM_USER = $id and TO_USER = $session_id UNION ALL SELECT * FROM `chat` WHERE TO_USER = $session_id and FROM_USER = $id ORDER BY 6 ASC";
   // $query = "SELECT * FROM `chat` WHERE FROM_USER = $id UNION ALL SELECT * FROM `chat` WHERE TO_USER = $session_id  ORDER BY 6 ASC";
   // echo $query;
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
    foreach($rows as $row) {
        
    echo '<div class="peers fxw-nw live_chat">
    <div class="peer mR-20"><img class="w-2r bdrs-50p"
            src="'.$row['AVATAR'].'" alt=""></div>
    <div class="peer peer-greed">
        <div class="layers ai-fs gapY-5">
            <div class="layer">
                <div
                    class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                    <div class="peer mR-10">
                        <small>'.$row['POST_DATE'].'</small>
                    </div>
                    <div class="peer-greed msg">
                        <span>'.$row['MSG'].'</span>
                    </div>
                </div>
            </div>                                                   
        
        </div>
    </div>
</div>'; 
}
}


?>