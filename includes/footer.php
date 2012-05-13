<?php defined('IN_CMS') or die('No direct access allowed.'); ?>
	</ul>
	<footer class="main">
		<div class="wrap">
			&copy; <?php $date=date("Y");echo $date=="2012"?$date:"2012 - $date"; ?> Nathaniel Higgins.
			Contact me on <a href="<?php echo twitter_url(); ?>">Twitter</a>, or check out some of my latest work on
			<a href="http://forrst.nath.is">Forrst</a> or <a href="http://github.com/nathggns">Github</a>
		</div>
		<a href="http://anchorcms.com">
			<img src="<?php echo theme_url('img/anchor.png'); ?>" alt="Anchor" class="anchor">
		</a>
	</footer>
</div>
<?php if (!is_local()): ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22931342-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>
</body>
</html>