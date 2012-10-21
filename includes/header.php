<?php defined('IN_CMS') or die('No direct access allowed.');
is_local();
$otitle = title();
$title = trim($otitle) == "" ? "" : $otitle . " - ";
$title .= site_name();
?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php if (is_post()): ?>
		<link rel="author" href="https://plus.google.com/107924709939978010057/posts">
	<?php endif; ?>
	<link rel="publisher" href="https://plus.google.com/107924709939978010057">
	<?php if (is_post()): ?><meta name="buffer-text" content="<?php echo $otitle; ?>"><?php endif; ?>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo theme_url('css/main.css'); ?>" type="text/css">
	<link rel="shortcut icon" href="<?php echo theme_url('favicon.png'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Feed | <?php echo site_name(); ?>" href="<?php echo rss_url(); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/lib.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/scripts.js'); ?>"></script>

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo theme_url('css/ie.css'); ?>" type="text/css">
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/selectivizr.js'); ?>"></script>
	<![endif]-->
</head>
<body class="<?php
	echo page_slug();
	echo is_single() ? ' single' : ' multiple';
	if (!page_title(false)) echo ' notfound';
	echo is_post() ? " post" : "";
?>">
	<div class="body">
	<!--[if lt IE 9]>
		<div class="iemessage">
			You are using an outdated browser. I recommend you upgrade
			to <a href="http://chrome.google.com">Google Chrome</a>.
		</div>
	<![endif]-->
	<nav>
		<ul>
			<?php
				while (menu_items()) {
					$classes = "";
					$name = menu_name();
					$href = menu_url();
					if (menu_active()) $classes .= " active";
					if ($name == "Posts") {
						$classes .= " home";
						$name = "N";
					}
					$classes = trim($classes);
					?>
					<li class="<?php echo $classes; ?>"><a href="<?php echo $href; ?>"><?php echo $name; ?></a></li>
				<?php }
				$extraMenus = array(
					"rss" => "RSS"
				);
				foreach ($extraMenus as $href=>$name): ?>
					<li><a href="<?php echo base_url().$href; ?>"><?php echo $name; ?></a></li>
				<?php endforeach;
			?>

		</ul>
	</nav>
	<?php if (is_post()): ?><div id="fb-root"></div><?php endif; ?>
	<ul class="articles">