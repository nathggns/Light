<?php defined('IN_CMS') or die('No direct access allowed.');
function is_post() {
	return trim(article_url()) != "";
}
function theme_folder($append = '') {
	return getcwd() . str_replace(base_url(), '/', theme_url()) . $append;
}
function is_local() {
	return $_SERVER['REMOTE_ADDR'] === "127.0.0.1" || $_SERVER['REMOTE_ADDR'] === "81.101.46.47";
}
function is_single() {
	return !is_postspage();
}