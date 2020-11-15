
<?php require_once 'Theme/blocks/header_tender.php'; 
      require_once 'function_tender.php';
?>

<div class="container pt-3 mb-5">
    <ol class="mb-3 breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="tender.html" itemprop="item">
                <span itemprop="name">Все заказы</span>
            </a>
            <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <link href="#" itemprop="item">
            <span itemprop="name">Тендер №<?php echo $_GET['id']; ?></span>
            <meta itemprop="position" content="3">
        </li>
    </ol>   
    


<?php echo get_profiles_tender($_GET['id']); ?>



        <!-- Предложения по тендеру -->
       
    
       <?php echo tender_comments($_GET['id']); ?>


        <div class="title bg-light text-dark h4 mb-4" id="addOffer"><a data-toggle="modal"  data-target="#add_comment" >Добавить предложение</a> </div>

        



</div>


 <!-- Support button -->
 <a class="btn btn-primary position-fixed d-none d-lg-inline-block" href="#" style="bottom: 0; right: 0; z-index: 1040;"><svg class="mr-2 i is-question-circle"><use xlink:href="#s-question-circle"></use></svg>Служба поддержки</a>
   
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


 <div class="modal modal-load fade show" id="add_comment" tabindex="-1" data-modal-action="/profile/modal-review?user=36221" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <?php if($_SESSION) { ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавьте свое предложение</h5>                                
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="" >
            <div class="modal-body">
            <div class="mb-3">
          
            <div class="form-group">            
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']; ?>" />	
                                <input type="hidden" name="tender_id" id="tender_id" value="<?php echo $_GET['id']; ?>" />	
                               													
			</div>   
                        <div class="form-group field-signup-username required"> 
                                <label for="signup-username">Комментарий</label>           
                                <textarea name="comment" id="comment" rows="5" class="form-control"></textarea>
			            </div>   
           </div>                              
           </div>
       
            <div class="modal-footer">
            <input type="button" name="send_com" id="send_com" class="btn btn-primary" value="Сохранить" /> 
    <?php }else { ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Вы не можете оставить предложение</h5>                                
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="w5" class="alert-info alert-i alert" role="alert">
            <svg class="alert-icon i id-info-circle" style="--i-primary-color: white;" ajax><svg class="i-color" style="--i-primary-color: white;" id="d-info-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path fill="currentColor" d="M256 8C119 8 8 119.08 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 110a42 42 0 1 1-42 42 42 42 0 0 1 42-42zm56 254a12 12 0 0 1-12 12h-88a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h12v-64h-12a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h64a12 12 0 0 1 12 12v100h12a12 12 0 0 1 12 12z" class="i-secondary"/><path fill="currentColor" d="M256 202a42 42 0 1 0-42-42 42 42 0 0 0 42 42zm44 134h-12V236a12 12 0 0 0-12-12h-64a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h12v64h-12a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12v-24a12 12 0 0 0-12-12z" class="i-primary"/></svg></svg>
            Для того, что бы оставить предложение, Вам необходимо 
            <a href="login.php">Войти</a> или <a href="register.php">Зарегистрироваться</a>.
        </div>
        </div>
    <?php } ?>
            </div>
            </form>
        </div>

        </div>
    </div>
</div>



<svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="s-gavel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.971 199.362l-22.627-22.627c-9.373-9.373-24.569-9.373-33.941 0l-5.657 5.657L329.608 69.255l5.657-5.657c9.373-9.373 9.373-24.569 0-33.941L312.638 7.029c-9.373-9.373-24.569-9.373-33.941 0L154.246 131.48c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l5.657-5.657 39.598 39.598-81.04 81.04-5.657-5.657c-12.497-12.497-32.758-12.497-45.255 0L9.373 412.118c-12.497 12.497-12.497 32.758 0 45.255l45.255 45.255c12.497 12.497 32.758 12.497 45.255 0l114.745-114.745c12.497-12.497 12.497-32.758 0-45.255l-5.657-5.657 81.04-81.04 39.598 39.598-5.657 5.657c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l124.451-124.451c9.372-9.372 9.372-24.568 0-33.941z"/></symbol><symbol class="i-color" style="font-size: 70px; padding: 0 10px;" id="s-business-time" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M496 224c-79.59 0-144 64.41-144 144s64.41 144 144 144 144-64.41 144-144-64.41-144-144-144zm64 150.29c0 5.34-4.37 9.71-9.71 9.71h-60.57c-5.34 0-9.71-4.37-9.71-9.71v-76.57c0-5.34 4.37-9.71 9.71-9.71h12.57c5.34 0 9.71 4.37 9.71 9.71V352h38.29c5.34 0 9.71 4.37 9.71 9.71v12.58zM496 192c5.4 0 10.72.33 16 .81V144c0-25.6-22.4-48-48-48h-80V48c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h395.12c28.6-20.09 63.35-32 100.88-32zM320 96H192V64h128v32zm6.82 224H208c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h291.43C327.1 423.96 320 396.82 320 368c0-16.66 2.48-32.72 6.82-48z"/></symbol><symbol id="d-signal-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M344 192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16z" class="i-secondary"/><path fill="currentColor" d="M88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="s-user-tie" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></symbol><symbol id="d-calendar-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><defs></defs><path fill="currentColor" d="M0 192v272a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V192zm128 244a12 12 0 0 1-12 12H76a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1-12 12H76a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm128 128a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm128 128a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm-80-180h32a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16zm-192 0h32a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16z" class="i-secondary"/><path fill="currentColor" d="M448 112v80H0v-80a48 48 0 0 1 48-48h48v48a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V64h128v48a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V64h48a48 48 0 0 1 48 48z" class="i-primary"/></symbol><symbol id="d-folders" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M640 112v224a48 48 0 0 1-48 48H176a48 48 0 0 1-48-48V48a48 48 0 0 1 48-48h160l64 64h192a48 48 0 0 1 48 48z" class="i-secondary"/><path fill="currentColor" d="M48 512a48 48 0 0 1-48-48V176a48 48 0 0 1 48-48h48v208a80.09 80.09 0 0 0 80 80h336v48a48 48 0 0 1-48 48z" class="i-primary"/></symbol><symbol id="s-map-marker-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></symbol><symbol id="s-phone-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/></symbol><symbol id="s-thumbs-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"/></symbol><symbol id="r-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></symbol><symbol class="i-color" style="--i-primary-color: white;" id="d-info-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path fill="currentColor" d="M256 8C119 8 8 119.08 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 110a42 42 0 1 1-42 42 42 42 0 0 1 42-42zm56 254a12 12 0 0 1-12 12h-88a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h12v-64h-12a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h64a12 12 0 0 1 12 12v100h12a12 12 0 0 1 12 12z" class="i-secondary"/><path fill="currentColor" d="M256 202a42 42 0 1 0-42-42 42 42 0 0 0 42 42zm44 134h-12V236a12 12 0 0 0-12-12h-64a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h12v64h-12a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12v-24a12 12 0 0 0-12-12z" class="i-primary"/></symbol><symbol id="s-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></symbol><symbol id="s-star-half-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 536 512"><path fill="currentColor" d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"/></symbol><symbol id="r-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></symbol><symbol id="s-comment-dots" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"/></symbol><symbol id="s-user-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-sign-in-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></symbol><symbol id="r-bars" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/></symbol><symbol id="l-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"/></symbol><symbol id="s-user-hard-hat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M88 176h272a8 8 0 0 0 8-8v-32a8 8 0 0 0-8-8h-8a112 112 0 0 0-68.4-103.2L256 80V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v64l-27.6-55.2A112 112 0 0 0 96 128h-8a8 8 0 0 0-8 8v32a8 8 0 0 0 8 8zm225.6 176h-16.7a174.08 174.08 0 0 1-145.8 0h-16.7A134.4 134.4 0 0 0 0 486.4 25.6 25.6 0 0 0 25.6 512h396.8a25.6 25.6 0 0 0 25.6-25.6A134.4 134.4 0 0 0 313.6 352zM224 320c65.22 0 118.44-48.94 126.39-112H97.61c7.95 63.06 61.17 112 126.39 112z"/></symbol><symbol id="s-tags" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></symbol><symbol id="s-calculator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></symbol><symbol id="s-briefcase" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></symbol><symbol id="s-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-comments" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"/></symbol><symbol id="s-question-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"/></symbol></svg>

<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', 'UA-44582743-1');
</script>

<script src="Theme/js/jquery.min.js"></script>
<script src="Theme/js/bootstrap.bundle.min.js"></script>
<script src="Theme/js/yii.js"></script>
<script src="Theme/js/jquery.pjax.js"></script>
<script src="Theme/js/script.js"></script>

<script>jQuery(function ($) {
    $('.view-phone').click(function(e){
        e.preventDefault();
        var obj = $(this);
        $.post('/ajax/view-phone', {type: obj.data('type'), id: obj.data('id')}, function(data){
           if (data.error) {
               obj.closest('.hidden-phone').replaceWith(data.text);
           } else {
               obj.parent().html(data.text);
           }
        });
    });
    jQuery('#w3').alert();
    jQuery('#w5').alert();
    $('#load').hide();
    $.toast = function(p){
        $.post('/ajax/alert', {type: p.type, body: p.body}, function(e){
            var o = $($.parseHTML(e));
            $('#toast').prepend(o);
            o.css({opacity: 0, marginTop: -o.outerHeight(true)}).animate({opacity: 1, marginTop: 0}, 400).delay(800).animate({opacity: 0}, 400, function(){ $(this).remove(); });
        });
    };
    });</script>

<script>


$('#show_n').click(function(){
    $('.hide_number').css('display', 'inline-block');
    $('.hide_number').show();    
  $('.show_number').hide();
})

$('#hide_n').click(function(){
  $('.hide_number').hide();
  $('.show_number').show();

})

$('#show_n_s').click(function(){
   
    $('.show_number_ses').hide();
    $('.hidden_alert').show();   
})

$('#send_com').click(function(){
  
    $user_id = $('#user_id').val();
    console.log($user_id);
    $comment = $('#comment').val();
    $tender_id = $('#tender_id').val();;
    $.post('server_tender.php', {"comment": $comment, "user": $user_id, "tender_id": $tender_id}, function(d){
       if(d == 1){
            setTimeout(() => {
                alert('Ваш комментарий успешно добавлен!');
                window.location = 'tenderDetails.php?id='+$tender_id;
            }, 2000);
            
       }
    })
})


</script>
</body>

</html>