<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title><?=$page_title;?></title>
        <meta name="description" content="Some description for the page" />
<?php if(!empty($logo_icons)) { ?>

        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('webroot/admin/logo/web/'.$logo_icons->image)?>" />
     <?php   } ?><!-- For url icon -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/bootstrap-select.min.css"/> <!-- For bootstrap select -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/variable.css"/> <!-- For scss variables -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/font-awesome.css"> <!-- For Fontawesome icons -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/slick.css"> <!-- For slick slider -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/slick-theme.css"> <!-- For slick slider -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/dataTables.min.css"/> <!-- For data tables -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/daterangepicker.css"/> <!-- For first 3 date picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/bootstrap-material-datetimepicker.css"/> <!-- For Material Date Picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/default-date.css"/> <!-- For default Date Picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/bootstrap-clockpicker.min.css"/> <!-- For time picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/asColorPicker.min.css"/> <!-- For Color picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/select2.min.css"/> <!-- For beautiful select box -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/sweetalert.min.css"/> <!-- For Sweet alert -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/texteditor.css"/> <!-- For texteditor css -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/toastr.min.css"/> <!-- For toastr css -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/validationEngine.jquery.css"/> <!-- For validationEngine css -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/admin/css/style.css"/> <!-- For custom scss -->
        <link href="<?=base_url()?>webroot/admin/css/switchery/switchery.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <?php
            if($this->session->flashdata('success'))
            {
                $this->load->view('admin/msg/success');
            }
            if($this->session->flashdata('error'))
            {                
                $this->load->view('admin/msg/error'); 
            }
        ?>
        <input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
        <input type="hidden" name="current_url" id="current_url" value="<?=current_url();?>">
      <!-- Preloader start -->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
      <!-- Preloader end -->

        <div id="main-wrapper">
            <div class="nav-header">
              <!-- Navbar logo start -->
              <?php if(!empty($logo_icons)) { ?>
                <a href="<?=base_url()?>" class="brand-logo">
                    <img class="logo-abbr" src="<?=base_url('webroot/admin/logo/web/'.$logo_icons->image)?>" alt="" />
                </a>
            <?php } ?>
              <!-- Navbar logo end -->

              <!-- Navbar open close button start -->
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span><span class="line"></span><span class="line"></span></div>
                </div>
              <!-- Navbar open close button end -->
            </div>
            
            <!-- Top header start -->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                
                            </div>
                            <ul class="navbar-nav header-right">
                                <!-- Notification start -->
                             <!--    <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link ai-icon" href="javascript:;" role="button" data-toggle="dropdown">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z"
                                                fill="#3E4954"
                                            />
                                        </svg>
                                        <span class="badge text-white bg-primary">12</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right p-3">
                                        <div id="DZ_W_Gifts" class="widget-timeline dz-scroll style-1">
                                            <ul class="timeline">
                                                <li>
                                                    <div class="timeline-badge primary"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>10 minutes ago</span>
                                                        <h6 class="">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge info"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>20 minutes ago</span>
                                                        <h6 class="">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                                        <p class="">Quisque a consequat ante Sit amet magna at volutapt...</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge danger"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>30 minutes ago</span>
                                                        <h6 class="">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge success"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>15 minutes ago</span>
                                                        <h6 class="">StumbleUpon is acquired by eBay.</h6>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge warning"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>20 minutes ago</span>
                                                        <h6 class="">Mashable, a news website and blog, goes live.</h6>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="timeline-badge dark"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:;">
                                                        <span>20 minutes ago</span>
                                                        <h6 class="">Mashable, a news website and blog, goes live.</h6>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- Notification end -->

                                <!-- Profile start -->
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                                        <div class="header-info" >
                                            <small style="color: midnightblue;"><?php
                                                /* This sets the $time variable to the current hour in the 24 hour clock format */
                                                $time = date("H");
                                                /* Set the $timezone variable to become the current timezone */
                                                $timezone = date("e");
                                                /* If the time is less than 1200 hours, show good morning */
                                                if ($time < "12") {
                                                    echo "Good Morning";
                                                } else
                                                /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                                                if ($time >= "12" && $time < "17") {
                                                    echo "Good Afternoon";
                                                } else
                                                /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                                                if ($time >= "17" && $time < "19") {
                                                    echo "Good Evening";
                                                } else
                                                /* Finally, show good night if the time is greater than or equal to 1900 hours */
                                                if ($time >= "19") {
                                                    echo "Good Night";
                                                }
                                                ?></small>
                                            <span>
                                                <?php
                                                $first_name=$this->session->userdata('adminDetails')->first_name;
                                                $last_name=$this->session->userdata('adminDetails')->last_name;
                                                if(!empty($first_name))
                                                {
                                                    echo $first_name.' '.$last_name;
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <img src="<?=base_url()?>webroot/admin/images/ICONS.png" width="20" alt="" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        
                                         <a href="<?=base_url('admin/changepassword')?>" class="dropdown-item ai-icon">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <span class="ml-2">Change Password </span>
                                        </a>
                                        
                                        <a href="<?=base_url('logout')?>" class="dropdown-item ai-icon">
                                            <svg
                                                id="icon-logout"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="text-danger"
                                                width="18"
                                                height="18"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </div>
                                </li>
                                <!-- Profile end -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Top header end -->