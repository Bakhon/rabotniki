 <!--  FOOTER -->
 <footer class="bg-black">
          <div class="container text-white-50 py-4">
              <div class="row">
                  <div class="mb-lg-3 text-center text-lg-left col-sm-12 col-lg-4 col-xl-3">
                      <ul class="d-none d-lg-block flex-column nav"><li class="nav-item"><a class="text-white" href="#">Строительные тендеры</a></li>
                          <li class="nav-item"><a class="text-white" href="#">Стоимость работ</a></li>
                          <li class="nav-item"><a class="text-white" href="#">Калькулятор ремонта</a></li>
                      </ul>               
                      
                      <ul class="flex-column nav"><li class="nav-item"><a class="text-white" href="#" rel="nofollow">Реклама</a></li>
                          <li class="nav-item"><a class="text-white" href="#" rel="nofollow">Правила</a></li>
                          <li class="nav-item"><a class="text-white" href="#" rel="nofollow">Пользовательское соглашение</a></li>
                      </ul>   
                  </div>
  
  
                  <div class="d-none d-lg-block col-lg-8 col-xl-6">
                      <div class="row">
                          <div class="col-lg-6"><a class="text-white-50" href="#">Ремонт квартиры или комнаты</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Строительство дома</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Плиточные работы</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Малярные работы</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Штукатурные работы</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Монтаж гипсокартона</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Поклейка обоев</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Напольные покрытия</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Потолки</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Электромонтажные работы</a></div>
                          <div class="col-lg-6"><a class="text-white-50" href="#">Сантехнические работы</a></div>                                                       
                      </div>
                  </div>
  
  
                  <div class="col-xl-3 text-center">                           
                      <a class="d-block mb-lg-3 text-white" href="#" rel="nofollow">Служба поддержки</a>   
                      <a class="d-block mb-3 text-white" href="#">О проекте</a>              
                      
                      © 2020 <a class="text-white" href="#">SiteName.KZ</a>           
                  </div>
  
              </div>
          </div>
    </footer>


    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-44582743-1');
      </script>
  
  
      <script src="Theme/js/jquery.min.js"></script>
      <script src="Theme/js/yii.js"></script>
      <script src="Theme/js/bootstrap.bundle.min.js"></script>
      <script src="Theme/js/script.js"></script>
      <script src="Theme/js/change.js"></script>
      <script src="https://use.fontawesome.com/029b8e5d68.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script>
        $(function(){
        $("#phone1").mask("+7(999) 999-9999");
        });

        
    </script>
      
          
<script>

$('#admin').click(function(){
$login = $('#login').val();
$pass = $('#password').val();

$.post('server_admin.php', {"login": $login, "pass": $pass}, function(d){
          if(d == 1){
              alert('Success');
              window.location = 'admin.php';
          }else{
              alert('Введите корректный логин или пароль!');
          }
})

})
$(document).ready(function(){  
$(document).on('change', '.edit_data', function(){ 
    
    var employee_id =  $(this).attr("data-id");
    var user_state = document.querySelector("#user_state").value;
    console.log(employee_id);
    console.log(user_state);
    $.post('server_admin.php', {"employee_id": employee_id, "user_state": user_state}, function(d){
       // location.reload();
    });
});
})


$(document).ready(function(){  
$(document).on('change', '.edit_tender', function(){ 
    
    var tender_id =  $(this).attr("data-id");
    var tender_state = document.querySelector("#tender_state").value;
    console.log(tender_id);
    console.log(tender_state);
    $.post('server_admin.php', {"tender_id": tender_id, "tender_state": tender_state}, function(d){
       // location.reload();
    });
});
})


$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 

    

$(document).on('click', '.btn_delete', function(){  
           var id=$(this).attr("id3");  
           console.log(id);
           if(confirm("Вы действительно хотите удалить?"))  
           {  
                $.ajax({  
                     url:"function_admin.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); 


      function edit_data(id, text, table_name, column)  
      {  
           $.ajax({  
                url:"function_admin.php",  
                method:"POST",  
                data:{edit_id:id, text:text, table_name: table_name, column: column},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "services", "NAME_SERV");  
      });  
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id, last_name, "speciality", "NAME_SPEC");  
      });

      var i=1;  
      $('#add_speciality').click(function(){  
           i++;  
           $('#insert_form').append('<label>Наименование сервиса</label><input class="form-control" type="text" name="speciality[]" id="speciality" value="" /><hr/>');  
      });

      $('#save_spec').click(function(){            
           $.ajax({  
                url:"function_admin.php",  
                method:"POST",  
                data:$('#insert_form').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#insert_form')[0].reset();  
                     fetch_data();
                }  
           });  
      });

      var i=1;  
      $('#add_services').click(function(){  
           i++;  
           $('#insert_sevices').append('<label>Наименование Специализации</label><input class="form-control" type="text" name="services[]" id="services" value="" /><hr/>');  
      });

      $('#save_services').click(function(){            
           $.ajax({  
                url:"function_admin.php",  
                method:"POST",  
                data:$('#insert_sevices').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#insert_sevices')[0].reset();  
                }  
           });  
      });

    });


</script>
      
      
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="s-pencil" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"/></symbol><symbol id="s-user-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-sign-in-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></symbol><symbol id="r-bars" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/></symbol><symbol id="l-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"/></symbol><symbol id="s-user-hard-hat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M88 176h272a8 8 0 0 0 8-8v-32a8 8 0 0 0-8-8h-8a112 112 0 0 0-68.4-103.2L256 80V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v64l-27.6-55.2A112 112 0 0 0 96 128h-8a8 8 0 0 0-8 8v32a8 8 0 0 0 8 8zm225.6 176h-16.7a174.08 174.08 0 0 1-145.8 0h-16.7A134.4 134.4 0 0 0 0 486.4 25.6 25.6 0 0 0 25.6 512h396.8a25.6 25.6 0 0 0 25.6-25.6A134.4 134.4 0 0 0 313.6 352zM224 320c65.22 0 118.44-48.94 126.39-112H97.61c7.95 63.06 61.17 112 126.39 112z"/></symbol><symbol id="s-gavel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.971 199.362l-22.627-22.627c-9.373-9.373-24.569-9.373-33.941 0l-5.657 5.657L329.608 69.255l5.657-5.657c9.373-9.373 9.373-24.569 0-33.941L312.638 7.029c-9.373-9.373-24.569-9.373-33.941 0L154.246 131.48c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l5.657-5.657 39.598 39.598-81.04 81.04-5.657-5.657c-12.497-12.497-32.758-12.497-45.255 0L9.373 412.118c-12.497 12.497-12.497 32.758 0 45.255l45.255 45.255c12.497 12.497 32.758 12.497 45.255 0l114.745-114.745c12.497-12.497 12.497-32.758 0-45.255l-5.657-5.657 81.04-81.04 39.598 39.598-5.657 5.657c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l124.451-124.451c9.372-9.372 9.372-24.568 0-33.941z"/></symbol><symbol id="s-tags" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></symbol><symbol id="s-calculator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></symbol><symbol id="s-briefcase" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></symbol><symbol id="s-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-comments" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"/></symbol><symbol id="s-question-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"/></symbol></svg>
  
  
      </body>
      
  </html>  