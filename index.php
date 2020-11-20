<?php require_once 'Theme/blocks/header.php'; 
require 'function_index.php';
require 'function_tender.php';
?>
<?php


 ?>
<div class="home">


<!-- Baner -->
    <div style="height: 420px; background: url('Theme/images/baner/baner.jpg') center;">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-auto">
                    <div class="bg-black-50 px-4 px-sm-5 py-4 rounded-xl text-white text-center shadow lh-100">
                        <h1 class="font-size-3 text-shadow font-weight-bold lh-125 py-2">Сервис поиска мастеров</h1>
                        <div class="text-shadow h3 py-3">
                            <a class="text-nowrap text-white" href="catalog.php"><b><?php echo count_active_emp(); ?></b> строителей</a>          
                            <span class="d-none d-md-inline px-3">|</span>
                            <a class="text-nowrap text-white" href="tender.php"><b><?php echo count_tender(); ?></b> заказов</a>                   
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Baner end -->


<!-- Categoryes of services -->
<section id="categories" class="pt-3">
    <div class="container py-5 text-center">
        <div class="row mb-5">
        <?php echo services_index(); ?>
        </div>
        <a class="btn btn-outline-primary" href="catalog.php" rel="nofollow"><svg class="mr-2 i ir-sync-alt"><use xlink:href="#r-sync-alt" /></use></svg>Показать еще категории</a> 
    </div>
</section>
<!-- Categoryes of services end-->



<!-- Tenders -->
<section id="tenders" class="bg-ultra-light">
    <div class="container py-5">
        <h2 class="h1 mb-3 text-center h-underline h-underline-primary">Tендеры</h2>
        <div class="text-muted mb-4 text-center middle">
            <span class="text-nowrap"><b>2</b> всего тендеров,</span>
            <span class="text-nowrap"><b>2</b> актуальных,</span>
            <span class="text-nowrap"><b>0</b> завершенных</span>
        </div>


        <div class="row mb-3 justify-content-center">
            <div class="col-xl-9">

                <?php echo tender_index(); ?>

              
                        
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-primary" href="tender.php" rel="nofollow"><svg class="mr-2 i ir-sync-alt"><use xlink:href="#r-sync-alt" /></use></svg>Показать еще тендеры</a>       
         </div>

    </div>
</section>
<!-- Tenders end -->


<!-- Employees -->
<section id="builders">
    <div class="container py-5">
        <h2 class="h1 mb-3 text-center h-underline h-underline-primary">Строители</h2>
        <div class="text-muted mb-4 text-center middle">            
            <span class="text-nowrap"><b><?php echo count_active_emp(); ?></b> мастеров</span>
        </div>


        <div class="row mb-3 justify-content-center">
            <div class="col-xl-9">
               <?php echo index_rabotniki(); ?>             
                <!-- DELETE this end-->
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-primary" href="catalog.php" rel="nofollow"><svg class="mr-2 i ir-sync-alt"><use xlink:href="#r-sync-alt" /></use></svg>Показать еще строителей</a>     
        </div>

    </div>
</section>
<!-- Employees end -->



<!-- About company -->
<section id="about" class="bg-ultra-light">
    <div class="container py-5">
        <h2 class="h1 mb-5 text-center h-underline h-underline-primary">О сервисе</h2>
        <div class="small text-muted">
            <p>Как часто перед ремонтом мы себе задаем вопросы: &laquo;Где&nbsp;найти строителей?&raquo; или &laquo;Где&nbsp;найти бригаду?&raquo; И порой ответить на эти вопросы очень сложно, ведь&nbsp;стоимость ремонта квартиры&nbsp;как и&nbsp;цены на ремонтные работы&nbsp;у всех разные.</p>

            <p>Теперь Вам не придётся тратить время на поиски хороших специалистов в сфере строительства или ремонта. Мы поможем Вам найти лучших! Пользоваться нашими услугами очень просто &ndash; Вы создаёте&nbsp;тендер на строительные работы&nbsp;или&nbsp;тендер по ремонту квартиры, а дальше мастера сами найдут Вас и предложат свои услуги.</p>

            <p>Вас больше не будет мучать вопрос: &laquo;Где найти строительную бригаду?&raquo; Вы не потратите для поиска никаких усилий -&nbsp;строительный тендер&nbsp;лучшее решение: работники свяжутся с Вами и предложат свои услуги. Всё удобно и просто! К тому же&nbsp;строительные тендеры&nbsp;лучший способ получить минимальную цену.<br />
            &nbsp;</p>

            <h2>Ремонт квартиры</h2>

            <p>К сожалению в настоящее время найти хороших мастеров для ремонтных работ очень сложно. Много хороших строителей уехало за границу, а оставшиеся не всегда справляются со своими задачами. Наш сайт поможет Вам с поиском бригады и компании. Мы являемся главным строительным сайтом страны и абсолютно все мастера имеют у нас свою страницу. Про каждого матсера можно прочитать отзывы и понять, насколько качтвенно он работает. Все наши отзывы тщательно проверяются и мы гарантируем их достоверность. Вместе&nbsp; с отзывами Вы найдете портфолио работ и примеры выполненных заказов по ремонту. Мастера публикуют фото квартир, офисов и это поможет Вам оценить их професионализм.</p>

            <p>Также на&nbsp;www.rabotniki.ua&nbsp;Вы сможете найти&nbsp;расценки на ремонт квартир&nbsp;и&nbsp;цены на строительство, просмотреть портфолио с уже существующими работами мастеров необходимого вам профиля.</p>

            <p>И ещё одна эксклюзивная услуга -&nbsp;домашний мастер&nbsp;или как ее часто называют &laquo;муж на час&raquo;! Воспользовавшись ею, Вы найдёте мастера &laquo;на все руки&raquo;, т.е. человека, который выполните необходимые мелкие домашние работы широкого спектра. Поиск домашнего мастера по принципу поиска очень напоминает&nbsp;тендеры на строительство&nbsp;или&nbsp;тендеры на ремонт.</p>

            <p>Строительные бригады&nbsp;и мастеров мы тоже можем порадовать - частично бесплатные тендеры, такого нигде не найдешь. Отзывайтесь активно на заявки, помогайте людям&nbsp;найти бригаду&nbsp;либо найти работника на&nbsp;строительство дома&nbsp;и Ваш рейтинг на сайте будет повышаться с каждым днем.</p>
        </div>

        <div class="page-text mt-5"></div>

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
</section>
<!-- About company end  -->


</div>



    <!-- Support button -->
    <a class="btn btn-primary position-fixed d-none d-lg-inline-block" href="#" style="bottom: 0; right: 0; z-index: 1040;"><svg class="mr-2 i is-question-circle"><use xlink:href="#s-question-circle"></use></svg>Служба поддержки</a>
   
    <?php require_once 'Theme/blocks/footer.php'; ?>