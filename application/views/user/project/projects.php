

    <!-- -----OUR PORTFOLIO start----- -->
      <section id="our-portfolio">
        <div class="our-portfolio">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="portfolio-img">
                  <img src="<?=base_url()?>webroot/user/images/hand.png">
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="portfolio-content">
                  <div class="title-upperpart">
                    <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>PORTFOLIO</strong></h2>
                  </div>
                  <p class="portfolio-desc wow animate__animated animate__backInUp">
                    Our work involves developing a website that is customer-centric for a variety of business domains, we help our client in improving their online presence, we create SEO friendly website which helps in connecting to the customer following the guidelines of
                  </p>
                  <a href="" class="btn_3 wow animate__animated animate__backInLeft">Get A Free Quote</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- OUR PORTFOLIO end -->

    

    <!-- -------Our works start------- -->
    <section id="our-works" style="padding-top: 100px;">
      <div class="our-works project-page">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>STUNNING PROJECTS</strong></h2>
        </div>
        <div class="container">
          <div class="row">
<?php 
// print_r($Portfolio);
 if(!empty($Portfolio))
{
foreach ($Portfolio as $key => $value) {
?>
            <div class="col-md-4 col-sm-6">
              <div class="work-item">
                <div class="card transition">
                  <h2 class="transition wow animate__animated animate__fadeInLeft"><?=$value->project_name?></h2>
                  <p class="wow animate__animated animate__fadeInRight"><?=$value->description?></p>
                  <div class="cta-container transition"><a href="<?=$value->project_link?>" class="btn_2">Have a look</a></div>
                  <div class="card_circle transition">
                    <img src="<?=base_url()?>webroot/admin/portfolio/<?=$value->image?>">
                  </div>
                </div>
              </div>
            </div>
          <?php } }?>

          </div>
        </div>
      </div>
    </section>
    <!-- Our works end -->
    <!----- leading industries start ----->
    <section id="leading-industries">
      <div class="leading-industries project-page">
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

    <!-- -------Our works start------- -->
    <section id="our-works">
      <div class="our-works project-page">
        <div class="title-upperpart">
          <h2 class="section-title wow animate__animated animate__fadeInDown">OUR <strong>STUNNING PROJECTS</strong></h2>
        </div>
        <div class="container">
          <div class="row">
<?php 
// print_r($Portfolio);
 if(!empty($Portfolio))
{
foreach ($Portfolio as $key => $value) {
?>
            <div class="col-md-4 col-sm-6">
              <div class="work-item">
                <div class="card transition">
                  <h2 class="transition wow animate__animated animate__fadeInLeft"><?=$value->project_name?></h2>
                  <p class="wow animate__animated animate__fadeInRight"><?=$value->description?></p>
                  <div class="cta-container transition"><a href="<?=$value->project_link?>" class="btn_2">Have a look</a></div>
                  <div class="card_circle transition">
                    <img src="<?=base_url()?>webroot/admin/portfolio/<?=$value->image?>">
                  </div>
                </div>
              </div>
            </div>
          <?php } }?>

          </div>
        </div>
      </div>
    </section>
    <!-- Our works end -->


    