<?php

session_start();
require_once 'function.php';

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Каталог мастеров и строительных компаний</title>

<meta property="og:title" content="Каталог мастеров и строительных компаний">
<meta property="og:description" content="Мастера и строители для качественного и недорого ремонта квартиры под ключ. Выбирайте лучших в нашем каталоге мастеров.">
<meta property="og:image" content="Theme/images/og-image.jpg">
<meta property="og:image:width" content="188">
<meta property="og:image:height" content="90">
<meta property="og:url" content="http://www.rabotniki.kz/catalog">
<meta property="og:type" content="website">
<meta property="og:site_name" content="SiteName.kz">

<link rel="apple-touch-icon" sizes="180x180" href="Theme/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="Theme/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="Theme/favicon/favicon-16x16.png">
<link rel="manifest" href="Theme/favicon/site.webmanifest">
<link rel="mask-icon" href="Theme/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


<link href=Theme/images/192.png">
<link rel="stylesheet" href="Theme/css/site.css">
<script type="text/javascript" async="" src="Theme/js/analytics.js"></script>


</head>



<body id="body">

<div id="load" class="lds-ring d-lg-none" style="display: none;">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- HEADER -->
    <header>
        <div class="container">
            <div class="row align-items-center d-none d-lg-flex">

                <!-- logo -->
                <div class="col-auto py-2 pr-0">
                    <a href="first.html"><img src="Theme/images/rabotniki.png" height="60" alt="SiteName.KZ"></a>            
                </div>
              
                    <div class="col-1 text-center p-0"> </div>

                <!-- Search -->
                <div class="col">
                    <form action="#tender" method="post">                
                        <div class="input-group">
                            <input id="need" name="need" type="text" class="form-control" placeholder="Что нужно сделать?">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Найти мастера</button>
                            </div>
                        </div>
                    </form>                
                    
                    <small class="text-muted">
                        Например: <a href="#" onclick="$('#need').val($(this).text()).focus(); return false;">Сделать ремонт в 1-к квартире</a>
                    </small>
                </div>

                <!-- Registration/LogIn -->
                <div class="col-auto">
                        <ul class="my-2 flex-column nav" style="width: 280px; margin-left: 1.2rem;">
                            <li class="nav-item text-center">
                                <a class="nav-link" href="register.html">
                                    <svg class="mr-2 i is-user-plus"><use xlink:href="#s-user-plus"></use></svg>Зарегистрироваться</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="login.html">
                                    <svg class="mr-2 i is-sign-in-alt"><use xlink:href="#s-sign-in-alt"></use></svg>Войти</a>
                                </li>
                        </ul>                           
                </div>

            </div>
        </div>
    </header>
    
<!--  MENU -->
<nav id="menu" class="navbar-main navbar-expand-lg navbar">
    <div class="container">
        <a class="navbar-brand" href="#">SiteName.KZ</a>
        <button type="button" class="navbar-toggler" data-toggle="offcanvas" aria-label="Toggle navigation">
            <svg class="i ir-bars"><use xlink:href="#r-bars"></use></svg>
        </button>
        
        <div class="navbar-content">
            <a class="btn btn-lg text-white px-3" href="login.html">
                <svg class="i is-sign-in-alt"><use xlink:href="#s-sign-in-alt"></use></svg>
            </a>
        </div>

        <div id="menu-collapse" class="offcanvas-collapse  navbar-collapse">
            <div class="d-lg-none">
                <div class="header-menu px-3 pt-3 pb-2 mb-2">
                    <div class="mt-1 mb-2">
                        <a class="h3 font-weight-bold" href="#">SiteName.KZ</a>
                    </div>
                    <a href="register.html">Регистрация</a> | 
                    <a href="login.html">Войти</a>
                </div>
                
                <ul class="nav">
                    <li class="nav-item">
                    <a class="text-secondary nav-link" href="https://#/tender/create">
                        <svg class="mr-3 mr-lg-2 i il-plus"><use xlink:href="#l-plus"></use></svg>Создать тендер</a>
                    </li>
                </ul>
            </div>
            
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="catalog.html">
                        <svg class="mr-3 mr-lg-2 i is-user-hard-hat"><use xlink:href="#s-user-hard-hat"></use></svg>
                        Работники
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://#/tenders">
                        <svg class="mr-3 mr-lg-2 i is-gavel"><use xlink:href="#s-gavel"></use></svg>
                        Тендеры
                    </a>
                </li>                   
                
            </ul>
            
            <hr class="my-2">

                <div class="d-lg-none middle">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link py-1 text-muted" href="https://#/faq">
                                Служба поддержки
                            </a>
                        </li>
                    </ul>
                </div>
                
                <hr class="my-2">
                
                <div class="d-lg-none text-center pt-3 pb-4">
                    <a href="#">
                        <img src="Theme/images/rabotniki.png" alt="" style="height: 50px;">
                    </a>
                </div>

        </div>
    </div>
</nav>



<div class="container pt-3 mb-5">
    <ol class="mb-3 breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="employeeProfile.html" itemprop="item"><span itemprop="name">Иванов Иван</span></a>
            <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="#" itemprop="item">
                <span itemprop="name">Фото работ</span>
            </a>
            <meta itemprop="position" content="3">
        </li>
    </ol>    
    
    
<h1 class="mb-4">Документы и лицензии</h1>


<div class="row">
   
     <?php  echo get_photos_docs($_GET['id']); ?>                                           
    </div>
</div>






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
      <script src="https://use.fontawesome.com/bf52149de2.js"></script>
      <script src="Theme/js/photo.js"></script>
      
      
      
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="r-sync-alt" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M483.515 28.485L431.35 80.65C386.475 35.767 324.485 8 256 8 123.228 8 14.824 112.338 8.31 243.493 7.971 250.311 13.475 256 20.301 256h28.045c6.353 0 11.613-4.952 11.973-11.294C66.161 141.649 151.453 60 256 60c54.163 0 103.157 21.923 138.614 57.386l-54.128 54.129c-7.56 7.56-2.206 20.485 8.485 20.485H492c6.627 0 12-5.373 12-12V36.971c0-10.691-12.926-16.045-20.485-8.486zM491.699 256h-28.045c-6.353 0-11.613 4.952-11.973 11.294C445.839 370.351 360.547 452 256 452c-54.163 0-103.157-21.923-138.614-57.386l54.128-54.129c7.56-7.56 2.206-20.485-8.485-20.485H20c-6.627 0-12 5.373-12 12v143.029c0 10.691 12.926 16.045 20.485 8.485L80.65 431.35C125.525 476.233 187.516 504 256 504c132.773 0 241.176-104.338 247.69-235.493.339-6.818-5.165-12.507-11.991-12.507z"/></symbol><symbol class="i-color" style="font-size: 70px; padding: 0 10px;" id="s-business-time" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><path fill="currentColor" d="M496 224c-79.59 0-144 64.41-144 144s64.41 144 144 144 144-64.41 144-144-64.41-144-144-144zm64 150.29c0 5.34-4.37 9.71-9.71 9.71h-60.57c-5.34 0-9.71-4.37-9.71-9.71v-76.57c0-5.34 4.37-9.71 9.71-9.71h12.57c5.34 0 9.71 4.37 9.71 9.71V352h38.29c5.34 0 9.71 4.37 9.71 9.71v12.58zM496 192c5.4 0 10.72.33 16 .81V144c0-25.6-22.4-48-48-48h-80V48c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h395.12c28.6-20.09 63.35-32 100.88-32zM320 96H192V64h128v32zm6.82 224H208c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h291.43C327.1 423.96 320 396.82 320 368c0-16.66 2.48-32.72 6.82-48z"/></symbol><symbol id="r-clock" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></symbol><symbol id="d-signal-3" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><defs></defs><path fill="currentColor" d="M472 96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16z" class="i-secondary"/><path fill="currentColor" d="M88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm256-192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm-128 96h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="d-signal-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><defs></defs><path fill="currentColor" d="M344 192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16z" class="i-secondary"/><path fill="currentColor" d="M88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="d-signal-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><defs></defs><path fill="currentColor" d="M616 16v480a16 16 0 0 1-16 16h-48a16 16 0 0 1-16-16V16a16 16 0 0 1 16-16h48a16 16 0 0 1 16 16z" class="i-secondary"/><path fill="currentColor" d="M216 288h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16zM88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm256-192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="s-star" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></symbol><symbol id="s-star-half-alt" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 536 512"><path fill="currentColor" d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"/></symbol><symbol id="r-star" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></symbol><symbol id="s-map-marker-alt" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></symbol><symbol id="s-shield-check" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zm-47.2 114.2l-184 184c-6.2 6.2-16.4 6.2-22.6 0l-104-104c-6.2-6.2-6.2-16.4 0-22.6l22.6-22.6c6.2-6.2 16.4-6.2 22.6 0l70.1 70.1 150.1-150.1c6.2-6.2 16.4-6.2 22.6 0l22.6 22.6c6.3 6.3 6.3 16.4 0 22.6z"/></symbol><symbol id="s-user-plus" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-sign-in-alt" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></symbol><symbol id="r-bars" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/></symbol><symbol id="l-plus" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"/></symbol><symbol id="s-user-hard-hat" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512"><path fill="currentColor" d="M88 176h272a8 8 0 0 0 8-8v-32a8 8 0 0 0-8-8h-8a112 112 0 0 0-68.4-103.2L256 80V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v64l-27.6-55.2A112 112 0 0 0 96 128h-8a8 8 0 0 0-8 8v32a8 8 0 0 0 8 8zm225.6 176h-16.7a174.08 174.08 0 0 1-145.8 0h-16.7A134.4 134.4 0 0 0 0 486.4 25.6 25.6 0 0 0 25.6 512h396.8a25.6 25.6 0 0 0 25.6-25.6A134.4 134.4 0 0 0 313.6 352zM224 320c65.22 0 118.44-48.94 126.39-112H97.61c7.95 63.06 61.17 112 126.39 112z"/></symbol><symbol id="s-gavel" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M504.971 199.362l-22.627-22.627c-9.373-9.373-24.569-9.373-33.941 0l-5.657 5.657L329.608 69.255l5.657-5.657c9.373-9.373 9.373-24.569 0-33.941L312.638 7.029c-9.373-9.373-24.569-9.373-33.941 0L154.246 131.48c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l5.657-5.657 39.598 39.598-81.04 81.04-5.657-5.657c-12.497-12.497-32.758-12.497-45.255 0L9.373 412.118c-12.497 12.497-12.497 32.758 0 45.255l45.255 45.255c12.497 12.497 32.758 12.497 45.255 0l114.745-114.745c12.497-12.497 12.497-32.758 0-45.255l-5.657-5.657 81.04-81.04 39.598 39.598-5.657 5.657c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l124.451-124.451c9.372-9.372 9.372-24.568 0-33.941z"/></symbol><symbol id="s-tags" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></symbol><symbol id="s-calculator" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512"><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></symbol><symbol id="s-briefcase" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></symbol><symbol id="s-user" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-comments" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"/></symbol><symbol id="s-question-circle" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"/></symbol></svg>
      
  
  
      </body>
      
  </html>    