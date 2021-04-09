

    <!-- -----About us banner start----- -->
      <section id="about-us-banner">

        <div class="about-us-banner">
          <?php  if(!empty($banner_image)) { ?>
                  <img src="<?=base_url()?>webroot/admin/banneraboutus/<?=$banner_image->image?>">
                <?php  } ?>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6 col-sm-8">
                <div class="about-us-content">
                  <p class="wow animate__animated animate__backInUp" style="padding-top: 243px;
    padding-right: 34px;"> <?php  if(!empty($banner_image)) { ?>
                   <?=$banner_image->description?>
                   <?php  } ?>
                  </p>
                  <a href="<?=base_url()?>" class="btn_3 wow animate__animated animate__backInDown">Get A Free Quote</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- About us banner end -->

    <!-- History slider start -->
    <section id="history-slider-part">
      <div class="history-slider-part">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>WORK FLOW</strong></h2>
        </div>
        <div class="history_slider">
          <div class="history-nav">
            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">1st Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/REQUIREMENT.png" alt="requirments2.png">
                </div>
              </div>
                
              <p class="slide-text wow animate__animated animate__backInUp">REQUIREMENT</p>
            </div>

            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">2nd Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/BLUEPRINT.png" alt="blue-printg2.png">
                </div>
              </div>
              <p class="slide-text wow animate__animated animate__backInUp">BLUEPRINT</p>
            </div>

            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">3rd Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/UI-DESIGN.png" alt="UI-DESIGN.png">
                </div>
              </div>
              <p class="slide-text wow animate__animated animate__backInUp">UI DESIGN</p>
            </div>

            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">4th Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/UI-DEVELOPMENT.png" alt="UI-DEVELOPMENT.png">
                </div>
              </div>
              <p class="slide-text wow animate__animated animate__backInUp">UI DEVELOPMENT</p>
            </div>

            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">5th Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/PROJECT-DEVELOPMENT.png" alt="PROJECT-DEVELOPMENT.png">
                </div>
              </div>
              <p class="slide-text wow animate__animated animate__backInUp">PROJECT DEVELOPMENT</p>
            </div>

            <div class="slider-icon-dots">
              <p class="slide-year wow animate__animated animate__backInDown">Final Step</p>
              <div class="icon-box">
                <div class="icon-box-innerpart">
                  <img class="wow animate__animated animate__rubberBand" src="<?=base_url()?>webroot/user/images/TESTING-DEBUGGING.png" alt="TESTING-DEBUGGING.png">
                </div>
              </div>
              <p class="slide-text wow animate__animated animate__backInUp">TESTING & DEBUGGING</p>
            </div>
          </div>  
          <div class="container">
            <div class="history-single">
              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/requirments2.png" alt="requirments2.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">REQUIREMENT GATHERING</h3>
                  <p class="wow animate__animated animate__backInUp">
                    Our process starts with client requirement, understanding the business and familiarizing with the organization, we study on the company’s background, vision and belief. research is vital for delivering excellent and satisfying results.
                  </p>
                </div>
              </div>

              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/blue-printg2.png" alt="blue-printg2.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">CHALKING OUT BLUEPRINT</h3>
                  <p class="wow animate__animated animate__backInUp">
                    Planning a blueprint is one of the fundamentals so that the idea gets reflected on paper for visualization. The wireframe explains the vital elements for the development of websites, software or mobile application. Once the blueprint is designed, we show it to our clients for approval and move forward to the next stage.
                  </p>
                </div>
              </div>
              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/ui-design2.png" alt="ui-design2.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">USER INTERFACE DESIGNING</h3>
                  <p class="wow animate__animated animate__backInUp">
                    Once the blueprint is ready we start our creative team to work on the blueprint and bring it to shape UI designer design graphics, and visuals. if the client has an idea we try to bring visual spotlight with our designing expertise, Our team starts working on layout which suits best for marketing your business.
                  </p>
                </div>
              </div>

              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/ui-development2.png" alt="ui-development2.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">USER INTERFACE DEVELOPMENT</h3>
                  <p class="wow animate__animated animate__backInUp">
                    At this stage our UX developers bring the design in life, developers utilize their skills and animate visuals, make buttons and icon clickable with their coding skills. Our developers make sure the application or website opens the quickest time possible.
                  </p>
                </div>
              </div>
              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/Project_development.png" alt="Project_development.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">PROJECT DEVELOPMENT</h3>
                  <p class="wow animate__animated animate__backInUp">
                    Our developers work closely on the front end and backend for the application as well software, they make sure it’s interactive and user-friendly for anyone who accesses it. We use technology such as angular, JS, Vue.JS, CSS for Development.
                  </p>
                </div>
              </div>

              <div class="slide-item-box">
                <div class="img-box">
                  <img class="wow animate__animated animate__flipInX" src="<?=base_url()?>webroot/user/images/testing-debugging2.png" alt="testing-debugging2.png">
                </div>
                <div class="content-box">
                  <h3 class="wow animate__animated animate__backInDown">TESTING & DEBUGGING</h3>
                  <p class="wow animate__animated animate__backInUp">
                    Our developers work closely on the front end and backend for the application as well software, they make sure it’s interactive and user-friendly for anyone who accesses it. We use technology such as angular, JS, Vue.JS, CSS for Development.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- History slider end -->




  