<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="8dmF62AEQ8wuBtZpKdigfLu4jRUz3_2rSdJtKpNFuj4"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<link rel="canonical" href="https://www.nitsolution.in/">
	
    <title><?=$page_title?></title>
    <!-- =========== STYLESHEETS ============== -->
    <?php if(!empty($logo)) { ?>
    <link rel="icon" href="<?=base_url()?>webroot/admin/logo/web/<?=$logo->image?>" type="image/x-icon" sizes="16x16">
  <?php } ?>
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/slick.css" type="text/css"> <!-- slick slider -->
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/slick-theme.css" type="text/css"> <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/user/css/font-awesome.css">
    <link rel="stylesheet" href="https://zavoloklom.github.io/material-design-iconic-font/css/docs.md-iconic-font.min.css">
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/toastr.min.css">
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/validationEngine.jquery.css">
    <link rel="stylesheet" href="<?=base_url()?>webroot/user/css/style.css">
	
	<meta name="keywords" content="web development,Web Design,Website development,Website Design,mobile apps,mobile Application,mobile apps development">
	<meta name="description" content="NIT Solution Pvt. Ltd. is the best low cost Website and Mobile Apps Development Company in India. Also provide Graphic Design, UI-UX, SEO, E-Commerce solutions."/>


	
	
	
  </head>
 
  <body>
    <!-- Back to top button start -->
        <a class="bounce-2" id="back-to-top">
          <i class="back-top-icon"></i>
        </a>
    <!-- Back to top button end -->

    <!------------ Header start---------- -->
    <header class="main_h sticky">
      <div class="container">
        <div class="header-innerpart">
          <?php if(!empty($logo)){ ?>
          <a class="logo" href="<?=base_url()?>">
           
           <img src="<?=base_url()?>webroot/admin/logo/web/<?=$logo->image?>">

           </a>
         <?php } 
         ?>
          <div class="mobile-toggle">
              <span></span>
              <span></span>
              <span></span>
          </div>

          <nav>
              <ul class="header-pages">
                  <li class="main-menu"><a class="menu" href="<?=base_url()?>">HOME</a></li>
                  <li class="main-menu"><a class="menu" href="<?=base_url('portfolio')?>">PORTFOLIO</a></li>
                  <li class="main-menu">
                    <a class="menu" href="javascript:void(0);">
                      SERVICES
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub-menus">
                      <?php

                        foreach ($servics as $servics_data) 
                        {
                      ?> 
                      <li><a href="<?=base_url()?>service-<?php echo str_replace(' ','-',preg_replace('/[&]+/','and',strtolower($servics_data->services_name))); ?>"><?=$servics_data->services_name?></a></li>
                      <?php
                        }
                      ?>
                    </ul>
                  </li>
                  <li class="main-menu">
                    <a class="menu" href="javascript:void(0);">
                      MORE INFO
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub-menus">
                      <li><a href="<?=base_url('career')?>">Career</a></li>
                     <!--  <li><a href="<?=base_url('blog')?>">Blog</a></li> -->
                      <li><a href="<?=base_url('quotation')?>">Quotation</a></li>
                    </ul>
                  </li>
                  <li class="main-menu"><a class="menu" href="<?=base_url('about-us')?>">ABOUT US</a></li>
                  <li class="main-menu"><a class="menu" href="<?=base_url('contact-us')?>">CONTACT US</a></li>
              </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- Header end -->
<?php
  if($this->session->flashdata('success'))
  {
      $this->load->view('user/msg/success');
  }
  if($this->session->flashdata('error'))
  {                
      $this->load->view('user/msg/error'); 
  }
?>
<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
<input type="hidden" name="current_url" id="current_url" value="<?=current_url();?>">