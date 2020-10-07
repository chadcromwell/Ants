<?php
/*---------------------------------------------------------------
 * Author: Chad Cromwell
 * Date: May 23rd, 2019
 * Description: Used to authenticate and log a user in
 ---------------------------------------------------------------*/
//Database login information **REMOVED FOR GITHUB - In order to work on your machine, update these values to reflect your own DB**
$host = ""; //Host address
$user = ""; //Username
$password = ""; //Password
$db = ""; //Database
$port = ""; //Port

$data = trim(file_get_contents("php://input")); //Capture input, trim it
$data = json_decode($data, true); //Decode JSON object
$email = $data["email"]; //Assign email parameter
$pw = $data["password"]; //Assign password parameter
$authenticated = false; //Initialize as not authenticated

$link = new mysqli($host, $user, $password, $db, $port) or die ("Connection failed".$link->error); //Initialize SQL link, if it fails respond with error
$link->set_charset("utf8"); //Set charset
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port) or die ("Could not connect to Database"); //Connect to SQL database, if it fails print "Could not connect to Database"

//If connection is successful
if ($success) {
    $stmt = "SELECT * FROM Players WHERE email = '$email'"; //Prepare the query statement
    $result = $link->query($stmt); //Perform query

    //If there is a result, there is a user that matches
    if($result->num_rows > 0) {
        //Iterate through rows
        while($row = $result->fetch_assoc()) {
            //Create JSON Player Object
            $json = ["id" => $row["id"], "username" => $row["username"], "slingshotPath1XP" => $row["slingshotPath1XP"], "slingshotPath2XP" => $row["slingshotPath2XP"], "hammerPath1XP" => $row["hammerPath1XP"], "hammerPath2XP" => $row["hammerPath2XP"], "bugSprayPath1XP" => $row["bugSprayPath1XP"], "bugSprayPath2XP" => $row["bugSprayPath2XP"], "magnifyingGlassPath1XP" => $row["magnifyingGlassPath1XP"], "magnifyingGlassPath2XP" => $row["magnifyingGlassPath2XP"], "cannonPath1XP" => $row["cannonPath1XP"], "cannonPath2XP" => $row["cannonPath2XP"], "honeyPath1XP" => $row["honeyPath1XP"], "honeyPath2XP" => $row["honeyPath2XP"], "xp" => $row["xp"], "windmillSetting" => $row["windmillSetting"], "firstLogin" => $row["firstLogin"]];
            $jsonResponse = json_encode($json); //Encode the JSON object
            //If provided password is the key to the hashed password on the database
            if(password_verify($pw, $row["password"])) {
                $authenticated = true; //The user is authenticated
            }
        }
    }

    //If the user is authenticated
    if ($authenticated) {
        header("Content-Type: application/json; charset=UTF-8"); //Set the header
        echo $jsonResponse; //Echo the encoded JSON Player Object
    }
    //Else, the user is not authenticated
    else {
        echo json_encode(array("logIn" => "F")); //Echo the encoded JSON failed login response
    }
    $link->close(); //Close SQL connection
}