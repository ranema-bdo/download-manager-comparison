<?php

if (!defined('ABSPATH'))
    die();

?>
<!-- BDO Custom Login Page Tabs -->

<ul class="nav nav-tabs nav-justified justify-content-center" id="LoginRegisterNav" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="login-tab" data-toggle="tab" href="javascript:void(0);" data-target="#login"
            role="tab" aria-controls="home" aria-selected="true"><i
                class="material-icons mr-3">account_circle</i>Login</a>
    </li>
    <!-- <li class="nav-item">
    <a class="nav-link" id="register-tab" data-toggle="tab" href="javascript:void(0);" data-target="#register" role="tab" aria-controls="profile" aria-selected="false"><i class="material-icons mr-3">person_add</i>Register</a>
  </li> -->
    <li class="nav-item">
        <a class="nav-link" id="register-tab" href="/register"><i class="material-icons mr-3">person_add</i>Register</a>
    </li>
</ul>


<div class="tab-content" id="LoginRegister">

    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-7 col-xs-10 bg-light shadow">
    <div id="wpdmlogin" <?php if (wpdm_query_var('action') == 'lostpassword')
    echo 'class="lostpass"'; ?>>
        <?php if (isset($params['logo']) && $params['logo'] != '' && !is_user_logged_in()) { ?>
            <ddiv class="text-center wpdmlogin-logo">
                <a href="<?php echo home_url('/'); ?>"><img alt="Logo" src="<?php echo $params['logo']; ?>" /></a>
            </div>
        <?php
}?>
<!-- Added -->


      <?php do_action("wpdm_before_login_form"); ?>

<!-- moved -->
<p class="font-weight-bold text-primary text-small"><small><b><em>Customers who had user names
                                    associated with the previous website will need to register again. We apologize for
                                    any inconvenience.</em></b></small></p>
<!-- moved -->


        <form name="loginform" id="loginform" action="" method="post" class="login-form" >


            <input type="hidden" name="permalink" value="<?php the_permalink(); ?>" />

            <div id="__signin_msg"><?php
$wpdm_signup_success = \WPDM\__\Session::get('__wpdm_signup_success');
if (isset($_GET['signedup'])) {
    if ($wpdm_signup_success == '')
        $wpdm_signup_success = apply_filters("wpdm_signup_success", __("Your account has been created successfully.", "download-manager"));
?>
                    <div class="alert alert-success dismis-on-click">
                        <?= $wpdm_signup_success; ?>
                    </div>
                    <?php
}
?></div>


            <?php
if (isset($params['note_before']) && $params['note_before'] !== '') { ?>
                <div class="alert alert-info alert-note-before mb-3" >
                    <?= esc_attr($params['note_before']); ?>
                </div>
            <?php
}?>

            <?= $this->formFields($params); ?>


            <?php if (isset($params['note_after']) && $params['note_before'] !== '') { ?>
                <div class="alert alert-info alter-note-after mb-3" >
                    <?= esc_attr($params['note_after']); ?>
                </div>
            <?php
}?>


<!-- Inserted -->
<!-- <div class="form-group d-flex">
                            <div class="input-group align-items-center">
                                <span class="input-group-prepend" id="sizing-addon1"><i
                                        class="material-icons text-primary">email</i></span>
                                <input placeholder="<?php _e("Username or Email", "download-manager"); ?>"
                                    type="text" name="wpdm_login[log]" id="user_login"
                                    class="form-control required text" value="" tabindex="38" />
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="input-group align-items-center">
                                <span class="input-group-prepend" id="sizing-addon1"><i
                                        class="material-icons text-primary">lock</i></span>
                                <input type="password" placeholder="<?php _e("Password", "download-manager"); ?>"
                                    name="wpdm_login[pwd]" id="password" class="form-control required password"
                                    value="" tabindex="39" />
                            </div>
                        </div> -->
<!-- Inserted -->

<div class="row d-flex justify-content-betweeen login-form-meta-text mb-4">
    <div class="col text-left">
        <div class="form-check">
            <input class="wpdm-checkbox form-check-input" name="rememberme" type="checkbox"
                id="rememberme" value="forever" style="cursor: pointer !important;" />
            <label class="form-check-label"><?php _e("Remember Me", "download-manager"); ?>
            </label>
        </div>
    </div>
    <div class="col text-right"><a class="btn-link font-weight-light mb-0"
            href="<?php echo wpdm_lostpassword_url(); ?>"><?php _e("Forgot Password?", "download-manager"); ?></a>
    </div>
</div>

<!-- <div class="row login-form-meta-text text-muted mb-3" style="font-size: 10px">
                <div class="col-md-5"><label><input class="wpdm-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /><?php _e("Remember Me", WPDM_TEXT_DOMAIN); ?></label></div>
                <div class="col-md-7 text-right"><a class="color-blue" href="<?php echo add_query_arg(['action' => 'lostpassword'], $_SERVER['REQUEST_URI']); ?>"><?php _e("Forgot Password?", WPDM_TEXT_DOMAIN); ?></a></div>
            </div> -->

<!-- <div class="row d-flex justify-content-between">
    <div class="col-md-12"><button type="submit" name="wp-submit" id="loginform-submit" class="btn d-inline-block btn-primary btn-lg"><?php _e("Login", WPDM_TEXT_DOMAIN); ?></button></div>
    <?php if (isset($regurl) && $regurl != '') { ?>
        <div class="col-md-12"><br/><a href="<?php echo $regurl; ?>" class="btn btn-block btn-link btn-xs wpdm-reg-link color-primary"><span class="mr-4"><?php _e("Don't have an account yet?", WPDM_TEXT_DOMAIN); ?></span><?php _e("Register Now", WPDM_TEXT_DOMAIN); ?></a></div>
    <?php
}?>
</div> -->

            <!-- moved -->
            <div class="row d-flex justify-content-center">
                            <button type="submit" name="wp-submit" id="loginform-submit"
                                class="btn btn-primary mt-4"><?php _e("Login", "download-manager"); ?></button>
                        </div>
                </div>



                

  <!-- moved -->

<input type="hidden" name="redirect_to" value="<?php echo $log_redirect; ?>" />

    </form>

    <?php do_action("wpdm_after_login_form"); ?>

</div>


</div>
<script>
    jQuery(function ($) {
        <?php if (!isset($params['form_submit_handler']) || $params['form_submit_handler'] !== false) { ?>
        var llbl = $('#loginform-submit').html();
        $('#loginform').submit(function () {
            $('#loginform-submit').html(WPDM.html("i", "", "fa fa-spin fa-sync")+" <?php _e("Logging In...", WPDM_TEXT_DOMAIN); ?>").attr('disabled', 'disabled');
            WPDM.blockUI('#loginform');
            $(this).ajaxSubmit({
                error: function(error) {
                    WPDM.unblockUI('#loginform');
                    $('#loginform').prepend(WPDM.html("div", error.responseJSON.messages, "alert alert-danger"));
                    $('#loginform-submit').html(llbl).removeAttr('disabled');
                    <?php if ((int)get_option('__wpdm_recaptcha_loginform', 0) === 1 && get_option('_wpdm_recaptcha_site_key') != '') { ?>
                    try {
                        grecaptcha.reset();
                    } catch (e) {

                    }
                    <?php
    }?>
                },
                success: function (res) {
                    WPDM.unblockUI('#loginform');
                    if (!res.success) {
                        $('form .alert-danger').hide();
                        $('#loginform').prepend(WPDM.html("div", res.message, "alert alert-danger"));
                        $('#loginform-submit').html(llbl).removeAttr('disabled');
                        <?php if ((int)get_option('__wpdm_recaptcha_loginform', 0) === 1 && get_option('_wpdm_recaptcha_site_key') != '') { ?>
                        try {
                            grecaptcha.reset();
                        } catch (e) {

                        }
                        <?php
    }?>
                    } else {
                        $('#loginform-submit').html(WPDM.html("i", "", "fa fa-sun fa-spider") + " " + res.message);
                        location.href = "<?php echo $log_redirect; ?>";
                    }
                }
            });
            return false;
        });
        <?php
}?>
        $('body').on('click', 'form .alert-danger', function(){
            $(this).slideUp();
        });

    });
</script>

</div>

</div>
</div>
<!-- login -->

</div><!-- tab content -->

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