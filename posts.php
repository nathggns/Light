<?php defined('IN_CMS') or die('No direct access allowed.');
$first = true;
if (has_posts()) {
	while (posts()) {
		include 'includes/template.php';
		$first = false;
	}
}