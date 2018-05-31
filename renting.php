<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Startseite - Ikusaki</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script src="https://cdn.jsdelivr.net/npm/js-cookie/src/js.cookie.min.js"></script>
	    <script>
			window.Cookies || document.write('<script src="js/js.cookie.min.js"><\/script>')
		</script>		
		<script src="js/visitorcount.js" type="text/javascript"></script>
		<script src="js/dropdown.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<img id="banner" src="img/logo.png" alt="Ikusaki Polytechnic Group" />
		</header>
		<nav>
			<div id="cookie-notice" class="hidden row">
				<p>Blaah blah, cookies are used for: visitor counting <a href="">learn more</a></p>
				<div class="link"><a id="accept-cn" href="#">accept</a></div>
				<div class="link"><a id="reject-cn" href="#">reject</a></div>
			</div>
			<div class="row">
				<div class="link selected"><a href="index.html">Startseite</a></div>
				<div class="link"><a href="activity.html">Tätigkeitsfelder</a></div>
				<div class="link"><a href="about.html">Über Uns</a></div>
				<div class="link"><a href="career.html">Job & Karriere</a></div>
				<div class="link"><a href="responsibility.html">Verantwortung</a></div>
			</div>
		</nav>

		<main>
			<section>
			
				<div class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Dropdown</button>
					<div id="myDropdown" class="dropdown-content">
					
						<?php

							$method = $_SERVER["REQUEST_METHOD"];

							$mysqli = new mysqli("localhost", "root", "", "ikusaki");

							
	
									if ($method === "GET" || $method === "POST") {
									print("<a href=\"#\">DEBUG</a>");
									}
							
						?>
						<!--
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>-->
					</div>
				</div>
						
			</section>
		</main>

		<footer>
			<div class="row">
				<div id="counter"><p><span>0</span> unique visitors</p></div>
			</div>
			<div class="row">
				<div id="copyright"><p>&copy; Ikusaki Polytechnic Group</p></div>
				<div class="link"><a href="#">AGB</a></div>
				<div class="link"><a href="#">Nutzungsbedingungen</a></div>
				<div class="link"><a href="#">Cookies</a></div>
				<div class="link"><a href="#">Datenschutz</a></div>
				<div class="link"><a href="#">Presse</a></div>
				<div class="link"><a href="#">Kontakt</a></div>
				<div class="link"><a href="impressum.html">Impressum</a></div>
			</div>
		</footer>
	</body>
</html>
