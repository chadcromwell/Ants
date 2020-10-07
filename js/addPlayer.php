<?php
/*---------------------------------------------------------------
 * Author: Chad Cromwell
 * Date: March 15th, 2019
 * Description: Adds a new player to the database if the email is not already in use
 ---------------------------------------------------------------*/

//Database login information **REMOVED FOR GITHUB - In order to work on your machine, update these values to reflect your own DB**
$host = ""; //Host address
$user = ""; //Username
$password = ""; //Password
$db = ""; //Database
$port = ""; //Port

header("Content-Type: application/json; charset=UTF-8"); //Set header
$data = trim(file_get_contents("php://input")); //Capture input, trim it
$data = json_decode($data, true); //Decode JSON object
$email = $data["email"]; //Assign email parameter
$pw = $data["password"]; //Assign password parameter
$username = $data["username"]; //Assign username parameter
$pw = password_hash($pw, PASSWORD_DEFAULT); //Hash the password

echo "pw=$pw<hr>";
?>