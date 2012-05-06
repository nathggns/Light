<?php date_default_timezone_set("Europe/London"); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Nathaniel Higgins</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<nav>
		<ul>
			<li class="home"><a href="#">N</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">RSS</a></li>
		</ul>
	</nav>
	<ul class="articles">
		<li>
			<header>
				<h2><a href="#">CSS3 Noise</a></h2>
				<!--<div class="date">
					4th Jan, 2012
				</div>-->
				<footer>
					<ul>
						<li class="date">4th Jan, 2012</li>
						<li class="more"><a href="#">Read</a></li>	
					</ul>
				</footer>
			</header>
			<section class="content">
				<!--<p>Lorem ipsum dolor sit amet, <code>consectetur</code> adipisicing elit, sed do eiusmod
				tempor incididunt ut <strong>labore</strong> et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure <em>dolor</em> in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<blockquote>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</blockquote>

				<pre><code>(function(a, b) {
	alert("Hello");
})()</code></pre>-->
			<p>
				So it has finally been done, noise in (almost) pure css. I say almost because of the way it works.
			</p>
			</section>
		</li>
		<li>
			<header>
				<h2><a href="#">CSS3 Textures</a></h2>
				<footer>
					<ul>
						<li class="date">2nd Jan, 2012</li>
						<li class="more"><a href="#">Read</a></li>	
					</ul>
				</footer>
			</header>
			<section class="content">
				<p>
					Today, I’m here to address the age old problem of detecting if caps
					lock is on inside a text field, more specifically, a password field.
				</p>
			</section>
		</li>
	</ul>
	<footer class="main">
		<div class="wrap">
			&copy; <?php $date=date("Y");echo $date=="2012"?$date:"2012 - $date"; ?> Nathaniel Higgins.
			Contact me on <a href="#">Twitter</a>, or check out some of my latest work on
			<a href="http://forrst.nath.is">Forrst</a> or <a href="http://github.com/nathggns">Github</a>
		</div>
	</footer>
</body>
</html>