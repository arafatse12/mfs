<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4 class="page-title m-b-20 m-t-0 mb-3">Edit City</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            foreach ($datalist as $value) {
                            ?>
                                <form action="<?php echo base_url().'admin/dashboard/edit_city/' . $value['id']; ?>" method="POST" enctype="multipart/form-data" id="edit_city_code_config">
                                    <div class="form-group">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <label>State</label>
                                    <select name="state_id" id="state_id" class="form-control select" required>
    									<option value="">Select State</option>
    									<?php foreach($state as $s) {?>
    										<option value="<?php echo $s['id']; ?>" <?php if($value['state_id'] == $s['id']) echo 'selected'; ?>><?php echo $s['name'];?></option>
    									<?php } ?>
    								</select>
                                </div>
                                
                                <div class="form-group">
                                    <label>City name</label>
                                    <input type="text" class="form-control" name="city_name" id="city_name" required value="<?php if ($value['name']) { echo $value['name']; } ?>">
                                </div>
                                    <div class="m-t-30 text-center">
                                            <button name="form_submit" type="submit" class="btn btn-primary" value="true">Save Changes</button>
                                        <a href="<?php echo $base_url; ?>city-list"  class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>