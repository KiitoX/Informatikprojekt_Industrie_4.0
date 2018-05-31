<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Startseite - Ikusaki</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/calendar.css" />

		<script src="https://cdn.jsdelivr.net/npm/js-cookie/src/js.cookie.min.js"></script>
	    <script>
			window.Cookies || document.write('<script src="js/js.cookie.min.js"><\/script>')
		</script>		
		<script src="js/visitorcount.js" type="text/javascript"></script>
		<script src="js/dropdown.js" type="text/javascript"></script>
		<script src="js/calendar.js" type="text/javascript"></script>
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
				<div class="link"><a href="index.html">Startseite</a></div>
				<div class="link"><a href="activity.html">Tätigkeitsfelder</a></div>
				<div class="link"><a href="about.html">Über Uns</a></div>
				<div class="link"><a href="career.html">Job & Karriere</a></div>
				<div class="link"><a href="responsibility.html">Verantwortung</a></div>
				<div class="link selected"><a href="renting.php">Vermietung</a></div>
			</div>
		</nav>

		<main>
			<section>			
				<div class="dropdown">
					<button onclick="myFunction()" class="dropbtn" id="btn"><span><p>WIP</p></span></button>
					<div id="myDropdown" class="dropdown-content">
					
						<?php	//Dropdown Menu erstellen
							$method = $_SERVER["REQUEST_METHOD"];
							$mysqli = new mysqli("localhost", "root", "", "ikusaki");
									if ($method === "GET" || $method === "POST") {
										$sql = "SELECT * FROM `t_robots`";
										if ($result = $mysqli->query($sql)) {
											$row = $result->fetch_array();
											$robots = array('Roboter');
											while ($row){											
											
											array_push($robots, $row["robot"]);
											$row = $result->fetch_array();
											}
											
											foreach($robots as $robot){
												print("<a href=\"#\">".$robot."</a>");	
											}	
										}
									}							
						?>
					</div>
				</div>						
			</section>
			<section>
			
			<!--	<?php
					$method = $SERVER["REQUEST_METHOD"];
					$mysqli = new mysqli("localhost", "root", "", "ikusaki");
					if($method === "GET" || $method === "POST") {
						
					}	
				?>-->
		
		
		
		<div class="calendar">		
				<table border=1 id='calendar'>
		<tr style='visibility:collapse;' hidden>
			<td colspan=7 id='date_memory'>---</td>
		</tr>
		<tr>
			<td class='calendar_head'><a class='calendar_link'
				href='javascript:prevMonth()'> &laquo;</a></td>
			<td colspan=5 class='calendar_head_month' id='calendar_month'>
				---</td>
			<td class='calendar_head'><a class='calendar_link'
				href='javascript:nextMonth()'> &raquo;</a></td>
		</tr>
		<tr>
			<td class='calendar_day'>Mo</td>
			<td class='calendar_day'>Di</td>
			<td class='calendar_day'>Mi</td>
			<td class='calendar_day'>Do</td>
			<td class='calendar_day'>Fr</td>
			<td class='calendar_day'>Sa</td>
			<td class='calendar_day'>So</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_1'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_2'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_3'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_4'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_5'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_6'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_7'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_8'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_9'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_10'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_11'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_12'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_13'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_14'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_15'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_16'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_17'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_18'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_19'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_20'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_21'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_22'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_23'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_24'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_25'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_26'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_27'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_28'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_29'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_30'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_31'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_32'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_33'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_34'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_35'>-x-</td>
		</tr>
		<tr>
			<td class='calendar_entry' id='calendar_entry_36'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_37'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_38'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_39'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_40'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_41'>-x-</td>
			<td class='calendar_entry' id='calendar_entry_42'>-x-</td>
		</tr>
	</table>

	<script type='text/javascript'>
		iniCalendar();
		
		/*0 = wie bisher, Datum wird in die Box geschrieben*/
		setReturnModus(0);
		/*1 = neu, Eventtext wird in die Box geschrieben
		Das event muss in der calendar.js in der Function
		getEventtext definiert werden.*/
		//setReturnModus(1);
	</script>


	<br />
	<br />
	<!--
	<form id='myform'>
		<input id='datum' size=30/>
	</form>-->
	</div>
	<div class="renting">
	
		<form>
			<label for="robotRent">Roboter:</label>
			<select name="robotRent">
					<?php	//Dropdown Menu erstellen
							$method = $_SERVER["REQUEST_METHOD"];
							$mysqli = new mysqli("localhost", "root", "", "ikusaki");
									if ($method === "GET" || $method === "POST") {
										$sql = "SELECT * FROM `t_robots`";
										if ($result = $mysqli->query($sql)) {
											$row = $result->fetch_array();
											$robots = array();
											while ($row){											
											
											array_push($robots, $row["robot"]);
											$row = $result->fetch_array();
											}
											
											foreach($robots as $robot){
												print("<option value=\"".$robot."\">".$robot."</option>");	
											}	
										}
									}							
						?>
				
			</select>
			<br>
			<br>
			<label for="startDate">Anfangs Datum:</label>
				<input id="startDate" name="startDate">
			<br>
			<br>
			<label for="endDate">End Datum:</label>
				<input id="endDate" name="endDate">
			<br>
			<br>
			<button type="submit">Absenden</button>
		
		</form>
	
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
