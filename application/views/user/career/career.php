    <!-- ---Development section start--- -->
      <section id="development">
        <div class="development">
          <div class="free-quote">
            <div class="container rev-order">
              <div class="col-md-6 col-sm-6">
                <h3 class="section-heading wow animate__animated animate__backInDown">CAREER</h3>
                <p class="section-content wow animate__animated animate__backInUp">
                   <?php  if(!empty($banner_image)) { ?>
                   <?=$banner_image->description?>
                   <?php  } ?>
                </p>

                <p class="drop-mail wow animate__animated animate__backInLeft">Drop your CV/Resume at <span>info@nitsolution.in /support@nitsolution.in</span></p>
                <!-- <a href="blog.html" class="btn_3">Get A Free Quote</a> -->
              </div>
              <div class="col-md-6 col-sm-6">
                <?php if(!empty($banner_image)) { ?>
                <img class="img-on-banner wow animate__animated animate__flipInX" style="height: auto; width: inherit; float: right;" src="<?=base_url()?>webroot/admin/bannercareer/<?=$banner_image->image?>">
              <?php } ?>
              </div>
            </div>
          </div>
           <?php if(!empty($job_summary)) { ?>
          <section id="current-opening">
            <div class="current-opening">
              <div class="title-upperpart">
                <h2 class="section-title wow animate__animated animate__fadeInDown">CURRENT <strong>OPENINGS</strong></h2>
              </div>
             
              <div class="container">
                 <?php
                      foreach ($job_summary as $key=> $job_summary_data) 
                      {
                    ?>
                <div class="col-md-6 col-sm-6">
                  <div class="panel-group">
                    <div class="panel panel-default wow animate__animated animate__zoomIn">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1">
                            <p class="job-tittle"><?=$job_summary_data->name?></p>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">
                        <div class="job-card-inner">
                          <div class="row">
                            <div class="col-md-6">
                              <p class="job-location"><i class="fa fa-map-marker" aria-hidden="true"></i><?=$job_summary_data->location?></p>
                            </div>
                            <div class="col-md-6">
                              <p class="experience"><span>Experience:</span> 1 to 5 years</p>
                            </div>
                          </div>
                          <p class="description">Job Description</p>
                          <ul>
                            <li><p>Must have experience in handling bidding portals like freelancer.com, Guru.com, upwork.com</p></li>
                            <li><p>Experience in bidding with LinkedIn, Facebook.</p></li>
                            <li><p>Should have knowledge of email marketing and follow-up with the client???s response.</p></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>

            </div>
          </section>
           <?php } ?>
 <div class="php-development">
            <div class="container">
              <div class="quotation-form-innerpart">
                <div class="title-upperpart">
                  <h3 class="wow animate__animated animate__rotateInDownLeft">BE A PART OF NIT</h3>
                  <h2 class="section-title wow animate__animated animate__fadeInDown">APPLY <strong>NOW</strong></h2>
                </div>
                <div class="quotation-form">
                  <form action="<?=base_url('job-apply')?>" method="post" enctype= multipart/form-data>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" name="name" id="name" required="" />
                        <label for="name">Name:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" name="email" id="email" required="" />
                        <label for="email">Email:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" name="phone" id="phone" required="" />
                        <label for="phone">Phone No:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" name="position" id="position" required="" />
                        <label for="position">Position you are looking for:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" name="experience" id="experience" required="" />
                        <label for="experience">Your experience:</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="file" name="file" id="file" required="" />
                        <label style="top: -24px;" >Upload CV:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <button class="btn_3 wow animate__animated animate__slideInUp" type="submit">Apply</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Development section end -->







  