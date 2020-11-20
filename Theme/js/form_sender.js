


$('#save_rev').click(function(){
   $review = $('#review').val();
   $like = $('#like').val();
   $dislike = $('#dislike').val();
   $common = $('#common').val();
   $to = $('#to').val();
   
   if($review != '' &&  $like != '' &&  $dislike != '' && $common != ''){
       $.post('php/employee.php', {"review": $review, "like": $like, "dislike": $dislike, "common": $common, "to": $to}, function(d){
        setTimeout(function(){ window.location.href = 'employeeProfile.php?uid='+$to; }, 3000);
        alert('Комментарий успешно добавлен');
               
       });
   }else {
       alert('Заполните все поля');
   }


})

$('#send_mess').click(function(){
   $val = $(this).attr('data-id');
   console.log($val);
   if($val == ''){
       alert('Авторизуйтесь!');
   }else{
       window.location.href='message.html';
       alert('Можно');
   }

})


function get_data($to_chat)  
{  
     $.ajax({  
          url:"php/select_chat.php",  
          method:"POST",
          data:  {id: $to_chat}, 
          success:function(data){  
               $('.live_data').html(data);  
          }  
     });  
}  


function get_right_ava($to_chat)  
{  
     $.ajax({  
          url:"php/right_ava.php",  
          method:"POST",
          data:  {id: $to_chat}, 
          success:function(data){  
               $('#right_ava').html(data);  
          }  
     });  
}  


$('#chat').click(function(){
    $text = $('#text_chat').val();
    $from_chat = $('#from_chat').val();
    $to_chat = $('#to_chat').val();
  
    
    $chat_date = $('#chat_date').val();
    $.post('php/employee.php', {"text": $text, "from_chat": $from_chat, "to_chat": $to_chat, "chat_date": $chat_date}, function(d){    
        if(d == $text)
        {    
           // alert(d);
          $('#text_chat').val('');
           get_data($to_chat);
         
         /* $('.upd_chat').append('<div class="peer mR-20"><img class="w-2r bdrs-50p" src="" alt=""></div><div class="peer peer-greed"><div class="layers ai-fs gapY-5"><div class="layer"><div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2"><div class="peer mR-10"><small>'+$chat_date          
          +'</small></div><div class="peer-greed msg"><span>'+$text          
          +'</span></div></div></div></div></div>');     */    
        }
})
})




$(document).ready(function(){  
  
    setInterval('getdata()', 2000);
    $(document).on('click', '.msg_beetween_chat', function(){  
        var id=$(this).attr("id3"); 
        $('#to_chat').val(id);
         
        console.log(id);
         
             $.ajax({  
                  url:"php/select_chat.php",  
                  method:"POST",  
                  data:{id:id},  
                  dataType:"text",  
                  success:function(data){  
                      // alert(data);  
                       $('.live_data').html(data); 
                       get_right_ava(id);
                  }  
             });  
         
    });

 
})

