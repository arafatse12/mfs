<div class="breadcrumb-bar">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="breadcrumb-title">
					<?php 
                        foreach ($cookie_language as $cookie) { ?>
    						<h2 style="text-transform: capitalize;"><?php echo(!empty($cookie['title']))?($cookie['title']) : 'cookie-policy';  ?></h2>

                    <?php } ?>
				</div>
			</div>
			<div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo (!empty($user_language[$user_selected]['lg_cookies_policy'])) ? $user_language[$user_selected]['lg_cookies_policy'] : $default_language['en']['lg_cookies_policy']; ?></li>
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
				<div class="about-blk-content">
					<?php foreach ($cookie_language as $cookie) { 
						if($cookie['content']) {
					?>
					<p><?php echo(!empty($cookie['content']))?($cookie['content']) : 'Cookie policy page content';  ?></p>	
					<?php }  else {?>
					<p><?php echo (!empty($user_language[$user_selected]['lg_details_not_found'])) ? $user_language[$user_selected]['lg_details_not_found'] : $default_language['en']['lg_details_not_found']; ?></p>
				<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</div>