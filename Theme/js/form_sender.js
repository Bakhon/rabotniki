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
          $('.msg').append('<span></span>');
          console.log(d);
        }
})
})