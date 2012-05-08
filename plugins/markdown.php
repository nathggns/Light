<?php
include Template::path().'inc/markdown.php';
Plugins::add_hook('markdown', 'retrieve_post_not_in_admin', function($post) {
	$post->html = Markdown($post->html);
	return $post;
});