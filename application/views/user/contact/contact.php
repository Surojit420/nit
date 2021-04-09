

    <!-- ---Development section start--- -->
      <section id="development">
        <div class="development">
          <div class="free-quote">
            <div class="container rev-order">
              <div class="col-md-6 col-sm-6">
                <!-- <h3 class="section-heading">LET'S MAKE SOMETHING GREAT TOGETHER</h3> -->
                <p class="section-content wow animate__animated animate__backInDown">
                  <?php  if(!empty($banner_image)) { ?>
                   <?=$banner_image->description?>
                   <?php  } ?>
                </p>

                <p class="drop-mail wow animate__animated animate__backInUp">Drop your mail at <span>info@nitsolution.in /support@nitsolution.in</span></p>


                <a href="" class="btn_3 wow animate__animated animate__backInLeft">Get A Free Quote</a>
              </div>
              <div class="col-md-6 col-sm-6">
                <?php if(!empty($banner_image)) { ?>
                <img class="img-on-banner wow animate__animated animate__flipInX" style="height: auto; width: inherit; float: right;" src="<?=base_url()?>webroot/admin/bannercontactus/<?=$banner_image->image?>">
              <?php } ?>
              </div>
            </div>
          </div>
          <div class="php-development">
            <div class="container">
              <div class="quotation-form-innerpart">
                <div class="title-upperpart">
                  <h3 class="wow animate__animated animate__rotateInDownLeft">HAVE A BUSINESS CONVERSATION ?</h3>
                  <h2 class="section-title wow animate__animated animate__fadeInDown">WRITE <strong>TO US</strong></h2>
                </div>
                <div class="quotation-form">
                  <form role="form" id="validation_data" action="<?=base_url('business')?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" id="name" name="name" required />
                        <label for="name">Name:<span style="color: red">*</span></label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" id="email" name="email" required />
                        <label for="email">Email:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" id="phone_no" name="phone_no" required />
                        <label for="phone_no">Phone No:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field wow animate__animated animate__slideInUp">
                        <input type="text" id="subject" name="subject" required />
                        <label for="subject">Subject:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-field wow animate__animated animate__slideInUp">
                        <textarea required id="description" name="description"></textarea>
                        <label for="description">How can we help<span style="color: red">*</span></label>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <input type="submit" class="btn_3 wow animate__animated animate__slideInUp">
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Development section end -->


   