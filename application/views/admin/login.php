
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>NIT Solution Admin</title>
        <meta name="description" content="Some description for the page" />

        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>webroot/admin/images/logo.png" /> <!-- For url icon -->
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
        <div class="deznav-scroll" style="display: none;"></div>
        <div class="authincation h-100">
            <div class="auth-form">
                <div class="logo-login">
                    <img src="<?=base_url()?>webroot/admin/images/logo.png">
                </div>
                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                <form  action="<?=base_url('admin/verify')?>" id="login_form" method="post">
                    <div class="form-group">
                        <label class="mb-1"><strong>Email Id</strong></label>
                        <input type="user" class="form-control validate[required]" name="user_id" id="user_id" data-errormessage-value-missing="User id is required!" data-prompt-position="bottomLeft"  maxlength="40" placeholder="Enter email id"/>
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" class="form-control validate[required,minSize[6], maxSize[16]]" name="password" id="password" data-errormessage-value-missing="Password is required!" data-prompt-position="bottomLeft"  maxlength="20" placeholder="Enter password"/>
                        <i class="fa fa-eye-slash showicon" onclick="toggleShowPassword()" id="showicon"></i>
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1" />
                                <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <a class="forgot-text text-primary" href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                    </div>
                </form>
                <!-- <div class="new-account mt-3">
                    <p>Don't have an account? <a class="text-primary" href="#">Sign up</a></p>
                </div> -->
            </div>       
        </div>

        <!-- --------Scripts start-------- -->
        <script src="<?=base_url()?>webroot/admin/js/global.min.js" type="text/javascript"></script> <!-- For jquery -->
        <script src="<?=base_url()?>webroot/admin/js/bootstrap-select.min.js" type="text/javascript"></script> <!-- For some bootstrap methods -->
        <script src="<?=base_url()?>webroot/admin/js/slick.js" type="text/javascript"></script>   <!-- slick slider -->
        <script src="<?=base_url()?>webroot/admin/js/dataTables.min.js" type="text/javascript"></script> <!-- For data tables -->
        <script src="<?=base_url()?>webroot/admin/js/select2.min.js" type="text/javascript"></script> <!-- For different types of select dropdown -->
        <script src="<?=base_url()?>webroot/admin/js/moment.min.js" type="text/javascript"></script> <!-- For first 3 date picker & Material Date Picker -->
        <script src="<?=base_url()?>webroot/admin/js/daterangepicker.js" type="text/javascript"></script> <!-- For first 3 date picker -->
        <script src="<?=base_url()?>webroot/admin/js/bootstrap-clockpicker.min.js" type="text/javascript"></script> <!-- For time picker -->
        <script src="<?=base_url()?>webroot/admin/js/jquery-asGradient.min.js" type="text/javascript"></script> <!-- For Gradiant  Color picker -->
        <script src="<?=base_url()?>webroot/admin/js/jquery-asColorPicker.min.js" type="text/javascript"></script> <!-- For Color picker -->
        <script src="<?=base_url()?>webroot/admin/js/bootstrap-material-datetimepicker.js" type="text/javascript"></script> <!-- For Material Date Picker -->
        <script src="<?=base_url()?>webroot/admin/js/picker.date.js" type="text/javascript"></script> <!-- For default Date Picker -->
        <script src="<?=base_url()?>webroot/admin/js/clock-picker-init.js" type="text/javascript"></script> <!-- For time picker -->
        <script src="<?=base_url()?>webroot/admin/js/sweetalert.min.js" type="text/javascript"></script> <!-- For sweet alert -->
        <script src="<?=base_url()?>webroot/admin/js/texteditor.min.js" type="text/javascript"></script> <!-- For text editor -->
        <script src="<?=base_url()?>webroot/admin/js/toastr.min.js" type="text/javascript"></script> <!-- For validate js -->
        <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine.js'></script>
        <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine-en.js'></script>
        <script src="<?=base_url()?>webroot/admin/js/custom.min.js" type="text/javascript"></script> <!-- For Custom js -->
        <!-- --------Scripts end-------- -->
    </body>
</html>
