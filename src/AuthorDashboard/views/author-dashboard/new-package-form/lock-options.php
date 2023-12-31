<div id="lock-options"  class="tab-pane">
    <?php echo __( "You can use one or more of following methods to lock your package download:" , "download-manager" ); ?>
    <br/>
    <br/>
    <div class="accordion wpdm-accordion w3eden">
        <!-- Terms Lock -->
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" class="wpdmlock" rel='terms' name="file[terms_lock]" <?php if(get_post_meta($post->ID,'__wpdm_terms_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Must Agree with Terms" , "download-manager" ); ?></label></div>
            <div  id="terms" class="fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_terms_lock', true)!='1') echo "style='display:none'"; ?> >

                <label for="pps_z"><?php echo __( "Terms Title:" , "download-manager" ); ?></label>
                <input type="text" class="form-control" name="file[terms_title]" value="<?php echo esc_html(get_post_meta($post->ID,'__wpdm_terms_title', true)); ?>" />
                <label for="pps_z"><?php echo __( "Terms and Conditions:" , "download-manager" ); ?></label>
                <textarea class="form-control" type="text" name="file[terms_conditions]" id="tc_z"><?php echo esc_html(get_post_meta($post->ID,'__wpdm_terms_conditions', true)); ?></textarea>
                <label for="pps_z"><?php echo __( "Terms Checkbox Label:" , "download-manager" ); ?></label>
                <input type="text" class="form-control" name="file[terms_check_label]" value="<?php echo esc_html(get_post_meta($post->ID,'__wpdm_terms_check_label', true)); ?>" />


            </div>
        </div>

        <div class="card card-default">
        <div class="card-header"><label><input type="checkbox" class="wpdmlock" rel='password' name="file[password_lock]" <?php if(get_post_meta($post->ID,'__wpdm_password_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Enable Password Lock" , "download-manager" ); ?></label></div>
        <div  id="password" class="fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_password_lock', true)!='1') echo "style='display:none'"; ?> >
            <table class="table table-striped">
                <tr id="password_row">
                    <td><?php echo __( "Password:" , "download-manager" ); ?> <i class="info fa fa-info" title="You can use single or multiple password<br/>for a package. If you are using multiple password then<br/>separate each password by []. example [password1][password2]"></i>
                    </td>
                    <td><div class="input-group"><input class="form-control" type="text" name="file[password]" id="pps_z" value="<?php echo get_post_meta($post->ID,'__wpdm_password', true); ?>" />
                        <span class="input-group-btn">
                        <button class="btn btn-secondary"  onclick="return generatepass('pps_z')" type="button"><i class="fa fa-ellipsis-h"></i></button>
                      </span></div>


                    </td>
                </tr>
                <tr id="password_usage_row">
                    <td><?php echo __( "PW Usage Limit:" , "download-manager" ); ?></td>
                    <td><input size="10" style="width: 80px;display: inline" class="form-control input-sm" type="text" name="file[password_usage_limit]" value="<?php echo get_post_meta($post->ID,'__wpdm_password_usage_limit', true); ?>" /> / <?php echo __( "password" , "download-manager" ); ?> <i class="info fa fa-info" title="<?php echo __( "Password will expire after it exceed this usage limit" , "download-manager" ); ?>"></i></td>
                </tr>
                <tr id="password_usage_row">
                    <td colspan="2"><label><input type="checkbox" name="file[password_usage]" value="0" /> <?php echo __( "Reset Password Usage Count" , "download-manager" ); ?></label></td>
                     </td>
                </tr>
            </table>
        </div>
        </div>
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="linkedin" class="wpdmlock" name="file[linkedin_lock]" <?php if(get_post_meta($post->ID,'__wpdm_linkedin_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "LinkedIn Share Lock" , "download-manager" ); ?></label></div>
        <div id="linkedin" class="frm fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_linkedin_lock', true)!='1') echo "style='display:none'"; ?> >
            <table class="table table-stripped">
                <tr>
                    <td>
                        </br><textarea class="form-control" name="file[linkedin_message]"><?php echo get_post_meta($post->ID,'__wpdm_linkedin_message', true) ?></textarea>
                    </td>
                </tr>
                <tr><td>
                        <?php _e( "URL to share (keep empty for current page url):" , "download-manager" ); ?>
                        <br/><input class="form-control input-sm" type="text" name="file[linkedin_url]" value="<?php echo get_post_meta($post->ID,'__wpdm_linkedin_url', true) ?>" />
                    </td>
                </tr>
            </table>
        </div>
            </div>

        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="tweeter" class="wpdmlock" name="file[tweet_lock]" <?php if(get_post_meta($post->ID,'__wpdm_tweet_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Tweet Lock" , "download-manager" ); ?></label></div>
        <div id="tweeter" class="frm fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_tweet_lock', true)!='1') echo "style='display:none'"; ?> >
            <table width="100%"  cellpadding="0" cellspacing="0" >
                <tr>
                    <td><?php echo __( "Custom tweet message:" , "download-manager" ); ?>
                       <br/><textarea class="form-control" type="text" name="file[tweet_message]"><?php echo get_post_meta($post->ID,'__wpdm_tweet_message', true) ?></textarea></td>
                </tr>
            </table>
        </div>
        </div>
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="gplusone" class="wpdmlock" name="file[gplusone_lock]" <?php if(get_post_meta($post->ID,'__wpdm_gplusone_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Enable Google +1 Lock" , "download-manager" ); ?></label></div>
        <div id="gplusone" class="frm fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_gplusone_lock', true)!='1') echo "style='display:none'"; ?> >
            <table width="100%"  cellpadding="0" cellspacing="0" >
                <tr>
                    <td width="90px"><?php echo __( "URL for +1:" , "download-manager" ); ?></td>
                    <td><input size="10" class="form-control input-sm" style="width: 200px;display: inline;" type="text" name="file[google_plus_1]" value="<?php echo get_post_meta($post->ID,'__wpdm_google_plus_1', true) ?>" /></td>
                </tr>
            </table>
        </div>
        </div>
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="gplusshare" class="wpdmlock" name="file[twitterfollow_lock]" <?php if(get_post_meta($post->ID,'__wpdm_twitterfollow_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Enable Twitter Follow Lock" , "download-manager" ); ?></label></div>
            <div id="gplusshare" class="frm fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_twitterfollow_lock', true)!='1') echo "style='display:none'"; ?> >
                <table width="100%"  cellpadding="0" cellspacing="0" >
                    <tr>
                        <td width="90px"><?php echo __( "Twiiter Handle:" , "download-manager" ); ?></td>
                        <td><input size="10" class="form-control input-sm" style="width: 200px;display: inline;" type="text" name="file[twitter_handle]" value="<?php echo get_post_meta($post->ID,'__wpdm_twitter_handle', true) ?>" /></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="facebooklike" class="wpdmlock" name="file[facebooklike_lock]" <?php if(get_post_meta($post->ID,'__wpdm_facebooklike_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Enable Facebook Like Lock" , "download-manager" ); ?></label></div>
        <div id="facebooklike" class="frm fwpdmlock card-body" <?php if(get_post_meta($post->ID,'__wpdm_facebooklike_lock', true)!=1) echo "style='display:none;'"; ?> >
            <table  width="100%" cellpadding="0" cellspacing="0">
                <?php if(get_option('_wpdm_facebook_app_id')=='') echo "<tr><td colspan=2>You have to add a Facebook appID <a href='admin.php?page=file-manager/settings#fbappid'>here</a></td></tr>"; ?>
                <tr>
                    <td width="90px"><?php echo __( "URL to Like:" , "download-manager" ); ?></td>
                    <td><input size="10" style="width: 200px;display: inline;"  class="form-control input-sm" type="text" name="file[facebook_like]" value="<?php echo get_post_meta($post->ID,'__wpdm_facebook_like', true) ?>" /></td>
                </tr>
            </table>
        </div>
        </div>
        <div class="card card-default">
            <div class="card-header"><label><input type="checkbox" rel="email" class="wpdmlock" name="file[email_lock]" <?php if(get_post_meta($post->ID,'__wpdm_email_lock', true)=='1') echo "checked=checked"; ?> value="1"><?php echo __( "Enable Email Lock" , "download-manager" ); ?></label></div>
        <div id="email" class="frm fwpdmlock card-body"  <?php if(get_post_meta($post->ID,'__wpdm_email_lock', true)!='1') echo "style='display:none'"; ?> >
            <?php if(isset($post->ID)) do_action('wpdm_custom_form_field',$post->ID); ?>
            <div class="mt-1 mb-1">
                <?php echo __( "Will ask for email (and checked custom data) before download" , "download-manager" ); ?>
            </div>
        </div>
        </div>
        <?php do_action('wpdm_download_lock_option',$post); ?>
    </div>
    <div class="clear"></div>
</div>


<!-- Generate password modal  -->
<div class="modal" tabindex="-1" id="generatepass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title"><i class="fa fa-key"></i> <?php echo __( "Generate Password", "download-manager" ) ?></h5>

            </div>
            <div class="modal-body-np">
                <div class="pfs panel panel-default card card-default" style="border-radius:0;box-shadow: none;border: 0 !important;">
                    <div class="panel-heading card-header" style="border-top: 1px solid #ddd !important;border-radius:0;"><b><?php _e( "Password Lenght & Count" , "download-manager" ); ?></b></div>
                    <div class="panel-body card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <b><?php _e( "Number of passwords:" , "download-manager" ); ?></b><Br/>
                                <input class="form-control" type="number" id='pcnt' value="">

                            </div>
                            <div  class="col-md-6">

                                <b><?php _e( "Password length:" , "download-manager" ); ?></b><Br/>
                                <input  class="form-control" type="number" id='ncp' value="">

                            </div>
                        </div>
                    </div>
                    <div class="panel-heading card-header" style="border-radius:0;border-top: 1px solid #ddd"><b><?php _e( "Password Strength" , "download-manager" ); ?></b></div>
                    <div class="panel-body card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <input style="padding:0;" type="range" min="1" max="4" value="2" class="form-control" id="passtrn">
                                <div class="row">
                                    <div class="col-md-6" style="color: var(--color-danger);"><?php echo __( "Weak", "download-manager" ) ?></div>
                                    <div class="col-md-6 text-right" style="color: var(--color-success);"><?php echo __( "Strong", "download-manager" ) ?></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <input type="button" id="gpsc" class="btn btn-secondary btn-lg btn-block" value="Generate" />
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading card-header" style="border-radius:0;border-top: 1px solid #dddddd"><b><?php _e( "Generated Passwords" , "download-manager" ); ?></b></div>
                    <div class="panel-body card-body">
                        <textarea id="__ps" style="min-height: 200px" class="form-control"></textarea>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <input type="button" id="pins" class="btn btn-primary btn-lg btn-block" value="<?php _e( "Insert Password(s)" , "download-manager" ); ?>" />
            </div>
        </div>
    </div>
</div>
<style>
    #generatepass {
        background: rgba(0,0,0,0.4);
    }
    #generatepass .modal-dialog{
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
    }
</style>
