
<?php 
//print_r($banner);
if(!empty($banner)){?>
    <!-- Banner section start -->
    <section id="banner" class="banner">
      <div class="banner-wrapper bannere">
        <div class="banner-slider banner-area">
          <?php
              foreach ($banner as $banner_data) 
              {
          ?>
          <div class="banner-item">
            <img style="object-fit: unset;" src="<?=ADMIN_PATH.'webroot/admin/banner/'.$banner_data->image?>">
            <?php
              if(!empty($banner_data->banner_name) and !empty($banner_data->description))
              {
            ?>
            <div class="banner-text wow animate__animated animate__bounceInUp">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
               <div class="banner-content">
                <p class="content-main-header"><?=$banner_data->banner_name?></p>
                <p class="content-txt">
                 <?=$banner_data->description?>
                </p>
              </div> 
            </div>
            <?php
              }
            ?>
          </div>
          <?php
              }
          ?>
        </div>
      </div>
    </section>
    <!-- Banner section end -->
<?php } ?>


<?php if(!empty($servics)){?>
    <!-- Our service section start -->
    <section id="our-service">
      <div class="our-service">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">SERVICES <strong>WE PROVIDE</strong></h2>
        </div>
        
        <div class="container">
          <div class="row">
            <?php
              foreach ($servics as  $servics_data) 
              {
            ?> 
            <div class="col-md-4 col-sm-6">
              <div class="service-part">
                <div class="line"></div>
                <div class="service-inner-part">
                  <div class="service-header wow animate__animated animate__rotateIn">
                    <div class="header-cover">
                      <div class="header-icon">
                        <div class="icon-inner">
                          <img src="<?=ADMIN_PATH.'webroot/admin/services_icon/'.$servics_data->services_icon?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="service-content">
                    <h5 class="service-title wow animate__animated animate__bounceInRight"><?=$servics_data->services_name?></h5>
                    <p class="service-desc wow animate__animated animate__bounceInLeft">
                     <?=$servics_data->description?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php
              }
            ?>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Our service section end -->
<?php } ?>


<!-- ----Counters section start---- -->
<section id="counters">
  <div class="counters">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="counters-underpart">
            <div class="counter-img wow animate__animated animate__flash">
              <img src="<?=base_url()?>webroot/user/images/happy-customer.png">
            </div>
            <p class="counter-number wow animate__animated "><span class="count-number">100</span>%</p>
            <p class="counter-tittle wow animate__animated animate__flipInX">Satisfied Coustomer</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="counters-underpart">
            <div class="counter-img wow animate__animated animate__flash">
              <img src="<?=base_url()?>webroot/user/images/complete-project.png">
            </div>
            <p class="counter-number wow animate__animated "><span class="count-number">24</span>hr</p>
            <p class="counter-tittle wow animate__animated animate__flipInX">24 X 7 Support</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="counters-underpart">
            <div class="counter-img wow animate__animated animate__flash">
              <img src="<?=base_url()?>webroot/user/images/coffe-cup.png">
            </div>
            <p class="counter-number wow animate__animated "><span class="count-number">100</span></p>
            <p class="counter-tittle wow animate__animated animate__flipInX">Cup of Coffee</p>
          </div>
        </div>
        <!-- <div class="col-md-3 col-sm-3">
          <div class="counters-underpart">
            <div class="counter-img wow animate__animated animate__flash">
              <img src="<?=base_url()?>webroot/user/images/work-experiance.png">
            </div>
            <p class="counter-number wow animate__animated "><span class="count-number">7</span></p>
            <p class="counter-tittle wow animate__animated animate__flipInX">Years of experiance</p>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
<!-- Counters section end -->


<?php if(!empty($mission)){?>
    <!-- Our vision Our mission start -->
    <section id="our-mission">
      <div class="our-mission">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="mission-image-outer">
                <img src="<?=ADMIN_PATH.'webroot/admin/mission/'.$mission->image?>">
              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>MISSION</strong></h2>
              <p class="mission-desc wow animate__animated animate__backInUp">
                <?=$mission->description?>
              </p>
            </div> 
          </div> 
          <div class="row rev-order">
            <div class="col-md-6 col-sm-6">
              <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>VISION</strong></h2>
              <p class="mission-desc wow animate__animated animate__backInUp">
                <?=$vision->description?>
              </p>
            </div> 
            <div class="col-md-6 col-sm-6">
              <div class="mission-image-outer">
                <img src="<?=ADMIN_PATH.'webroot/admin/vision/'.$vision->image?>">
              </div>
            </div>
          </div>      

        </div>
      </div>
    </section>
    <!-- Our vision our mission end -->
<?php } ?>


<!-- -----Why Choose us start------->
<section id="choose-us">
  <div class="choose-us">
    <div class="title-upperpart">
      <h2 class="section-title wow animate__animated animate__fadeInDown">WHY CHOOSE <strong>NIT</strong></h2>
    </div>
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <div class="choose-us-container">
          <div class="choose-us-wrapper">
              <div class="choose-us-wrapper-inner">
                  <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/requirments2.png" alt="REQUIREMENT GATHERING"></div>
                  <h4 class="choose-us-title wow animate__animated animate__backInRight">REQUIREMENT GATHERING</h4>
              </div>
          </div>
        </div>
        <div class="choose-us-container">
          <div class="choose-us-wrapper">
              <div class="choose-us-wrapper-inner">
                  <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/blue-printg2.png" alt="CHALKING OUT BLUEPRINT"></div>
                  <h4 class="choose-us-title wow animate__animated animate__backInRight">CHALKING OUT BLUEPRINT</h4>
              </div>
          </div>
        </div>
        <div class="choose-us-container">
          <div class="choose-us-wrapper">
              <div class="choose-us-wrapper-inner">
                  <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/ui-design2.png" alt="USER INTERFACE DESIGNING"></div>
                  <h4 class="choose-us-title wow animate__animated animate__backInRight">USER INTERFACE DESIGNING</h4>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="scene wow animate__animated animate__flipInY">
          <div class="phone">
              <div class="face front">
                  <div class="inFront"></div>
              </div>
              <div class="face frontBack">
              </div>
              <div class="face back">
                  <div class="inBack"></div>
                  <p></p>
              </div>
              <div class="face right">
                  <div class="inRight"></div> 
              </div>
              <div class="face left">
                  <div class="inLeft"></div>
              </div>
              <div class="face top">
                  <div class="inTop"></div>
              </div>
              <div class="face bottom">
                  <div class="inBottom"></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="choose-us-container">
            <div class="choose-us-wrapper choose-us-wrapper-alignright">
                <div class="choose-us-wrapper-inner">
                    <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/ui-development2.png" alt="USER INTERFACE DEVELOPMENT"></div>
                    <h4 class="choose-us-title wow animate__animated animate__backInLeft">USER INTERFACE DEVELOPMENT</h4>
                </div>
            </div>
        </div>
        <div class="choose-us-container">
            <div class="choose-us-wrapper choose-us-wrapper-alignright">
                <div class="choose-us-wrapper-inner">
                    <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/Project_development.png" alt="PROJECT DEVELOPMENT"></div>
                    <h4 class="choose-us-title wow animate__animated animate__backInLeft">PROJECT DEVELOPMENT</h4>
                </div>
            </div>
        </div>
        <div class="choose-us-container">
            <div class="choose-us-wrapper choose-us-wrapper-alignright">
                <div class="choose-us-wrapper-inner">
                    <div class="choose-us-icon-wrapper wow animate__animated animate__rotateIn"><img src="<?=base_url()?>webroot/user/images/testing-debugging2.png" alt="TESTING & DEBUGGING"></div>
                    <h4 class="choose-us-title wow animate__animated animate__backInLeft">TESTING & DEBUGGING</h4>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <p class="choose-us-desc wow animate__animated animate__backInUp">
          We provide an end to end online solutions from website designing and development, Custom software development to digital marketing/SEO service. We help the client in generating business and creating brand value. Our main strength is providing complete service with the best talent in the industry, you will get complete quality service. Our client knows us by the best web design and development company in Kolkata, India.
        </p>
      </div>
      <div class="view-laptop wow animate__animated animate__fadeInUp">
        <div class="mockup mockup-macbook loaded opened">
          <div class="part top">
            <img src="<?=base_url()?>webroot/user/images/macbook-top.svg" alt="" class="top">
            <img src="<?=base_url()?>webroot/user/images/macbook-cover.svg" alt="" class="cover">

            <video autoplay loop muted>
              <source src="https://d1xm195wioio0k.cloudfront.net/images/video/support.mp4" type="video/mp4">
            </video>

          </div>
          <div class="part bottom">
            <img src="<?=base_url()?>webroot/user/images/macbook-cover.svg" alt="" class="cover">
            <img src="<?=base_url()?>webroot/user/images/macbook-bottom.svg" alt="" class="bottom">
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- Why choose us end -->

<?php if(!empty($technologies)){?>
    <!-- ---Using Technology start--- -->
    <section id="using-technology">
      <div class="using-technology">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">TECHNOLOGIES WE ARE <strong>WORKING ON</strong></h2>
        </div>
        <div class="container">
          
            <?php
              foreach ($technologies as $k => $technologies_data) 
              {
            ?>
            <div class="col-md-3 col-sm-4">
              <div class="technology-wrapper">
                <div class="technology-icon wow animate__animated animate__rotateIn">
                  <img src="<?=ADMIN_PATH.'webroot/admin/technologies/'.$technologies_data->image?>" alt="java.png">
                </div>
                <div class="technology-body">
                  <p class="technology-body-heading wow animate__animated animate__backInDown"><?=$technologies_data->name?></p>
                  <p class="technology-body-desc wow animate__animated animate__backInUp">
                    <?php
                    if(!empty($technologies_data->description))
                    {  
                      $testing_details = word_limiter($technologies_data->description ,7, '');

                    ?>
                      <span id="more_<?=$k?>">
                        <?php
                            echo $testing_details.'...'; 
                            echo '<a href="javascript:void(0)" onclick="show_more(\''.$k.'\')" style="color: cornflowerblue;">more</a>';
                        ?>
                      </span>
                      <span id="less_<?=$k?>" style="display: none" >
                          <?php
                                  echo  $technologies_data->description;
                                  echo '<a onclick="show_less(\''.$k.'\')" href="javascript:void(0)" style="color: cornflowerblue;">less</a>';   
                          ?>
                      </span>
                    <?php
                    }
                    ?>
                  </p>
                </div>
              </div>
            </div>
          <?php 
            } 
          ?>
          
        </div>
      </div>
    </section>
    <!-- Using technology end -->
<?php } ?>



<?php if(!empty($portfolio)){?>
    <!-- -------Our works start------- -->
    <!-- <section id="our-works">
      <div class="our-works">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>STUNNING PROJECTS</strong></h2>
        </div>
        <div class="container">
          <div class="slider-wrapper">
            <div class="work-slider">
              <?php
                foreach ($portfolio as  $portfolio_data) 
                {
              ?>
              <div class="work-item">
                <div class="card transition">
                  <h2 class="transition wow animate__animated animate__fadeInLeft"><?=$portfolio->name?></h2>
                  <p class="wow animate__animated animate__fadeInRight"><?=$portfolio->description?></p>
                  <div class="cta-container transition"><a  target="_blank" href="<?=$portfolio->project_link?>" class="btn_2">Have a look</a></div>
                  <div class="card_circle transition">
                    <img src="<?=base_url()?>webroot/user/images/work-1.png">
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
            <a href="" class="btn_3">VIEW MORE</a>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Our works end -->
<?php } ?>

    <!-- -------Our Blogs start------- -->
 <!--    <section id="our-blogs">
      <div class="our-blogs our-works">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>BLOGS</strong></h2>
        </div>
        <div class="container">
          <div class="slider-wrapper">
            <div class="work-slider">
              <div class="blog-item">
                <a href="#">
                  <div class="blogs-inner">
                    <div class="blog-image">
                      <img src="<?=base_url()?>webroot/user/images/blog-3.jpg">
                      <div class="blog-date wow animate__animated animate__heartBeat">
                        <div class="blog-date-inner-part">
                          <div class="day">
                            <span>20</span>
                          </div>
                          <div class="month">
                            <span class="yr">2020</span>
                            <span class="mth">March</span>
                          </div>
                        </div>
                        <div class="author">
                          <p>By: <span>Admin</span></p>
                        </div>
                      </div>
                    </div>
                    <div class="blog-body">
                      <p class="blog-tittle wow animate__animated animate__fadeInLeft">Best HTML editor for windows</p>
                      <p class="blog-desc wow animate__animated animate__fadeInRight">
                        For the development of the website first thing we need is the HTML (Hypertext markup language) editor where the code is written for the front end website development there are many editors available free of cost.
                      </p>
                    </div>
                    
                  </div>
                </a>
              </div>
              <div class="blog-item">
                <a href="#">
                  <div class="blogs-inner">
                    <div class="blog-image">
                      <img src="<?=base_url()?>webroot/user/images/blog-1.png">
                      <div class="blog-date wow animate__animated animate__heartBeat">
                        <div class="blog-date-inner-part">
                          <div class="day">
                            <span>20</span>
                          </div>
                          <div class="month">
                            <span class="yr">2020</span>
                            <span class="mth">March</span>
                          </div>
                        </div>
                        <div class="author">
                          <p>By: <span>Admin</span></p>
                        </div>
                      </div>
                    </div>
                    <div class="blog-body">
                      <p class="blog-tittle wow animate__animated animate__fadeInLeft">Best HTML editor for windows</p>
                      <p class="blog-desc wow animate__animated animate__fadeInRight">
                        For the development of the website first thing we need is the HTML (Hypertext markup language) editor where the code is written for the front end website development there are many editors available free of cost.
                      </p>
                    </div>
                    
                  </div>
                </a>
              </div>
              <div class="blog-item">
                <a href="#">
                  <div class="blogs-inner">
                    <div class="blog-image">
                      <img src="<?=base_url()?>webroot/user/images/blog-2.jpg">
                      <div class="blog-date wow animate__animated animate__heartBeat">
                        <div class="blog-date-inner-part">
                          <div class="day">
                            <span>20</span>
                          </div>
                          <div class="month">
                            <span class="yr">2020</span>
                            <span class="mth">March</span>
                          </div>
                        </div>
                        <div class="author">
                          <p>By: <span>Admin</span></p>
                        </div>
                      </div>
                    </div>
                    <div class="blog-body">
                      <p class="blog-tittle wow animate__animated animate__fadeInLeft">Best HTML editor for windows</p>
                      <p class="blog-desc wow animate__animated animate__fadeInRight">
                        For the development of the website first thing we need is the HTML (Hypertext markup language) editor where the code is written for the front end website development there are many editors available free of cost.
                      </p>
                    </div>
                    
                  </div>
                </a>
              </div>
              <div class="blog-item">
                <a href="#">
                  <div class="blogs-inner">
                    <div class="blog-image">
                      <img src="<?=base_url()?>webroot/user/images/blog-3.jpg">
                      <div class="blog-date wow animate__animated animate__heartBeat">
                        <div class="blog-date-inner-part">
                          <div class="day">
                            <span>20</span>
                          </div>
                          <div class="month">
                            <span class="yr">2020</span>
                            <span class="mth">March</span>
                          </div>
                        </div>
                        <div class="author">
                          <p>By: <span>Admin</span></p>
                        </div>
                      </div>
                    </div>
                    <div class="blog-body">
                      <p class="blog-tittle wow animate__animated animate__fadeInLeft">Best HTML editor for windows</p>
                      <p class="blog-desc wow animate__animated animate__fadeInRight">
                        For the development of the website first thing we need is the HTML (Hypertext markup language) editor where the code is written for the front end website development there are many editors available free of cost.
                      </p>
                    </div>
                    
                  </div>
                </a>
              </div>
            </div>
            <a href="blog.html" class="btn_3">VIEW MORE</a>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Our Blogs end -->


    <!----- leading industries start ----->
 <section id="leading-industries">
        <div class="leading-industries">
          <div class="title-upperpart">
            <h2 class="section-title wow animate__animated animate__fadeInDown">Working With <strong>Industries</strong></h2>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/accounting.svg">
                  </div>
                  <p class="industries-tittle">Accounting</p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/education.svg">
                  </div>
                  <p class="industries-tittle">Education</p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/energy.svg">
                  </div>
                  <p class="industries-tittle">Energy</p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/food.svg">
                  </div>
                  <p class="industries-tittle">Food</p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/legal.svg">
                  </div>
                  <p class="industries-tittle">Legal</p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="industries-wrapper wow animate__animated animate__bounceIn">
                  <div class="industries-img">
                    <img src="<?=base_url()?>webroot/user/images/insurance.png">
                  </div>
                  <p class="industries-tittle">Insurance</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Leading industries end -->

<?php if(!empty($job_summary)){?>
    <!-- ----Join us section start---- -->
      <section id="join-us">
        <div class="join-us">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <div class="hiring">
                  <div class="title-upperpart">
                    <h2 class="section-title wow animate__animated animate__fadeInDown">We Are <strong>Teaching</strong></h2>
                  </div>
                  <div class="job-card">
                    <?php
                      foreach ($job_summary as $job_summary_data) 
                      {
                    ?>
                      <div class="job-card-inner">
                        <p class="job-tittle wow animate__animated animate__fadeInLeft"><?=$job_summary_data->name?></p>
                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                            <p class="job-location wow animate__animated animate__fadeInLeft"><i class="fa fa-map-marker" aria-hidden="true"></i><?=$job_summary_data->location?></p>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <p class="experience wow animate__animated animate__fadeInRight"><span>Duration:</span> <?=$job_summary_data->experience?></p>
                          </div>
                        </div>
                          
                        <p class="description wow animate__animated animate__fadeInLeft"><?=$job_summary_data->description?></p>
                        
                        <a href="<?=base_url('career')?>" class="btn_3 wow animate__animated animate__fadeInRight">apply</a>
                      </div>
                    <?php 
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="contact-us">
                  <div class="title-upperpart">
                    <h2 class="section-title wow animate__animated animate__fadeInDown">Reach <strong>Us</strong></h2>
                  </div>
                  <div class="contact-us-innerpart">
                    <p class="contact-us-header wow animate__animated animate__fadeInUp">Office</p>
                    <p class="contact-us-desc wow animate__animated animate__fadeInUp">Address :Dum Dum Cantonment,Near pump house,Kolkata -700065, India</p>
                    <p class="contact-us-header wow animate__animated animate__fadeInUp">Call us</p>
                    <p class="contact-us-desc wow animate__animated animate__fadeInUp">9933630089 / 9093256070</p>
                    <p class="contact-us-header wow animate__animated animate__fadeInUp">Email us</p>
                    <p class="contact-us-desc wow animate__animated animate__fadeInUp">info@nitsolution.in /support@nitsolution.in</p>
                    <ul class="social-icons">
                      <li>
                        <a class="facebook wow animate__animated animate__heartBeat" target="_blank" href="https://www.facebook.com/nit.solution.pvt.ltd"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a class="twitter wow animate__animated animate__heartBeat" target="_blank" href="https://twitter.com/nit_solution"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a class="linkedin wow animate__animated animate__heartBeat" target="_blank" href="https://www.linkedin.com/in/nit-solution-460aba204/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Join us end -->
<?php } ?>


