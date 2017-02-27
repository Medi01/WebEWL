<?php

$constructor = Constructor::getInstance();

$active = " class=\"active\"";
$items = [
	"Startseite"	=> "/",
	"Aktuell"		=> "/aktuell",
	"Über uns"		=> "/about",
	"Verein"		=> "/verein",
	"Laden"			=> "/laden",
	"Kontakt"		=> "/kontakt"
];

ob_start();

foreach ($items as $name => $page) {
?> 	<li role="presentation"<?="/" . @$_GET[0] == $page ? $active : null ?>><a href="<?=$page?>"><?=$name?></a></li>
<?php
}
$nav = ob_get_clean(); /*
?>
<!--suppress HtmlUnknownTarget -->
<li role="presentation" class="active"><a href="/">Startseite</a></li>
<li role="presentation"><a href="/aktuell/">Aktuelles</a></li>
<li role="presentation"><a href="/about/">Über uns</a></li>
<li role="presentation"><a href="/verein/">Verein</a></li>
<li role="presentation"><a href="/laden/">Laden</a></li>
<li role="presentation"><a href="/kontakt/">Kontakt</a></li>
<?php */?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, min-width=400, min-device-width=400, initial-scale=1" />
    <meta name="description" content="Pax et Bonum. Eine Welt Laden e.V." />
    <meta name="keywords" content="Eine Welt Laden, Pax et bonum, Bischofswerda, Dresden, Kaffee, Fair Trade" />
    <meta name="author" content="Medienwerkstatt Bishofswerda" />
    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/javascript.js" async></script>
	<link rel="stylesheet" href="/styles/css/bootstrap.css" />
	<link rel="stylesheet" href="/styles/css/stylesheet.css" />
	<title><?=$constructor->title?></title>
<?php

if (!empty($constructor->cssfiles))
	foreach ($constructor->cssfiles as $cssfile) {
		echo "\t<link rel=\"stylesheet\" href=\"/styles/css/" . $cssfile . "\" />\r\n";
	}
if (!empty($constructor->jsfiles))
	foreach ($constructor->jsfiles as $jsfile) {
		echo "\t<script type=\"text/javascript\" src=\"/js/" . $jsfile . "\"></script>\r\n";
	}
	
?>
</head>
<body>
    <div id="wrapper">
		<nav class="container">
			<div class="row">
				<div class="navbar navbar-custom">
					<div class="container-fluid">
						<div class="logo hidden-xs">
							<img src="/img/ewl-header-logo.png"/>
						</div>
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand hidden-sm hidden-md hidden-lg" href="/">
								"Pax et bonum" - Eine Welt Laden e.V.
							</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<div class="nav-straight-open-keeper"></div>
							<span class="hidden-sm hidden-md hidden-lg"><br><em>Navigation</em></span>
							<ul class="nav navbar-nav navbar-left hidden-sm hidden-md hidden-lg">
								<?=$nav?>
							</ul>
							<hr class="hidden-sm hidden-md hidden-lg">
							<span class="hidden-sm hidden-md hidden-lg"><em>Auf dieser Seite</em></span>
							<ul class="nav navbar-nav navbar-right">
								<?php
								$i = 0;
								foreach ($constructor->subs as $name => $link) { ?>

									<li<?=$i==0?$active:null?>><a href="<?=$link?>"><?=$name?></a></li>
									<?php $i++; } ?>
								<!--<li class="active"><a href="#">Mehr</a></li>-->
								<!--
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li>
								-->
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</div>
			</div>
		</nav>
		<main class="container">
			<aside id="sidebar">
				<div id="floater">
					<ul class="nav nav-pills nav-stacked">
<?=$nav?>
					</ul>
				</div>
			</aside>
			<article id="content">
				<?php include "$constructor->modfile"; ?>
				<div style="height: 2000px"></div>
			</article>
		</main>
    </div>
</body>
</html>

<script>
	//$(document).ready(function () { resizeAsideNav(); });
	$(window).load(function () { resizeAsideNav(); });
	$(function () { resizeAsideNav(); })
</script>