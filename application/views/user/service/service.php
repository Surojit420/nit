
    <!-- ---Development section start--- -->
      <section id="development">
        <div class="development">
          <?php
         // print_r($servics_type_pages);
          if (!empty($servics_type_pages))
           {
         foreach ($servics_type_pages as $key => $value)
         {
          ?>
          <div class="website-development">
            <div class="container">
              <div class="col-md-6 col-sm-8">
                <h3 class="section-heading wow animate__animated animate__backInDown"><?=$value->name?></h3>
                <p class="section-content wow animate__animated animate__backInUp">
                  <?=$value->description?>
                </p>
                <a href="<?=base_url()?>" class="btn_3 wow animate__animated animate__backInLeft">Get A Free Quote</a>
              </div>
            </div>
          </div>
          <?php
          }
        }
          ?>
          <?php
          if (!empty($servics_type)) {
          for($i=1; $i<=count($servics_type); $i++)
          {
            if($i%2 !=0)
            {
          ?>
              <div class="php-development">
                <div class="container">
                  <div class="col-md-5 col-sm-5">
                    <img class="wow animate__animated animate__flipInX" src="<?=ADMIN_PATH.'webroot/admin/services/'.$servics_type[$i-1]->image?>">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h3 class="section-heading wow animate__animated animate__backInDown"><?=$servics_type[$i-1]->develop_name?></h3>
                    <p class="section-content wow animate__animated animate__backInUp">
                      <?=$servics_type[$i-1]->description?>
                    </p>
                    <a href="<?=base_url()?>" class="btn_3 wow animate__animated animate__backInLeft">Get A Free Quote</a>
                  </div>
                </div>
              </div>
            <?php
            }
            else
            {
            ?>
              <div class="codeigniter-development">
                <div class="container rev-order">
                  <div class="col-md-7 col-sm-7">
                    <h3 class="section-heading wow animate__animated animate__backInDown"><?=$servics_type[$i-1]->develop_name?></h3>
                    <p class="section-content wow animate__animated animate__backInUp">
                      <?=$servics_type[$i-1]->description?>
                    </p>
                    <a href="<?=base_url()?>" class="btn_3 wow animate__animated animate__backInLeft">Get A Free Quote</a>
                  </div>
                  <div class="col-md-5 col-sm-5">
                    <img class="wow animate__animated animate__flipInX" src="<?=ADMIN_PATH.'webroot/admin/services/'.$servics_type[$i-1]->image?>">
                  </div>
                </div>
              </div>
            <?php
            }
          }
        }
          ?>   

        </div>
      </section>
    <!-- Development section end -->

