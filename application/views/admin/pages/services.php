<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div id="edit_data">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="<?=base_url('admin/page-addservices')?>" id="services_type" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    <div class="form-group">
                                        <img src="<?=base_url('webroot/admin/images/Add-Photo-Button.png')?>" id="upload_services" onclick="get_upload_services()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="services_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_show_photo(this)">
                                            <span id="image_required" class="formErrorContent1 formErrorArrowBottom1" style="display: none;">Image is required</span>
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Services Type</label>
                                            <select name="services_type" id="services_type"  class="form-control validate[required]" data-errormessage-value-missing="Services type is required" data-prompt-position="bottomLeft" >
                                            <option value="">Select Services Type</option>
                                            <?php foreach($service_data as $key => $service) {?>
                                            <option value="<?=$service->services_name?>"><?=$service->services_name?></option>
                                            <?php }?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter description" ></textarea> 
                                       </div> 
                                    </div>
                                </div>
                                   <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code before &lt;/head&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="head" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter code before head tag" ></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code after &lt;body&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="start_body" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter code after body tag" ></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code before &lt;/body&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="close_body" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter code before body tag" ></textarea> 
                                       </div> 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset"><strong>Cancel</strong></button>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 756px;" onclick="checkservices()"><strong>Save<strong></button>
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
                        <h4 class="card-title">Services Type Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Services Type</th>
                                       <th>Description</th>
                                       <th>Images</th>
                                       <th>Head</th>
                                       <th>Start Body</th>
                                       <th>End Body</th>
                                       <th>Status</th>
                                       <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ser_type_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                         <td><?=$value->name?></td>
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
                                        <td>
                                            <img src="<?= base_url('webroot/admin/bannerservices/'.$value->image)?>" class="showTableImage" id="product_img">
                                        </td>
                                        <td><textarea rows="2" cols="30" style="resize:none;width:210px;height:108px;border:none;"readonly id="description" class="form-control ">
                                          <?=$value->head?>
                                        </textarea>
                                         </td>
                                          <td>
                                            <textarea rows="2" cols="30" style="resize:none;width:210px;height:108px;border:none;"readonly id="description" class="form-control ">
                                          <?=$value->start_body?>
                                        </textarea>
                                         </td>
                                          <td>
                                           <textarea rows="2" cols="30" style="resize:none;width:210px;height:108px;border:none;"readonly id="description" class="form-control ">
                                          <?=$value->close_body?>
                                        </textarea>
                                         </td>
                                        <td>
                                            <input type="checkbox" class="js-switch" onchange="common_status_change_pages(this.value,'services')" id="status" value="<?=$value->uniqcode?>" <?=$value->status == 'Active' ? 'checked' : ''?> /></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="edit_action_pages('<?=$value->uniqcode?>','page-services')" id="get_action_val_<?=$value->uniqcode?>"> <i class="fa fa-pencil"></i></a>

                                                <a href="<?=base_url('admin/services/destroy/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this services type?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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



