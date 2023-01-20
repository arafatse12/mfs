<?php   
if(!empty($rows['created_at'])){
 $date=date(settingValue('date_format'), strtotime($rows['created_at']));
}else{
      $date='-';                                
  }
?>

<div class="content">
    <div class="container">
        <div class="row">

            <?php $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0"><?php echo (!empty($user_language[$user_selected]['lg_My_Bookings'])) ? $user_language[$user_selected]['lg_My_Bookings'] : $default_language['en']['lg_My_Bookings']; ?></h4>
                    </div>
                    <div class="col-auto">
                       <div class="sort-by">
                            <select class="form-control-sm custom-select searchFilter" id="status">
                                <option value=''><?php echo (!empty($user_language[$user_selected]['lg_All'])) ? $user_language[$user_selected]['lg_All'] : $default_language['en']['lg_All']; ?></option>
                                <option value="1"><?php echo (!empty($user_language[$user_selected]['lg_Pending'])) ? $user_language[$user_selected]['lg_Pending'] : $default_language['en']['lg_Pending']; ?></option>
                                <option value="2"><?php echo (!empty($user_language[$user_selected]['lg_Inprogress'])) ? $user_language[$user_selected]['lg_Inprogress'] : $default_language['en']['lg_Inprogress']; ?></option>
                                <option value="3"><?php echo (!empty($user_language[$user_selected]['lg_Complete_Request'])) ? $user_language[$user_selected]['lg_Complete_Request'] : $default_language['en']['lg_Complete_Request']; ?></option>
                                <option value="5"><?php echo (!empty($user_language[$user_selected]['lg_Rejected'])) ? $user_language[$user_selected]['lg_Rejected'] : $default_language['en']['lg_Rejected']; ?>   </option>
                                <option value="7"><?php echo (!empty($user_language[$user_selected]['lg_Cancelled'])) ? $user_language[$user_selected]['lg_Cancelled'] : $default_language['en']['lg_Cancelled']; ?></option>
                                <option value="6"><?php echo (!empty($user_language[$user_selected]['lg_Completed'])) ? $user_language[$user_selected]['lg_Completed'] : $default_language['en']['lg_Completed']; ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="dataList">



                    <?php
                    if (!empty($all_bookings)) {
                       // echo "<pre>";print_r($all_bookings);exit;
                        foreach ($all_bookings as $bookings) {
                            $this->db->select("service_image");
                            $this->db->from('services_image');
                            $this->db->where("service_id", $bookings['service_id']);
                            $this->db->where("status", 1);
                            $image = $this->db->get()->result_array();
                            $serv_image = array();
                            foreach ($image as $key => $i) {
                                $serv_image[] = $i['service_image'];
                            }
                            $rating = $this->db->where('user_id', $this->session->userdata('id'))->where('booking_id', $bookings['id'])->get('rating_review')->row_array();
                            if (file_exists($serv_image[0])) {
                                $serviceimage = base_url() . $serv_image[0];
                            } else {
                                $serviceimage = ($placholder_img)? base_url().$placholder_img:base_url().'uploads/placeholder_img/1641376256_banner.jpg';
                            }
                            ?>

                            <div class="bookings">
                                <div class="booking-list">
                                    <div class="booking-widget">
                                        <a href="<?php echo base_url() . 'service-preview/' .$bookings['url']; ?>" class="booking-img">
                                            <img src="<?php echo $serviceimage ?>" alt="User Image">
                                        </a>
                                        <div class="booking-det-info">

                                            <?php
                                            $badge = '';
                                            $class = '';
                                            if ($bookings['status'] == 1) {
                                                $badge = (!empty($user_language[$user_selected]['lg_Pending'])) ? $user_language[$user_selected]['lg_Pending'] : $default_language['en']['lg_Pending'];
                                                $class = 'bg-warning';
                                            }
                                            if ($bookings['status'] == 2) {
                                                $badge = (!empty($user_language[$user_selected]['lg_Inprogress'])) ? $user_language[$user_selected]['lg_Inprogress'] : $default_language['en']['lg_Inprogress'];
                                                $class = 'bg-primary';
                                            }
                                            if ($bookings['status'] == 3) {
                                                $badge = (!empty($user_language[$user_selected]['lg_complete_req_sent_provider'])) ? $user_language[$user_selected]['lg_complete_req_sent_provider'] : $default_language['en']['lg_complete_req_sent_provider'];
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == 4) {
                                                $badge = (!empty($user_language[$user_selected]['lg_Accepted'])) ? $user_language[$user_selected]['lg_Accepted'] : $default_language['en']['lg_Accepted'];
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == 5) {
                                                $badge = (!empty($user_language[$user_selected]['lg_rejected_by_user'])) ? $user_language[$user_selected]['lg_rejected_by_user'] : $default_language['en']['lg_rejected_by_user'];
                                                $class = 'bg-danger';
                                            }
                                            if($bookings['cod'] == 1 && $bookings['status'] == 6 || $bookings['status'] == 8) {
                                                $badge = (!empty($user_language[$user_selected]['lg_completed_accepted_payment_pending'])) ? $user_language[$user_selected]['lg_completed_accepted_payment_pending'] : $default_language['en']['lg_completed_accepted_payment_pending'];
                                                $class = 'bg-success';

                                            }
                                            if ($bookings['cod'] == 2 && $bookings['status'] == 6) {
                                                $badge = (!empty($user_language[$user_selected]['lg_completed_accepted'])) ? $user_language[$user_selected]['lg_completed_accepted'] : $default_language['en']['lg_completed_accepted'];
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == 7) {
                                                $badge = (!empty($user_language[$user_selected]['lg_cancelled_provider'])) ? $user_language[$user_selected]['lg_cancelled_provider'] : $default_language['en']['lg_cancelled_provider'];
                                                $class = 'bg-danger';
                                            }
                                            if ($bookings['status'] == 8) {
                                                $badge = (!empty($user_language[$user_selected]['lg_Completed'])) ? $user_language[$user_selected]['lg_Completed'] : $default_language['en']['lg_Completed'];
                                                $class = 'bg-success';
                                            }
                                            if($bookings['admin_change_status'] == 1) {
                                                $by_admin = (!empty($user_language[$user_selected]['lg_by_admin'])) ? $user_language[$user_selected]['lg_by_admin'] : $default_language['en']['lg_by_admin'];
                                                $badge = $badge.' '.$by_admin;
                                            }
                                            ?>
                                            <h3>
                                                <?php 
                                                    $ser_lang = ($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
                                                    $this->db->where('service_id', $bookings['service_id']);
                                                    $this->db->where('lang_type', $ser_lang);
                                                    $service_name = $this->db->get('service_lang')->row_array();
                                                ?>
                                                <a href="<?php echo base_url() . 'service-preview/' . $bookings['url']; ?>">
                                                    <?php echo $service_name['service_name'] ?>
                                                </a>
                                            </h3>
                                            <?php
                                            if (!empty($bookings['user_id'])) {
                                                $provider_info = $this->db->select('*')->
                                                                from('providers')->
                                                                where('id', (int) $bookings['provider_id'])->
                                                                get()->row_array();
                                            }
                                            if (file_exists($provider_info['profile_img'])) {
                                                $image = base_url() . $provider_info['profile_img'];
                                            } else {
                                                $image = base_url() . 'assets/img/user.jpg';
                                            }



                                            $user_currency_code = '';
                                            $userId = $this->session->userdata('id');
                                            If (!empty($userId)) {
                                                $service_amount1 = $bookings['amount'];

                                                $user_currency = get_user_currency();
                                                $user_currency_code = $user_currency['user_currency_code'];
                                                

                                                $service_amount1 = get_gigs_currency($bookings['amount'], $bookings['currency_code'], $user_currency_code);
                                                } else {
                                                $user_currency_code = settings('currency');
                                                $service_amount1 = $bookings['amount'];
                                            }
                                            if (is_nan($service_amount1) || is_infinite($service_amount1)) {
                                                $service_amount1 = $bookings['amount'];
                                            }
                                            ?>
                                            <ul class="booking-details">
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Booking_id'])) ? $user_language[$user_selected]['lg_Booking_id'] : $default_language['en']['lg_Booking_id']; ?></span><?php echo 'UBID-'.$bookings['id']; ?>  </li>
                                                <li>
                                                    <?php if(!empty($bookings['service_date'])){
                                                             $date=date(settingValue('date_format'), strtotime($bookings['service_date']));
                                                            }else{
                                                                $date='-';                                
                                                            } ?>

                                                    <span><?php echo (!empty($user_language[$user_selected]['lg_Booking_Date'])) ? $user_language[$user_selected]['lg_Booking_Date'] : $default_language['en']['lg_Booking_Date']; ?></span><?=  $date; ?> 
                                                    <span class="badge badge-pill badge-prof <?php echo $class; ?>"><?= $badge; ?></span><?php if($bookings['cod'] == 1) { ?><span class="badge badge-pill badge-prof">COD</span> <?php } ?>
                                                </li>
                                                <li>
                                                    <?php  
                                                        if(settingValue('time_format') == '12 Hours') {
                                                            $from_time = date('h:ia', strtotime($bookings['from_time']));
                                                            $to_time = date('h:ia', strtotime($bookings['to_time']));
                                                        } elseif(settingValue('time_format') == '24 Hours') {
                                                           $from_time = date('H:i:s', strtotime($bookings['from_time']));
                                                           $to_time = date('H:i:s', strtotime($bookings['to_time']));
                                                        } else {
                                                            $from_time = date('G:ia', strtotime($bookings['from_time']));
                                                            $to_time = date('G:ia', strtotime($bookings['to_time']));
                                                        }
                                                     ?>
                                                    <span><?php echo (!empty($user_language[$user_selected]['lg_Booking_time'])) ? $user_language[$user_selected]['lg_Booking_time'] : $default_language['en']['lg_Booking_time']; ?></span> <?= $from_time ?> - <?= $to_time ?></li>
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Amount'])) ? $user_language[$user_selected]['lg_Amount'] : $default_language['en']['lg_Amount']; ?></span> <?php echo currency_conversion($user_currency_code) . $service_amount1; ?></li>
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Location'])) ? $user_language[$user_selected]['lg_Location'] : $default_language['en']['lg_Location']; ?></span> <?php echo $bookings['location'] ?></li>
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Phone'])) ? $user_language[$user_selected]['lg_Phone'] : $default_language['en']['lg_Phone']; ?></span><?php echo $provider_info['country_code'] ?>-<?php echo $provider_info['mobileno'] ?></li>
                                                <li>
                                                     <span><?php echo (!empty($user_language[$user_selected]['lg_Provider'])) ? $user_language[$user_selected]['lg_Provider'] : $default_language['en']['lg_Provider']; ?></span>
                                                    <div class="avatar avatar-xs mr-1">
                                                        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo $image; ?>">
                                                    </div> <?= !empty($provider_info['name']) ? $provider_info['name'] : '-'; ?>

                                                    <!-- block providers -->
                                                    <?php
                                                        $this->db->select('id,blocked_id,blocked_by_id,status');
                                                        $this->db->where('blocked_by_id', $this->session->userdata('id'));
                                                        $this->db->where('blocked_id', $provider_info['id']);
                                                        $this->db->from('blocked_providers');
                                                        $query = $this->db->get();

                                                        if($query !== FALSE && $query->num_rows() > 0){
                                                            $blocked_user = $query->row_array();
                                                        }

                                                        if($blocked_user['status'] == "1") {
                                                            $blk_class = "bg-danger";
                                                            $blk_text = (!empty($user_language[$user_selected]['lg_blocked'])) ? $user_language[$user_selected]['lg_blocked'] : $default_language['en']['lg_blocked'];
                                                        }else if($blocked_user['status'] == "2") {
                                                            $blk_class = "bg-info";
                                                            $blk_text = (!empty($user_language[$user_selected]['lg_request_to_report_provider'])) ? $user_language[$user_selected]['lg_request_to_report_provider'] : $default_language['en']['lg_request_to_report_provider']; 
                                                        }
                                                        else{
                                                            $blk_class = "bg-danger";
                                                            $blk_text = (!empty($user_language[$user_selected]['report_provider'])) ? $user_language[$user_selected]['report_provider'] : $default_language['en']['report_provider']; 
                                                        }
														
                                                        $userId = $this->session->userdata('id');
                                                        if($this->session->userdata('usertype') == "user") { 
                                                            if($userId && ($userId == $blocked_user['blocked_by_id']) && ($provider_info['id'] == $blocked_user['blocked_id']) ) {
                                                                if($blocked_user['status'] == 1) { ?>
                                                                    <span class='badge badge-pill badge-prof <?php echo $blk_class; ?>'><?= $blk_text; ?></span>
                                                                <?php } else if($blocked_user['status'] == 2) { ?>
                                                                    <span class='badge badge-pill badge-prof <?php echo $blk_class; ?>'><?= $blk_text; ?></span>
                                                                <?php }
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="booking-action">
										
                                        <?php
                                        if($blocked_user['status'] != 1) { //add new line?>
                                        <?php $pending = 0; 
                                        $rating_count = $this->db->where('user_id', $this->session->userdata('id'))->where('booking_id', $bookings['id'])->get('rating_review')->row();
                                        ?>
                                        <?php if ($bookings['status'] == 2) { ?>
                                            <a href="<?php echo base_url() ?>user-chat/booking-new-chat?book_id=<?php echo $bookings['id'] ?>" class="btn btn-sm bg-info-light">
                                                <i class="far fa-eye"></i> <?php echo (!empty($user_language[$user_selected]['lg_chat'])) ? $user_language[$user_selected]['lg_chat'] : $default_language['en']['lg_chat']; ?>
                                            </a>
                                            <a href="javascript:;" class="btn btn-sm bg-danger-light myCancel" data-toggle="modal" data-target="#myCancel" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-times"></i> <?php echo (!empty($user_language[$user_selected]['lg_cancel_service'])) ? $user_language[$user_selected]['lg_cancel_service'] : $default_language['en']['lg_cancel_service']; ?>
                                            </a>
                                        <?php } elseif ($bookings['status'] == 1) { ?>
                                            <a href="javascript:;" class="btn btn-sm bg-danger-light myCancel" data-toggle="modal" data-target="#myCancel" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                 <i class="fas fa-times"></i> <?php echo (!empty($user_language[$user_selected]['lg_cancel_service'])) ? $user_language[$user_selected]['lg_cancel_service'] : $default_language['en']['lg_cancel_service']; ?>
                                            </a>
                                        <?php } elseif ($bookings['status'] == 3) { ?>
                                            <a href="<?php echo base_url() ?>user-chat/booking-new-chat?book_id=<?php echo $bookings['id'] ?>" class="btn btn-sm bg-info-light">
                                                <i class="far fa-eye"></i> <?php echo (!empty($user_language[$user_selected]['lg_chat'])) ? $user_language[$user_selected]['lg_chat'] : $default_language['en']['lg_chat']; ?>
                                            </a> 
                                            <a href="javascript:;" class="btn btn-sm bg-success-light update_user_booking_status" data-id="<?= $bookings['id']; ?>" data-status="6" data-rowid="<?= $pending; ?>" data-review="2" >
                                                <i class="fas fa-check"></i> <?php echo (!empty($user_language[$user_selected]['lg_Compete_Request_Accept'])) ? $user_language[$user_selected]['lg_Compete_Request_Accept'] : $default_language['en']['lg_Compete_Request_Accept']; ?>
                                            </a>

                                            <a href="javascript:;" class="btn btn-sm bg-danger-light myCancel" data-toggle="modal" data-target="#myCancel" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-times"></i> <?php echo (!empty($user_language[$user_selected]['lg_cancel_service'])) ? $user_language[$user_selected]['lg_cancel_service'] : $default_language['en']['lg_cancel_service']; ?>
                                            </a>
                                        <?php } ?>

                                        <?php  
                                            $refund_staus=$this->db->where('id',$bookings['id'])->get('refund_request')->row_array();
                                            if ($bookings['cod'] == 1 && $bookings['status'] == 8 && $refund_staus['status'] == 0) {
                                        ?>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-success-light" id="refund" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-plus"></i> Refund Request
                                            </a>
                                        <?php } elseif($bookings['status'] == 6 && $refund_staus['status'] == 0 && $bookings['cod'] == 2) { ?>

                                            <a href="javascript:void(0);" class="btn btn-sm bg-success-light" id="refund" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-plus"></i> Refund Request
                                            </a>
                                        <?php } elseif($bookings['status'] == 9) { ?>
                                            <span class="badge badge-pill badge-prof bg-danger-light">Waiting For Refund</span>
                                        <?php } elseif($bookings['status'] == 10) { ?>
                                            <span class="badge badge-pill badge-prof bg-success-light">Refund Approved</span>
                                        <?php } elseif($bookings['status'] == 11) { ?>
                                            <span class="badge badge-pill badge-prof bg-danger-light">Refund Rejected By Admin</span>
                                        <?php } ?>
                                         <?php  if ($bookings['cod'] == 1 && ($bookings['status'] == 8)  && settingValue('review_showhide') == 1) {
                                            if(empty($rating_count)) { ?>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light myReview" data-toggle="modal" data-target="#myReview" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-plus"></i> <?php echo (!empty($user_language[$user_selected]['lg_Reviews'])) ? $user_language[$user_selected]['lg_Reviews'] : $default_language['en']['lg_Reviews'];  ?>
                                            </a>
                                        <?php } 
                                            } if ($bookings['cod'] != 1 && $bookings['status'] == 6 && empty($rating_count)  && settingValue('review_showhide') == 1) { ?>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-success-light myReview" data-toggle="modal" data-target="#myReview" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>"> 
                                                <i class="fas fa-plus"></i> <?php echo (!empty($user_language[$user_selected]['lg_Reviews'])) ? $user_language[$user_selected]['lg_Reviews'] : $default_language['en']['lg_Reviews'];  ?>
                                            </a>
                                        <?php 

                                        } if (!empty($rating_count)) { 
                                            $avg_rating=round($rating_count->rating,1); ?>
                                            <div class="review-count">
                                                <div class="rating">
                                                    <?php 
                                                        for($x=1;$x<=$avg_rating;$x++) {
                                                            echo '<i class="fas fa-star filled"></i>';
                                                        }
                                                        if (strpos($avg_rating,'.')) {
                                                            echo '<i class="fas fa-star"></i>';
                                                            $x++;
                                                        }
                                                        while ($x<=5) {
                                                            echo '<i class="fas fa-star"></i>';
                                                            $x++;
                                                        }
                                                        ?>
                                                        <span class="d-inline-block average-rating">(<?php echo $avg_rating?>)</span>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($bookings['status'] == 7 || $bookings['status'] == 5) { ?>
                                            <button type="button" data-id="<?php echo $bookings['id'] ?>" class="btn btn-sm bg-default-light reason_modal">
                                                <i class="fas fa-info-circle"></i> <?php echo (!empty($user_language[$user_selected]['lg_reason'])) ? $user_language[$user_selected]['lg_reason'] : $default_language['en']['lg_reason']; ?>
                                            </button>
                                            <input type="hidden" id="reason_<?= $bookings['id']; ?>" value="<?= $bookings['reason']; ?>">
                                        <?php } ?>
                                        <?php } //blocked status if end.?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                       <p><?php echo (!empty($user_language[$user_selected]['lg_no_record_fou'])) ? $user_language[$user_selected]['lg_no_record_fou'] : $default_language['en']['lg_no_record_fou']; ?></p>
                    <?php } ?>
                    <?php
                    echo $this->ajax_pagination->create_links();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal" id="ref_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Refund Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Refund Reason</label>
        <textarea class="form-control" name="reason" id="reason" rows="5" required></textarea>
        <p class="ref_reason_error error" >Reason Is Required</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="confirm_refund_ser" class="btn btn-primary"><?php echo(!empty($payments['lg_admin_yes']))?($payments['lg_admin_yes']) : 'Yes';  ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo(!empty($payments['lg_admin_no']))?($payments['lg_admin_no']) : 'No';  ?></button>
      </div>
    </div>
  </div>
</div>
