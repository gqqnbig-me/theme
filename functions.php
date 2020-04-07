<?php
add_action('init', 'use_jquery_from_cdn');

function use_jquery_from_cdn () {
	if (is_admin()) {
		return;
	}

	global $wp_scripts;
	if (isset($wp_scripts->registered['jquery']->ver)) {
		$ver = $wp_scripts->registered['jquery']->ver;
                $ver = str_replace("-wp", "", $ver);
	} else {
		$ver = '1.12.4';
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', "//code.jquery.com/jquery-$ver.min.js", false, $ver);
}
?>
