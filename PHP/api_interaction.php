<?php
require('trading_data_collection.php');
require('api_query.php');
require('trading_data_record.php');

//Define PHP access to api and what not
ini_set("allow_url_fopen", 1);

//Define the constants within the query << does not depend on anything that is passed, obviously >>
define("api_key", "9EBZ1RQF3KPNS5B2");
define("query_url_param", "https://www.alphavantage.co/query?");

//Get query params from post as JSON object
$params_json_string = file_get_contents('php://input');
$api_query = api_query::get_query_type(json_decode($params_json_string));

//RIP to several days, cant wait to test it all
echo json_encode($api_query->perform_query());