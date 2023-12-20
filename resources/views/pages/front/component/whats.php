<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "ltef_ads";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$type = $_POST['type'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$date = date("Y-m-d");
$result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$type'  LIMIT 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $visitor_count = $row['count_whats'];
    $visitor_count = $visitor_count + 1;
    $sql = "UPDATE ads SET count_whats=$visitor_count WHERE date(created_at)=date('$date') and type_id='$type' ";
    if ($conn->query($sql) === true) {
        $conn->close();
    }} else {
    $sql = "INSERT INTO ads (count_whats,type_id )
VALUES (1,$type)";
    if ($conn->query($sql) === true) {
        $conn->close();
    }

}
