     <!-- --------Live Chat start------ -->
      <div class="fabs chat-window">
        <div class="chat">
          <div class="chat_header">
            <div class="chat_option">
            <div class="header_img">
              <img src="<?=base_url()?>webroot/user/images/profile.jpg"/>
              </div>
              <span id="chat_head">Soumen Dolui</span> <br> <span class="agent">Manager</span> <span class="online">(Online)</span>
             <span id="chat_fullscreen_loader" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>

            </div>

          </div>
          <div class="chat_body chat_login">
              <a id="" href="https://web.whatsapp.com/send?phone=+919933630089&text=Please contact me regarding..." target="blank" class="fab whatsapp">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
              </a>
              <div id="chat_form" class="chat_converse chat_form">
                  

                  <span class="chat_msg_item chat_msg_item_admin">
                    <div class="chat_avatar">
                       <img src="<?=base_url()?>webroot/user/images/profile.jpg"/>
                    </div>Send message to Manager.
                    <div>
                      <form class="message_form" action="<?=base_url('query')?>" method="post" enctype="multipart/form-data">
                          <input placeholder="Your email" name="email" id="email" required />
                          <input placeholder="Technical issue" name="issue" id="issue" required/>
                          <textarea rows="4" placeholder="Your message" name="message" id="message" required></textarea>
                     <!--      <a class="btn_3">SEND</a> -->
                          <input type="submit" class="btn_3"/>
                      </form>
                    </div>
                  </span>   
              </div>
          </div>
        </div>
          <a id="prime" class="fab animate-fab animate__animated animate__heartBeat"><i class="prime zmdi zmdi-comment-outline"></i></a>
      </div>
    <!-- Live chat end -->

    <!-- -------Phone Call start------- -->
      <div class="call-us">
        <div id="show-hidden-menu" class="phone-call animate__animated animate__shakeX">
          <span id="show-icon">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <i class="fa fa-times" aria-hidden="true"></i>
          </span>
        </div>
        <div class="call-widget-body">
          <div class="widget-image-wrappar">
            <div class="widget-image">
              <img src="<?=base_url()?>webroot/user/images/profile.jpg">
            </div>
          </div>
          <div class="widget-text">
            <p class="agent-name">Soumen Dolui</p>
            <p class="agent-job-tittle">Manager</p>
            <p class="show-phone-number">
              <a class="moto-link" data-action="call" href="tel:+9933630089">
                <i class="fa fa-phone" aria-hidden="true"></i> 
                9933630089
              </a>
            </p>            
          </div>
        </div>
      </div>
    <!-- Phone call end -->

    <!-- ---------Footer start--------- -->
      <footer>
        <svg viewBox="0 0 120 28">
         <defs> 
           <mask id="xxx">
             <circle cx="7" cy="12" r="40" fill="#fff" />
           </mask>
           
           <filter id="goo">
              <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
              <feColorMatrix in="blur" mode="matrix" values="
                   1 0 0 0 0  
                   0 1 0 0 0  
                   0 0 1 0 0  
                   0 0 0 13 -9" result="goo" />
              <feBlend in="SourceGraphic" in2="goo" />
            </filter>
             <path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
          </defs> 

           <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2" ></use> 
           <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0" ></use>
         
          <g class="topball">
          <circle class="ball" cx="110" cy="8" r="4" stroke="none" stroke-width="0" fill="red" />

            <g class="arrow">
            <polyline class="" points="108,8 110,6 112,8" fill="none"  />
            <polyline class="" points="110,6 110,10.5" fill="none"  />
            </g>
            
          </g>
          <g class="gooeff">
          <circle class="drop drop1" cx="20" cy="2" r="1.8"  />
          <circle class="drop drop2" cx="25" cy="2.5" r="1.5"  />
          <circle class="drop drop3" cx="16" cy="2.8" r="1.2"  />
            <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />
        </svg>

        <section id="footer" class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <form role="form" action="<?=base_url('query')?>" method="post" >
                      <div class="contact-form btm-brdr">
                          <div class="form-Box">
                              <input type="text" placeholder="Enter name" name="name" id="name"  class="b_effect"  required />
                          </div>
                          <div class="form-Box">
                              <input type="email" placeholder="Enter email" name="email" id="email" class="b_effect"  required />
                          </div>
                          <div class="form-Box"><textarea placeholder="Enter message" name="message" id="message" class="b_effect" required ></textarea></div>
                          <div class="form-Box">
                              <input type="submit" class="btn_3 wow animate__animated animate__slideInUp">
                    
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <div class="contact-address btm-brdr">
                         <?php if(!empty($company_address)) {?>
                          <div class="title-upperpart">
                           
                          <h2 class="section-title wow animate__animated animate__fadeInDown">Contact <strong>Us</strong></h2>
                          </div>
                          <ul>
                              <li><i class="fa fa-phone" aria-hidden="true"></i> <span><?=$company_address->phone_no?></span></li>
                              <li><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?=$company_address->address?></span></li>
                              <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span> <?=$company_address->email?></span></li>
                          </ul>
                          
                      </div>
                       <?php }?>
                   
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <div class="subscribe btm-brdr">
                          <div class="title-upperpart">
                            <h2 class="section-title wow animate__animated animate__fadeInDown">Subscribe <strong>Newsletter</strong></h2>
                          </div>
                          <form role="form" action="<?=base_url('subscribe')?>" method="post" >
                            <input type="email" placeholder="Example@example.com" name="email" id="email"/>
                            <div class="form-Box">
                               <input type="submit" class="btn_3 wow animate__animated animate__slideInUp">
                              <!-- <a href="#" class="btn_3 wow animate__animated animate__fadeInRight"></a> -->
                            </div>
                          </form>
                      </div>
                      <div class="social-icons">
                          <ul>
                              <li>
                                  <a href="https://www.facebook.com/nit.solution.pvt.ltd" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                              </li>
                              <li>
                                  <a href="https://twitter.com/nit_solution" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>
                              </li>
                            <!--   <li>
                                  <a href="'#" target="_blank"> <i class="fa fa-youtube-play" aria-hidden="true"></i> </a>
                              </li> -->
                              <li>
                                  <a href="https://www.instagram.com/nit_solution/" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
        </section>

        <!-- copyright Section Begins -->
        <section id="copyright" class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <?php if(!empty($company_address)) {?>
                        <h6><?=$company_address->footer_copy_right?>
                        </h6>
                         <?php }?>
                    </div>
                </div>
            </div>
        </section>
        <!-- copyright Section Ends -->
      </footer>
    <!-- Footer End -->

    <!-- SCRIPTS -->
    <script src="<?=base_url()?>webroot/user/js/jquery.js"></script>
    <script src="<?=base_url()?>webroot/user/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>webroot/user/js/slick.js" type="text/javascript"></script>   <!-- slick slider -->
    <script src="<?=base_url()?>webroot/user/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=base_url()?>webroot/user/js/jquery.waypoints.js"></script>
    <script src="<?=base_url()?>webroot/user/js/jquery.rcounter.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/4.13.0/bodymovin.min.js'></script>
    <script src="<?=base_url()?>webroot/user/js/custom.js"></script>
    <script src="<?=base_url()?>webroot/user/js/wow.min.js"></script>
    <script src="<?=base_url()?>webroot/user/js/toastr.min.js" type="text/javascript"></script>
    <script src='<?=base_url()?>webroot/user/js/jquery.validationEngine.js'></script>
    <script src='<?=base_url()?>webroot/user/js/jquery.validationEngine-en.js'></script>
  </body>
</html>



