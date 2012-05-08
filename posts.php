<?php defined('IN_CMS') or die('No direct access allowed.');
if (has_posts()) {
	while (posts()) {
		include 'inc/template.php';
	}
}