<?php defined('IN_CMS') or die('No direct access allowed.');
$home = is_postspage();
$url = isset($url) && !$home ? $url : article_url();
$title = isset($title) && !$home ? $title : article_title();
$time = isset($time) && !$home ? $time : article_time();
$excerpt = isset($excerpt) && !$home ? $excerpt : trim(article_description());
$excerpt = $excerpt == "" ? false : $excerpt;
$content = isset($content) && !$home ? $content : article_html();
$image = isset($image) && !$home ? $image : article_custom_field('img', false);
$tags = array(
	"theme_url" => theme_url()
);
$isArticle = isset($isArticle) && $isArticle;
foreach ($tags as $t=>$r) {
	$content = str_replace("{".$t."}", $r, $content);
}
?>
<li class="<?php
	if (isset($first) && $first) echo "showContent";
	if (!$time) echo " noFooter";
	echo is_single() ? " single" : " multiple"; ?>">
	<header>
		<a href="<?php echo $url; ?>">&nbsp;</a>
		<div class="wrap">
			<h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
			<aside>
				<ul>
					<?php if ($time) : ?>
						<li class="date"><?php echo date("jS M, Y", $time); ?></li>
					<?php endif; ?>
				</ul>
			</aside>
			<div class="clear">&nbsp;</div>
		</div>
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
				<?php echo $excerpt; ?>
				<?php if (!$home) echo $content; else { ?>
					<a href="<?php echo $url; ?>" class="fullpost">Read Full Post</a>
				<?php }} 
		?>
		<div class="clear">&nbsp;</div>
		<?php if ($isArticle): ?>
			<div class="comments">
				Comments are currently disabled. Sorry.
			</div>
			<aside class="sharing">
				<h6>Sharing</h6>
				<ul class="buttons">
					<li class="buffer">
						<a href="http://bufferapp.com/add" class="buffer-add-button" data-text="<?php
						echo $otitle;
						?>" data-count="horizontal" data-via="<?php
						echo twitter_account();
						?>"<?php if ($image): ?>data-picture="<?php echo $image; ?>"<?php endif;
						?>>Buffer</a>
						<script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>
					</li>
					<li class="twitter">
						<a 
						href="https://twitter.com/share" 
						class="twitter-share-button" 
						data-text="<?php echo $otitle; ?>" data-via="NatIsGleek" 
						data-related="NatIsGleek">Tweet</a>
						<script>
						<?php echo file_get_contents(theme_folder('js/twitter.js')); ?>
						</script>
					</li>
					<li class="google">
						<div class="g-plusone" data-size="medium"></div>
						<script type="text/javascript">
						<?php echo file_get_contents(theme_folder('js/google.js')); ?>
						</script>
					</li>
					<li class="facebook">
						<div
						class="fb-like"
						data-send="false"
						data-layout="button_count"
						data-width="200"
						data-show-faces="false"></div>
						<script>
						<?php echo file_get_contents(theme_folder('js/facebook.js')); ?>
						</script>
					</li>
				</ul>
			</aside>
		<?php endif; ?>
	</section>
</li>