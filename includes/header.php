<?php defined('IN_CMS') or die('No direct access allowed.');
?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>
		<?php
			$title = page_title("Woops, you're lost.");
			echo trim($title) == "" ? "" : $title . " - ";
			echo site_name();
		?>
	</title>
	<link rel="stylesheet" href="<?php echo theme_url('css/main.css'); ?>">
	<link rel="shortcut icon" href="<?php echo theme_url('favicon.png'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Feed | <?php echo site_name(); ?>" href="<?php echo rss_url(); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/prettify.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo theme_url('js/scripts.js'); ?>"></script>

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo theme_url('css/ie.css'); ?>">
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/selectivizr.js'); ?>"></script>
	<![endif]-->
</head>
<body class="<?php
	echo page_slug();
	echo is_postspage() ? ' multiple' : ' single';
	if (!page_title(false)) echo ' notfound';
?>">
	<div class="body">
	<!--[if lt IE 9]>
		<div class="iemessage">
			You are using an outdated browser. I recommend you upgrade
			to <a href="htt://chrome.google.com">Google Chrome</a>.
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
	<ul class="articles">