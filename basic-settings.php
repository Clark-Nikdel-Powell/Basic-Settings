<?php
/*
Plugin Name: Basic Settings
Plugin URI: http://clarknikdelpowell.com/wordpress
Description: Sets all the basic settings for me. Thanks <a href="http://toscho.de/">Thomas Scholz</a>!
Author: Taylor Gorman
Author URI: http://clarknikdelpowell.com
*/
 
function set_settings()
{
    $o = array(
		// General
		'blogdescription'				=> '',
		'admin_email'					=> 'wordpress@clarknikdelpowell.com',
        'timezone_string'				=> 'America/New_York',
        'date_format'					=> 'l, F j, Y',
		//'time_format'					=> 'l, F j, Y g:i a',
		'start_of_week'					=> '0',
		
		// Writing
        'default_post_edit_rows'		=> 20,
        'use_smilies'					=> 0,
		
		// Discussion
        'comments_per_page'				=> 50,
        'comment_max_links'				=> 2,
		
		// Permalinks
        'permalink_structure'			=> '/%category%/%postname%/',
        'category_base'					=> '',
		
		// Miscellaneous
		'uploads_use_yearmonth_folders'	=> '0'
    );
 
    foreach ( $o as $k => $v ) { update_option($k, $v); }
 
    // Delete dummy post and comment.
    wp_delete_post(1, TRUE);
    wp_delete_post(2, TRUE);
    wp_delete_comment(1);
 	
    // Update admin user.
	wp_update_user (array(
		'ID'           => 1,
		'user_email'   => 'wordpress@clarknikdelpowell.com',
		'user_url'     => 'http://clarknikdelpowell.com',
		'display_name' => 'CNP'
	));
	update_usermeta(1, 'nickname', 'CNP');
	
    return;
}
register_activation_hook(__FILE__, 'set_settings');
?>