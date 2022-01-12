<?php

include "../config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);



if (isset($_POST['siteName']) and (isset($_POST['url'])) and (isset($_POST['owner']))) {
    $honeypot = $_POST['kittycat'];
    if(!empty($honeypot)){
		return; //you may add code here to echo an error etc.
	}else{
    $name = $_POST['siteName'];
    $url = trim($_POST['url']);
    $owner = $_POST['owner'];
    $contact = $_POST['contact'];
    $desc = $_POST['desc'];

    $lastchar = substr($url, -1);

    //echo $lastchar;

    if ($lastchar != '/') {
        $url .= '/';
    }


    //echo 'final URL looks like:' . $url;

    // this escapes the slashes
    //$url = preg_replace("#^[^:/.]*[:/]+#i", "", $url);
    //echo $url;

    $pending = 1;
    $stmt = $con->prepare("INSERT INTO webring(name, url, owner, contact, description, pending) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('ssssss', $name, $url, $owner, $contact, $desc, $pending);
    echo $stmt->error;
    $stmt->execute();
    $stmt->close();
    
    
    include "mail-notif.php";
    header('Location: success.php');
}
}
