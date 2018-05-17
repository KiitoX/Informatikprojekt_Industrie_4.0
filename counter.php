<?php

$method = $_SERVER["REQUEST_METHOD"];

$mysqli = new mysqli("localhost", "root", "", "ikusaki");

if ($mysqli === false) {
	print("Couldn't connect to DB: ${mysqli->connect_error}");
	http_response_code(500);
} else {
	if ($method === "POST") {
		$sql = "UPDATE t_visitors SET count = count + 1 WHERE ID = 0";

		if ($mysqli->query($sql) !== true) {
			print("SQL error: ${mysqli->error}");
			http_response_code(500);
		}
	}

	if ($method === "GET" || $method === "POST") {
		$sql = "SELECT count FROM t_visitors WHERE ID = 0";

		if ($result = $mysqli->query($sql)) {
			$row = $result->fetch_array();
			print($row["count"]);
			$result->free();
		} else {
			print("SQL error: ${mysqli->error}");
			http_response_code(500);
		}
	} else {
		print("Unhandled REQUEST_METHOD '{$method}'");
		http_response_code(501);
	}

	$mysqli->close();
}
