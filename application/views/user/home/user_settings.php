<?php 
$get_details = $this->db->where('id',$this->session->userdata('id'))->get('users')->row_array();
$booking_count = $this->db->where('user_id',$this->session->userdata('id'))->where_not_in('status',[5,7,6,8,10])->count_all_results('book_service');
?>
<div class="content">
	<div class="container">
		<div class="row">
		 	<?php
			if(!empty($_GET['tbs'])){
				$val=$_GET['tbs'];
			}else{
				$val=1;
			}
			?>
			<input type="hidden" name="tab_ctrl" id="tab_ctrl" value="<?=$val;?>">
			<?php $this->load->view('user/home/user_sidemenu');?>
		 
            <div class="col-xl-9 col-md-8">
				<div class="tab-content pt-0">
					<div class="tab-pane show active" id="user_profile_settings" >
						<div class="widget">
							<h4 class="widget-title"><?php echo (!empty($user_language[$user_selected]['lg_Profile_Settings'])) ? $user_language[$user_selected]['lg_Profile_Settings'] : $default_language['en']['lg_Profile_Settings']; ?></h4>
							<div class="form-group col-xl-4">
								<?php if($booking_count == 0) { ?>
								 	<button id="delete_account" class="btn btn-primary pl-5 pr-5 delete_account" data-id="<?php echo $this->session->userdata('id') ?>" data-type="<?php echo $this->session->userdata('usertype') ?>">Delete Account</button>
								 <?php } else { ?>
								 	<div class="col text-right"><a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#alertModal"> <?php echo (!empty($user_language[$user_selected]['lg_delete_account'])) ? $user_language[$user_selected]['lg_delete_account'] : $default_language['en']['lg_delete_account']; ?></a></div>
								 <?php } ?>
								</div>

							<form id="update_user" action="<?php echo base_url()?>user/dashboard/update_user" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
   
								<div class="row">
									<div class="col-xl-12">
										<h5 class="form-title"><?php echo (!empty($user_language[$user_selected]['lg_Basic_Information'])) ? $user_language[$user_selected]['lg_Basic_Information'] : $default_language['en']['lg_Basic_Information']; ?></h5>
									</div>
									
									<div class="form-group col-xl-12">
										<div class="media align-items-center mb-3">
											<?php if($get_details['profile_img'] != '') { ?>
											<img class="user-image"  accept="image/png, image/jpeg" src="<?php echo base_url().$get_details['profile_img']?>" alt="">
											<?php } elseif($get_details['profile_img'] == '') { ?>
											<img class="user-image" accept="image/png, image/jpeg"  src="<?php echo ($profile_placeholder_img)? base_url().$profile_placeholder_img:base_url().'uploads/placeholder_img/1641376256_banner.jpg'; ?>" alt="">
											<?php } ?>
											<div class="media-body">
												<?php 
							                        $user_lang = ($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
							                        $this->db->where('modules', 'user');
							                        $this->db->where('name_id', $get_details['id']);
							                        $this->db->where('lang_type', $user_lang);
							                        $lang_user = $this->db->get('users_lang')->row_array();
							                    ?>
												<h5 class="mb-0"><?php echo $lang_user['name']?></h5>
												<p><?php echo (!empty($user_language[$user_selected]['lg_max_file_size'])) ? $user_language[$user_selected]['lg_max_file_size'] : $default_language['en']['lg_max_file_size']; ?></p>
												<div class="jstinput"><a id="openfile" href="javascript:void(0);"  class="browsephoto openfile"><?php echo (!empty($user_language[$user_selected]['lg_Browse'])) ? $user_language[$user_selected]['lg_Browse'] : $default_language['en']['lg_Browse']; ?></a></div> 
												<input type="hidden" id="crop_prof_img" name="profile_img">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Name'])) ? $user_language[$user_selected]['lg_Name'] : $default_language['en']['lg_Name']; ?></label>
										<input class="form-control" type="text" value="<?php echo $lang_user['name']?>" readonly>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Email'])) ? $user_language[$user_selected]['lg_Email'] : $default_language['en']['lg_Email']; ?></label>
										<input class="form-control" type="email" value="<?php echo $get_details['email']?>" readonly>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Country_Code'])) ? $user_language[$user_selected]['lg_Country_Code'] : $default_language['en']['lg_Country_Code']; ?></label>
										<input class="form-control" type="text" value="<?php echo $get_details['country_code']?>" readonly>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Mobile_Number'])) ? $user_language[$user_selected]['lg_Mobile_Number'] : $default_language['en']['lg_Mobile_Number']; ?></label>
										<input class="form-control no_only" type="text"  value="<?php echo $get_details['mobileno']?>" name="mobileno" readonly required>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Date_birth'])) ? $user_language[$user_selected]['lg_Date_birth'] : $default_language['en']['lg_Date_birth']; ?></label>
										<?php if(!empty($get_details['dob'])){
				                             $date=date(settingValue('date_format'), strtotime($get_details['dob']));
				                            }else{
				                                $date='-';                                
				                            } ?>
										<input type="text" class="form-control user_datepicker" autocomplete="off" name="dob" value="<?php echo $date;?>">
									</div>
									
									<div class="col-xl-12">
										<h5 class="form-title"><?php echo (!empty($user_language[$user_selected]['lg_Address'])) ? $user_language[$user_selected]['lg_Address'] : $default_language['en']['lg_Address']; ?></h5>
									</div>
									<div class="form-group col-xl-12">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Address'])) ? $user_language[$user_selected]['lg_Address'] : $default_language['en']['lg_Address']; ?><span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" value="<?php if(!empty($user_address['address'])){ echo $user_address['address']; }?>">
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Country'])) ? $user_language[$user_selected]['lg_Country'] : $default_language['en']['lg_Country']; ?><span class="text-danger">*</span></label>
										<select class="form-control" id="country_id" name="country_id" >
											<option value=''><?php echo (!empty($user_language[$user_selected]['lg_Select_Country'])) ? $user_language[$user_selected]['lg_Select_Country'] : $default_language['en']['lg_Select_Country']; ?></option>
											<?php foreach($country as $row){?>
											<option value='<?php echo $row['id'];?>' <?php if(!empty($user_address['country_id'])){ echo ($row['id']==$user_address['country_id'])?'selected':'';}?>><?php echo $row['country_name'];?></option> 
										<?php } ?>
										</select>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_State'])) ? $user_language[$user_selected]['lg_State'] : $default_language['en']['lg_State']; ?><span class="text-danger">*</span></label>
										<select class="form-control" name="state_id" id="state_id" >
										</select>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_City'])) ? $user_language[$user_selected]['lg_City'] : $default_language['en']['lg_City']; ?><span class="text-danger">*</span></label>
										<select class="form-control" name="city_id" id="city_id">
										</select>
									</div>
									<div class="form-group col-xl-6">
										<label class="mr-sm-2"><?php echo (!empty($user_language[$user_selected]['lg_Postal_Code'])) ? $user_language[$user_selected]['lg_Postal_Code'] : $default_language['en']['lg_Postal_Code']; ?><span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="pincode" value="<?php if(!empty($user_address['pincode'])){echo $user_address['pincode'];} ?>" >
									</div>	
									<div class="form-group col-xl-12">
										<button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="submit"><?php echo (!empty($user_language[$user_selected]['lg_Update'])) ? $user_language[$user_selected]['lg_Update'] : $default_language['en']['lg_Update']; ?></button>
									</div>
									<input type="hidden" id="country_id_value" value="<?= $user_address['country_id'];?>">
						<input type="hidden" id="state_id_value" value="<?= $user_address['state_id'];?>">
						<input type="hidden" id="city_id_value" value="<?= $user_address['city_id'];?>">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Upload_Image'])) ? $user_language[$user_selected]['lg_Upload_Image'] : $default_language['en']['lg_Upload_Image']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php $curprofile_img = (!empty($profile['profile_img']))?$profile['profile_img']:''; ?>
				<form class="avatar-form" action="<?php echo base_url()?>user/dashboard/profile_cropping" enctype="multipart/form-data" method="post">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
					<div class="avatar-body">
						<div class="avatar-upload">
							<input class="avatar-src" name="avatar_src" type="hidden">
							<input class="avatar-data" name="avatar_data" type="hidden">
							<label for="avatarInput"><?php echo (!empty($user_language[$user_selected]['lg_Select_Image'])) ? $user_language[$user_selected]['lg_Select_Image'] : $default_language['en']['lg_Select_Image']; ?></label>
							<input type="file" accept="image/jpeg,image/png,image/jpg" class="avatar-input ad_pd_file" id="avatarInput" name="profile_img">
							
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="avatar-wrapper"></div>
							</div>
						</div>
						<div class="row avatar-btns">
							<div class="col-md-12">
								<input type="hidden" name="table_name" value="users">
								<input type="hidden" name="redirect" value="user-settings">
								<button class="btn btn-primary avatar-save pull-right" type="submit"><?php echo (!empty($user_language[$user_selected]['lg_Save_Changes'])) ? $user_language[$user_selected]['lg_Save_Changes'] : $default_language['en']['lg_Save_Changes']; ?></button>
							</div>
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="deleteUserAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="acc_title">Delete Account</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<p id="msg">Are you Sure Want to Delete Your Account? </p>
				<p id="user_id"></p>
				<p id="user_type"></p>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-success delete_confirm">Yes</a>
				<button type="button" class="btn btn-danger delete_cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acc_title">Delete Alert Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="acc_msg">Your Book Services is not completed. Kindly complete it and then delete your Account</p>
            </div>
        </div>
    </div>
</div>