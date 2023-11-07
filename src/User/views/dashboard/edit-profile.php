<?php
global $current_user, $wpdb;
$user = get_userdata($current_user->ID);

?>
<div class="tab-content">
<div id="edit-profile-form" class="tab-pane fade active show row">
<div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-7 col-xs-10 bg-light shadow">

    <form method="post" id="edit_profile" name="contact_form" action="" class="form">
        <?php wp_nonce_field(NONCE_KEY, '__wpdm_epnonce'); ?>
        
                <div class="row d-flex mt-4 pt-4">
                    <div class="col-md-6"><div class="form-group"><label for="name"><?php _e( "Display name:" , WPDM_TEXT_DOMAIN );?> </label><input type="text" class="required form-control" required="required" value="<?php echo $user->display_name;?>" name="wpdm_profile[display_name]" id="fname"></div></div>
                    <div class="col-md-6"><div class="form-group"><label for="username"><?php _e( "Username:" , WPDM_TEXT_DOMAIN );?></label><input type="text" class="required form-control" value="<?php echo $user->user_login;?>" id="username" readonly="readonly"></div></div>
                    <div class="col-md-6"><div class="form-group"><label for="url"><?php _e( "Title:" , WPDM_TEXT_DOMAIN );?></label><input type="text" class="required form-control" name="wpdm_profile[title]" value="<?php echo get_user_meta($user->ID, '__wpdm_title', true);?>" id="title" ></div></div>
                    <div class="col-md-6"><div class="form-group"><label for="email"><?php _e( "Email:" , WPDM_TEXT_DOMAIN );?></label><input type="text" class="required form-control" name="wpdm_profile[user_email]" value="<?php echo $user->user_email;?>" id="email" ></div></div>
                    <div class="col-md-12"><div class="form-group"><label for="email"><?php _e( "About Me:" , WPDM_TEXT_DOMAIN );?></label><textarea class="required form-control" name="wpdm_profile[description]" id="description" ><?php echo esc_attr(get_user_meta($user->ID, 'description', true));?></textarea></div></div>
                </div>
                <?php do_action('wpdm_update_profile_filed_html', $user); ?>
                <?php do_action('wpdm_update_profile_field_html', $user); ?>


                <div class="row border-top py-5 mt-4">
                    <div class="col-md-6"><div class="form-group"><label for="new_pass"><?php _e( "New Password:" , WPDM_TEXT_DOMAIN );?> </label><input  autocomplete="off" placeholder="" type="password" class="form-control" value="" name="password" id="new_pass"> </div></div>
                    <div class="col-md-6"><div class="form-group"><label for="re_new_pass"><?php _e( "Re-type New Password:" , WPDM_TEXT_DOMAIN );?> </label><input autocomplete="off" type="password" value="" class="form-control" name="cpassword" id="re_new_pass"> </div></div>
                <em class="small col-12"><?php _e( "Leave empty if you don't want to change old password" , WPDM_TEXT_DOMAIN );?></em>
    
        <?php do_action("wpdm_edit_profile_form"); ?>
<div class="col-12 text-center mt-5 mb-3">
         <button type="submit" class="btn btn-primary" id="edit_profile_sbtn"><?php _e( "Save Changes" , WPDM_TEXT_DOMAIN );?></button></div>
</div>
</div>
    </form>
    <div id="edit-profile-msg">
    </div>
</div>
<div id="wpdm-fixed-top-center"></div>

</div>
</div>
</div>
</div>
<script>
    jQuery(function ($) {
        $('#edit_profile').on('submit', function (e) {
            e.preventDefault();
            var edit_profile_sbtn = $('#edit_profile_sbtn').html();
            $('#edit_profile_sbtn').html(WPDM.el('i', {'class' : 'fa fa-sun fa-spin'}) + " <?= esc_attr__( 'Please Wait...', WPDM_TEXT_DOMAIN ) ?>").attr('disabled','disabled');
            $(this).ajaxSubmit({
                success: function (res) {
                    WPDM.notify(res.msg, res.type, '#wpdm-fixed-top-center', 10000);
                    $('#edit_profile_sbtn').html(edit_profile_sbtn).removeAttr('disabled');
                }
            });
        });
    });
</script>
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