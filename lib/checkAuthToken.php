<?php
/*---------------------------------------------------------------
 * Author: Chad Cromwell
 * Date: March 23rd, 2019
 * Description: Checks database AuthTokens table to see if there is a currently authorized
 * session for this user, if there is it retrieves their player data and sends it to index.php.
 * If the session existed but expired, it returns "expiredAuth" which index.php treats the situation
 * as if the user is not logged in.
 * If the session does not exist, it returns "noAuth" which index.php treats the same as "expiredAuth"
 * which treats the situation as if the user is not logged in.
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
$selector = $data["selector"]; //Assign selector parameter
$validator = $data["validator"]; //Assign validator parameter
$validator = hash("sha256", $validator, false); //Hash the validator

$link = new mysqli($host, $user, $password, $db, $port) or die ("Connection failed".$link->error); //Initialize SQL link, if it fails respond with error
$link->set_charset("utf8"); //Set charset
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port) or die ("Could not connect to Database"); //Connect to SQL database, if it fails print "Could not connect to Database"

//If connection is successful
if($success) {
    $stmt = "SELECT * FROM AuthTokens WHERE selector = '$selector'"; //Prepare the query statement
    $result = $link->query($stmt); //Perform query

    //If the first query returns any rows, the user is already logged in
    if ($result->num_rows > 0) {
        //Iterate through rows
        while ($row = $result->fetch_assoc()) {
            $hashedValidator = $row["hashedValidator"]; //Capture hashedValidator
            $expiry = $row["expires"]; //Capture expires
            $id = $row["userId"]; //Capture userId
            //If provided validator is the key to the hashed validator on the database
            if (hash_equals($validator, $hashedValidator)) {
                $expiry = strtotime($expiry); //Convert expiry from database to string
                $interval = $expiry - time(); //Calculate the time interval between expiry and right now
                //If the time interval is greater than 0, it has not yet expired so get user login credentials and log the user in
                if ($interval > 0) {
                    $stmt = "SELECT * FROM Players WHERE id = $id"; //Prepare the query statement
                    $result = $link->query($stmt); //Make query

                    //If there is a result, there is a user that matches
                    if ($result->num_rows > 0) {
                        //Iterate through rows
                        while ($row = $result->fetch_assoc()) {
                            //Create JSON Player Object
                            $json = ["id" => $row["id"], "username" => $row["username"], "slingshotPath1XP" => $row["slingshotPath1XP"], "slingshotPath2XP" => $row["slingshotPath2XP"], "hammerPath1XP" => $row["hammerPath1XP"], "hammerPath2XP" => $row["hammerPath2XP"], "bugSprayPath1XP" => $row["bugSprayPath1XP"], "bugSprayPath2XP" => $row["bugSprayPath2XP"], "magnifyingGlassPath1XP" => $row["magnifyingGlassPath1XP"], "magnifyingGlassPath2XP" => $row["magnifyingGlassPath2XP"], "cannonPath1XP" => $row["cannonPath1XP"], "cannonPath2XP" => $row["cannonPath2XP"], "honeyPath1XP" => $row["honeyPath1XP"], "honeyPath2XP" => $row["honeyPath2XP"], "xp" => $row["xp"], "windmillSetting" => $row["windmillSetting"], "firstLogin" => $row["firstLogin"]];
                            $jsonResponse = json_encode($json); //Encode the JSON object
                            echo $jsonResponse; //Echo the encoded JSON Player Object
                        }
                    }
                }
                //Else, the authentication token has expired
                else {
                    echo "expiredAuth"; //Echo, "expiredAuth"
                }
            }
        }
    }
    //Else, no authentication token exists
    else {
        echo "noAuth"; //Echo, "noAuth"
    }
    $link->close(); //Close the link
}