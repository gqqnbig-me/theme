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

add_action( 'comment_form_before', 'hide_comment_form_before' );

function hide_comment_form_before() {
	echo '<div>鉴于大量垃圾留言，留言表单已经被关闭。请发邮件到<span id="comment-email1" tabindex="0">antitrust</span>@<span id="comment-email2" tabindex="0">ftc.gov</span>发表评论。</div>';
	echo '<script>';
	echo 'jQuery("#comment-email1").one("mouseover focus", function(){this.innerText="gqqnb2005"});';
	echo 'jQuery("#comment-email2").one("mouseover focus", function(){this.innerText="gmail.com"});';
	echo '</script>';
	echo '<div style="width: 1px; height: 1px; overflow: hidden;">';
}

add_action( 'comment_form_after', 'hide_comment_form_after' );

function hide_comment_form_after() {
    echo '</div>';
}
?>
