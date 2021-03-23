 <!-- Footer start -->
            <div class="footer">
                <div class="copyright">
                    <?php if(!empty($foot_con)) { ?>
                    <p><?=$foot_con->footer_copy_right?></p>
                <?php } ?>
                </div>
            </div>
            <!-- Footer end -->
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
        <script src="<?=base_url()?>webroot/admin/js/custom.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>webroot/admin/js/switchery/switchery.js"></script> <!-- For Custom js -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- --------Scripts end-------- -->
        <script type="text/javascript">
            $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>
    </body>
</html>