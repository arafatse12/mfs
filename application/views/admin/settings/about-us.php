<?php 
$admin_settings = $language_content;

$query = $this->db->query("select * from language WHERE status = '1'");
$lang_test = $query->result();
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="row">
			<div class="col-xl-8 offset-xl-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title"><?php echo(!empty($admin_settings['lg_admin_aboutus']))?($admin_settings['lg_admin_aboutus']) : 'About Us';  ?></h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal"   method="post"
                            autocomplete="off" method="POST" enctype="multipart/form-data" id="
						">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
						<?php 
							if (!empty($about_us)) {
								foreach ($about_us as $about) { 
						?>	
						<?php foreach ($lang_test as $langval) {
								if($langval->language_value ==  $about['lang_type']) {?>
							<div class="form-group">
                                <label><?php echo(!empty($admin_settings['lg_admin_page_title']))?($admin_settings['lg_admin_page_title']) : 'Page Title';  ?>(<?php echo $langval->language; ?>) </label>
                                <input type="text" class="form-control" name="page_title_<?php echo $langval->id; ?>" value="<?php echo ($about['title'])?$about['title']:''; ?>" required>
	                        </div>
	                    <?php } } } }?>
	                        <div class="form-group">
                                <label><?php echo(!empty($admin_settings['lg_admin_pageslug']))?($admin_settings['lg_admin_pageslug']) : 'Page Slug';  ?></label>
                                <input type="text" class="form-control" name="page_slug" value="<?php echo ($pages[0]->page_slug)?$pages[0]->page_slug:''; ?>" required readonly>
	                        </div>
	                    <?php 
							if (!empty($about_us)) {
								$i = 1;
								foreach ($about_us as $about) { 
								$ck_id ='ck_editor_textarea_id'.$i;
								$ckeditor_id = $ckeditor_editor.$i;
						?>	
						<?php foreach ($lang_test as $langval) {
								if($langval->language_value ==  $about['lang_type']) {?>
							<div class="form-group">
                                <label><?php echo(!empty($admin_settings['lg_admin_page_content']))?($admin_settings['lg_admin_page_content']) : 'Page Content';  ?>(<?php echo $langval->language; ?>)</label>
							    <textarea class='form-control content-textarea' id='<?php echo $ck_id; ?>' rows='6' name='page_content_<?php echo $langval->id; ?>' required><?php echo ($about['content']) ? $about['content']:''; ?></textarea>
							    <?php echo display_ckeditor($ckeditor_editor); ?>
                            </div>
                        <?php } } $i++;
                    			} 
                        
                    	}?>
						 <div class="form-group">
                                <label>About Us Image</label>
                                <div class="change-photo-btn">
                                    <input type="file" name="image">
                                </div>
                            </div>
								<div class="m-t-30 text-center">
									<button name="form_submit" type="submit" class="btn btn-primary" value="true"><?php echo(!empty($admin_settings['lg_admin_save']))?($admin_settings['lg_admin_save']) : 'Save';  ?></button>
									<a href="<?php echo base_url(); ?>admin/pages"  class="btn btn-cancel"><?php echo(!empty($admin_settings['lg_admin_back']))?($admin_settings['lg_admin_back']) : 'Back';  ?></a>
								</div>
						</form>             
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

