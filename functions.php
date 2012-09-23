<?php defined('IN_CMS') or die('No direct access allowed.');
function is_post() {
	return trim(article_url()) != "";
}
function theme_folder($append = '') {
	return getcwd() . str_replace(base_url(), '/', theme_url()) . $append;
}
function is_local() {
	return $_SERVER['REMOTE_ADDR'] === "127.0.0.1" ||
		$_SERVER['REMOTE_ADDR'] === "81.101.46.47" ||
		strpos($_SERVER['REMOTE_ADDR'], '172') !== false;
}
function is_single() {
	return !is_postspage();
}
function url() {
	return "/" . str_replace(base_url(), "", current_url());
}
function title() {
	return page_title("Woops, you're lost.");
}
function protocol() {
	$protocol = explode('/', $_SERVER['SERVER_PROTOCOL']);
	return strtolower($protocol[0]);
}
function full_url() {
	return protocol() . "://" . $_SERVER['HTTP_HOST'] . current_url();
}
function allow_actions() { // Allow commenting and/or liking
	if (strpos($_SERVER['REMOTE_ADDR'], "82.203.3") !== false) return false;
	return true;
}

if (url() === "/posts") {
	header("Location: " . base_url());
	die();
}

if ($template === 404 && !isset($_GET['redir'])) {
	$result = preg_match_all("%/post/([0-9]*)/(.*)/?%i", url(), $matches);
	if ($result !== 0) {
		header("Location: " . base_url() . "post/" . $matches[2][0] . "?redir=true", 301);
		die();
	}
}