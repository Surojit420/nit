<div class="content-body">
    <div class="container-fluid">
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Business</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 854px">
                                <thead>
                                    <tr>
                                       <th>Index</th>
                                       <th>Name</th>
                                       <th>Email Id</th>
                                       <th>Phone No</th>
                                       <th>Subject</th>
                                       <th>Description</th>
                                       <th>Date Time</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($business_data as $key => $value) {?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$value->name?></td>
                                        <td><?=$value->email?></td>
                                        <td><?=$value->phone_no?></td>
                                        <td><?=$value->subject?></td>
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



