<?php 
$rating = $language_content;

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
						<div class="col-sm-12">
							<h3 class="page-title"><?php echo(!empty($rating['lg_admin_edit_ratingtype']))?($rating['lg_admin_edit_ratingtype']) : 'Edit Rating Types';  ?></h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
			
				
				<div class="card">
					<div class="card-body">
                        <form id="update_ratingstype" method="post" autocomplete="off" enctype="multipart/form-data">
                        	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							<input class="form-control" type="hidden" value="<?php echo $ratingstype['id'];?>" name="id" id="id">
                        	<?php foreach ($lang_test as $langval) { 
                        		$this->db->where('rating_id', $ratingstype['id']);
						        $this->db->where('lang_type', $langval->language_value);
						        $lang_rating = $this->db->get('rating_type_lang')->row();
    						?>
                            <div class="form-group">
                                <label><?php echo(!empty($rating['lg_admin_rating_type']))?($rating['lg_admin_rating_type']) : 'Rating Type';  ?>(<?php echo $langval->language; ?>)</label>
                                <input class="form-control" type="text" value="<?php echo $lang_rating->rating_name;?>" name="name_<?php echo $langval->id; ?>" id="name" required>
                            </div>    
                            <?php } ?>                       
                            <div class="mt-4">
                                <button class="btn btn-primary" name="form_submit" value="submit" type="submit"><?php echo(!empty($rating['lg_admin_save_changes']))?($rating['lg_admin_save_changes']) : 'Save Changes';  ?></button>
                                
								<a href="<?php echo $base_url; ?>reviews-type" class="btn btn-cancel"><?php echo(!empty($rating['lg_admin_cancel']))?($rating['lg_admin_cancel']) : 'Cancel';  ?></a>
                            </div>
                        </form>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>