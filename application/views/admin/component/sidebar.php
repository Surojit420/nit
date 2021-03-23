<?php
    $controller_name=$this->router->fetch_class();
    $method_name=$this->router->fetch_method();
?>
 
   <!-- Side nav start -->
            <div class="deznav">
                <div class="deznav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="<?=$controller_name=='DashboardController' ? 'active' : ''?>" >
                            <a href="<?=base_url('admin/dashboard')?>" class="ai-icon" aria-expanded="false">
                                <i class="fa fa-trophy" aria-hidden="true"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- Setting -->
                        <li class="<?=$controller_name=='LogoController' ? 'active' : ''?>  <?=$controller_name=='FootContactController' ? 'active' : ''?> <?=$controller_name=='BannerController' ? 'active' : ''?> <?=$controller_name=='MissionController' ? 'active' : ''?> <?=$controller_name=='VisionController' ? 'active' : ''?> <?=$controller_name=='TechnologiesController' ? 'active' : ''?> <?=$controller_name=='ChooseNitController' ? 'active' : ''?> <?=$controller_name=='PortfolioController' ? 'active' : ''?> <?=$controller_name=='WorkFlowController' ? 'active' : ''?> <?=$controller_name=='JobSummaryController' ? 'active' : ''?>">
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="nav-text">Setting</span>
                            </a>
                            <ul aria-expanded="false">
                                <li class="<?=$controller_name=='LogoController' ? 'active' : ''?>"><a href="<?=base_url('admin/logo')?>">Logo</a></li>
                           
                                <li class="<?=$controller_name=='FootContactController' ? 'active' : ''?>"><a href="<?=base_url('admin/footer_contact')?>">Footer & Contact</a></li>

                                <li class="<?=$controller_name=='BannerController' ? 'active' : ''?>"><a href="<?=base_url('admin/banner')?>">Banner</a></li>

                                <li class="<?=$controller_name=='MissionController' ? 'active' : ''?>"><a href="<?=base_url('admin/mission')?>">Mission</a></li>

                                <li class="<?=$controller_name=='VisionController' ? 'active' : ''?>"><a href="<?=base_url('admin/vision')?>">Vision</a></li>

                                <li class="<?=$controller_name=='TechnologiesController' ? 'active' : ''?>"><a href="<?=base_url('admin/technologies')?>">Technologies</a></li>

                                <li class="<?=$controller_name=='ChooseNitController' ? 'active' : ''?>"><a href="<?=base_url('admin/choosenit')?>">Choose Nit</a></li>

                                <li class="<?=$controller_name=='PortfolioController' ? 'active' : ''?>"><a href="<?=base_url('admin/portfolio')?>">Portfolio</a></li>

                                <li class="<?=$controller_name=='WorkFlowController' ? 'active' : ''?>"><a href="<?=base_url('admin/workflow')?>">Work flow</a></li>

                                <li class="<?=$controller_name=='JobSummaryController' ? 'active' : ''?>"><a href="<?=base_url('admin/job_summary')?>">Job Summary</a></li>

                            </ul>
                        </li>
                        <!-- Services -->
                        <li class="<?=$controller_name=='ServicesController' ? 'active' : ''?> <?=$controller_name=='ServicesTypeController' ? 'active' : ''?>" >
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-text">Services</span>
                            </a>
                            <ul aria-expanded="false">
                               <li class="<?=$controller_name=='ServicesController' ? 'active' : ''?>"><a href="<?=base_url('admin/services')?>">Services Add</a></li>
                               <li class="<?=$controller_name=='ServicesTypeController' ? 'active' : ''?>"><a href="<?=base_url('admin/services_type')?>">Services Type</a></li> 
                            </ul>
                        </li>
                        <li class="<?=$controller_name=='BusinessController' ? 'active' : ''?>" >
                            <a href="<?=base_url('admin/business')?>" class="ai-icon" aria-expanded="false">
                                <i class="fa fa-industry" aria-hidden="true"></i>
                                <span class="nav-text">Business</span>
                            </a>
                        </li>
                        <li class="<?=$controller_name=='JobApplayController' ? 'active' : ''?>" >
                            <a href="<?=base_url('admin/job_apply')?>" class="ai-icon" aria-expanded="false">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span class="nav-text">Job Apply</span>
                            </a>
                        </li>
                        <li class="<?=$controller_name=='QueryController' ? 'active' : ''?>" >
                            <a href="<?=base_url('admin/query')?>" class="ai-icon" aria-expanded="false">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span class="nav-text">Query</span>
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                       <?php if(!empty($foot_con)) { ?>
                    <p><?=$foot_con->footer_copy_right?></p>
                <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Side nav end -->