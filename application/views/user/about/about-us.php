<!-- <div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

                        foreach ($about_us_language as $us_language) { ?>
                    <h2 style="text-transform: capitalize;">
                        <?php echo(!empty($us_language['title']))?($us_language['title']) : 'About Us';  ?></h2>

                    <?php } ?>
                </div>
            </div>
            <?php 
            $aboutUs  =  $this->db->get_where('home_settings',array('modules'=>'about_us'))->row()->default_image;

            ?>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo (!empty($user_language[$user_selected]['lg_about'])) ? $user_language[$user_selected]['lg_about'] : $default_language['en']['lg_about']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-image">
                        <?php  ?>
                            <a href=""><img class="img-fluid" src="<?php  echo base_url();?><?php echo $aboutUs; ?>" alt="Post Image"></a>
                        
                        <?php ?>           
                </div>
                <div class="about-blk-content">
                    <?php foreach ($about_us_language as $us_language) { 
						if($us_language['content']) {
					?>
                    <p><?php echo(!empty($us_language['content']))?($us_language['content']) : 'About us page content';  ?>
                    </p>
                    <?php }  else {?>
                    <p><?php echo (!empty($user_language[$user_selected]['lg_details_not_found'])) ? $user_language[$user_selected]['lg_details_not_found'] : $default_language['en']['lg_details_not_found']; ?>
                    </p>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div> -->
< <div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <?php


                        foreach ($about_us_language as $us_language) { ?>
                    <h2 style="text-transform: capitalize;">
                        <?php echo(!empty($us_language['title']))?($us_language['title']) : 'About Us';  ?></h2>

                    <?php } ?>
                </div>
            </div>
            <?php 
            $aboutUs  =  $this->db->get_where('home_settings',array('modules'=>'about_us'))->row()->default_image;

            ?>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo (!empty($user_language[$user_selected]['lg_about'])) ? $user_language[$user_selected]['lg_about'] : $default_language['en']['lg_about']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="content container" style="padding: 0!important;">			
    <div class="row justify-content-center">			
        <div class="col-lg-10 col-xl-9">			
            <!-- Blog Details-->
            <div class="blog-view">
                <div class="blog-single-post">                       
                    <div class="blog-image">
                        
                            <a href="javascript:void(0)" >
                                <img class="img-fluid " style=" max-height: 400px;" src="<?php  echo base_url();?><?php echo $aboutUs; ?>" alt="about image">
                            </a>
                           
                    </div>
                    
                    <div class="blog-content p-0">
                       
 <?php 
            $aboutUs  =  $this->db->get_where('home_settings',array('modules'=>'about_us'))->row()->default_image;

            ?>
 <div class="about-blk-content">
                    <?php foreach ($about_us_language as $us_language) { 
						if($us_language['content']) {
					?>
                    <p><?php echo(!empty($us_language['content']))?($us_language['content']) : 'About us page content';  ?>
                    </p>
                    <?php }  else {?>
                    <p><?php echo (!empty($user_language[$user_selected]['lg_details_not_found'])) ? $user_language[$user_selected]['lg_details_not_found'] : $default_language['en']['lg_details_not_found']; ?>
                    </p>
                    <?php } } ?>
                </div>

                    
					</div>
                </div>
                
               

            </div>
            <!-- /Blog Details-->
        </div>
    </div>
</div>
<style>
    .breadcrumb-bar{
        padding: 0;
    },
    .content {
    min-height: 200px;
    padding:0 !important;
}
</style>