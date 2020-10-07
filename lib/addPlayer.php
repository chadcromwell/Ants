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

$link = new mysqli($host, $user, $password, $db, $port) or die ("Connection failed".$link->error); //Initialize SQL link, if it fails respond with error
$link->set_charset("utf8"); //Set charset
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port) or die ("Could not connect to Database"); //Connect to SQL database, if it fails print "Could not connect to Database"

//If connection is successful
if($success) {
    //Prepare SQL statement to prevent SQL injection attacks
    $stmt = $link->prepare('SELECT email FROM Players WHERE email = ?'); //Prepare the query statement
    $stmt->bind_param('s', $email); //Bind the parameters
    $stmt->execute(); //Query database
    $metaData = $stmt->result_metadata(); //Get metaData from columns

    //For each field in the meta data
    while($field = $metaData->fetch_field()) {
        $parameters[] = &$row[$field->name]; //Assign this name to $parameters array
    }
    call_user_func_array(array($result, 'bind_result'), $parameters); //Use the parameters to call bind_result and assign to $result

    //If the first query returns any rows, that email has already been used
    if ($result->num_rows > 0) {
        echo "exists"; //Send "email" to tell index.php that the email already exists
        $stmt->close(); //Close statement
    }
    //Else, that email has not yet been used, insert new user
    else {
        $stmt = "INSERT INTO Players (`id`, `username`, `password`, `xp`, `email`, `slingshotPath1XP`, `slingshotPath2XP`, `hammerPath1XP`, `hammerPath2XP`, `bugSprayPath1XP`, `bugSprayPath2XP`, `magnifyingGlassPath1XP`, `magnifyingGlassPath2XP`, `cannonPath1XP`, `cannonPath2XP`, `honeyPath1XP`, `honeyPath2XP`, `windmillSetting`, `firstLogin`) VALUES (NULL, '$username', '$pw', '0', '$email', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1')";

        //Execute, and if successful
        if ($link->query($stmt) === true) {
            echo "success"; //Send "success" to tell index.php that the registration was successful
        }
        //Else, it's unsuccessful
        else {
            echo "fail"; //Send "fail" to tell index.php that the registration failed
        }
    }
    $link->close(); //Close the link
}