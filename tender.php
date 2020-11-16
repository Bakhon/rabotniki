
<?php require_once 'Theme/blocks/header_tender.php'; 
      require_once 'function_tender.php';
?>


<div class="container pt-3 mb-5">
        <h1 class="mb-2 text-center text-md-left">Строительные тендеры и заказы на ремонт</h1>

<div data-move-to="count"></div>

<div class="row d-lg-block">
    <div class="col-lg-4 float-lg-right">
        <div class="card mb-3 d-none d-lg-block shadow-sm">
            <div class="card-body">
                <div class="text-center">
                    <a class="btn btn-secondary btn-lg" href="tenderAdd.php"><svg class="mr-1 i il-plus"><use xlink:href="#l-plus" /></use></svg>Создать тендер</a>                </div>
            </div>
        </div>

        <div class="row d-lg-none mt-3 mb-3">
            <div class="col pr-2">
                <button type="button" class="btn btn-primary btn-block open-filter"><svg class="mr-1 pt-1 i is-filter"><use xlink:href="#s-filter" /></use></svg>Фильтры</button>            </div>
            <div class="col-auto pl-2">
                <a class="btn btn-secondary btn-block" href="tenderAdd.php"><svg class="mr-1 i ir-plus"><use xlink:href="#r-plus" /></use></svg>Создать тендер</a>            </div>
        </div>

        <div class="collapse filter-collapse d-lg-block">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form class="form-group m-0" method="get">                    
                        <label class="d-none d-lg-block">Поиск по всем тендерам</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="search" name="search" value="" maxlength placeholder="№ тендера или название">                        <div class="input-group-append">
                                <!-- <button type="submit" class="btn btn-primary">Найти</button>  -->    
                                <a href="tendersearch.html"  class="btn btn-primary">Найти</a>                 
                            </div>
                        </div>
                    </form>
                    

                    <form id="filterTenders" class="mt-3" action="/tenders" method="post">
                            <!--  Показать тендеры -->
                       

                            <!--  Бюджет -->
                            <div class="form-group field-tendersearch-budget">
                                <label>Бюджет</label>
                                <input type="hidden" name="" value="">
                                <div id="tendersearch-budget"><div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i31" class="custom-control-input check_price" name="TenderSearch[budget]" value="50000">
                                <label class="custom-control-label" for="i31">до 50 000 тнг</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i32" class="custom-control-input check_price" name="TenderSearch[budget]" value="150000">
                                <label class="custom-control-label" for="i32">от 50 000 до 150 000 тнг</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i33" class="custom-control-input check_price" name="TenderSearch[budget]" value="300000">
                                <label class="custom-control-label" for="i33">от 150 000 до 300 000 тнг</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i34" class="custom-control-input check_price" name="TenderSearch[budget]" value="500000">
                                <label class="custom-control-label" for="i34">от 300 000 до 500 000 тнг</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i35" class="custom-control-input check_price" name="TenderSearch[budget]" value="500001">
                                <label class="custom-control-label" for="i35">свыше 500 000 тнг</label>
                                <div class="invalid-feedback"></div>
                                </div>
                                </div>

                            </div>


                            <!-- Заказчик -->
                            <div class="form-group field-tendersearch-customer">
                                <label>Заказчик</label>
                                <input type="hidden" name="TenderSearch" value=""><div id="tendersearch-customer">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="i36" class="custom-control-input check_customer" name="TenderSearch[customer]" value="1">
                                    <label class="custom-control-label" for="i36">Владелец (или его представитель)</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i37" class="custom-control-input check_customer" name="TenderSearch[customer]" value="2">
                                <label class="custom-control-label" for="i37">Подрядчик (ищу на субподряд)</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i38" class="custom-control-input check_customer" name="TenderSearch[customer]" value="3">
                                <label class="custom-control-label" for="i38">Посредник (без процента)</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="i39" class="custom-control-input check_customer" name="TenderSearch[customer]" value="4">
                                <label class="custom-control-label" for="i39">Посредник (с процентом)</label>
                                <div class="invalid-feedback"></div>
                                </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="filterReset" class="btn btn-outline-primary hidden" name="reset">Сбросить фильтр</button>
                                <button type="button" class="btn btn-secondary close-filter d-lg-none mt-3">Свернуть фильтр</button>                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-8 order-lg-first float-lg-left">
        <div class="filters hidden">
            <div class="card mb-4 shadow-sm">
                <div class="card-body pb-3">
                    <b class="d-block mb-2 d-lg-inline">Вы выбрали:</b>
                    <span class="filter-items"></span><button type="button" class="btn btn-sm btn-primary btn-filter-more mr-1 hidden">Показать еще (<span>0</span>)</button><span class="filter-more hidden"></span><button type="button" class="btn btn-sm btn-outline-secondary btn-filter-reset mr-1">Очистить</button>                </div>
            </div>
        </div>

        <div data-move-from="count" class="text-center">
            <div class="mb-3 text-muted">
                Всего найдено <b class="tender-count"><?php echo count_tender(); ?></b> тендеров.            </div>
        </div>

        <div id="pjaxTenders" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">                                
            <script>
                countCategory = parseInt('0');
                countRegion = parseInt('0');
                if (window.jQuery) {
                    $('.tender-count').text(96950);
                }
            </script>



<div class="list-view">
    <input type="hidden" id="page" value="<?php echo $_GET['page']; ?>" />
  <?php echo get_tender($_GET['page']); ?>
    <!-- DELETE this end-->
    <!-- Pages -->
   <?php echo nav_tender($_GET['page']); ?>

</div>



 </div>
       

</div>
    


<div class="clearfix"></div>
</div>



<!-- Info -->
<div class="page-text mt-5">    
    <h2>Строительные заказы без посредников</h2>
    <p>Вам больше не придется сталкиваться с посредничеством, так как мы работаем с заказчиками исключительно напрямую. Большой опыт в данной сфере позволяет формировать для наших клиентов все больше выгодных предложений. Благодаря нашему сайту бригады могут в самостоятельном порядке найти заказ на строительство и ремонт от частного лица или оставить свою заявку на поиск субподрядчиков. В какой то мере нас можно назвать биржей заказов.</p>
    <h2>Как участвовать в тендерах</h2>
    <p>Для того, чтобы поиск строительных заказовне занял много вашего время, советуем Вам ознакомиться с Правилами нашего сайта и посмотреть, как создают Заказы другие люди и как мастера на них отвечают. Все наши заказы одобряются врчуную, поэтому Вы встретите рекламу и прочую не нужную информацию. Давая ответ на тендер, опишите, как можно детальнее Ваше преложение, чтобы заказчик проявил к нему интерес.</p>
</div>


<!-- Partners -->
<div id="w12" class="mb-4 pt-3 text-center">
    <div class="row justify-content-center">
        <div class="col-auto h5 mb-0 pt-2">Наши партнеры</div>
        <div class="col-auto">
            <div class="row">     
                <div class="col mt-2 mt-sm-0"><img src="Theme/images/stroimdom.png" height="32" alt="Строим Дом"></div>
            </div>
        </div>
    </div>
</div>


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



<div id="toast"></div><div class="modal modal-load fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>                                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="r-times" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"/></symbol><symbol id="l-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"/></symbol><symbol id="s-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"/></symbol><symbol id="r-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"/></symbol><symbol id="s-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"/></symbol><symbol id="s-caret-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"/></symbol><symbol class="i-color" style="--i-primary-color: white;" id="d-info-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path fill="currentColor" d="M256 8C119 8 8 119.08 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 110a42 42 0 1 1-42 42 42 42 0 0 1 42-42zm56 254a12 12 0 0 1-12 12h-88a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h12v-64h-12a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h64a12 12 0 0 1 12 12v100h12a12 12 0 0 1 12 12z" class="i-secondary"/><path fill="currentColor" d="M256 202a42 42 0 1 0-42-42 42 42 0 0 0 42 42zm44 134h-12V236a12 12 0 0 0-12-12h-64a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h12v64h-12a12 12 0 0 0-12 12v24a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12v-24a12 12 0 0 0-12-12z" class="i-primary"/></symbol><symbol class="i-color" style="font-size: 70px; padding: 0 10px;" id="s-business-time" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M496 224c-79.59 0-144 64.41-144 144s64.41 144 144 144 144-64.41 144-144-64.41-144-144-144zm64 150.29c0 5.34-4.37 9.71-9.71 9.71h-60.57c-5.34 0-9.71-4.37-9.71-9.71v-76.57c0-5.34 4.37-9.71 9.71-9.71h12.57c5.34 0 9.71 4.37 9.71 9.71V352h38.29c5.34 0 9.71 4.37 9.71 9.71v12.58zM496 192c5.4 0 10.72.33 16 .81V144c0-25.6-22.4-48-48-48h-80V48c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h395.12c28.6-20.09 63.35-32 100.88-32zM320 96H192V64h128v32zm6.82 224H208c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h291.43C327.1 423.96 320 396.82 320 368c0-16.66 2.48-32.72 6.82-48z"/></symbol><symbol id="r-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></symbol><symbol id="d-signal-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M472 96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16z" class="i-secondary"/><path fill="currentColor" d="M88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm256-192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm-128 96h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="r-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"/></symbol><symbol id="r-file-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"/></symbol><symbol id="d-signal-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M344 192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16z" class="i-secondary"/><path fill="currentColor" d="M88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="d-signal-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M616 16v480a16 16 0 0 1-16 16h-48a16 16 0 0 1-16-16V16a16 16 0 0 1 16-16h48a16 16 0 0 1 16 16z" class="i-secondary"/><path fill="currentColor" d="M216 288h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16zM88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm256-192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zm128-96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="d-signal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><defs></defs><path fill="currentColor" d="M216 288h-48a16 16 0 0 0-16 16v192a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V304a16 16 0 0 0-16-16zM88 384H40a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm256-192h-48a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V208a16 16 0 0 0-16-16zM600 0h-48a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16zM472 96h-48a16 16 0 0 0-16 16v384a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16z" class="i-primary"/></symbol><symbol id="s-user-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-sign-in-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></symbol><symbol id="r-bars" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/></symbol><symbol id="s-user-hard-hat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M88 176h272a8 8 0 0 0 8-8v-32a8 8 0 0 0-8-8h-8a112 112 0 0 0-68.4-103.2L256 80V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v64l-27.6-55.2A112 112 0 0 0 96 128h-8a8 8 0 0 0-8 8v32a8 8 0 0 0 8 8zm225.6 176h-16.7a174.08 174.08 0 0 1-145.8 0h-16.7A134.4 134.4 0 0 0 0 486.4 25.6 25.6 0 0 0 25.6 512h396.8a25.6 25.6 0 0 0 25.6-25.6A134.4 134.4 0 0 0 313.6 352zM224 320c65.22 0 118.44-48.94 126.39-112H97.61c7.95 63.06 61.17 112 126.39 112z"/></symbol><symbol id="s-gavel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.971 199.362l-22.627-22.627c-9.373-9.373-24.569-9.373-33.941 0l-5.657 5.657L329.608 69.255l5.657-5.657c9.373-9.373 9.373-24.569 0-33.941L312.638 7.029c-9.373-9.373-24.569-9.373-33.941 0L154.246 131.48c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l5.657-5.657 39.598 39.598-81.04 81.04-5.657-5.657c-12.497-12.497-32.758-12.497-45.255 0L9.373 412.118c-12.497 12.497-12.497 32.758 0 45.255l45.255 45.255c12.497 12.497 32.758 12.497 45.255 0l114.745-114.745c12.497-12.497 12.497-32.758 0-45.255l-5.657-5.657 81.04-81.04 39.598 39.598-5.657 5.657c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l124.451-124.451c9.372-9.372 9.372-24.568 0-33.941z"/></symbol><symbol id="s-tags" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></symbol><symbol id="s-calculator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></symbol><symbol id="s-briefcase" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></symbol><symbol id="s-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-comments" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"/></symbol><symbol id="s-question-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"/></symbol></svg><script async src="https://www.googletagmanager.com/gtag/js?id=UA-44582743-1"></script>
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
<script src="Theme/js/select2-krajee.min.js"></script>
<script src="Theme/js/kv-widgets.min.js"></script>
<script src="Theme/js/select2.full.min.js"></script>


<script>

   $('#search').keyup(function(){
             var title = $(this).val();   
             var tender_id = $(this).val();   
             var page_id = $('#page').val();       
            $.post('server_tender.php', {"title": title, "tender_id": tender_id, "page_id": page_id}, function(d){
                if(d){
                $('.list-view').html(d);
                }else {
                    $('.list-view').text('Ничего не найдено!'); 
                }
            })        
        })

$('.check_price').click(function(){
    var checkboxes = [];
    var page_id = $('#page').val();  
  $('input[name="TenderSearch[budget]"]:checked').each(function(){
    //добавляем значение каждого флажка в этот массив
    checkboxes.push(this.value);
  });

  $.post('server_tender.php', {"budget": checkboxes, "page_id": page_id}, function(d){
    if(d){
                $('.list-view').html(d);
                }else {
                    $('.list-view').text('Ничего не найдено!'); 
                }
  })
})


$('.check_customer').click(function(){
    var list_customer = [];
    var page_id = $('#page').val();  
  $('input[name="TenderSearch[customer]"]:checked').each(function(){
    //добавляем значение каждого флажка в этот массив
    list_customer.push(this.value);
    console.log(list_customer);
  });
 
  $.post('server_tender.php', {"customer": list_customer, "page_id": page_id}, function(d){
    if(d){
                $('.list-view').html(d);
                }else {
                    $('.list-view').text('Ничего не найдено!'); 
                }
  })
})



</script>


<script>jQuery(function ($) {








$('*[data-choose-close]').click(function(){
    $('#choose-' + $(this).attr('data-choose-close')).fadeOut();
});
$(document).on('click', '.filter button', function(){
    var sid = $(this).attr('data-select-id');
    if (sid) {
        $('#' + sid + ' option[value="' + $(this).data('value') + '"]').prop('selected', false).closest('select').trigger('change');
    } else {
        $('#' + $(this).data('checked-id')).prop('checked', false);
        var did = $(this).data('checked-default');
        if (did) {
            $('#' + did).click().prop('checked', true);
        } else {
            inputChange();
        }
    }
});


$(document).on('click', '.btn-filter-reset', function(){
    $('#filterReset').click();
});


function filterGenerate(formName) {
    const n = 10;
    var icon = '<svg class="i ir-times"><use xlink:href="#r-times" /></use></svg>';
    var obj, radio, option, def, close, text, div = null;
    var f = $('.filters');
    var count = 0;
    var parent_region = 0;
    var parent_category = 0;
    var btnMore = $('.btn-filter-more');
    f.find('.filter-items').empty();
    f.find('.filter-more').empty();
    $('input[name^="' + formName + '"][type="checkbox"]:checked, input[name^="' + formName + '"][type="radio"], select[name^="' + formName + '"] option:selected').each(function(){
        obj = $(this);
        radio = obj.attr('type') === 'radio';
        option = obj.is('option');
        
        if (radio) {
            if (obj.val() === '0') {
                def = obj.attr('id');
                return;
            } else if (obj.prop('checked') && obj.val() === '2') {
                if (obj.is('[name*="region"]')) {
                    parent_region = 1;
                    return;
                } else if (obj.is('[name*="category"]')) {
                    parent_category = 1;
                    return;
                }
            }
        }
        
        if ((!radio || obj.prop('checked')) && (parent_category || !obj.closest('#choose-category').length) && (parent_region || !obj.closest('#choose-region').length)) {
            close = $('<button/>').html(icon);
            option ? close.attr('data-value', obj.attr('value')).attr('data-select-id', obj.closest('select').attr('id')) : close.attr('data-checked-id', obj.attr('id'));
            if (radio) {
                close.attr('data-checked-default', def);
            }
            text = option ? obj: obj.parent();
            div = $('<div/>').addClass('filter').text(text.text() .trim()).append(close);
            count++;
            if (count > n) {
                f.find('.filter-more').append(div);
            } else {
                f.find('.filter-items').append(div);
            }
        }
    });
    if (count) {
        $('.filter-notice').show().removeClass('hidden');
        f.show().removeClass('hidden');
        $('#filterReset').show().removeClass('hidden');
    } else {
        $('.filter-notice').hide().addClass('hidden');
        f.hide().addClass('hidden');
        $('#filterReset').hide().addClass('hidden');
    }
    if (!f.find('.filter-more').is(':visible')) {
        count > 10 ? btnMore.show().removeClass('hidden').click(function(){ $(this).hide().addClass('hidden').next().fadeIn(); }).find('span').text(count - n) : btnMore.hide();
    }
}




function showChooseButton() {
    var chooseCategory = $('*[data-choose="category"]');
    var chooseRegion = $('*[data-choose="region"]');
    countCategory ? chooseCategory.show().removeClass('hidden').find('span').text(countCategory) : chooseCategory.hide().addClass('hidden');
    countRegion ? chooseRegion.show().removeClass('hidden').find('span').text(countRegion) : chooseRegion.hide().addClass('hidden');
}

filterGenerate('TenderSearch');
showChooseButton();
$('.open-filter').click(function(){
    $('.filter-collapse').fadeToggle();
});
$('.close-filter').click(function(){
    $('.filter-collapse').fadeToggle();
});




});

</script>

</body>

</html>
