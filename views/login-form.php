<?php

/**
 * This is the template for our login form. It should contain as less logic as possible
 */

?>
<!-- Login Form -->
<div class="ajax-login-register-login-container">
    <?php if ( is_user_logged_in() ) : ?>
        <p><?php printf("%s <a href=%s title='%s'>%s</a>", __('You are already logged in','ajax_login_register'), wp_logout_url( site_url() ), __('Logout','ajax_login_register'), __('Logout','ajax_login_register') );?></p>
    <?php else : ?>
        <form action="javascript://" class="ajax-login-default-form-container login_form <?php print get_option('ajax_login_register_default_style'); ?>" data-alr_login_security="<?php echo wp_create_nonce( 'login_submit' ); ?>">
            <?php if ( get_option('ajax_login_register_facebook') && get_option('users_can_register') ) : ?>
                <div class="fb-login-container">
                    <a href="#" class="fb-login" data-alr_facebook_security="<?php echo wp_create_nonce( 'facebook-nonce' ); ?>"><?php _e( 'Log in using Facebook', 'ajax_login_register' ); ?></a>
                </div>
            <?php endif; ?>
            <div class="form-wrapper">

                <div class="ajax-login-register-status-container">
                    <div class="ajax-login-register-msg-target"></div>
                </div>
                <div class="noon"><label><?php _e('User Name','ajax_login_register'); ?></label><input type="text" autocorrect="none" autocapitalize="none" name="user_login" size="30" placeholder="<?php _e('User Name', 'ajax_login_register'); ?>" required /></div>
                <div class="noon"><label><?php _e('Password','ajax_login_register'); ?></label><input type="password" autocorrect="none" autocapitalize="none" name="password" size="30" placeholder="<?php _e('Password', 'ajax_login_register'); ?>" required /></div>
                <div class="noon"><a href="#" class="not-a-member-handle"><?php echo apply_filters( 'ajax_login_not_a_member_text', __('Are you a member?','ajax_login_register') ); ?></a></div>
                <?php
                $keep_logged_in = get_option('ajax_login_register_keep_me_logged_in');
                if ( $keep_logged_in != "on") : ?>
                    <input type="checkbox" name="rememberme" />
                    <span class="meta"><?php _e('Keep me logged in','ajax_login_register'); ?> | </span>
                <?php endif; ?>
                <span class="meta"><a href="<?php echo wp_lostpassword_url(); ?>" title="<?php _e('Forgot Password','ajax_login_register' ); ?>"><?php _e('Forgot Password','ajax_login_register'); ?></a></span>
                <div class="button-container">
                    <input class="login_button green" type="submit" value="<?php _e('Login','ajax_login_register'); ?>" accesskey="p" name="submit" />
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<!-- End Login Form -->