<?php

$config = json_decode(file_get_contents("../db.json"), true);
$admin_key = $config['Admin_Key'];

if (isset($_COOKIE['pwd'])) {
    $inbound_key = urldecode($_COOKIE['pwd']);
    $compare_key = md5($inbound_key . "m9phF35dz9XMvDYQ7VM8");

    if ($compare_key === $admin_key)
    {
        //echo "Success";
    }
    else
    {
        header("HTTP/1.0 403 Forbidden");
        exit;
    }
} else {
    header("HTTP/1.0 403 Forbidden");
    exit;
}
// Connection info
$servername = $config['SQL_Host'];
$dusername = $config['SQL_User'];
$dpassword = $config['SQL_Password'];
$dbname = $config['Database'];

$mysqli = new mysqli($servername, $dusername, $dpassword, $dbname);
if ($mysqli->connect_errno) {
    //echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit;
}


$mysqli->query("INSERT INTO events () values ()");

header("Location: /event-edit-template.php?eventId=" . $mysqli->insert_id);
die;

?>