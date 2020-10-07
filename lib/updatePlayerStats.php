<?php
/*---------------------------------------------------------------
 * Author: Chad Cromwell
 * Date: May 23rd, 2019
 * Description: Used to update player stats and preferences on the database
 ---------------------------------------------------------------*/

//Database login information **REMOVED FOR GITHUB - In order to work on your machine, update these values to reflect your own DB**
$host = ""; //Host address
$user = ""; //Username
$password = ""; //Password
$db = ""; //Database
$port = ""; //Port

$data = trim(file_get_contents("php://input")); //Capture input, trim it
$data = json_decode($data, true); //Decode JSON object
$id = $data["id"]; //Assign id parameter
$email = $data["email"];  //Assign email parameter
$pw = $data["password"]; //Assign password parameter
$xp = $data["xp"]; //Assign xp parameter
$slingshotPath1XP = $data["slingshotPath1XP"]; //Assign slingshotPath1XP parameter
$slingshotPath2XP = $data["slingshotPath2XP"]; //Assign slingshotPath2XP parameter
$hammerPath1XP = $data["hammerPath1XP"]; //Assign hammerPath1XP parameter
$hammerPath2XP = $data["hammerPath2XP"]; //Assign hammerPath2XP parameter
$bugSprayPath1XP = $data["bugSprayPath1XP"]; //Assign bugSprayPath1XP parameter
$bugSprayPath2XP = $data["bugSprayPath2XP"]; //Assign bugSprayPath2XP parameter
$magnifyingGlassPath1XP = $data["magnifyingGlassPath1XP"]; //Assign magnifyingGlassPath1XP parameter
$magnifyingGlassPath2XP = $data["magnifyingGlassPath2XP"]; //Assign magnifyingGlassPath2XP parameter
$cannonPath1XP = $data["cannonPath1XP"]; //Assign cannonPath1XP parameter
$cannonPath2XP = $data["cannonPath2XP"]; //Assign cannonPath2XP parameter
$honeyPath1XP = $data["honeyPath1XP"]; //Assign honeyPath1XP parameter
$honeyPath2XP = $data["honeyPath2XP"]; //Assign honeyPath2XP parameter
$windmillSetting = $data["windmillSetting"]; //Assign windmillSetting parameter
$firstLogin = $data["firstLogin"]; //Assign firstLogin parameter

$link = new mysqli($host, $user, $password, $db, $port) or die ("Connection failed".$link->error); //Initialize SQL link, if it fails respond with error
$link->set_charset("utf8"); //Set charset
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port) or die ("Could not connect to Database"); //Connect to SQL database, if it fails print "Could not connect to Database"

//If connection is successful
if ($success) {
    $stmt = "UPDATE Players SET xp = '$xp', slingshotPath1XP = '$slingshotPath1XP', slingshotPath2XP = '$slingshotPath2XP', hammerPath1XP = '$hammerPath1XP', hammerPath2XP = '$hammerPath2XP', bugSprayPath1XP = '$bugSprayPath1XP', bugSprayPath2XP = '$bugSprayPath2XP', magnifyingGlassPath1XP = '$magnifyingGlassPath1XP', magnifyingGlassPath2XP = '$magnifyingGlassPath2XP', cannonPath1XP = '$cannonPath1XP', cannonPath2XP = '$cannonPath2XP', honeyPath1XP = '$honeyPath1XP', honeyPath2XP = '$honeyPath2XP', windmillSetting = '$windmillSetting', firstLogin = '$firstLogin' WHERE Players.id = '$id'"; //Prepare the query statement
    $link->query($stmt); //Perform query
    $link->close(); //Close SQL connection
}