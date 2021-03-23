<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div id="edit_data">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Job Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="<?=base_url('admin/add_job_summary')?>" id="job_summary" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control validate[required]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" placeholder="Enter name" maxlength="200">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" name="location" id="location" class="form-control validate[required]" data-errormessage-value-missing="Location is required" data-prompt-position="bottomLeft" placeholder="Enter location name" maxlength="200">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <input type="text" name="experience" id="experience" class="form-control validate[required]" data-errormessage-value-missing="Experience is required" data-prompt-position="bottomLeft" placeholder="Enter experience" maxlength="200">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" id="summernote" class=" description " rows="4" cols="30" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset"><strong>Cancel</strong></button>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 756px;"><strong>Save<strong></button>
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
                        <h4 class="card-title">Job Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Name</th>
                                       <th>Location</th>
                                       <th>Experience</th>
                                       <th>Description</th>
                                       <th>Status</th>
                                       <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($banner_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$value->name?></td>
                                        <td><?=$value->location?></td>
                                        <td><?=$value->experience?></td>
                                        <td><div class="all_seller_table_width">
                                            <?=$value->description?> 
                                          </div>

                                      </td>
                                        <td>
                                            <input type="checkbox" class="js-switch" onchange="common_status_change(this.value)" id="status" value="<?=$value->uniqcode?>" <?=$value->status == 'Active' ? 'checked' : ''?> /></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?=base_url('admin/job_summary/view/'.$value->uniqcode)?>" class="btn btn-primary shadow btn-xs sharp mr-1"> <i class="fa fa-pencil"></i></a>

                                                <a href="<?=base_url('admin/job_summary/destroy/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this job summary?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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



