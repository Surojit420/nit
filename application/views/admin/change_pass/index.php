<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                           <form action="<?=base_url('admin/changepassword')?>" id="change_password" method="post">
                                <div class="form-group">
                                    <label class="mb-1"><strong>Current Password</strong></label>
                                    <input type="password" name="current_password" id="current_password" class="form-control validate[required]"  maxlength="20" data-errormessage-value-missing="Current password is required" data-prompt-position="bottomLeft" placeholder="Type current password"/>
                                    <i class="fa fa-eye-slash showicon" onclick="toggleShowPassword1()" id="showicon1"></i>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>New password</strong></label>
                                    <input type="password" name="password" id="password" class="form-control validate[required,minSize[6], maxSize[16]]"  maxlength="20" data-errormessage-value-missing="New password is required" data-prompt-position="bottomLeft" placeholder="Type new password"/>
                                    <i class="fa fa-eye-slash showicon" onclick="toggleShowPassword()" id="showicon"></i>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Confirm password</strong></label>
                                    <input type="password" id="confrim_password" name="confrim_password" class="form-control validate[required,equals[password],minSize[6], maxSize[16]]" data-errormessage-value-missing="Confirm new password is required" data-prompt-position="bottomLeft" placeholder="Type Confirm new password"/>
                                    <i class="fa fa-eye-slash showicon" onclick="toggleShowPassword2()" id="showicon2"></i>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>