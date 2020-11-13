$('#delete_pics').click(function(){
    
    var photos = $(this).attr('data-id');
    var user_id = $(this).attr('data-session');
    console.log(photos);

    $.post('php/post.php', {"photos_id": photos, "user_id": user_id}, function(d){
        $('#photo_del').remove();
        $('#delete_pics').remove();
        location.reload();

    })

})


$('#delete_docs').click(function(){
    
  var photos = $(this).attr('data-id');
  var user_id = $(this).attr('data-session');
  console.log(photos);

  $.post('php/post.php', {"docs_id": photos, "user_id": user_id}, function(d){
      $('#docs_del').remove();
      $('#delete_docs').remove();
     location.reload();

  }) 

})

$('#delete_price').click(function(){
    
  var del = $(this).attr('data-id');
  var user_id = $(this).attr('data-session');
  console.log(del);

  $.post('php/post.php', {"price_id": del, "user_id": user_id}, function(d){
      $('#docs_del').remove();
      $('#delete_docs').remove();
     location.reload();

  }) 

})