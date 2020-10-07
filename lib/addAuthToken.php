<?php
/*---------------------------------------------------------------
 * Author: Chad Cromwell
 * Date: May 23rd, 2019
 * Description: Creates a long-term user authentication session, follows Paragon Initiative's secure long-term user authentication strategy https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence#title.2
 * How it works:
 * 1) selector is randomly generated string
 * 2) validator (username) is hashed
 * 3) get matching selector from db, if not found they are not authed
 * 4) if found
 ---------------------------------------------------------------*/

//Database login information **REMOVED FOR GITHUB - In order to work on your machine, update these values to reflect your own DB**
$host = ""; //Host address
$user = ""; //Username
$password = ""; //Password
$db = ""; //Database
$port = ""; //Port

header("Content-Type: application/json; charset=UTF-8"); //Set header
$data = trim(file_get_contents("php://input")); //Capture input, trim it
$data = json_decode($data, true); //Decode JSON Object
$selector = $data["selector"]; //Assign selector parameter
$validator = $data["validator"]; //Assign validator parameter
$validator = hash("sha256", $validator, false); //Hash the password using SHA256
$userId = $data["id"]; //Assign id parameter
$curDate = new DateTime("now"); //Initialize current date
$curDate->add(new DateInterval("P90D")); //Add 90 days to the current date
$curDate = $curDate->format("Y-m-d H:i:s"); //Set date format to one mySQL understands
$expires = $curDate; //Assign date 90 days from now to the $expiry variable, this is when the authentication token will expire on the database
$link = new mysqli($host, $user, $password, $db, $port) or die ("Connection failed".$link->error); //Initialize SQL link, if it fails respond with error
$link->set_charset("utf8"); //Set charset
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port) or die ("Could not connect to Database"); //Connect to SQL database, if it fails print "Could not connect to Database"

//If connection is successful
if ($success) {
    $stmt = "SELECT * FROM AuthTokens WHERE hashedValidator = '$validator' AND selector = '$selector'"; //Prepare the query statement
    $result = $link->query($stmt); //Perform query

    //If the first query returns any rows, that authenticated session exists, no need to add another
    if ($result->num_rows > 0) {
        //Do nothing
    }
    //Else, create a new authenticated session token
    else {
        //Prepare SQL statement to prevent SQL injection attacks
        $stmt = $link->prepare('INSERT INTO AuthTokens(selector, hashedValidator, userId, expires) VALUES (?, ?, ?, ?)'); //Prepare query statement
        $stmt->bind_param('ssss', $selector, $validator, $userId, $expires); //Bind the parameters

        //Execute, and if successful
        if ($stmt->execute()) {
            echo "success"; //Send "success" to tell index.php that the authentication session registration was successful
        }
        //Else, it was unsuccessful
        else {
            echo "fail"; //Send "fail" to tell index.php that the registration failed
        }
    }
    $link->close(); //Close SQL connection
}