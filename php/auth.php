<?php

session_start();
$data = file_get_contents("php://input");
$receivedData = json_decode($data);
$databaseUsers = ["12345465432", "234565432", "14424"];
/*
 * WARNING!
 * If a new user exists in $databaseUsers or
 * if an authorized user does not,
 * the app will break!
 * seems logical uh?
 */


if (isset($receivedData->facebook_id)) {
    if (in_array($receivedData->facebook_id, $databaseUsers)) {
        // users is logged in we will perform a query to get the data needed and will put it in the $_SESSION array
        // in order to return it to angular.
        $_SESSION['id'] = "some id";
        $_SESSION['facebook_id'] = $receivedData->facebook_id;
        $_SESSION['first_name'] = "some name";
        $_SESSION['last_name'] = "some last name";
        $_SESSION['picture'] = "a lookign good picture";
        $_SESSION['user_is'] = "existing user";
        echo "existing";
    } else {
        // user is not in our db, so if we have more than his facebook_id, we can write him to our database...
        if (isset($receivedData->last_name) && isset($receivedData->first_name) && isset($receivedData->picture)) {
            //write user to db and put it the data in the $_SESSION array in order to return it to angular.
            $_SESSION['id'] = "some id";
            $_SESSION['facebook_id'] = $receivedData->facebook_id;
            $_SESSION['first_name'] = $receivedData->first_name;
            $_SESSION['last_name'] = $receivedData->last_name;
            $_SESSION['picture'] = $receivedData->picture;
            $_SESSION['user_is'] = "new user";
            echo "new";
        } else {
            //not enough data gathered in order to write a new user;
            echo "not enough data";
        }
    }
}
else {
    echo "no facebook data";
}
//todo: Cross-site request forgery
?>

