
  function autoRefresh_div()
  {
       $(".live_chat").load("php/select_chat.php").show();// a function which will load data from other file after x seconds
   }
$(document).ready(function(){
  
    
     setInterval('autoRefresh_div()', 2000);
})

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

$('#chat').click(function(){
    $text = $('#text_chat').val();
    $from_chat = $('#from_chat').val();
    $to_chat = $('#to_chat').val();
  
    
    $chat_date = $('#chat_date').val();
    $.post('php/employee.php', {"text": $text, "from_chat": $from_chat, "to_chat": $to_chat, "chat_date": $chat_date}, function(d){    
        if(d == $text)
        {    
          $('#text_chat').text('');
          $('.live_chat').append('');
          console.log(d);
        }
})
})



$(document).ready(function(){  
  

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
                     //  alert(data);  
                       $('.live_data').html(data); 
                  }  
             });  
         
    });

 
})

