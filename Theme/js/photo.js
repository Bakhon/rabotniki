$('#delete_pics').click(function(){
    
    var photos = $(this).attr('data-id');
    var user_id = $(this).attr('data-session');
    console.log(photos);

    $.post('php/post.php', {"photos_id": photos, "user_id": user_id}, function(d){
        $('#photo_del').remove();
        $('#delete_pics').remove();
      //  location.reload();

    })

})