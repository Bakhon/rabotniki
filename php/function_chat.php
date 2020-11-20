<?php
        function list_friends($id){
        require 'conn.php';
        $query = "SELECT c.*, u.* FROM `chat` c, users u WHERE c.to_user = $id and c.from_user = u.id GROUP BY c.TO_USER, c.FROM_USER";
      //  $query = "SELECT c.* FROM `chat` c WHERE c.to_user = $id GROUP BY c.TO_USER, c.FROM_USER";
        //echo $query;
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $res  = mysqli_num_rows($result);
         
        foreach($rows as $row){

            echo '<div class="peers fxw-nw ai-c p-20 bdB bgc-white bgcH-grey-50 cur-p">
            <div class="peer"><img src="'.$row['AVATAR'].'" alt=""
                    class="w-3r h-3r bdrs-50p"></div>
            <div id3="'.$row['FROM_USER'].'" class="peer peer-greed pL-20 msg_beetween_chat">
                <h6 class="mB-0 lh-1 fw-400">'.$row['LASTNAME'].' '.$row['NAME'].'</h6><small
                    class="lh-1 c-green-500">Online</small>
            </div>
        </div>';
        }

        }


        function get_right_ava($id){
            require 'conn.php';
            $query = "SELECT c.*, u.* FROM `chat` c, users u WHERE c.to_user = $id and c.from_user = u.id GROUP BY c.TO_USER, c.FROM_USER";
          //  $query = "SELECT c.* FROM `chat` c WHERE c.to_user = $id GROUP BY c.TO_USER, c.FROM_USER";
            //echo $query;
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $res  = mysqli_num_rows($result);
             

    
            }





     

?>