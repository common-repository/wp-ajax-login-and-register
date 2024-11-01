<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://ptheme.com/
 * @since      1.0.0
 *
 * @package    Wp_Ajax_Login
 * @subpackage Wp_Ajax_Login/public/partials
 */

#   This file should primarily consist of HTML with a little bit of PHP.
# 	
# 	USER REGISTRATION/LOGIN MODAL
# 	========================================================================================
#   Attach this function to the footer if the user isn't logged in
# 	========================================================================================
# 		

function pt_login_register_modal() { ?>

	<div class="modal fade pt-user-modal" id="pt-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" data-active-tab="">
			<div class="modal-content">
			<?php 
				if( ! is_user_logged_in() ){ // only show the registration/login form to non-logged-in members ?>	
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

						<!-- Register form -->
						<div class="pt-register">
							 
							<h3><?php printf( __('Join %s', 'wp-ajax-login'), get_bloginfo('name') ); ?></h3>
							<hr>

							<?php if( get_option('users_can_register') ){ ?>

									<form id="pt_registration_form" action="<?php echo home_url( '/' ); ?>" method="POST">

										<div class="form-field">
											<span class="screen-reader-text"><?php _e('Username', 'wp-ajax-login'); ?></span>
											<input class="form-control input-lg required" name="pt_user_login" type="text" placeholder="<?php _e('Username', 'wp-ajax-login'); ?>" />
										</div>
										<div class="form-field">
											<span class="screen-reader-text"><?php _e('Email', 'wp-ajax-login'); ?></span>
											<input class="form-control input-lg required" name="pt_user_email" id="pt_user_email" type="email" placeholder="<?php _e('Email', 'wp-ajax-login'); ?>" />
										</div>

										<div class="form-field">
											<input type="hidden" name="action" value="pt_register_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'wp-ajax-login') ?>" type="submit"><?php _e('Sign up', 'wp-ajax-login'); ?></button>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
									</form>
									<div class="pt-errors"></div>

							<?php } else {

								echo '<div class="alert alert-warning">'.__('Registration is disabled.', 'wp-ajax-login').'</div>';

							} ?>

							</div>

								<!-- Login form -->
								<div class="pt-login">
							 
									<h3><?php printf( __('Login to %s', 'wp-ajax-login'), get_bloginfo('name') ); ?></h3>
									<hr>
							 
									<form id="pt_login_form" action="<?php echo home_url( '/' ); ?>" method="post">

										<div class="form-field">
											<span class="screen-reader-text"><?php _e('Username', 'wp-ajax-login') ?></span>
											<input class="form-control input-lg required" name="pt_user_login" type="text" placeholder="<?php _e('Username', 'wp-ajax-login') ?>" />
										</div>
										<div class="form-field">
											<span class="screen-reader-text"><?php _e('Password', 'wp-ajax-login')?></span>
											<input class="form-control input-lg required" name="pt_user_pass" id="pt_user_pass" type="password"/ placeholder="<?php _e('Password', 'wp-ajax-login')?>">
										</div>
										<div class="form-field">
											<input type="hidden" name="action" value="pt_login_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'wp-ajax-login') ?>" type="submit"><?php _e('Login', 'wp-ajax-login'); ?></button> <a class="alignright" href="#pt-reset-password"><?php _e('Lost Password?', 'wp-ajax-login') ?></a>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
									</form>
									<div class="pt-errors"></div>
								</div>

								<!-- Lost Password form -->
								<div class="pt-reset-password">
							 
									<h3><?php _e('Reset Password', 'wp-ajax-login'); ?></h3>
                                    <p><?php _e( 'Enter the username or e-mail you used in your profile. A password reset link will be sent to you by email.', 'wp-ajax-login'); ?></p>
									<hr>
							 
									<form id="pt_reset_password_form" action="<?php echo home_url( '/' ); ?>" method="post">
										<div class="form-field">
											<span class="screen-reader-text"><?php _e('Username or E-mail', 'wp-ajax-login') ?></span>
											<input class="form-control input-lg required" name="pt_user_or_email" id="pt_user_or_email" type="text" placeholder="<?php _e('Username or E-mail', 'wp-ajax-login') ?>" />
										</div>
										<div class="form-field">
											<input type="hidden" name="action" value="pt_reset_password"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'wp-ajax-login') ?>" type="submit"><?php _e('Get new password', 'wp-ajax-login'); ?></button>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'password-security' ); ?>
									</form>
									<div class="pt-errors"></div>
								</div>

								<div class="pt-loading">
									<p><i class="fa fa-refresh fa-spin"></i><br><?php _e('Loading...', 'wp-ajax-login') ?></p>
								</div>
					</div>
					<div class="modal-footer">
							<span class="pt-register-footer"><?php _e('Don\'t have an account?', 'wp-ajax-login'); ?> <a href="#pt-register"><?php _e('Sign Up', 'wp-ajax-login'); ?></a></span>
							<span class="pt-login-footer"><?php _e('Already have an account?', 'wp-ajax-login'); ?> <a href="#pt-login"><?php _e('Login', 'wp-ajax-login'); ?></a></span>
					</div>
				<?php } else { ?>
					<div class="modal-body">
						<div class="pt-logout">							
							<div class="alert alert-info"><?php $current_user = wp_get_current_user(); printf( __( 'You have already logged in as %1$s. <a href="#logout">Logout?</a>', 'wp-ajax-login' ), $current_user->user_login );?></div>
							<div class="pt-errors"></div>
						</div>
					</div>
				<?php } ?>		
				</div>
			</div>
		</div>
<?php }
add_action('wp_footer', 'pt_login_register_modal');

/**
 * Automatically add a Login link to Primary Menu
 * User filter 'login_menu_location' to change the menu location on your need. 
 * Below example will add the login/register link to 'footer' menu location
 * add_filter('login_menu_location', function(){return 'footer';});
 */
add_filter( 'wp_nav_menu_items', 'pt_login_link_to_menu', 10, 2 );
function pt_login_link_to_menu ( $items, $args ) {
    if( $args->theme_location == apply_filters('login_menu_location', 'primary') ) {

    	if ( ! is_user_logged_in() ) {
    		$text = __( 'Login/Register', 'wp-ajax-login' );
    	} else {
    		$text = __( 'Logout?', 'wp-ajax-login' );
    	}
        	$items .= '<li class="menu-item login-link"><a href="#pt-login">'.$text.'</a></li>';

    }
    return $items;
}

/**
 * Register the shortcode [wp-ajax-login].
 * One attribue is accept: text. Default is 'Login/Register' which indicates the link text
 *
 * @since    1.0.0
 */
function pt_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'text' => 'Login/Register',
	), $atts, 'wp-ajax-login' );

	return "<a href='#pt-login'>{$atts['text']}</a>";
}
add_shortcode( 'wp-ajax-login', 'pt_shortcode' );