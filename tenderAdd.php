
<?php require_once 'Theme/blocks/header_tender.php'; 
      require_once 'function_tender.php';
      print_r($_SESSION);
?>





<div class="container pt-3 mb-5">
    <ol class="mb-3 breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="/tender" itemprop="item"><span itemprop="name">Тендеры</span>
            </a><meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <link href="/tender/create" itemprop="item">
            <span itemprop="name">Создание тендера</span>
            <meta itemprop="position" content="3">
        </li>
    </ol>    
    
    <div class="row mt-3">
    <div class="col">

                
        <form id="tender" action="" method="post" enctype="multipart/form-data">
            <!-- Info -->
            <div class="card border-2 border-primary mb-4">
                <div class="card-body pl-0 pl-sm-2">
                    <ul class="m-0">
                        <li>Поиск мастеров осуществляется бесплатно среди 40 000 строителей.</li>
                        <li>Заполните заявку и тут же строители начнут присылать вам свои предложения.</li>
                        <li>Вам остается лишь выбрать лучших.</li>
                    </ul>
                </div>
            </div>

            <div class="title bg-light text-dark h5 mb-4">Описание заказа</div>
  <input type="hidden" id="hidden_id_tender" value = <?php echo mt_rand(1, 999999); ?> />

            <!-- Объект находится -->
            <div class="form-group row required">
                <label class="col-sm-3">
                    Объект находится    </label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm">
                           <!--  <div class="kv-plugin-loading loading-tender-city_id">&nbsp;</div> -->
                             <!--  ddl   -->

                             
                             <select id="tender-city" class="select2-up form-control" >
                                <?php echo get_cities(); ?>
                                
                                
                            </select>

                            <div class="invalid-feedback ">Необходимо заполнить поле</div>  
                        </div>
                        <div class="col-sm">
                            <input type="text" required="" id="tender-address" class="form-control mt-2 mt-sm-0" name="Tender[address]" placeholder="Введите район или адрес">            
                        </div>
                    </div>
                </div>
            </div>


            <!-- Мне нужны  --> 
            <div class="row form-group">
                <div class="col-sm-3 required">
                    <label> Мне нужны  </label>
                </div>
                <div class="col-sm-9">
                    <div>
                 <?php echo dic_need(); ?>
                       
                    </div>    
                </div>
            </div>


           <!--  Заголовок тендера -->
            <div class="form-group row field-tender-title required">
                <label class="col-sm-3" for="tender-title">Заголовок тендера</label>
                <div class="col-sm-9">
                    <input value="<?php echo $_POST['Tender[title]']; ?>" type="text" id="tender-title" class="form-control" name="Tender[title]" maxlength="70" aria-required="true">
                    <div class="invalid-feedback "></div>
                    <small class="form-text text-muted ">Например: Укладка 100 кв.м. тротуарной плитки на бетонное основание</small>
                </div>
            </div>

            <!-- Подробное описание -->
            <div class="form-group row field-tender-text required">
                <label class="col-sm-3" for="tender-text">Подробное описание</label>
                <div class="col-sm-9">
                   <!--  <textarea id="tender-text" class="form-control" name="Tender[text]" placeholder="Максимально подробно опишите перечень работ (площадь, объем, сроки)" aria-required="true"></textarea> -->
                    <textarea id="editor1" name="editor1" laceholder="Максимально подробно опишите перечень работ (площадь, объем, сроки)"></textarea>
                    <script>
                            CKEDITOR.replace( 'editor1' );
                    </script>
                    <div class="invalid-feedback "></div>
                </div>
            </div>

            <!-- UploadFiles -->
            <div class="form-group row field-uploadfiles-files">
                <div class="col-sm-9 offset-sm-3">
                    <input type="hidden" name="UploadFiles[files][]" value=""><input type="file" id="uploadfiles-files" class="file-loading" name="UploadFiles[files][]" multiple data-krajee-fileinput="fileinput_394134ed">
                    <!--[if lt IE 10]><br><div class="alert alert-warning"><strong>Примечание:</strong> Ваш браузер не поддерживает предварительный просмотр и множественную загрузку файлов. Попробуйте более новую версию или другой браузер, чтобы получить доступ к этим функциям.</div><script>document.getElementById("uploadfiles-files").className.replace(/\bfile-loading\b/,"");;</script><![endif]--><svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="s-folder-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z"/></symbol><symbol id="d-upload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path fill="currentColor" d="M488 351.92H352v8a56 56 0 0 1-56 56h-80a56 56 0 0 1-56-56v-8H24a23.94 23.94 0 0 0-24 24v112a23.94 23.94 0 0 0 24 24h464a23.94 23.94 0 0 0 24-24v-112a23.94 23.94 0 0 0-24-24zm-120 132a20 20 0 1 1 20-20 20.06 20.06 0 0 1-20 20zm64 0a20 20 0 1 1 20-20 20.06 20.06 0 0 1-20 20z" class="i-secondary"/><path fill="currentColor" d="M192 359.93v-168h-87.7c-17.8 0-26.7-21.5-14.1-34.11L242.3 5.62a19.37 19.37 0 0 1 27.3 0l152.2 152.2c12.6 12.61 3.7 34.11-14.1 34.11H320v168a23.94 23.94 0 0 1-24 24h-80a23.94 23.94 0 0 1-24-24z" class="i-primary"/></symbol><symbol id="s-times" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></symbol><symbol id="r-arrows" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M360.549 412.216l-96.064 96.269c-4.686 4.686-12.284 4.686-16.971 0l-96.064-96.269c-4.686-4.686-4.686-12.284 0-16.971l19.626-19.626c4.753-4.753 12.484-4.675 17.14.173L230 420.78h2V280H91.22v2l44.986 41.783c4.849 4.656 4.927 12.387.173 17.14l-19.626 19.626c-4.686 4.686-12.284 4.686-16.971 0L3.515 264.485c-4.686-4.686-4.686-12.284 0-16.971l96.269-96.064c4.686-4.686 12.284-4.686 16.97 0l19.626 19.626c4.753 4.753 4.675 12.484-.173 17.14L91.22 230v2H232V91.22h-2l-41.783 44.986c-4.656 4.849-12.387 4.927-17.14.173l-19.626-19.626c-4.686-4.686-4.686-12.284 0-16.971l96.064-96.269c4.686-4.686 12.284-4.686 16.971 0l96.064 96.269c4.686 4.686 4.686 12.284 0 16.971l-19.626 19.626c-4.753 4.753-12.484 4.675-17.14-.173L282 91.22h-2V232h140.78v-2l-44.986-41.783c-4.849-4.656-4.927-12.387-.173-17.14l19.626-19.626c4.686-4.686 12.284-4.686 16.971 0l96.269 96.064c4.686 4.686 4.686 12.284 0 16.971l-96.269 96.064c-4.686 4.686-12.284 4.686-16.971 0l-19.626-19.626c-4.753-4.753-4.675-12.484.173-17.14L420.78 282v-2H280v140.78h2l41.783-44.986c4.656-4.849 12.387-4.927 17.14-.173l19.626 19.626c4.687 4.685 4.687 12.283 0 16.969z"/></symbol><symbol id="s-redo-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256.455 8c66.269.119 126.437 26.233 170.859 68.685l35.715-35.715C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.75c-30.864-28.899-70.801-44.907-113.23-45.273-92.398-.798-170.283 73.977-169.484 169.442C88.764 348.009 162.184 424 256 424c41.127 0 79.997-14.678 110.629-41.556 4.743-4.161 11.906-3.908 16.368.553l39.662 39.662c4.872 4.872 4.631 12.815-.482 17.433C378.202 479.813 319.926 504 256 504 119.034 504 8.001 392.967 8 256.002 7.999 119.193 119.646 7.755 256.455 8z"/></symbol><symbol id="s-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></symbol><symbol id="s-file" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></symbol></svg>
                    <input type="file" id="myFile" name="filename">
                    <div class="invalid-feedback "></div>
                    <small class="form-text text-muted ">jpg, jpeg, png, pdf, xlsx, xls, doc, docx, zip, rar</small>
                </div>
            </div>


            <div class="title bg-light text-dark h5 my-4">Важная информация</div>

            <!-- Категории -->
            <div class="row form-group mb-5">
                <div class="col-sm-3 required">
                    <label> Категории</label>
                    <small class="form-text text-muted mb-2 mt-n2 m-sm-0">Выберите типы работ. Максимум 5</small>
                </div>

                <div class="col-sm-9">
                    <div id="category"></div>
                    <button type="button" class="btn btn-primary more-category">Выбрать другую категорию</button>
                    <input type="hidden" name="Tender[category_ids]" value="">
                        <div class="accordion collapse mb-2 position-relative">
                            
                            
                            <div class=" border rounded mb-2 shadow-sm bg-light-grey">
                            <?php echo dic_category(); ?>       
                            </div>

                         
                            <!-- DELETE this end-->

                        </div>       
                        <button type="button" class="btn btn-primary ok-category collapse">Сохранить</button>
                </div>
            </div>


            <!-- Кто Вы -->
            <div class="form-group row field-tender-customer required">
                <label class="col-sm-3">Кто Вы</label>
                <div class="col-sm-9">
                    <input type="hidden" name="Tender[customer]" value="">
                    <div id="tender-customer" role="radiogroup" aria-required="true">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="i0" class="custom-control-input" name="optradio" value="1">
                            <label class="custom-control-label" for="i0">Владелец (или его представитель)</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="i1" class="custom-control-input" name="optradio" value="2">
                            <label class="custom-control-label" for="i1">Подрядчик (ищу на субподряд)</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="i2" class="custom-control-input" name="optradio" value="3">
                            <label class="custom-control-label" for="i2">Посредник (без процента)</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="i3" class="custom-control-input" name="optradio" value="4">
                            <label class="custom-control-label" for="i3">Посредник (с процентом)</label>
                            <div class="invalid-feedback "></div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Бюджет  --> 
            <div class="form-group row required">
                <label class="col-sm-3"> Бюджет    </label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <input value="<?php echo $_POST['Tender[budget]'] ?>" type="text" id="tender-budget" class="form-control w-100px" name="Tender[budget]">           
                         <div class="input-group-append">
                            <span class="input-group-text">тнг</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="title bg-light text-dark h5 my-4 mx-n2 pl-3 pr-0 mx-sm-0 px-sm-4">Дополнительная информация</div>
           

            <!-- Когда можно начать -->
            <div class="form-group row field-tender-start">
                <label class="col-sm-3" for="tender-start">Когда можно начать</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><svg class="i is-calendar-alt"><use xlink:href="#s-calendar-alt" /></use></svg></span>
                        </div>
                        <!-- <input type="text" id="tender-start" class="form-control w-150px krajee-datepicker" name="Tender[start]" value="29.08.2020" data-datepicker-source="tender-start" data-datepicker-type="1" > -->
                        <input <?php echo $_POST['date_start']; ?> name="date_start" type="text" id="datetimepicker1" class="form-control w-150px krajee-datepicker"> 
                    </div>
                    <div class="invalid-feedback"></div>
                    <div class="invalid-feedback "></div>
                </div>
            </div>

            

          

            <!-- Нужно закончить до -->
            <div class="form-group row field-tender-finish">
                <label class="col-sm-3" for="tender-finish">Нужно закончить до</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><svg class="i is-calendar-alt"><use xlink:href="#s-calendar-alt" /></use></svg></span>
                        </div>
                        <input name="<?php echo $_POST['date_finish']; ?>" name="date_finish" type="text" id="datetimepicker2" class="form-control w-150px krajee-datepicker"> 
                    </div>
                    <div class="invalid-feedback"></div>
                    <div class="invalid-feedback "></div>
                </div>
            </div>

            <!-- Заявка действительна -->
            <div class="form-group row field-tender-expired">
                <label class="col-sm-3" for="tender-expired">Заявка действительна</label>
                <div class="col-sm-9">
                    <select id="tender-expired" class="form-control w-200px" name="Tender[expired]">
                        <option value="3">3 дня</option>
                        <option value="7" selected>1 неделя</option>
                        <option value="14">2 недели</option>
                        <option value="21">3 недели</option>
                        <option value="28">4 недели</option>
                    </select>
                    <div class="invalid-feedback "></div>
                    <small class="form-text text-muted ">Заявка (тендер) автоматически закроется через это время.</small>
                </div>
            </div>



            <div class="title bg-light text-dark h5 my-4">Контактная информация</div>

            <!-- Ваше имя -->
            <div class="form-group row field-signup-username required">
                <label class="col-sm-3" for="signup-username">Ваше имя</label>
                <div class="col-sm-9">
                    <input name="<?php $_POST['Signup[username]']; ?>"  type="text" id="signup-username" class="form-control w-250px" name="Signup[username]" aria-required="true">
                    <div class="invalid-feedback "></div>
                </div>
            </div>

           <!--  Телефон для входа -->
            <div class="form-group row field-signup-phone required">
                <label class="col-sm-3" for="signup-phone">Телефон для входа</label>
                <div class="col-sm-9">
                    <input type="text" id="phone1" class="form-control w-250px"   aria-required="true">
                    <div class="invalid-feedback "></div>
                    <small class="form-text text-muted ">На этот номер будет отправлено СМС с кодом или голосовое сообщение.</small>
                </div>
            </div>

            <!-- checkbox -->
            <div class="form-group row mt-n2 mb-4 field-tender-showphone">
                <div class="col-sm-9 offset-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Tender[showPhone]" value="0"><input type="checkbox" id="tender-showphone" class="custom-control-input" name="tender-showphone" value="1" >
                        <label class="custom-control-label" for="tender-showphone">Показать этот телефон на странице тендера для связи со мной</label>
                        <div class="invalid-feedback "></div>
                    </div>
                </div>
            </div>

           <!--  Согласен с правилами сайта -->
            <div class="form-group row mb-2 field-signup-agreement required">
                <div class="col-sm-9 offset-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Signup[agreement]" value="0"><input type="checkbox" id="signup-agreement" class="custom-control-input" name="Signup[agreement]" value="1">
                        <label class="custom-control-label" for="signup-agreement">Согласен с правилами сайта</label>
                        <div class="invalid-feedback "></div>
                        <small class="form-text text-muted ">Если Вы согласны с <a href="#" target="_blank">Правилами пользования</a> сервисом (сайтом) и обязуетесь их соблюдать, а также согласны с обработкою Ваших данных, поставьте "галочку".</small>
                    </div>
                </div>
            </div>


            <!-- Сохранить -->
            <div class="row">
                <div class="col-sm-9 offset-sm-3">
                    <input type="hidden" id="signup-captcha" name="Signup[captcha]">                
                    <input type="button" id="btn_tender" class="btn btn-lg btn-primary" value="Сохранить"/>            
                </div>
            </div>

        </form>
    </div>
    <aside class="col-auto d-none d-lg-block"></aside>
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




<svg xmlns="http://www.w3.org/2000/svg" style="display: none"><symbol id="s-folder-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z"/></symbol><symbol id="d-upload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path fill="currentColor" d="M488 351.92H352v8a56 56 0 0 1-56 56h-80a56 56 0 0 1-56-56v-8H24a23.94 23.94 0 0 0-24 24v112a23.94 23.94 0 0 0 24 24h464a23.94 23.94 0 0 0 24-24v-112a23.94 23.94 0 0 0-24-24zm-120 132a20 20 0 1 1 20-20 20.06 20.06 0 0 1-20 20zm64 0a20 20 0 1 1 20-20 20.06 20.06 0 0 1-20 20z" class="i-secondary"/><path fill="currentColor" d="M192 359.93v-168h-87.7c-17.8 0-26.7-21.5-14.1-34.11L242.3 5.62a19.37 19.37 0 0 1 27.3 0l152.2 152.2c12.6 12.61 3.7 34.11-14.1 34.11H320v168a23.94 23.94 0 0 1-24 24h-80a23.94 23.94 0 0 1-24-24z" class="i-primary"/></symbol><symbol id="s-times" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></symbol><symbol id="r-arrows" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M360.549 412.216l-96.064 96.269c-4.686 4.686-12.284 4.686-16.971 0l-96.064-96.269c-4.686-4.686-4.686-12.284 0-16.971l19.626-19.626c4.753-4.753 12.484-4.675 17.14.173L230 420.78h2V280H91.22v2l44.986 41.783c4.849 4.656 4.927 12.387.173 17.14l-19.626 19.626c-4.686 4.686-12.284 4.686-16.971 0L3.515 264.485c-4.686-4.686-4.686-12.284 0-16.971l96.269-96.064c4.686-4.686 12.284-4.686 16.97 0l19.626 19.626c4.753 4.753 4.675 12.484-.173 17.14L91.22 230v2H232V91.22h-2l-41.783 44.986c-4.656 4.849-12.387 4.927-17.14.173l-19.626-19.626c-4.686-4.686-4.686-12.284 0-16.971l96.064-96.269c4.686-4.686 12.284-4.686 16.971 0l96.064 96.269c4.686 4.686 4.686 12.284 0 16.971l-19.626 19.626c-4.753 4.753-12.484 4.675-17.14-.173L282 91.22h-2V232h140.78v-2l-44.986-41.783c-4.849-4.656-4.927-12.387-.173-17.14l19.626-19.626c4.686-4.686 12.284-4.686 16.971 0l96.269 96.064c4.686 4.686 4.686 12.284 0 16.971l-96.269 96.064c-4.686 4.686-12.284 4.686-16.971 0l-19.626-19.626c-4.753-4.753-4.675-12.484.173-17.14L420.78 282v-2H280v140.78h2l41.783-44.986c4.656-4.849 12.387-4.927 17.14-.173l19.626 19.626c4.687 4.685 4.687 12.283 0 16.969z"/></symbol><symbol id="s-redo-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256.455 8c66.269.119 126.437 26.233 170.859 68.685l35.715-35.715C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.75c-30.864-28.899-70.801-44.907-113.23-45.273-92.398-.798-170.283 73.977-169.484 169.442C88.764 348.009 162.184 424 256 424c41.127 0 79.997-14.678 110.629-41.556 4.743-4.161 11.906-3.908 16.368.553l39.662 39.662c4.872 4.872 4.631 12.815-.482 17.433C378.202 479.813 319.926 504 256 504 119.034 504 8.001 392.967 8 256.002 7.999 119.193 119.646 7.755 256.455 8z"/></symbol><symbol id="s-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></symbol><symbol id="s-file" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></symbol><symbol id="s-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"/></symbol><symbol id="s-caret-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"/></symbol><symbol id="s-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"/></symbol><symbol id="s-calendar-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></symbol><symbol id="s-pencil" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"/></symbol><symbol id="s-user-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-sign-in-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></symbol><symbol id="r-bars" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/></symbol><symbol id="l-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"/></symbol><symbol id="s-user-hard-hat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M88 176h272a8 8 0 0 0 8-8v-32a8 8 0 0 0-8-8h-8a112 112 0 0 0-68.4-103.2L256 80V16a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v64l-27.6-55.2A112 112 0 0 0 96 128h-8a8 8 0 0 0-8 8v32a8 8 0 0 0 8 8zm225.6 176h-16.7a174.08 174.08 0 0 1-145.8 0h-16.7A134.4 134.4 0 0 0 0 486.4 25.6 25.6 0 0 0 25.6 512h396.8a25.6 25.6 0 0 0 25.6-25.6A134.4 134.4 0 0 0 313.6 352zM224 320c65.22 0 118.44-48.94 126.39-112H97.61c7.95 63.06 61.17 112 126.39 112z"/></symbol><symbol id="s-gavel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.971 199.362l-22.627-22.627c-9.373-9.373-24.569-9.373-33.941 0l-5.657 5.657L329.608 69.255l5.657-5.657c9.373-9.373 9.373-24.569 0-33.941L312.638 7.029c-9.373-9.373-24.569-9.373-33.941 0L154.246 131.48c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l5.657-5.657 39.598 39.598-81.04 81.04-5.657-5.657c-12.497-12.497-32.758-12.497-45.255 0L9.373 412.118c-12.497 12.497-12.497 32.758 0 45.255l45.255 45.255c12.497 12.497 32.758 12.497 45.255 0l114.745-114.745c12.497-12.497 12.497-32.758 0-45.255l-5.657-5.657 81.04-81.04 39.598 39.598-5.657 5.657c-9.373 9.373-9.373 24.569 0 33.941l22.627 22.627c9.373 9.373 24.569 9.373 33.941 0l124.451-124.451c9.372-9.372 9.372-24.568 0-33.941z"/></symbol><symbol id="s-tags" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></symbol><symbol id="s-calculator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"/></symbol><symbol id="s-briefcase" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></symbol><symbol id="s-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></symbol><symbol id="s-comments" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"/></symbol><symbol id="s-question-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"/></symbol></svg>



<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-44582743-1');
</script>


<script src="Theme/js/jquery.min.js"></script>

<script src="Theme/js/yii.js"></script>


<script src="Theme/js/tender/select2.full.min.js"></script>
<script src="Theme/js/tender/ru.js"></script>
<script src="Theme/js/tender/select2-krajee.min.js"></script>
<script src="Theme/js/tender/kv-widgets.min.js"></script>
<script src="Theme/js/tender/yii.validation.js"></script>
<script src="Theme/js/tender/ckeditor.js"></script>
<script src="Theme/js/tender/jquery.js"></script>
<script src="Theme/js/tender/dosamigos-ckeditor.widget.js"></script>
<script src="Theme/js/tender/piexif.min.js"></script>
<script src="Theme/js/tender/fileinput.min.js"></script>
<script src="Theme/js/tender/theme.min.js"></script>
<script src="Theme/js/tender/sortable.min.js"></script>
<script src="Theme/js/tender/purify.min.js"></script>
<script src="Theme/js/tender/yii.activeForm.js"></script>
<script src="Theme/js/bootstrap.bundle.min.js"></script>
<script src="Theme/js/script.js"></script>


<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">



<script>
    $(function() {     
       $( "#datetimepicker1" ).datepicker({dateFormat: "dd-mm-yy"} );    
       $( "#datetimepicker2" ).datepicker({dateFormat: "dd-mm-yy"} );   
    });
 </script> 




<script src="Theme/js/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script>
    $(function(){
    $("#phone1").mask("+7(999) 999-9999");
    });
</script>

<script src="Theme/js/tender.js"></script>






<script>jQuery(function ($) {
var count = '0';

function addCheckbox(obj, id, label, name, value, checked, disabled) {
    if (!obj.find('#' + id + value).length) {
        obj.append(
            $('<div/>', {class: 'custom-control custom-checkbox'}).append(
                $('<input/>', {type: 'checkbox', class: 'custom-control-input', id: id + value, name: name, value: value, checked: checked, disabled: disabled}
            )
        ).append($('<label/>', {class: 'custom-control-label', for: id + value}).text(label)));
    }
}
function removeCheckbox(obj) {
    obj.find('input:not(:checked)').each(function(){
        $(this).parent().remove();
    });
}
function findCategory(title) {
    $.post('/ajax/category', {title: title}, function(data){
        var category = $('#category');
        removeCheckbox(category);
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                addCheckbox(category, 'd', data[key].name, 'Tender[category_ids][]', data[key].id, false, count >= 5);
            }
        }
    }, 'json');
}
function closeAccordion() {
    var accordion = $('.accordion');
    if (accordion.is(':visible')) {
        var category = $('#category');
        removeCheckbox(category);
        $('.ok-category').hide();
        $('.more-category').show();
        if (count <= 0) {
            findCategory($('#tender-title').val());
        } else {
            accordion.find('input:checked').each(function(){
                addCheckbox(category, 'd', $(this).parent().text(), 'Tender[category_ids][]', $(this).val(), true, false);
            });
        }
        accordion.slideUp('slow');
    }
}
$('#tender-title').change(function(){
    findCategory($(this).val());
});
findCategory($('#tender-title').val());
$('.more-category').click(function(){
    $(this).hide();
    $('.ok-category').show();
    removeCheckbox($('#category'));
    $('.accordion').slideDown('slow');
});
$('.ok-category').click(function(){
    closeAccordion();
});
$('input:not(:checkbox), textarea').focus(function(){
    closeAccordion();
});
function propCategory() {
    var input = $('input[name="Tender[category_ids][]"]:not(:checked)');
    count >= 5 ? input.prop('disabled', true) : input.prop('disabled', false);
}
propCategory();
$(document).on('change', 'input[id^="d"]', function(){
    $('#c' + $(this).val()).prop('checked', $(this).prop('checked'));
    $(this).prop('checked') ? count++ : count--;
    propCategory($(this));
});
$(document).on('change', 'input[id^="c"]', function(){
    $('#d' + $(this).val()).prop('checked', $(this).prop('checked'));
    $(this).prop('checked') ? count++ : count--;
    propCategory($(this));
});
$(document).on('click', '.accordion .custom-checkbox', function(){
    if ($(this).find('input').is(':disabled')) {
        openModal(null, {body: 'Можно выбрать максимум 5 категорий.'});
    }
});
var categoryList = JSON.parse('[]');

for (var key in categoryList) {
    if (categoryList.hasOwnProperty(key)) {
        var category = $('#category');
        addCheckbox(category, 'd', categoryList[key], 'Tender[category_ids][]', key, true, false);
    }
}
$('#tender').submit(function(){
    $('#tender-city_id').change();
});
$('#tender-city_id').change(function(){
    if (!$(this).val()) {
        $(this).next().addClass('is-invalid');
    } else {
        $(this).next().removeClass('is-invalid');
    }
});
jQuery&&jQuery.pjax&&(jQuery.pjax.defaults.maxCacheLength=0);
if (jQuery('#tender-city_id').data('select2')) { jQuery('#tender-city_id').select2('destroy'); }
jQuery.when(jQuery('#tender-city_id').select2(select2_bba503fa)).done(initS2Loading('tender-city_id','s2options_e9bc2761'));
jQuery('#tender-city_id').on('select2:open', function(e) { if ($(e.target).hasClass('select2-up')) { $('.select2-dropdown').css('marginTop', '-34px'); } });

CKEDITOR.replace('tender-text', {"height":300,"toolbarGroups":[{"name":"clipboard","groups":["mode","undo","selection","clipboard","doctools"]},{"name":"editing","groups":["tools","about"]},"/",{"name":"paragraph","groups":["templates","list","indent","align"]},{"name":"insert"},"/",{"name":"basicstyles","groups":["basicstyles","cleanup"]},{"name":"colors"},{"name":"links"},{"name":"others"}],"removeButtons":"Smiley,Iframe","customConfig":"/js/cke.js","language":"ru","allowedContent":false});
dosamigos.ckEditorWidget.registerOnChangeHandler('tender-text');
var saveText = [];
$(document).on('click', '.file-preview-frame .btn-rotate', function(){
    var parent = $(this).parent();
    var id = parent.find('.kv-file-remove').attr('data-key');
    if (id) {
         $.post('/ajax/rotate-image', {id: id, dir: $(this).attr('data-dir')}, function(e){
            if (!e.error) {
                parent.find('img').attr('src', '').attr('src', e.src);
            }
         });
    }
});
if (jQuery('#uploadfiles-files').data('fileinput')) { jQuery('#uploadfiles-files').fileinput('destroy'); }
jQuery('#uploadfiles-files').fileinput(fileinput_394134ed);
jQuery('#uploadfiles-files').on('filebatchselected', function(event, files) { $('.file-preview textarea').each(function(){ saveText.push($(this).val()); }); $('#uploadfiles-files').fileinput('upload'); });
jQuery('#uploadfiles-files').on('filebatchuploadcomplete', function(event) { $('.file-preview textarea').each(function(){ $(this).val(saveText.shift()); }); });

(function($) {
    $.fn.range = function(opt){
        var elm = this;
        var drg = this.find('.handle');
        var sel = this.find('.selection');
        var list = opt.list;
        var value = opt.value;
        var drg_w, elm_w, pos_x, page_x, min, max, key, l, step;
        var count = 0;
        var point = [];
        
        for (key in list) {
            if (list.hasOwnProperty(key)) count++;
        }
        
        init();
        input(value.val());
        
        function init() {
            drg_w = drg.outerWidth();
            elm_w = elm.outerWidth();
            min = elm.offset().left;
            max = min + elm_w;
            step = elm_w / count;
            elm.find('i').remove();
            i = 1;
            for (key in list) {
                if (list.hasOwnProperty(key)) {
                    l = i++ * step;
                    elm.append($('<i/>').offset({left: l - 2}));
                    var p = l + elm.offset().left;
                    point[key] = [p - step, p + step];
                }
            }
        }
        function input(val) {
            value.val(val);
            val = val ? parseInt(val) : null;
            i = 1;
            for (key in list) {
                if (list.hasOwnProperty(key)) {
                    l = i++ * step;
                    if (val <= key || (i > count && val > key)) {
                        drg.offset({left: l + elm.offset().left - drg_w / 2});
                        sel.width(l);
                        val ? opt.text.text(list[key]) : null;
                        return;
                    }
                }
            }
        }
        function move(x) {
            if (x < min) x = min; else if (x > max) x = max;
            for (key in list) {
                if (list.hasOwnProperty(key)) {
                    if (point[key][0] <= x && point[key][1] >= x && value.val() !== key) {
                        input(key);
                    }
                }
            }
        }
        $(window).resize(function(){
            init();
            input(value.val());
        });
        value.on('input', function(){
            input($(this).val());
        });
        elm.on('click', function(e){
            page_x = e.pageX ? e.pageX : e.originalEvent.touches[0].pageX;
            move(page_x);
            e.preventDefault();
        });
        drg.on('mousedown touchstart', function(e){
            page_x = e.pageX ? e.pageX : e.originalEvent.touches[0].pageX;
            pos_x = drg.offset().left + drg_w - page_x;
            elm.addClass('active');
            e.preventDefault();
        }).parents().on('mousemove touchmove', function(e){
            elm.filter('.active').each(function(){
                page_x = e.pageX !== undefined ? e.pageX : e.originalEvent.touches[0].pageX;
                l = page_x + pos_x - drg_w;
                move(l);
            });
        }).on('mouseup touchend', function(){
            elm.removeClass('active');
        });
    }
})(jQuery);$('.range').range({list: {"500":"\u041c\u0435\u043b\u043a\u0438\u0439 \u043e\u0431\u044a\u0435\u043c (\u0434\u043e 500 \u0433\u0440\u043d)","1000":"\u041c\u0435\u043b\u043a\u0438\u0439 \u043e\u0431\u044a\u0435\u043c (\u0434\u043e 1 000 \u0433\u0440\u043d)","2000":"\u041c\u0435\u043b\u043a\u0438\u0439 \u0438\u043b\u0438 \u043d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 2 000 \u0433\u0440\u043d)","3000":"\u041c\u0435\u043b\u043a\u0438\u0439 \u0438\u043b\u0438 \u043d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 3 000 \u0433\u0440\u043d)","4000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 4 000 \u0433\u0440\u043d)","5000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 5 000 \u0433\u0440\u043d)","6000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 6 000 \u0433\u0440\u043d)","7000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 (\u0434\u043e 7 000 \u0433\u0440\u043d)","8000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 \u0438\u043b\u0438 \u0441\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 8 000 \u0433\u0440\u043d)","9000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 \u0438\u043b\u0438 \u0441\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 9 000 \u0433\u0440\u043d)","10000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 \u0438\u043b\u0438 \u0441\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 10 000 \u0433\u0440\u043d)","15000":"\u041d\u0435\u0431\u043e\u043b\u044c\u0448\u043e\u0439 \u0438\u043b\u0438 \u0441\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 15 000 \u0433\u0440\u043d)","20000":"\u0421\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 20 000 \u0433\u0440\u043d)","25000":"\u0421\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 25 000 \u0433\u0440\u043d)","30000":"\u0421\u0440\u0435\u0434\u043d\u0438\u0439 (\u0434\u043e 30 000 \u0433\u0440\u043d)","40000":"\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u0438\u043b\u0438 \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 40 000 \u0433\u0440\u043d)","50000":"\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u0438\u043b\u0438 \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 50 000 \u0433\u0440\u043d)","75000":"\u041a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 75 000 \u0433\u0440\u043d)","100000":"\u041a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 100 000 \u0433\u0440\u043d)","150000":"\u041a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 150 000 \u0433\u0440\u043d)","200000":"\u041e\u0447\u0435\u043d\u044c \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 200 000 \u0433\u0440\u043d)","300000":"\u041e\u0447\u0435\u043d\u044c \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 300 000 \u0433\u0440\u043d)","400000":"\u041e\u0447\u0435\u043d\u044c \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 400 000 \u0433\u0440\u043d)","500000":"\u041e\u0447\u0435\u043d\u044c \u043a\u0440\u0443\u043f\u043d\u044b\u0439 (\u0434\u043e 500 000 \u0433\u0440\u043d)","500001":"\u041c\u0430\u043a\u0441\u0438\u043c\u0430\u043b\u044c\u043d\u044b\u0439 (\u0441\u0432\u044b\u0448\u0435 500 000 \u0433\u0440\u043d)"}, value: $('#tender-budget'), text: $('.budget-text')});
jQuery.fn.kvDatepicker.dates={};
if (jQuery('#tender-start').data('kvDatepicker')) { jQuery('#tender-start').kvDatepicker('destroy'); }
jQuery('#tender-start').kvDatepicker(kvDatepicker_6834f094);
jQuery('#tender-start').on('changeDate', function(e){ var minDate = new Date(e.date.valueOf()); $('#tender-finish').kvDatepicker('setStartDate', minDate); });

if (jQuery('#tender-finish').data('kvDatepicker')) { jQuery('#tender-finish').kvDatepicker('destroy'); }
jQuery('#tender-finish').kvDatepicker(kvDatepicker_5af3c474);

jQuery("#signup-phone").inputmask(inputmask_9062948e);
var smsTimer;
var smsInput = $('#signup-code');
var smsInputPhone = $('#signup-phone');
smsInput.closest('form').on('beforeSubmit', function(){
    if (smsInputPhone.is(':visible')) {
        $.post('/tender/send-sms', smsInput.closest('form').serialize(), function(e){
            sendResult(e);
        });
        return false;
    }
}).on('beforeValidateAttribute', function(e, a){
    if (smsInputPhone.is(':visible') && a.name === 'code') {
        return false;
    }
});
$('#send-voice').click(function(){
    $.post('/tender/send-sms?voice=1', smsInput.closest('form').serialize(), function(e){
        sendResult(e);
    });
});
$('.edit-my-phone').click(function(e){
    clearInterval(smsTimer);
    smsInput.val('');
    var obj = $(this).parent();
    obj.hide().prev().show().focus();
    smsInput.closest('.form-group').hide();
    e.preventDefault();
});
function sendResult(e) {
    if (e.result) {
        $('#btn-submit').text('Опубликовать тендер').removeClass('fix');
        if (smsInputPhone.parent().find('b').length) {
            smsInputPhone.hide().next().show().find('b').text(e.phone);
        } else {
            smsInputPhone.parent().hide()
        }
        smsInput.val('');
        smsInput.closest('.form-group').show().find('.timer').show().html(e.text).next().focus();
        $('.voice').hide();
        var obj = $('.timer');
        var b = obj.find('b');
        if (b.length) {
            clearInterval(smsTimer);
            smsTimer = setInterval(function(){
                var n = parseInt(b.text()) - 1;
                if (n === 0) {
                    obj.hide();
                    $('.voice').show();
                    if (smsInputPhone.parent().find('b').length) {
                        smsInputPhone.show().next().hide();
                    } else {
                        smsInputPhone.parent().show()
                    }
                    clearInterval(smsTimer);
                } else {
                    b.text(n);
                }
            }, 1000);
        }
    } else {
        if (e.errors.phone !== undefined) {
            smsInputPhone.addClass('is-invalid').parent().find('.invalid-feedback').text(e.errors.phone);
        }
    }
}
"use strict";
grecaptcha.ready(function() {
    grecaptcha.execute("6Lerrb0UAAAAAEzaqCL4Mu03eNZF-UoO9iej4mVr", {action: "/tender/create"}).then(function(token) {
        jQuery("#" + "signup-captcha").val(token);

        const jsCallback = "";
        if (jsCallback) {
            eval("(" + jsCallback + ")(token)");
        }
    });
});
jQuery('#tender').yiiActiveForm([{"id":"tender-title","name":"title","container":".field-tender-title","input":"#tender-title","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить «Заголовок тендера»."});yii.validation.string(value, messages, {"message":"Значение «Заголовок тендера» должно быть строкой.","min":10,"tooShort":"Значение «Заголовок тендера» должно содержать минимум 10 символов.","max":70,"tooLong":"Значение «Заголовок тендера» должно содержать максимум 70 символов.","skipOnEmpty":1});}},{"id":"tender-text","name":"text","container":".field-tender-text","input":"#tender-text","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить «Подробное описание»."});}},{"id":"uploadfiles-files","name":"files","container":".field-uploadfiles-files","input":"#uploadfiles-files","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.file(attribute, messages, {"message":"Загрузка файла не удалась.","skipOnEmpty":true,"mimeTypes":[],"wrongMimeType":"Разрешена загрузка файлов только со следующими MIME-типами: .","extensions":["jpg","jpeg","png","pdf","xlsx","xls","doc","docx","zip","rar"],"wrongExtension":"Разрешена загрузка файлов только со следующими расширениями: jpg, jpeg, png, pdf, xlsx, xls, doc, docx, zip, rar.","maxSize":52428800,"tooBig":"Файл «{file}» слишком большой. Размер не должен превышать 52,429 МБ.","maxFiles":50,"tooMany":"Вы не можете загружать более 50 файлов."});}},{"id":"tender-customer","name":"customer","container":".field-tender-customer","input":"#tender-customer","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^\s*[+-]?\d+\s*$/,"message":"Значение «Кто Вы» должно быть целым числом.","skipOnEmpty":1});yii.validation.required(value, messages, {"message":"Необходимо заполнить «Кто Вы»."});yii.validation.range(value, messages, {"range":["1","2","3","4"],"not":false,"message":"Значение «Кто Вы» неверно.","skipOnEmpty":1});}},{"id":"tender-expired","name":"expired","container":".field-tender-expired","input":"#tender-expired","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.range(value, messages, {"range":["3","7","14","21","28"],"not":false,"message":"Значение «Заявка действительна» неверно.","skipOnEmpty":1});}},{"id":"signup-username","name":"username","container":".field-signup-username","input":"#signup-username","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить поле"});}},{"id":"signup-phone","name":"phone","container":".field-signup-phone","input":"#signup-phone","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить поле"});}},{"id":"signup-agreement","name":"agreement","container":".field-signup-agreement","input":"#signup-agreement","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Вам необходимо ознакомится с правилами сайта.","requiredValue":true});yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Значение «Согласен с правилами сайта» должно быть равно «1» или «0».","skipOnEmpty":1});}},{"id":"signup-code","name":"code","container":".field-signup-code","input":"#signup-code","error":".invalid-feedback","validateOnType":true,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить поле"});yii.validation.string(value, messages, {"message":"Значение «Введите код» должно быть строкой.","skipOnEmpty":1});}}], {"errorSummary":".alert.alert-danger","errorCssClass":"is-invalid","successCssClass":null,"validationStateOn":"input"});
$('#load').hide();
$.toast = function(p){
    $.post('/ajax/alert', {type: p.type, body: p.body}, function(e){
        var o = $($.parseHTML(e));
        $('#toast').prepend(o);
        o.css({opacity: 0, marginTop: -o.outerHeight(true)}).animate({opacity: 1, marginTop: 0}, 400).delay(800).animate({opacity: 0}, 400, function(){ $(this).remove(); });
    });
};
});

</script>


</body>
</html>
