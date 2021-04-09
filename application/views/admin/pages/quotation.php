<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div id="edit_data">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quotation</h4>  
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="<?=base_url('admin/page-addquotation')?>" id="portfolio" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    <div class="form-group">
                                        <img src="<?=base_url('webroot/admin/images/Add-Photo-Button.png')?>" id="upload_portfolio" onclick="get_upload_portfolio()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="portfolio_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="portfolio_show_photo(this)">
                                            <span id="image_required" class="formErrorContent1 formErrorArrowBottom1" style="display: none;">Image is required</span>
                                    </div>
                                  </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Banner Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control" data-prompt-position="bottomLeft"placeholder="Enter banner description" ></textarea> 
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
                                    <button type="submit" class="btn btn-primary"  id="save_submit" style="margin-left: 756px;" onclick="checkportfolio()"><strong>Save<strong></button>
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
                        <h4 class="card-title">Quotation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Description</th>
                                       <th>Images</th>
                                        <th>Head</th>
                                        <th>Start Body</th>
                                        <th>Close Body</th>
                                       <th>Status</th>
                                       <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($banner_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
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
                                            <img src="<?= base_url('webroot/admin/bannerquotation/'.$value->image)?>" class="showTableImage" id="product_img">
                                        </td>
                                        <td>
                                          <textarea rows="2" cols="30" style="resize:none;width:210px;height:108px;border:none;"readonly id="description" class="form-control ">
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
                                            <input type="checkbox" class="js-switch" onchange="common_status_change_pages(this.value,'quotation')" id="status" value="<?=$value->uniqcode?>" <?=$value->status == 'Active' ? 'checked' : ''?> /></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="edit_action_pages('<?=$value->uniqcode?>','page-quotation')" id="get_action_val_<?=$value->uniqcode?>"> <i class="fa fa-pencil"></i></a>

                                                <a href="<?=base_url('admin/page-quotation/destroy/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this quotation?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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



