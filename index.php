<?php
header("Access-Control-Allow-Origin: *");
echo "hello there";
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


if(isset($_POST['req'])){


	$sql = 'SELECT * FROM partner-locator WHERE status = "$req"';

    $myQuery = mysqli_query($conn, $sql);


    $result = mysqli_fetch_all($myQuery, MYSQLI_ASSOC);

    echo json_encode($result);

}
else {
$sql = ' SELECT * FROM partner-locator ';

    $myQuery = mysqli_query($conn, $sql);


    $result = mysqli_fetch_all($myQuery, MYSQLI_ASSOC);

	print_r($result);
}



?>
