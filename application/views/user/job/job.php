<div class="breadcrumb-bar">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="breadcrumb-title">
					<h2>Job Application</h2>
				</div>
			</div>
			<div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page">Job Application</li>
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
				<div class="contact-blk-content">
				<form method="post" enctype="multipart/form-data" id="createForm" >
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    
					<div class="row">						
						<div class="col-lg-6">
							<div class="form-group">
								<label><?php echo (!empty($user_language[$user_selected]['lg_Name'])) ? $user_language[$user_selected]['lg_Name'] : $default_language['en']['lg_Name']; ?> </label>
								<input class="form-control" type="text" name="name" id="name" >
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label><?php echo (!empty($user_language[$user_selected]['lg_Email'])) ? $user_language[$user_selected]['lg_Email'] : $default_language['en']['lg_Email']; ?> <span>*</span></label>
								<input class="form-control" type="text" name="email" id="email">
							</div>
						</div>					
						<div class="col-lg-6">
							<div class="form-group">
								<label>Address <span>*</span></label>
								<input class="form-control" type="text" name="address" id="address" >
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label>Phone <span>*</span></label>
								<input class="form-control" type="number" name="phone" id="phone" >
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label>Upload CV <span>*</span></label>
								<input class="form-control" type="file" name="uplaod_cv" id="uplaod_cv">
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<div class="text-center">
									<div id="load_div"></div>
								</div>
								<label><?php echo (!empty($user_language[$user_selected]['lg_messages'])) ? $user_language[$user_selected]['lg_messages'] : $default_language['en']['lg_messages']; ?></label>
								<textarea class="form-control" name="message" id="message" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn submit_service_book"  type="submit" id="submit"><?php echo (!empty($user_language[$user_selected]['lg_Submit'])) ? $user_language[$user_selected]['lg_Submit'] : $default_language['en']['lg_Submit']; ?></button>
					</div>
				</form>					
				</div>
			</div>
		</div>


	</div>
</div>
	 <script type="text/javascript">

            //submitting form
            $("#createForm").submit(function (event) {
                event.preventDefault(); //prevent the browser to execute default action. Here, it will prevent browser to be refresh
                $.ajax({
                    url: "<?php echo base_url('user/job/insert_job'); ?>", //backend url
                    data: $("#createForm").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {

                        $('#createModal').modal('hide'); //hiding modal
                        $('#createForm')[0].reset(); //reset form
                        alert('Successfully inserted'); //displaying a successful message
                        $('#exampleTable').DataTable().ajax.reload(); //rereshing the datatable to add new data in datatable
                    }
                    
                });
            });
 </script>

