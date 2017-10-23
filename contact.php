<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=brainstormer", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
	
// define variables and set to empty values
$name = $email = $subject = $message = $ip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
  $email = test_input(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
  $subject = test_input(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
  $message = test_input(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

try {
	/*function get_client_ip() 
		{
		if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
        $ip = $_SERVER['REMOTE_ADDR'];
		else
        $ip = 'UNKNOWN';
		return $ip;
		}
		$ip= get_client_ip();*/
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		$ip = $_SERVER['REMOTE_ADDR'];
		}
		$sql = "INSERT INTO contactdetails (name, email, subject, message, ip) VALUES ('$name', '$email', '$subject', '$message', '$ip')";
		$conn->exec($sql);
		echo "New record created successfully";
	}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

