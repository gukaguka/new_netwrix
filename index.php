<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

header("HTTP/1.1 200 OK");

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

$sqli = ' SELECT * FROM partner-locator ';

    $myQueryy = mysqli_query($conn, $sqli);


    $resultt = mysqli_fetch_all($myQueryy, MYSQLI_ASSOC);

	print_r($resultt);



?>
