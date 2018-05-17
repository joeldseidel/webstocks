<?php
require('connect_to_database.php');
//Get login form data
$username = $_POST['login_username'];
$password = $_POST['login_password'];

//Query for account existance
