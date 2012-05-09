<?php defined('IN_CMS') or die('No direct access allowed.');
include 'includes/markdown.php';
Plugins::add_hook('markdown', 'retrieve_post_not_in_admin', function($post) {
	$post->html = Markdown($post->html);
	return $post;
});