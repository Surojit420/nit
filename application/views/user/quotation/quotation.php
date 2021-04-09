

    <!-- ---Development section start--- -->
      <section id="development">
        <div class="development">
          <div class="free-quote">
            <div class="container">
              <div class="col-md-6 col-sm-6">
                <h3 class="section-heading" style="font-size: 40px">
                  <?php  if(!empty($banner_image)) { ?>
                   <?=$banner_image->description?>
                   <?php  } ?></h3>
                <p class="section-content">
                 
                </p>
              </div>
              <div class="col-md-6 col-sm-6">
                <?php if(!empty($banner_image)) { ?>
                <img src="<?=base_url()?>webroot/admin/bannerquotation/<?=$banner_image->image?>">
              <?php } ?>
              </div>
            </div>
          </div>
          <div class="php-development">
            <div class="container">
              <div class="col-md-5 col-sm-5">
                <img src="<?=base_url()?>webroot/user/images/quote_form.png">
              </div>
              <div class="col-md-7 col-sm-7">
                <div class="quotation-form">
                  <form action="<?=base_url('quotation/send')?>" method="post" enctype= multipart/form-data>
                  <form action="quotation">
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="text" name="name" id="name" required />
                        <label for="name">Your name:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="text" name="email" id="email" required />
                        <label for="email">Email:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="number" name="phone" id="phone" required />
                        <label for="phone">Phone No:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="number" name="budget" id="budget" required />
                        <label for="budget">Budget:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="text" name="wbsite" id="website" required />
                        <label for="website">Website if any:</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-field">
                        <input type="file" name="file" id="file" required />
                        <label style="top: -24px;" for="file">Attach file:<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <textarea required name="subject" id="subject"></textarea>
                        <label for="subject">Service(s) You're Interested in<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <textarea required id="project" name="project"></textarea>
                        <label for="project">Tell Us about your Project<span style="color: red">*</span></label>
                      </div>
                    </div>
                    <div class="col-md-12">
                  <button class="btn_3" type="submit">Send</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Development section end -->

