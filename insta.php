<?php
$servername = "localhost";

$username = "mynewhotels_hotels_new_release";

$password = "k&ir7aLLDkh3";

$dbname = "mynewhotels_new_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$type = $_POST['type'];
//$id = $_POST['id'] ? $_POST['id'] : 0;

//print_r($type);die;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$date = date("Y-m-d");
$result = $conn->query("SELECT * FROM ads where  date(Date)=date('$date') and type='$type'  LIMIT 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $visitor_count = $row['count_insta'];
    $visitor_count = $visitor_count + 1;
    $sql = "UPDATE ads SET count_insta=$visitor_count WHERE date(Date)=date('$date') and type='$type' ";
    if ($conn->query($sql) === true) {
        $conn->close();
    }} else {
    $sql = "INSERT INTO ads (count_insta,type )
VALUES (1,$type)";
    if ($conn->query($sql) === true) {
        $conn->close();
    }

}