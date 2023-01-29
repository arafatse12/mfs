<div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <h2>Apply For Job Application</h2>
                </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Job Application</li>
                    </ol>
                </nav>
            </div>
            <div id="messageId" class"btn btn-success"></div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="uploaded_image">
                </div>
                <div class="contact-blk-content">
                    <form method="post" enctype="multipart/form-data" id="createForm">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>" />

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label
                                        class="required"><?php echo (!empty($user_language[$user_selected]['lg_Name'])) ? $user_language[$user_selected]['lg_Name'] : $default_language['en']['lg_Name']; ?>
                                    </label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo (!empty($user_language[$user_selected]['lg_Email'])) ? $user_language[$user_selected]['lg_Email'] : $default_language['en']['lg_Email']; ?>
                                        <span>*</span></label>
                                    <input class="form-control" type="text" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Position <span>*</span></label>
                                    <input class="form-control" type="text" name="position" id="position" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address <span>*</span></label>
                                    <input class="form-control" type="text" name="address" id="address" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    <input class="form-control" type="number" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Upload CV <span>*</span></label>
                                    <input class="form-control" type="file" name="image_file" id="image_file" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div id="load_div"></div>
                                    </div>
                                    <label><?php echo (!empty($user_language[$user_selected]['lg_messages'])) ? $user_language[$user_selected]['lg_messages'] : $default_language['en']['lg_messages']; ?></label>
                                    <textarea class="form-control" name="message" id="message" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn submit_service_book" type="submit"
                                id="submit">Apply</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#createForm').on('submit', function(e) {
        e.preventDefault();
        if ($('#image_file').val() == '') {
            alert("Please Select the File");
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>user/job/insert_job",
                //base_url() = http://localhost/tutorial/codeigniter  
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#createForm')[0].reset();
                    $('#uploaded_image').html(
                        '<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></</strong> ' +
                        'Successfully Job Applied' +
                        '</div>'
                    );
                }
            });
        }
    });
});
//submitting form
// $("#createForm").submit(function (event) {
//     event.preventDefault(); 

//     $.ajax({
//         url: "<?php echo base_url('user/job/insert_job'); ?>", //backend url
//         data: $('#createForm').serialize(), 
//         type: "post",
//         dataType: 'json',
//         success: function (response) {
// 		console.log(response);
// 			$('#messageId').html('arafat');
//             $('#createForm')[0].reset(); //reset form
//             alert('Successfully inserted'); //displaying a successful message
//         }

//     });
// });
</script>