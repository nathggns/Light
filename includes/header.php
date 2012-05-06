<!DOCTYPE HTML>
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
</head>
<body class="<?php echo page_slug(); ?>"><div class="body">
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