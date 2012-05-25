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
		<a href="http://nath.is">
			<img src="<?php echo theme_url('img/mark.png'); ?>" alt="" class="mark">
		</a>
	</footer>
</div>
<?php if (!is_local()): ?>
<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-22931342-2']);
	_gaq.push(['_trackPageview']);

	(function() {
		if (!cPrompt.allowCookies()) return false;
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>
<script type="text/javascript">
		var GoSquared={};
		GoSquared.acct = "GSN-775395-P";
		(function(w){
			if (!cPrompt.allowCookies()) return false;
			function gs(){
					w._gstc_lt=+(new Date); var d=document;
					var g = d.createElement("script"); g.type = "text/javascript"; g.async = true; g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
					var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(g, s);
			}
			w.addEventListener?w.addEventListener("load",gs,false):w.attachEvent("onload",gs);
		})(window);
</script>
					
<?php endif; ?>
</body>
</html>