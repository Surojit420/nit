<div class="content-body">
    <div class="container-fluid">
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Applay Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Position</th>
                                       <th>Experience</th>
                                       <th>File</th>
                                       <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($job_applay_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$value->name?></td>
                                        <td><?=$value->email?></td>
                                        <td><?=$value->phone?></td>
                                        <td><?=$value->position?></td>
                                        <td><?=$value->experience?></td>
                                        <td><a href="<?=base_url('../webroot/user/career_file')?>/<?=$value->documents?>"><?=$value->documents?></a></td>
                                        <!-- <td><div class="all_seller_table_width">
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
                                          </div>
                                        </td> -->
                                        <td><div style="min-width: max-content;"><?=$value->datetime?></div></td>   
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
