<?php defined('IN_CMS') or die('No direct access allowed.');
$isArticle = true;
$comments = array(
	array(
		"published" => 0,
		"name" => "Nathaniel Higgins",
		"email" => "nat@nath.is",
		"comment" => "This is so epic!!!1!",
		"replies" => array(
			array(
				"published" => 0,
				"name" => "Bob Jones",
				"email" => "nat@nath.is",
				"comment" => "die."
			)
		)
	)
);
include 'includes/template.php';