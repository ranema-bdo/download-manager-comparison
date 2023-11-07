<?php if(!defined('ABSPATH')) die('!'); ?>

<div class="w3eden">
    <div class='w3eden' id='wpdmreg'>
        <?php
        if(get_option('users_can_register')){

            //LOGO
            if(isset($params['logo']) && $params['logo'] != '' && !isset($nologo)){ ?>
           
        <?php } ?>

<!-- BDO Custom Login Page Tabs -->

<ul class="nav nav-tabs nav-justified justify-content-center" id="LoginRegisterNav" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="login-tab" href="/resources/downloads"><i
                class="material-icons mr-3">account_circle</i>Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="register-tab" href="javascript:void(0);"><i
                class="material-icons mr-3">person_add</i>Register</a>
    </li>
</ul>


<div class="tab-content" id="LoginRegister">

    <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-7 col-xs-10 bg-light shadow">


            <form method="post" action="" id="registerform" name="registerform" class="login-form">


                <div id="__signup_msg"></div>

                <?php
                if(!$_social_only){ ?>

                    <?php  if(isset($params['note_before']) && trim($params['note_before']) != '') {  ?>
                        <div class="alert alert-info alert-note-before mb-3" >
                            <?php echo $params['note_before']; ?>
                        </div>
                    <?php } ?>

                    <?= $form_html; ?>

                    <?php  if(isset($params['note_after']) && trim($params['note_after']) != '') {  ?>
                        <div class="alert alert-info alter-note-after mb-3" >
                            <?php echo $params['note_after']; ?>
                        </div>
                    <?php } ?>

                    <?php do_action("wpdm_register_form"); ?>
                    <?php do_action("register_form"); ?>

                <?php } ?>

                <div class="row">
                    <?php if(!$_social_only){ ?>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary mt-3" id="registerform-submit" name="wp-submit"><?php _e( "Register Now" , "download-manager" ); ?></button>
                        </div>
                    <?php } ?>

                    <?php
                    if(count($__wpdm_social_login) > 1) { ?>
                        <div class="col-sm-12">
                            <div class="text-center card card-default" style="margin: 20px 0 0 0">
                                <?php if(!$_social_only){ ?>
                                <div class="card-header" data-toggle="collapse" href="#socialllogin" role="button" aria-expanded="false" aria-controls="socialllogin"><?php echo isset($params['social_title'])?$params['social_title']:__("Or connect using your social account", "download-manager"); ?></div>
                                <?php } else { ?>
                                    <div class="card-header"><?php echo isset($params['social_title'])?$params['social_title']:__("Connect using your social account", "download-manager"); ?></div>
                                <?php } ?>
                                <?php if(!$_social_only){ ?><div class="collapse" id="socialllogin"><?php } ?>
                                    <div class="card-body">
                                        <?php if(isset($__wpdm_social_login['facebook'])){ ?><button type="button" onclick="return _PopupCenter('<?php echo home_url('/?sociallogin=facebook'); ?>', 'Facebook', 400,400);" class="btn btn-social wpdm-facebook wpdm-facebook-connect"><i class="fab fa-facebook-f"></i></button><?php } ?>
                                        <?php if(isset($__wpdm_social_login['twitter'])){ ?><button type="button" onclick="return _PopupCenter('<?php echo home_url('/?sociallogin=twitter'); ?>', 'Twitter', 400,400);" class="btn btn-social wpdm-twitter wpdm-linkedin-connect"><i class="fab fa-twitter"></i></button><?php } ?>
                                        <?php if(isset($__wpdm_social_login['linkedin'])){ ?><button type="button" onclick="return _PopupCenter('<?php echo home_url('/?sociallogin=linkedin'); ?>', 'LinkedIn', 400,400);" class="btn btn-social wpdm-linkedin wpdm-twitter-connect"><i class="fab fa-linkedin-in"></i></button><?php } ?>
                                        <?php if(isset($__wpdm_social_login['google'])){ ?><button type="button" onclick="return _PopupCenter('<?php echo home_url('/?sociallogin=google'); ?>', 'Google', 400,400);" class="btn btn-social wpdm-google-plus wpdm-google-connect"><i class="fab fa-google"></i></button><?php } ?>
                                    </div>
                                    <?php if(!$_social_only){ ?></div><?php } ?>
                            </div>
                        </div>

                    <?php } ?>



                    <!-- <div class="row d-flex">
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark mt-3" id="registerform-submit"
                                name="wp-submit"><?php _e( "Register" , "download-manager" ); ?></button>
                        </div>
                       
                    </div> -->
                    <div class="row d-flex w-100 text-center login-form-meta-text">
                        <?php if($loginurl != ''){ ?>
                        <div class="col-12 text-center">
                            <a href="<?php echo $loginurl;?>" class="btn btn-link text-primary small font-weight-light mb-1"
                                id="registerform-login"
                                name="wp-submit"><?php _e("Already have an account?", "download-manager"); ?>
                                <?php _e( "<b class='text-primary'>Login</b>" , "download-manager" ); ?></a>
                            <p class="text-small font-weight-light text-muted mb-0">By registering, you agree to
                                MeasurLink's<br /><a target="_blank" class="text-muted font-weight-normal mb-0"
                                    href="/terms">Terms of Use</a> and <a target="_blank"
                                    class="mb-0 text-muted font-weight-normal" href="/privacy-policy">Privacy
                                    Policy.</a></p>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- 
                    <?php if($loginurl != ''){ ?>
                        <div class="col-sm-12">
                            <br/>
                            <a href="<?php echo $loginurl;?>" class="btn btn-link btn-xs btn-block wpdm-login-link color-green" id="registerform-login" name="wp-submit"><?php _e("Already have an account?", "download-manager"); ?> <i class="fa fa-lock"></i> <?php _e( "Login" , "download-manager" ); ?></a>
                        </div>
                    <?php } ?> -->
                </div>

            </form>

            <script>
                jQuery(function ($) {
                    $('#__reg_nonce').val('<?php echo wp_create_nonce(NONCE_KEY); ?>');
                    <?php if(!isset($params['form_submit_handler']) || $params['form_submit_handler'] !== false){ ?>
                    var llbl = $('#registerform-submit').html();
                    $('#registerform').submit(function (e) {
                        e.preventDefault();
                        if( $('#reg_password').val() !== $('#reg_confirm_pass').val() ){
                            $('#reg_confirm_pass').parent('.input-wrapper').addClass('input-error');
                            WPDM.beep();
                            $('#__signup_msg').html(WPDM.html("div","<?php echo __( "Password did not match with the confirm password", "download-manager" ) ?>", "alert alert-danger"));
                            return false;
                        } else {
                            $('#reg_confirm_pass').parent('.input-wrapper').removeClass('input-error');
                        }
                        WPDM.blockUI('#registerform');
                        $('#registerform-submit').html(WPDM.html("i", "", 'fa fa-spin fa-sun') + "<?php _e( "Please Wait..." , "download-manager" ); ?>").attr('disabled', 'disabled');
                        $(this).ajaxSubmit({
                            success: function (res) {
                                if (res.success == false) {
                                    $('form .alert-danger').hide();
                                    $('#registerform').prepend(WPDM.html("div", res.message, 'alert alert-danger'));
                                    $('#registerform-submit').html(llbl).removeAttr('disabled');
                                    WPDM.unblockUI('#registerform');
                                } else if (res.success == true) {
                                    $('#registerform-submit').html(WPDM.html("i", "", 'fa fa-check-circle') + " <?php _e( "Success! Redirecting..." , "download-manager" ); ?>");
                                    location.href = res.redirect_to;
                                } else {
                                    alert(res);
                                }
                            }
                        });
                        return false;
                    });
                    <?php } ?>
                    <?php
                        if($error = \WPDM\__\Session::get('wpdm_signup_error')){
                            ?>
                    WPDM.notify("<div class='media'><div class='mr-3'><i class='fas fa-user-injured fa-3x' style='opacity: 0.8'></i></div><div class='media-body'><strong><?php _e( "Signup Error:", "download-manager" ); ?></strong><br/><?php echo $error; ?></div></div>", 'error', 'top-right');
                    <?php
                        \WPDM\__\Session::clear('wpdm_signup_error');
                        }
                    ?>
                });
            </script>
            <style>
                #reCaptchaLock iframe {
                    transform: scaleX(1.22);
                    margin-left: 33px;
                }
                .input-wrapper.heading-input-wrapper {
                    background: #f9f9f9 !important;
                    font-weight: 600;
                }
                #__signup_msg .wpdm-notify{
                    float: none;
                    width: 100%;
                    display: block;
                }
            </style>

        <?php } else echo "<div class='alert alert-warning'>". __( "Registration is disabled!" , "download-manager" )."</div>"; ?>

        </div>
        </div>
    </div>
</div>


<style>
#loginform-submit::before {
    display:none !important;
}

.form-group label {
    font-size: 0 !important;
    line-height: 0 !important;
    display: none;
}
#downloadsPortal .tab-content {
    margin-top: -2rem;
    z-index: 5;
    margin-bottom: 4rem;
}
</style>