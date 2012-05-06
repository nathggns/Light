<?php
if (has_posts()) {
	while (posts()) {
		include 'inc/template.php';
	}
}