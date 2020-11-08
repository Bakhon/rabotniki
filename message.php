
<?php require_once 'Theme/blocks/header2.php'; ?>


    <div class="container pt-12 mb-12">      
      
        
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">               
                    <div id="loader" class="fadeOut">
                        <div class="spinner"></div>
                    </div>
                    <script type="text/javascript" async="" src="Theme/js/chat/analytics.js"></script>
                    <script type="text/javascript">window.addEventListener('load', () => {
                            const loader = document.getElementById('loader');
                            setTimeout(() => {
                                loader.classList.add('fadeOut');
                            }, 300);
                        });</script>                                    
                            <main class="main-content bgc-grey-100">
                                <div id="mainContent">
                                    <div class="full-container">
                                        <div class="peers fxw-nw pos-r">
                                            <div class="peer bdR" id="chat-sidebar">
                                                <div class="layers h-100">
                                                    <div class="bdB layer w-100"><input type="text" placeholder="Search contacts..."
                                                            name="chatSearch" class="form-constrol p-15 bdrs-0 w-100 bdw-0"></div>
                                                    <div class="layer w-100 fxg-1 scrollable pos-r ps">
                                                        <div class="peers fxw-nw ai-c p-20 bdB bgc-white bgcH-grey-50 cur-p">
                                                            <div class="peer"><img src="Theme/images/chat/1.jpg" alt=""
                                                                    class="w-3r h-3r bdrs-50p"></div>
                                                            <div class="peer peer-greed pL-20">
                                                                <h6 class="mB-0 lh-1 fw-400">John Doe</h6><small
                                                                    class="lh-1 c-green-500">Online</small>
                                                            </div>
                                                        </div>
                                                        <div class="peers fxw-nw ai-c p-20 bdB bgc-white bgcH-grey-50 cur-p">
                                                            <div class="peer"><img src="Theme/images/chat/2.jpg" alt=""
                                                                    class="w-3r h-3r bdrs-50p"></div>
                                                            <div class="peer peer-greed pL-20">
                                                                <h6 class="mB-0 lh-1 fw-400">Moo Doe</h6><small
                                                                    class="lh-1 c-amber-500">Away</small>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                        </div>
                                                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                                
      require_once 'conn.php';    
      $get_id = $_GET['getid'];
       $query = "SELECT * FROM `chat` where FROM_USER = ".$_SESSION['id']." and TO_USER = $get_id order by POST_DATE ASC";
      // echo $query;
       $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
       $num_rows = mysqli_num_rows($result);
       $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
                                            ?>
                                            <div class="peer peer-greed" id="chat-box">
                                                <div class="layers h-100">
                                                    <div class="layer w-100">
                                                        <div class="peers fxw-nw jc-sb ai-c pY-20 pX-30 bgc-white">
                                                            <div class="peers ai-c">
                                                                <div class="peer d-n@md+">
                                                                    <a  href="#" title=""  id="chat-sidebar-toggle" class="td-n c-grey-900 cH-blue-500 mR-30">
                                                                        <i  class="ti-menu"></i>
                                                                    </a>
                                                                </div>                                                
                                                                <div class="peer mR-20">
                                                                    <img src="Theme/images/chat/1.jpg" alt=""  class="w-3r h-3r bdrs-50p">
                                                                </div>
                                                                <div class="peer">
                                                                    <h6 class="lh-1 mB-0">John Doe</h6>
                                                                    <i class="fsz-sm lh-1">Typing...</i>
                                                                </div>
                                                            </div>
                                                            <div class="peers">
                                                                <a href="#" class="peer td-n c-grey-900 cH-blue-500 fsz-md mR-30" title="">
                                                                    <i class="ti-video-camera"></i> 
                                                                </a>
                                                                <a
                                                                    href="#" class="peer td-n c-grey-900 cH-blue-500 fsz-md mR-30" title="">
                                                                    <i class="ti-headphone"></i> 
                                                                </a>
                                                                <a href="#"  class="peer td-n c-grey-900 cH-blue-500 fsz-md" title="">
                                                                    <i class="ti-more"></i>
                                                                </a>
                                                            </div>

                                                        </div>


                                                    </div>


                                                    <div class="layer w-100 fxg-1 bgc-grey-200 scrollable pos-r ps">
                                                    
                                                        <div class="p-20 gapY-15">
                                                        <?php foreach($rows as $row) { ?>
                                                            <div class="peers fxw-nw">
                                                                <div class="peer mR-20"><img class="w-2r bdrs-50p"
                                                                        src="Theme/images/chat/1.jpg" alt=""></div>
                                                                <div class="peer peer-greed">
                                                                    <div class="layers ai-fs gapY-5">
                                                                        <div class="layer">
                                                                            <div
                                                                                class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                                                <div class="peer mR-10">
                                                                                    <small><?php echo $row['POST_DATE']; ?></small>
                                                                                </div>
                                                                                <div class="peer-greed msg">
                                                                                    <span><?php echo $row['MSG']; ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                   
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                            <div class="peers fxw-nw ai-fe">
                                                                <div class="peer ord-1 mL-20"><img class="w-2r bdrs-50p"
                                                                        src="Theme/images/chat/2.jpg" alt=""></div>
                                                                <div class="peer peer-greed ord-0">
                                                                    <div class="layers ai-fe gapY-10">
                                                                        <div class="layer">
                                                                            <div
                                                                                class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                                                <div class="peer mL-10 ord-1">
                                                                                    <small>10:00 AM</small>
                                                                                </div>
                                                                                <div class="peer-greed ord-0">
                                                                                    <span>Hello</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                        </div>
                                                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                        </div>

                                                    </div>

                                                    <div class="layer w-100">
                                                        <div class="p-20 bdT bgc-white">
                                                            <div class="pos-r">
                                                                <input type="hidden" id="chat_date" value="<?php $date = date('Y-m-d H:i:s');  echo $date; ?>" />
                                                                <input type="hidden" id="from_chat" value="<?php echo $_SESSION['id']; ?>" />
                                                                <input type="hidden" id="to_chat" value="<?php echo $get_id; ?>" />
                                                                <input type="text" id="text_chat" class="form-control bdrs-10em m-0" value=""
                                                                    placeholder="Say something..."> 
                                                                    <button type="button" id="chat"  class="btn btn-primary bdrs-50p w-2r p-0 h-2r pos-a r-1 t-1">
                                                                        <i class="fa fa-paper-plane-o">                                                      
                                                                        </i>
                                                                    </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

      
                                        </div>
                                    
                                </div>
                            </main>



                        
                       
                    
                
                
               


            </div>
       
        </div>
    </div>







    <a class="btn btn-primary position-fixed d-none d-lg-inline-block" href="#" style="bottom: 0; right: 0; z-index: 1040;"><svg class="mr-2 i is-question-circle"><use xlink:href="#s-question-circle"></use></svg>Служба поддержки</a>
   
   <?php require_once 'Theme/blocks/footer2.php'; ?>