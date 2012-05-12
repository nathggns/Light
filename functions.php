<?php defined('IN_CMS') or die('No direct access allowed.');
function is_post() {
	return trim(article_url()) != "";
}
function theme_folder($append = '') {
	return getcwd() . str_replace(base_url(), '/', theme_url()) . $append;
}