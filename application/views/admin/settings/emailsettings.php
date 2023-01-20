<?php 
$admin_settings = $language_content;
?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"><?php echo(!empty($admin_settings['lg_admin_email_settings']))?($admin_settings['lg_admin_email_settings']) : 'Email Settings';  ?> </h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12">

                <div class="card">
                    <div class="card-body">
                        <form id="form_emailsetting" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <?php
                            if (!isset($mail_config)) {
                                $mail_config = "phpmail";
                            }
                            ?>
                            <input type="hidden" id="mail_config" value="<?= (isset($mail_config)) ? $mail_config : "phpmail"; ?>">
							
							<div class="form-group">
								<div class="custom-control custom-radio custom-control-inline">
									<input class="custom-control-input" id="phpmail" type="radio" name="mail_config" value="phpmail" <?= ($mail_config == "phpmail") ? "checked" : '' ?>>
									<label class="custom-control-label" for="phpmail"><?php echo(!empty($admin_settings['lg_admin_phpmail']))?($admin_settings['lg_admin_phpmail']) : 'PHP Mail';  ?></label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input class="custom-control-input" id="smtpmail" type="radio" name="mail_config" value="smtp" <?= ($mail_config == "smtp") ? "checked" : '' ?>>
									<label class="custom-control-label" for="smtpmail"><?php echo(!empty($admin_settings['lg_admin_smtp']))?($admin_settings['lg_admin_smtp']) : 'SMTP';  ?></label>
								</div>
							</div>
                            <div class="phpMail">
                                <div class="form-group">
                                    <label ><?php echo(!empty($admin_settings['lg_admin_email_fromaddress']))?($admin_settings['lg_admin_email_fromaddress']) : 'Email From Address';  ?></label>
                                    <input type="email" id="website_name" name="email_address" value="<?php if (isset($email_address)) echo $email_address; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label ><?php echo(!empty($admin_settings['lg_admin_email_password']))?($admin_settings['lg_admin_email_password']) : 'Email Password';  ?></label>
                                    <input type="password" id="email_password" name="email_password" value="<?php if (isset($email_password)) echo $email_password; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo(!empty($admin_settings['lg_admin_emails_fromname']))?($admin_settings['lg_admin_emails_fromname']) : 'Emails From Name';  ?></label>
                                    <input type="text" id="email_tittle" name="email_tittle" value="<?php if (isset($email_tittle)) echo $email_tittle; ?>" class="form-control only_alphabets">
                                </div>
                            </div>
                            <div class="smtpMail">
                                <div class="form-group">
                                    <label ><?php echo(!empty($admin_settings['lg_admin_email_fromaddress']))?($admin_settings['lg_admin_email_fromaddress']) : 'Email From Address';  ?></label>
                                    <input type="email"  name="smtp_email_address" value="<?php if (isset($smtp_email_address)) echo $smtp_email_address; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label ><?php echo(!empty($admin_settings['lg_admin_email_password']))?($admin_settings['lg_admin_email_password']) : 'Email Password';  ?></label>
                                    <input type="password" id="smtp_email_password" name="smtp_email_password" value="<?php if (isset($smtp_email_password)) echo $smtp_email_password; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo(!empty($admin_settings['lg_admin_emailhost']))?($admin_settings['lg_admin_emailhost']) : 'Email Host';  ?></label>
                                    <input type="text" id="smtp_email_host" name="smtp_email_host" value="<?php if (isset($smtp_email_host)) echo $smtp_email_host; ?>" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label><?php echo(!empty($admin_settings['lg_admin_email_port']))?($admin_settings['lg_admin_email_port']) : 'Email Port';  ?></label>
                                    <input type="text" id="smtp_email_port" name="smtp_email_port" value="<?php if (isset($smtp_email_port)) echo $smtp_email_port; ?>" class="form-control ">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button name="form_submit" type="submit" class="btn btn-primary center-block" value="true"><?php echo(!empty($admin_settings['lg_admin_save_changes']))?($admin_settings['lg_admin_save_changes']) : 'Save Changes';  ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
