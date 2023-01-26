<?php

$business_hours = $this->db->where('provider_id', $service['user_id'])->get('business_hours')->row_array();

$availability_details = json_decode($business_hours['availability'], true);

$this->db->select('AVG(rating)');

$this->db->where(array('service_id' => $service['id'], 'status' => 1));

$this->db->from('rating_review');

$rating = $this->db->get()->row_array();

$avg_rating = round($rating['AVG(rating)'], 2);



$this->db->select("r.*,u.profile_img,u.name");

$this->db->from('rating_review r');

$this->db->join('users u', 'u.id = r.user_id', 'LEFT');

$this->db->where(array('r.service_id' => $service['id'], 'r.status' => 1));

$reviews = $this->db->get()->result_array();

$get_details = $this->db->where('id', $this->session->userdata('id'))->get('users')->row_array();

                        



$query = $this->db->query("select * from system_settings WHERE status = 1");

$result = $query->result_array();

if (!empty($result)) {

    foreach ($result as $data) {

        if ($data['key'] == 'currency_option') {

            $currency_option = $data['value'];

        }

    }

}

$service_amount = $service['service_amount'];

if (!empty($service['user_id'])) {

    $provider_online = $this->db->where('id', $service['user_id'])->from('providers')->get()->row_array();

    $datetime1 = new DateTime();
    // $datetime2 = new DateTime($provider_online['last_logout']);
    $datetime2 = new DateTime($provider_online['last_login']);
    // echo $provider_online['last_logout'];die;

    $interval = $datetime1->diff($datetime2);
    $days = $interval->format('%a');

    $hours = $interval->format('%h');

    $minutes = $interval->format('%i');

    $seconds = $interval->format('%s');

} else {

    $days = $hours = $minutes = $seconds = 0;

}



//user favourite

$this->db->select('id,user_id,status');

$this->db->where('user_id', $this->session->userdata('id'));

$this->db->where('provider_id', $service['user_id']);

$this->db->where('service_id', $service['id']);

$this->db->from('user_favorite');

$query = $this->db->get();



if($query !== FALSE && $query->num_rows() > 0){

    $user_fav = $query->row_array();

}



$placholder_img = $this->db->get_where('system_settings', array('key'=>'service_placeholder_image'))->row()->value;

?>



<div class="content">

    <div class="container">



        <div class="row">

            <div class="col-lg-8">

                <div class="service-view">

                    <div class="service-header">
                        <?php 
                            $ser_lang = ($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
                            $this->db->where('service_id', $service['id']);
                            $this->db->where('lang_type', $ser_lang);
                            $service_name = $this->db->get('service_lang')->row_array();
                        ?>
                        <h1><?php echo ucfirst($service_name['service_name']); ?></h1>

                        <!-- <address class="service-location"><i class="fas fa-location-arrow"></i>
                            <?php echo ucfirst($service['service_location']); ?></address> -->

                        <div class="rating">

                            <?php

                            for ($x = 1; $x <= $avg_rating; $x++) {

                                echo '<i class="fas fa-star filled"></i>';

                            }

                            if (strpos($avg_rating, '.')) {

                                echo '<i class="fas fa-star"></i>';

                                $x++;

                            }

                            while ($x <= 5) {

                                echo '<i class="fas fa-star"></i>';

                                $x++;

                            }

                            ?>

                            <span class="d-inline-block average-rating">(<?php echo $avg_rating; ?>)</span>

                        </div>

                        <div class="service-cate">
                            <?php  
                            $cat_lang = ($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
                            $this->db->where('category_id', $service['category']);
                            $this->db->where('lang_type', $cat_lang);
                            $cat_names = $this->db->get('categories_lang')->row_array();
                            ?>
                            <a class="cate-link"
                                href="<?php echo base_url(); ?>search/<?php echo str_replace(' ', '-', $service['category_name']); ?>"><?php echo ucfirst($cat_names['category_name']); ?></a>

                            <?php  

                        if($this->session->userdata('usertype') != "provider") {    

                            $userId = $this->session->userdata('id');

                            if($userId && ($userId == $user_fav['user_id']) && $user_fav['service_id'] == $serv['id'] ) {

                                if($user_fav['status'] == 1) { ?>

                            <a href="javascript:;" id="ufav" class="fav-link favourited"
                                data-id="<?php echo $user_fav['id']?>" data-userid="<?php echo $userId?>"
                                data-provid="<?php echo $service['user_id']?>" data-servid="<?php echo $service['id']?>"
                                data-favstatus="0" data-pagename="<?php echo $service['category_name']?>"
                                title="Click here to unfavorite the service"><i class="fas fa-heart filled"></i></a>

                            <?php } 

                                else { ?>

                            <a href="javascript:;" id="ufav" class="fav-link" data-id="<?php echo $user_fav['id']?>"
                                data-userid="<?php echo $userId?>" data-provid="<?php echo $service['user_id']?>"
                                data-servid="<?php echo $service['id']?>" data-favstatus="1"
                                data-pagename="<?php echo $service['category_name']?>"
                                title="Click here to favorite the service"><i class="fas fa-heart"></i></a>

                            <?php } 

                            } else { ?>

                            <a href="javascript:;" id="ufav" class="fav-link" data-id="<?php echo $user_fav['id']?>"
                                data-userid="<?php echo $this->session->userdata('id');?>"
                                data-provid="<?php echo $service['user_id']?>" data-servid="<?php echo $service['id']?>"
                                data-favstatus="1" data-pagename="<?php echo $service['category_name']?>"
                                title="Click here to favorite the service"><i class="fas fa-heart"></i></a>

                            <?php } 

                        }?>

                        </div>

                    </div>



                    <div class="service-images service-carousel">

                        <div class="images-carousel owl-carousel owl-theme">

                            <?php

                            if (!empty($service_image)) {

                                for ($i = 0; $i < count($service_image); $i++) {

									if (!empty($service_image[$i]['service_image']) && (@getimagesize(base_url().$service_image[$i]['service_image']))) {

										echo'<div class="item"><img src="' . base_url() . $service_image[$i]['service_image'] . '" alt="" class="img-fluid"></div>';

									}else{

										echo'<div class="item"><img src="'. base_url() .$placholder_img.'" alt="" class="img-fluid"></div>';

									}

                                }

                            } else { ?>

                            <div class="item"><img src="<?php echo base_url().$placholder_img; ?>" alt=""
                                    class="img-fluid"></div>

                            <?php } ?>

                        </div>

                    </div>



                    <div class="service-details">

                        <ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">

                            <li class="nav-item">

                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home"
                                    aria-selected="true"><?php echo (!empty($user_language[$user_selected]['lg_Overview'])) ? $user_language[$user_selected]['lg_Overview'] : $default_language['en']['lg_Overview']; ?></a>

                            </li>
                            <?php if(settingValue('service_offered_showhide') == 1) { ?>
                            <li class="nav-item">

                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Related service</a>

                            </li>
                            <?php } ?>
                            <?php if(settingValue('review_showhide') == 1) { ?>
                            <li class="nav-item">

                                <a class="nav-link" id="pills-book-tab" data-toggle="pill" href="#pills-book" role="tab"
                                    aria-controls="pills-book"
                                    aria-selected="false"><?php echo (!empty($user_language[$user_selected]['lg_Reviews'])) ? $user_language[$user_selected]['lg_Reviews'] : $default_language['en']['lg_Reviews']; ?></a>

                            </li>
                            <?php } ?>

                        </ul>



                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="card service-description">

                                    <div class="card-body">

                                        <h5 class="card-title">
                                            <?php echo (!empty($user_language[$user_selected]['lg_Service_Details'])) ? $user_language[$user_selected]['lg_Service_Details'] : $default_language['en']['lg_Service_Details']; ?>
                                        </h5>

                                        <p class="mb-0"><?php echo $service['about']; ?></p>

                                    </div>

                                </div>

                            </div>


                            <?php if(settingValue('service_offered_showhide') == 1) { ?>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">

                                <div class="card">

                                    <div class="card-body">

                                        <h5 class="card-title">
                                            Related service
                                        </h5>

                                        <div class="service-offer">

                                            <ul class="list-bullet">
                                                <?php 

                                                    if (count($service_offered) > 0) {

                                                        $offered_data = json_decode($service_offered[0]['service_offered']);

                                                        foreach ($offered_data as $key => $value) {

                                                            echo'<li>' . $value . '</li>';

                                                        }

                                                    } else {

                                                        echo "Not Available...";

                                                    }

                                                    ?>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <?php } ?>


                            <div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab">

                                <div class="card review-box">

                                    <div class="card-body">

                                        <?php

                                        if (!empty($reviews)) {

                                            foreach ($reviews as $review) {

                                                $full_date =date('Y-m-d H:i:s', strtotime($review['created']));

                                                $date=date('Y-m-d',strtotime($full_date));

                                                $date_f=date('d-m-Y',strtotime($full_date));

                                                $yes_date=date('Y-m-d',(strtotime ( '-1 day' , strtotime (date('Y-m-d')) ) ));

                                                $time=date('H:i',strtotime($full_date));

                                                $session = date('h:i A', strtotime($time));

                                                if($date == date('Y-m-d')){

                                                    $datetime ="Today ".$session;

                                                }elseif($date == $yes_date){

                                                    $datetime ="Yester day ".$session;

                                                }else{

                                                    $datetime =$date_f." ".$session;

                                                }

                                                $avg_ratings = round($review['rating'], 2);

                                                ?>

                                        <div class="review-list">

                                            <div class="review-img">

                                                <?php if ($review['profile_img'] == '') { ?>

                                                <img class="rounded-circle"
                                                    src="<?php echo base_url(); ?>assets/img/user.jpg" alt="">

                                                <?php } else { ?>

                                                <img class="rounded-circle"
                                                    src="<?php echo base_url() . $review['profile_img'] ?>" alt="">

                                                <?php } ?>

                                            </div>

                                            <div class="review-info">

                                                <h5><?php echo $review['name'] ?></h5>

                                                <div class="review-date"><?php echo $datetime; ?></div>

                                                <p class="mb-0"><?php echo $review['review'] ?></p>

                                            </div>

                                            <div class="review-count">

                                                <div class="rating">

                                                    <?php

                                                            for ($x = 1; $x <= $avg_ratings; $x++) {

                                                                echo '<i class="fas fa-star filled"></i>';

                                                            }

                                                            if (strpos($avg_ratings, '.')) {

                                                                echo '<i class="fas fa-star"></i>';

                                                                $x++;

                                                            }

                                                            while ($x <= 5) {

                                                                echo '<i class="fas fa-star"></i>';

                                                                $x++;

                                                            }

                                                            ?>

                                                    <span
                                                        class="d-inline-block average-rating">(<?php echo $review['rating'] ?>)</span>

                                                </div>

                                            </div>

                                        </div>

                                        <?php

                                            }

                                        } else {

                                            ?>

                                        <span><?php echo (!empty($user_language[$user_selected]['lg_No_reviews'])) ? $user_language[$user_selected]['lg_No_reviews'] : $default_language['en']['lg_No_reviews']; ?></span>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="book-service-left">

                        <div class="sidebar-widget widget">

                            <div class="service-amount">

                                <span><?php echo currency_conversion($user_currency_code) . $service_amount; ?></span>

                            </div>

                            <div class="service-book">

                                <?php

                        $val = $this->db->select('*')->from('book_service')->where('service_id', $service['id'])->where('user_id', $this->session->userdata('id'))->order_by('id', 'DESC')->get()->row();

                        $userId = $this->session->userdata('id');

                        $usertype = $this->session->userdata('usertype');

                        $token = $this->session->userdata('chat_token');



                        if (!empty($userId)) {

                            if (!empty($usertype) && $usertype == 'user') {



                                $type = $this->session->userdata('usertype');

                                if ($type == 'user') {

                                    $user_currency = get_user_currency();

                                } else if ($type == 'provider') {

                                    $user_currency = get_provider_currency();

                                }

                                $user_currency_code = $user_currency['user_currency_code'];



                                $service_amount = get_gigs_currency($service['service_amount'], $service['currency_code'], $user_currency_code);



                                $where = [

                                    'token' => $token

                                ]; ?>


                                <?php if(settingValue('booking_showhide') == 1) { ?>
                                <button class="btn btn-primary go_book_service" type="button" id="go_book_service"
                                    data-id="<?php echo $service['id'] ?>"><?php echo (!empty($user_language[$user_selected]['lg_Book_Service'])) ? $user_language[$user_selected]['lg_Book_Service'] : $default_language['en']['lg_Book_Service']; ?>
                                </button>

                                <?php } ?>

                                <?php

                            }

                        } else {

                            ?>

                                <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-wizard1">
                                    <?php echo (!empty($user_language[$user_selected]['lg_Book_Service'])) ? $user_language[$user_selected]['lg_Book_Service'] : $default_language['en']['lg_Book_Service']; ?>
                                </a>

                                <?php } ?>

                                <?php

                        if (!empty($this->session->userdata('id'))) {

                            if ($service['user_id'] == $this->session->userdata('id')) {

                                if ($this->session->userdata('usertype') == 'provider') {

                                    ?>

                                <a href="<?php echo base_url() . 'user/service/edit_service/' . $service['id'] ?>"
                                    class="btn btn-primary">
                                    <?php echo (!empty($user_language[$user_selected]['lg_Edit_Service'])) ? $user_language[$user_selected]['lg_Edit_Service'] : $default_language['en']['lg_Edit_Service']; ?>
                                </a>

                                <?php

                                }

                            }

                        }

                        ?>

                            </div>

                        </div>





                        <div class="card provider-widget clearfix">

                            <div class="card-body">

                                <h5 class="card-title">
                                    <?php echo (!empty($user_language[$user_selected]['lg_Service_Provider'])) ? $user_language[$user_selected]['lg_Service_Provider'] : $default_language['en']['lg_Service_Provider']; ?>
                                </h5>

                                <?php

                        if (!empty($service['user_id'])) {

                            $provider = $this->db->select('*')->

                                            from('providers')->

                                            where('id', $service['user_id'])->

                                            get()->row_array();

                            ?>



                                <div class="about-author">

                                    <div class="about-provider-img">

                                        <div class="provider-img-wrap">

                                            <?php

                                        if (file_exists($provider['profile_img'])) {

                                            $image = base_url() . $provider['profile_img'];

                                        } else {

                                            $image = base_url() . 'assets/img/user.jpg';

                                        }

                                        ?>

                                            <a href="javascript:void(0);"><img class="img-fluid rounded-circle" alt=""
                                                    src="<?php echo $image; ?>"></a>

                                        </div>

                                    </div>



                                    <div class="provider-details">
                                        <?php  
                                        $user_lang = ($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
                                        $this->db->where('modules', 'provider');
                                        $this->db->where('name_id', $provider['id']);
                                        $this->db->where('lang_type', $user_lang);
                                        $lang_pro = $this->db->get('users_lang')->row_array();
                                    ?>
                                        <a href="javascript:void(0);"
                                            class="ser-provider-name"><?= !empty($lang_pro['name']) ? $lang_pro['name'] : $provider['name']; ?></a>

                                        <p class="last-seen">

                                            <?php 
                                        if(settingValue('provider_status_showhide') == 1) {
                                            if ($provider_online['is_online'] == 2) { ?>

                                            <i class="fas fa-circle"></i>
                                            <?php echo (!empty($user_language[$user_selected]['lg_last_seen'])) ? $user_language[$user_selected]['lg_last_seen'] : $default_language['en']['lg_last_seen']; ?>:
                                            &nbsp;

                                            <?php $day_text=(!empty($user_language[$user_selected]['lg_days'])) ? $user_language[$user_selected]['lg_days'] : $default_language['en']['lg_days'];  echo (!empty($days)) ? $days .' '. $day_text.' ': ''; ?>

                                            <?php if ($days == 0) { ?>

                                            <?php $hours_text = (!empty($user_language[$user_selected]['lg_hours'])) ? $user_language[$user_selected]['lg_hours'] : $default_language['en']['lg_hours']; echo (!empty($hours)) ? $hours . " ".$hours_text : ''; ?>

                                            <?php } ?>

                                            <?php if ($days == 0 && $hours == 0) { ?>

                                            <?php $min_text = (!empty($user_language[$user_selected]['lg_mints'])) ? $user_language[$user_selected]['lg_mints'] : $default_language['en']['lg_mints']; echo (!empty($minutes)) ? $minutes . " " .$min_text : ''; ?>

                                            <?php } ?>

                                            <?php echo (!empty($user_language[$user_selected]['lg_ago'])) ? $user_language[$user_selected]['lg_ago'] : $default_language['en']['lg_ago']; ?>

                                        </p>

                                        <?php } elseif ($provider_online['is_online'] == 1) { ?>
                                        <i class="fas fa-circle online"></i> Online</p>
                                        <?php } 
                                        } ?>

                                        <p class="text-muted mb-1">
                                            <?php echo (!empty($user_language[$user_selected]['lg_Member_Since'])) ? $user_language[$user_selected]['lg_Member_Since'] : $default_language['en']['lg_Member_Since']; ?>
                                            <?= date('M Y', strtotime($provider['created_at'])); ?></p>

                                    </div>

                                </div>

                                <?php if(settingValue('provider_email_showhide') == 1 || settingValue('provider_mobileno_showhide') == 1) { ?>
                                <hr>
                                <div class="provider-info">
                                    <?php if(settingValue('provider_email_showhide') == 1) { ?>
                                    <p class="mb-1"><i class="far fa-envelope mr-1"></i> <?= $provider['email'] ?></p>
                                    <?php } 
                                    if(settingValue('provider_mobileno_showhide') == 1) { ?>
                                    <p class="mb-0"><i class="fas fa-phone-alt mr-1"></i>
                                        <?php if ($this->session->userdata('id')) {
                                                    echo $provider['country_code'].' - '.$provider['mobileno'];
                                                } else { ?>
                                        xxxxxxxx<?= rand(00, 99); ?>
                                        <?php } ?>
                                    </p>
                                    <?php  } ?>

                                </div>


                                <?php }
                    }  ?>

                            </div>
                        </div>
                        <?php if (!empty($this->session->userdata('id')) && $this->session->userdata('usertype') == 'user') { ?>
                        <div class="report">
                            <a id="abuse_report" data-id="<?php echo $service['user_id']; ?>"
                                class='btn btn-sm bg-danger-light'><i class="fas fa-bug" aria-hidden="true"></i> Report
                                this provider</a>
                        </div>
                        <?php } ?>
                        <br>
                        <?php if(settingValue('service_availability_showhide') == 1) { ?>
                        <div class="card available-widget">

                            <div class="card-body">

                                <h5 class="card-title">
                                    <?php echo (!empty($user_language[$user_selected]['lg_Service_Availability'])) ? $user_language[$user_selected]['lg_Service_Availability'] : $default_language['en']['lg_Service_Availability']; ?>
                                </h5>

                                <ul>

                                    <?php

                                if (!empty($availability_details)) {

                                    foreach ($availability_details as $availability) {



                                        $day = $availability['day'];

                                        $from_time = $availability['from_time'];

                                        $to_time = $availability['to_time'];



                                        if ($day == '1') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_monday'])) ? $user_language[$user_selected]['lg_monday'] : $default_language['en']['lg_monday'];

                                        } elseif ($day == '2') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_tuesday'])) ? $user_language[$user_selected]['lg_tuesday'] : $default_language['en']['lg_tuesday'];

                                        } elseif ($day == '3') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_wednesday'])) ? $user_language[$user_selected]['lg_wednesday'] : $default_language['en']['lg_wednesday'];

                                        } elseif ($day == '4') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_thursday'])) ? $user_language[$user_selected]['lg_thursday'] : $default_language['en']['lg_thursday'];

                                        } elseif ($day == '5') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_friday'])) ? $user_language[$user_selected]['lg_friday'] : $default_language['en']['lg_friday'];

                                        } elseif ($day == '6') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_saturday'])) ? $user_language[$user_selected]['lg_saturday'] : $default_language['en']['lg_saturday'];

                                        } elseif ($day == '7') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_sunday'])) ? $user_language[$user_selected]['lg_sunday'] : $default_language['en']['lg_sunday'];

                                        } elseif ($day == '0') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_sunday'])) ? $user_language[$user_selected]['lg_sunday'] : $default_language['en']['lg_sunday'];

                                        }



                                        echo '<li><span>' . $weekday . '</span>' . $from_time . ' - ' . $to_time . '</li>';

                                    }

                                } else {

                                    echo '<li class="text-center">No Details found</li>';

                                }

                                ?>

                                </ul>

                            </div>

                        </div>
                        <?php } ?>
                    </div>

                </div>



                <h4 class="card-title">
                    <?php echo (!empty($user_language[$user_selected]['lg_Related_Services'])) ? $user_language[$user_selected]['lg_Related_Services'] : $default_language['en']['lg_Related_Services']; ?>
                </h4>



                <div class="service-carousel">

                    <div class="popular-slider owl-carousel owl-theme">

                        <?php

                        foreach ($popular_service as $key => $serv) {



                            $mobile_image = explode(',', $serv['mobile_image']);

                            $this->db->select("service_image");

                            $this->db->from('services_image');

                            $this->db->where("service_id", $serv['id']);

                            $this->db->where("status", 1);

                            $image = $this->db->get()->row_array();



							$provider_details = $this->db->where('id', $serv['user_id'])->get('providers')->row_array();

                            $user_currency_code = '';

                            $userId = $this->session->userdata('id');

                            If (!empty($userId)) {

                                $service_amount12 = $serv['service_amount'];

                                $type = $this->session->userdata('usertype');

                                if ($type == 'user') {

                                    $user_currency = get_user_currency();

                                } else if ($type == 'provider') {

                                    $user_currency = get_provider_currency();

                                }

                                $user_currency_code = $user_currency['user_currency_code'];

                                $service_amount12 = get_gigs_currency($serv['service_amount'], $serv['currency_code'], $user_currency_code);

                            } else {

                                $user_currency_code = settings('currency');

                                $service_amount12 = get_gigs_currency($serv['service_amount'], $serv['currency_code'], $user_currency_code);

                            }

                            if (is_nan($service_amount12) || is_infinite($service_amount12)) {

                                $service_amount12 = $serv['service_amount'];

                            }

                            ?>



                        <div class="service-widget">

                            <div class="service-img">

                                <a href="<?php echo base_url() . 'service-preview/' . $serv['url']; ?>">



                                    <?php if (!empty($image['service_image']) && (@getimagesize(base_url().$image['service_image']))) { ?>

                                    <img class="img-fluid serv-img" alt="Service Image"
                                        src="<?php echo base_url() . $image['service_image']; ?>">

                                    <?php } else { ?>

                                    <img class="img-fluid serv-img" alt="Service Image"
                                        src="<?php echo ($placholder_img)? base_url().$placholder_img:base_url().'uploads/placeholder_img/1641376248_user.jpg'; ?>">

                                    <?php } ?>

                                </a>

                                <div class="item-info">

                                    <div class="service-user">

                                        <a href="#">

                                            <?php if ($provider_details['profile_img'] != '' && (@getimagesize(base_url().$provider_details['profile_img']))) { ?>

                                            <img src="<?php echo base_url() . $provider_details['profile_img'] ?>">

                                            <?php } else { ?>

                                            <img src="<?php echo base_url(); ?>assets/img/user.jpg">



                                            <?php } ?>

                                        </a>

                                        <span
                                            class="service-price"><?php echo currency_conversion($user_currency_code) . $service_amount12; ?></span>

                                    </div>

                                    <div class="cate-list"> <a class="bg-yellow"
                                            href="<?php echo base_url(); ?>search/<?php echo str_replace(' ', '-', $serv['category_name']); ?>"><?= ucfirst($serv['category_name']); ?></a>
                                    </div>

                                </div>

                            </div>

                            <div class="service-content">

                                <h3 class="title">

                                    <a
                                        href="<?php echo base_url() . 'service-preview/' . $serv['url']; ?>"><?php echo ucfirst($serv['service_title']); ?></a>

                                    <?php    

                                                

                                                if($this->session->userdata('usertype') != "provider") {

                                                    if($userId && ($userId == $user_fav['user_id']) && $user_fav['service_id'] == $serv['id']) {

                                                        if($user_fav['status'] == 1) { ?>

                                    <a href="javascript:;" id="ufav<?=$serv['id']?>" class="hearting"
                                        style="float: right;color:#007bff" data-id="<?php echo $user_fav['id']?>"
                                        data-userid="<?php echo $userId?>" data-provid="<?php echo $serv['user_id']?>"
                                        data-servid="<?php echo $serv['id']?>" data-favstatus="0"
                                        data-pagename="<?php echo $serv['category_name']?>"><i
                                            class="fas fa-heart filled"></i></a>

                                    <?php } 

                                                        else { ?>

                                    <a href="javascript:;" id="ufav<?=$serv['id']?>" class="hearting"
                                        style="float: right;" data-id="<?php echo $user_fav['id']?>"
                                        data-userid="<?php echo $userId?>" data-provid="<?php echo $serv['user_id']?>"
                                        data-servid="<?php echo $serv['id']?>" data-favstatus="1"
                                        data-pagename="<?php echo $serv['category_name']?>"><i
                                            class="fas fa-heart"></i></a>

                                    <?php } 

                                                    } else { ?>

                                    <a href="javascript:;" id="ufav<?=$serv['id']?>" class="hearting"
                                        style="float: right;" data-id="<?php echo $user_fav['id']?>"
                                        data-userid="<?php echo $this->session->userdata('id');?>"
                                        data-provid="<?php echo $serv['user_id']?>"
                                        data-servid="<?php echo $serv['id']?>" data-favstatus="1"
                                        data-pagename="<?php echo $serv['category_name']?>"><i
                                            class="fas fa-heart"></i></a>

                                    <?php }

                                                }

                                                ?>

                                </h3>

                                <div class="rating">

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>

                                    <span class="d-inline-block average-rating">(0)</span>

                                </div>

                                <div class="user-info">

                                    <div class="row">

                                        <span class="col ser-contact"><i class="fas fa-phone mr-1"></i>
                                            <span>xxxxxxxx<?= rand(00, 99) ?></span></span>



                                        <span class="col ser-location"
                                            title="Address"><span><?= $serv['service_location']; ?></span> <i
                                                class="fas fa-map-marker-alt ml-1"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php } ?>

                    </div>

                </div>

            </div>

            <?php

            $user_currency_code = '';

            $userId = $this->session->userdata('id');

            $user_details = $this->db->where('id', $userId)->get('users')->row_array();

            If (!empty($userId)) {

                $service_amount = $service['service_amount'];

                $type = $this->session->userdata('usertype');

                if ($type == 'user') {

                    $user_currency = get_user_currency();

                } else if ($type == 'provider') {

                    $user_currency = get_provider_currency();

                }

                $user_currency_code = $user_currency['user_currency_code'];



                $service_amount = get_gigs_currency($service['service_amount'], $service['currency_code'], $user_currency_code);

            } else {

                $user_currency_code = settings('currency');

                $service_currency_code = $service['currency_code'];

                $service_amount = get_gigs_currency($service['service_amount'], $service['currency_code'], $user_currency_code);

            }

            

            if (is_nan($service_amount) || is_infinite($service_amount)) {

                $service_amount = $service['service_amount'];

            }

            ?>

            <div class="col-lg-4 theiaStickySidebar book-service-right">

                <div class="sidebar-widget widget">

                    <div class="service-amount">

                        <span><?php echo currency_conversion($user_currency_code) . $service_amount; ?></span>

                    </div>

                    <div class="service-book">

                        <?php

                        $val = $this->db->select('*')->from('book_service')->where('service_id', $service['id'])->where('user_id', $this->session->userdata('id'))->order_by('id', 'DESC')->get()->row();

                        $userId = $this->session->userdata('id');

                        $usertype = $this->session->userdata('usertype');

                        $token = $this->session->userdata('chat_token');



                        if (!empty($userId)) {

                            if (!empty($usertype) && $usertype == 'user') {



                                $type = $this->session->userdata('usertype');

                                if ($type == 'user') {

                                    $user_currency = get_user_currency();

                                } else if ($type == 'provider') {

                                    $user_currency = get_provider_currency();

                                }

                                $user_currency_code = $user_currency['user_currency_code'];



                                $service_amount = get_gigs_currency($service['service_amount'], $service['currency_code'], $user_currency_code);



                                $where = [

                                    'token' => $token

                                ]; ?>


                        <?php if(settingValue('booking_showhide') == 1) { ?>
                        <button class="btn btn-primary go_book_service" type="button" id="go_book_service"
                            data-id="<?php echo $service['id'] ?>"><?php echo (!empty($user_language[$user_selected]['lg_Book_Service'])) ? $user_language[$user_selected]['lg_Book_Service'] : $default_language['en']['lg_Book_Service']; ?>
                        </button>

                        <?php } ?>

                        <?php

                            }

                        } else {

                            ?>

                        <a href="javascript:void(0);" class="btn btn-primary"
                            style="background-color: #ef7f21!important;" data-toggle="modal"
                            data-target="#modal-wizard1">
                            <?php echo (!empty($user_language[$user_selected]['lg_Book_Service'])) ? $user_language[$user_selected]['lg_Book_Service'] : $default_language['en']['lg_Book_Service']; ?>
                        </a>

                        <?php } ?>

                        <?php

                        if (!empty($this->session->userdata('id'))) {

                            if ($service['user_id'] == $this->session->userdata('id')) {

                                if ($this->session->userdata('usertype') == 'provider') {

                                    ?>

                        <a href="<?php echo base_url() . 'user/service/edit_service/' . $service['id'] ?>"
                            class="btn btn-primary">
                            <?php echo (!empty($user_language[$user_selected]['lg_Edit_Service'])) ? $user_language[$user_selected]['lg_Edit_Service'] : $default_language['en']['lg_Edit_Service']; ?>
                        </a>

                        <?php

                                }

                            }

                        }

                        ?>

                    </div>

                </div>





                <div class="card provider-widget clearfix">

                    <div class="card-body">

                        <!-- <h5 class="card-title">
                            <?php echo (!empty($user_language[$user_selected]['lg_Service_Provider'])) ? $user_language[$user_selected]['lg_Service_Provider'] : $default_language['en']['lg_Service_Provider']; ?>
                        </h5> -->

                        <?php

                       

                            $provider = $this->db->select('*')->

                                            from('providers')->

                                            where('id', $service['user_id'])->

                                            get()->row_array();

                            ?>



                        <div class="about-author">

                            <div class="about-provider-img">

                                <div class="provider-img-wrap">

                                    <?php
                                            $image = base_url() . 'uploads/logo/logo.png';
                                        ?>

                                    <a href="javascript:void(0);"><img class="img-fluid rounded-circle" alt=""
                                            src="<?php echo $image; ?>"></a>

                                </div>

                            </div>



                            <div class="provider-details">

                                <a href="javascript:void(0);" class="ser-provider-name">Mfs technical services</a>






                                <p class="text-muted mb-1">
                                    Contact with us</p>

                            </div>

                        </div>


                        <hr>
                        <div class="provider-info">

                            <p class="mb-1"><i class="far fa-envelope mr-1"></i> mfs.service123@gmail.com</p>

                            <p class="mb-0"><i class="fas fa-phone-alt mr-1"></i>

                                +971-581329990

                            </p>


                        </div>




                    </div>
                </div>
                <!-- <?php if (!empty($this->session->userdata('id')) && $this->session->userdata('usertype') == 'user') { ?>
                <div class="report">
                    <a id="abuse_report" data-id="<?php echo $service['user_id']; ?>"
                        class='btn btn-sm bg-danger-light'><i class="fas fa-bug" aria-hidden="true"></i> Report this
                        provider</a>
                </div>
                <?php } ?> -->
                <br>

                <?php if(settingValue('service_availability_showhide') == 1) { ?>
                <div class="card available-widget">

                    <div class="card-body">

                        <h5 class="card-title">
                            <?php echo (!empty($user_language[$user_selected]['lg_Service_Availability'])) ? $user_language[$user_selected]['lg_Service_Availability'] : $default_language['en']['lg_Service_Availability']; ?>
                        </h5>

                        <ul>

                            <?php

                                if (!empty($availability_details)) {

                                    foreach ($availability_details as $availability) {



                                        $day = $availability['day'];

                                        $from_time = $availability['from_time'];

                                        $to_time = $availability['to_time'];



                                        if ($day == '1') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_monday'])) ? $user_language[$user_selected]['lg_monday'] : $default_language['en']['lg_monday'];

                                        } elseif ($day == '2') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_tuesday'])) ? $user_language[$user_selected]['lg_tuesday'] : $default_language['en']['lg_tuesday'];

                                        } elseif ($day == '3') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_wednesday'])) ? $user_language[$user_selected]['lg_wednesday'] : $default_language['en']['lg_wednesday'];

                                        } elseif ($day == '4') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_thursday'])) ? $user_language[$user_selected]['lg_thursday'] : $default_language['en']['lg_thursday'];

                                        } elseif ($day == '5') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_friday'])) ? $user_language[$user_selected]['lg_friday'] : $default_language['en']['lg_friday'];

                                        } elseif ($day == '6') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_saturday'])) ? $user_language[$user_selected]['lg_saturday'] : $default_language['en']['lg_saturday'];

                                        } elseif ($day == '7') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_sunday'])) ? $user_language[$user_selected]['lg_sunday'] : $default_language['en']['lg_sunday'];

                                        } elseif ($day == '0') {

                                            $weekday = (!empty($user_language[$user_selected]['lg_sunday'])) ? $user_language[$user_selected]['lg_sunday'] : $default_language['en']['lg_sunday'];

                                        }



                                        echo '<li><span>' . $weekday . '</span>' . $from_time . ' - ' . $to_time . '</li>';

                                    }

                                } else {

                                    echo '<li class="text-center">No Details found</li>';

                                }

                                ?>

                        </ul>

                    </div>

                </div>
                <?php } ?>
            </div>

        </div>

    </div>

</div>

<div class="modal" id="abuse_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Report This Provider Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo (!empty($user_language[$user_selected]['lg_descriptions'])) ? $user_language[$user_selected]['lg_descriptions'] : $default_language['en']['lg_descriptions']; ?></label>
                    <textarea class="form-control" id="abuse_desc" required></textarea>
                    <p class="repo_reason_error error">Reason Is Required</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_abuse_sub" data-userid="<?php echo $this->session->userdata('id'); ?>"
                    data-id=""
                    class="btn btn-primary"><?php echo(!empty($user_language[$user_selected]['lg_admin_confirm']))?($user_language[$user_selected]['lg_admin_confirm']) : 'Confirm';  ?></button>
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo(!empty($user_language[$user_selected]['lg_admin_cancel']))?($user_language[$user_selected]['lg_admin_cancel']) : 'Cancel';  ?></button>
            </div>
        </div>
    </div>
</div>

<style>
.book-service-left {
    display: none;
}

@media only screen and (max-width: 991.98px) {
    .book-service-right {
        display: none;
    }

    .book-service-left {
        display: block;
    }
}
</style>