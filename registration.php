@@ -0,0 +1,53 @@
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
 
$team_name = $team_head_name = $team_member_2 = $team_member_3 = $phone = $email = $institute_type = $institute_name = $your_id = "";
 

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $team_name = test_input(filter_input(INPUT_POST, 'team_name', FILTER_SANITIZE_STRING));
 
  $team_head_name = test_input(filter_input(INPUT_POST, 'team_head_name', FILTER_SANITIZE_STRING));
 
  $team_member_2 = test_input(filter_input(INPUT_POST, 'team_member_2', FILTER_SANITIZE_STRING));
 
  $team_member_3 = test_input(filter_input(INPUT_POST, 'team_member_3', FILTER_SANITIZE_STRING));
 
  $phone = test_input(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
 
  $email = test_input(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
 
  $institute_type = test_input(filter_input(INPUT_POST, 'institute_type', FILTER_SANITIZE_STRING));
 
  $institute_name = test_input(filter_input(INPUT_POST, 'institute_name', FILTER_SANITIZE_STRING));
 
  $your_id = test_input(filter_input(INPUT_POST, 'your_id', FILTER_SANITIZE_STRING));
 
}
 

 
function test_input($data) {
 
  $data = trim($data);
 
  $data = stripslashes($data);
 
  $data = htmlspecialchars($data);
 
  return $data;
 
  }
 

 
try {
 
  
 
  $sql = "INSERT INTO registration (team_name, team_head_name, team_member_2, team_member_3, phone, email, institute_type, institute_name, your_id) VALUES ('$team_name', '$team_head_name', '$team_member_2', '$team_member_3', '$phone', '$email', '$institute_type', '$institute_name', '$your_id')";
 
    $conn->exec($sql);
 
    echo "New record created successfully";
 
  }
 
catch(PDOException $e)
 
    {
 
    echo $sql . "<br>" . $e->getMessage();
 
    }
 

 
$conn = null;
 
?>
 

 
File contents are unchanged.
commit:00e227
Registration: front and backend

The front end needs  a littele editing, but the backend is done completely as instructed.