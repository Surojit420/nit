<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div id="edit_data">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">common</h4>  
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="<?=base_url('admin/page-addcommon')?>" id="portfolio" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code before &lt;/head&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="head" id="description" class="form-control  data-prompt-position="bottomLeft"placeholder="Enter code before head tag" ></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code after &lt;body&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="start_body" id="description" class="form-control "  data-prompt-position="bottomLeft"placeholder="Enter code after body tag" ></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Code before &lt;/body&gt; tag</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="close_body" id="description" class="form-control "  data-prompt-position="bottomLeft"placeholder="Enter code before body tag" ></textarea> 
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
                        <h4 class="card-title">Common</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
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
                                            <input type="checkbox" class="js-switch" onchange="common_status_change_pages(this.value,'common')" id="status" value="<?=$value->uniqcode?>" <?=$value->status == 'Active' ? 'checked' : ''?> /></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1" onclick="edit_action_pages('<?=$value->uniqcode?>','page-common')" id="get_action_val_<?=$value->uniqcode?>"> <i class="fa fa-pencil"></i></a>
                                                <a href="<?=base_url('admin/page-common/destroy/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this common?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
