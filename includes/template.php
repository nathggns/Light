<?php defined('IN_CMS') or die('No direct access allowed.');
$home = is_postspage();
$url = isset($url) && !$home ? $url : article_url();
$title = isset($title) && !$home ? $title : article_title();
$time = isset($time) && !$home ? $time : article_time();
$excerpt = isset($excerpt) && !$home ? $excerpt : trim(article_description());
$excerpt = $excerpt == "" ? false : $excerpt;
$content = isset($content) && !$home ? $content : article_html();
$image = isset($image) && !$home ? $image : article_custom_field('img', false);
$isArticle = isset($isArticle) && $isArticle;
$uurl = urlencode(full_url());
$utitle = urlencode($title);
$tags = array(
	"theme_url" => theme_url()
);
foreach ($tags as $s => $r) {
	$content = str_replace("{".$s."}", $r, $content);
}
?>
<li class="<?php
	if (isset($first) && $first) echo "showContent";
	if (!$time) echo " noFooter";
	echo is_single() ? " single" : " multiple"; ?>">
	<header tabindex="-1">
		<!--<a href="<?php echo $url; ?>">&nbsp;</a>-->
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
	<section class="content" tabindex="-1">
		<?php
			if ($image && !$home): ?>
				<div class="poster">
					<a href="<?php echo $image; ?>">
						<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
					</a>
					<div class="overlay"></div>
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
			<footer>
				<aside class="sharing">
					<h6>Sharing</h6>
					<ul class="buttons">
						<li class="buffer">
							<a href="http://bufferapp.com/add" class="buffer-add-button" data-text="<?php
							echo title();
							?>" data-count="none" data-via="<?php
							echo twitter_account();
							?>"<?php if ($image): ?>data-picture="<?php echo $image; ?>"<?php endif;
							?>>Buffer</a>
							<script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>
						</li>
						<li>
							<a class="twitter" href="https://twitter.com/share?text=<?php
								echo $utitle;
							?>&via=<?php
								echo urlencode(twitter_account());
							?>">Tweet</a>
						</li>
						<li>
							<a href="http://facebook.com/sharer.php?t=<?php
								echo $utitle;
							?>&u=<?php
								echo $uurl;
							?>" class="facebook">Share</a>
						</li>
					</ul>
				</aside>
				<?php /*if (allow_actions()): ?><?php/*<div class="livefyre-comments">
				<!--START: Livefyre Embed-->
				<script type='text/javascript' src='http://zor.livefyre.com/wjs/v1.0/javascripts/livefyre_init.js'></script>
				<script type='text/javascript'>
					var fyre = LF({
						site_id: 304102
					});
				</script>
				<!--END: Livefyre Embed-->
				</div><?php endif;*/ ?>
				<?php if (allow_actions()): ?>
					<div id="disqus_thread"></div>
					<script type="text/javascript">
					<?=file_get_contents(theme_folder("js/disqus.js"));?>
					</script>
					<noscript>
						<div class="greyIsland">
							Please enable JavaScript to view comments.
						</div>
					</noscript>
				<?php endif; ?>
			</footer>
		<?php endif; ?>
	</section>
</li>