<?php

$method = $_SERVER["REQUEST_METHOD"];

$mysqli = new mysqli("localhost", "root", "", "ikusaki");

if ($mysqli === false) {
	$error = $mysqli->connect_error;
	print("Couldn't connect to DB: $error");
	http_response_code(500);
} else {
	/*if ($method === "POST") {
		$sql = "UPDATE t_visitors SET count = count + 1 WHERE ID = 0";

		if ($mysqli->query($sql) !== true) {
			$error = $mysqli->error;
			print("SQL error: $error");
			http_response_code(500);
		}
	}*/

	if ($method === "GET" || $method === "POST") {
		$sql = "SELECT * FROM `l_booking_robot` WHERE `ID` = 1";

		if ($result = $mysqli->query($sql)) {
			$row = $result->fetch_array();
			
			$sqlrobot = "SELECT * FROM `t_robots` WHERE `ID` = ".$row["F_robot"];
			
			if ($result = $mysqli->query($sqlrobot)) {
				$rowrobot = $result->fetch_array();
				
				$sqluser = "SELECT * FROM `t_user` WHERE `ID` = ".$row["F_user"];
				
				if ($result = $mysqli->query($sqluser)) {
					$rowuser = $result->fetch_array();
				
					print($row["ID"]);
					print("<br>");
					print($rowrobot["robot"]);
					print("<br>");
					print($rowuser["user"]);
					print("<br>");
					print($row["start_date"]);
					print("<br>");
					print($row["end_date"]);
					$result->free();
					
				}else{
					$error = $mysqli->error;
					print("SQL error: $error");
					http_response_code(500);
				}
			}else {
				$error = $mysqli->error;
				print("SQL error: $error");
				http_response_code(500);
			}
		} else {
			$error = $mysqli->error;
			print("SQL error: $error");
			http_response_code(500);
		}
	} else {
		print("Unhandled REQUEST_METHOD '$method'");
		http_response_code(501);
	}

	$mysqli->close();
}
