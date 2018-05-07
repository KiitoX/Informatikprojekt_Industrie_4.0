<?php

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
case 'GET':
	print("1234");
	break;
case 'POST':
	// no output (for now)
	// TODO implement dp increment
	breaK;
default:
	print("Unhandled REQUEST_METHOD '{$method}'");
	http_response_code(501);
}
