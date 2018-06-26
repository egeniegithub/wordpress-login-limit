<?php
/**
 * Plugin Name: Egenie Login Limit
 * Description: This Plugin add functionliaty for user to logout from another devices.
 * Plugin URI: http://testing.egenienext.com/project/wp-plugins/login-limit
 * Author: Egenie
 * Author URI: http://egenienext.com
 * Version: 1.0.0
 * License: GPL2
 */

function egenie_authenticate_user_login() {
	$user = get_current_user_id();
	if ( $user ) {
		$sessions = WP_Session_Tokens::get_instance( $user );
		$sessions->destroy_others( wp_get_session_token() );
    }
}

add_action( 'init', 'egenie_authenticate_user_login', 10, 3 );