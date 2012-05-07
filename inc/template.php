<?php
require(Autoloader::find('markdown'));
$home = is_postspage();
$url = isset($url) && !$home ? $url : article_url();
$title = isset($title) && !$home ? $title : article_title();
$time = isset($time) && !$home ? $time : article_time();
$excerpt = isset($excerpt) && !$home ? $excerpt : trim(article_description());
$excerpt = $excerpt == "" ? false : $excerpt;
$content = isset($content) && !$home ? $content : article_html();
$parser = new MarkdownExtra_Parser;
$content = $parser->transform($content);
$image = isset($image) && !$home ? $image : article_custom_field('img', false);
$tags = array(
	"theme_url" => theme_url()
);
$isArticle = isset($isArticle) && $isArticle;
foreach ($tags as $t=>$r) {
	$content = str_replace("{".$t."}", $r, $content);
}
?>
<li tabindex="-1">
	<header>
		<h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
		<footer>
			<ul>
				<?php if ($time) : ?>
					<li class="date"><?php echo date("jS M, Y", $time); ?></li>
				<?php endif; ?>
				<?php if ($home): ?>
					<li class="more"><a href="<?php echo $url; ?>">Read</a></li>
				<?php endif; ?>
			</ul>
		</footer>
	</header>
	<section class="content">
		<?php
			if ($image && !$home): ?>
				<div class="poster">
					<a href="<?php echo $image; ?>">
						<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
					</a>
				</div>
			<?php
			endif;
			if (!$excerpt) echo $content;
			else { ?>
				<p class="excerpt"><?php echo $excerpt; ?></p>
				<?php if (!$home) echo $content; }
		?>
		<div class="clear">&nbsp;</div>
		<?php if ($isArticle): ?>
			<div class="comments">
				Comments are currently disabled. Sorry.
			</div>
		<?php endif; ?>
	</section>
</li>