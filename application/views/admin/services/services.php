<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div id="edit_data">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services Add</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="<?=base_url('admin/service_add')?>" id="services" method="post" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Services Banner Images</label>
                                        <img src="<?=base_url('webroot/admin/images/Add-Photo-Button.png')?>" id="upload_services_banner" onclick="get_upload_services_banner()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="banner_image" class="validate[required]" id="services_banner_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_banner_show_photo(this)">
                                            <span id="image_required" class="formErrorContent1 formErrorArrowBottom1" style="display: none;">Image is required</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Services icon</label>
                                        <img src="<?=base_url('webroot/admin/images/Add-Photo-Button.png')?>" id="upload_services_icon" onclick="get_upload_services_icon()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="icon_image" class="validate[required]" id="services_icon_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_icon_show_photo(this)">
                                            <span id="image_required" class="formErrorContent1 formErrorArrowBottom1" style="display: none;">Image is required</span>
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Services Name</label>
                                            <input type="text" name="services_name" id="services_name" class="form-control validate[required]" data-errormessage-value-missing="Services name is required" data-prompt-position="bottomLeft" placeholder="Enter services name" maxlength="200">      
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Icon Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control validate[required]" data-errormessage-value-missing="Description is required" data-prompt-position="bottomLeft"placeholder="Enter description" ></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Banner Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="banner_description" id="banner_description" class="form-control validate[required]" data-errormessage-value-missing="Banner description is required" data-prompt-position="bottomLeft"placeholder="Enter banner description" ></textarea> 
                                       </div> 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset"><strong>Cancel</strong></button>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 756px;" onclick="check_services_banner()"><strong>Save<strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Services Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Services Name</th>
                                       <th>Banner Name</th>
                                       <th>Banner Images</th>
                                       <th>Icon Images</th>
                                       <th>Icon Description</th>
                                       <th>Banner Description</th>
                                       <th>Status</th>
                                       <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($services_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><div><?=$value->services_name?></div></td>
                                        <td><?=$value->services_name?></td>
                                        <td>
                                            <img src="<?=base_url('webroot/admin/services_banner/'.$value->services_images)?>" class="showTableImage" id="product_img">
                                        </td>
                                        <td>
                                            <img src="<?= base_url('webroot/admin/services_icon/'.$value->services_icon)?>" class="showTableImage" id="product_img">
                                        </td>
                                        <td><div class="all_seller_table_width">
                                          <?php if(!empty($value->description)){
                                            $description = strlen($value->description) > 10 ? substr($value->description,0,10)."..." : $value->description;?>

                                            <span id="more_about_<?=$value->uniqcode?>">
                                                <?php
                                                  echo $description.'...'; 
                                                ?>
                                                <?php
                                                  echo '<a href="javascript:void(0)" onclick="show_more_about(\''.$value->uniqcode.'\')">more</a>';
                                                ?>
                                            </span>
                                            <span id="less_about_<?=$value->uniqcode?>" style="display: none" >
                                                  <?php
                                                    echo  $value->description;
                                                  ?>
                                                  <?php
                                                    echo '<a onclick="show_less_about(\''.$value->uniqcode.'\')" href="javascript:void(0)">less</a>';   
                                                  ?>
                                            </span>
                                            <?php } ?>  
                                          </div></td>
                                          <td><div class="all_seller_table_width">
                                          <?php if(!empty($value->banner_description)){
                                            $banner_description = strlen($value->banner_description) > 10 ? substr($value->banner_description,0,10)."..." : $value->banner_description;?>

                                            <span id="more_contact_<?=$value->uniqcode?>">
                                                <?php
                                                  echo $banner_description.'...'; 
                                                ?>
                                                <?php
                                                  echo '<a href="javascript:void(0)" onclick="show_more_contact(\''.$value->uniqcode.'\')">more</a>';
                                                ?>
                                            </span>
                                            <span id="less_contact_<?=$value->uniqcode?>" style="display: none" >
                                                  <?php
                                                    echo  $value->banner_description;
                                                  ?>
                                                  <?php
                                                    echo '<a onclick="show_less_contact(\''.$value->uniqcode.'\')" href="javascript:void(0)">less</a>';   
                                                  ?>
                                            </span>
                                            <?php } ?>  
                                          </div></td>
                                        <td>
                                            <input type="checkbox" class="js-switch" onchange="common_status_change(this.value)" id="status" value="<?=$value->uniqcode?>" <?=$value->status == 'Active' ? 'checked' : ''?> /></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="edit_action('<?=$value->uniqcode?>')" id="get_action_val_<?=$value->uniqcode?>"> <i class="fa fa-pencil"></i></a>

                                                <a href="<?=base_url('admin/services/destroy/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this services name?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>    
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>



