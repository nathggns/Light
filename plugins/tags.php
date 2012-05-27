<?php defined('IN_CMS') or die('No direct access allowed.');
// Plugins::add_hook('tags', 'retrieve_post_not_in_admi', function($post) {
// 	$tags = array(
// 		"theme_url" => theme_url()
// 	);
// 	foreach ($tags as $s=>$r) {
// 		$s = "{" . $s . "}";
// 		if ($post->description) $post->description = str_replace($s, $r, $post->description);
// 		$post->html = str_replace($s, $r, $post->html);
// 	};
// 	return $post;
// });