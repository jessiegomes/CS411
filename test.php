<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
	<link rel="stylesheet" href="w3.css">
</head>

<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");
$link = mysqli_connect("127.0.0.1", "teamsaauuwwce_teamsauce", "Teamsauce", "teamsaauuwwce_tempdatabase");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $height = $mysqli->real_escape_string($_POST['height']));
  // $weight = $mysqli->real_escape_string($_POST['weight']));
  // $age = $mysqli->real_escape_string($_POST['age']));
  // $sql = "INSERT INTO User (height, weight, age)  VALUES ('4', '4', '4');";

  if(mysqli_query($mysqli, $sql) === true) {
  		header("Inserted!");
  }
  else {
      $_SESSION['message'] = "Account was not created:(";
  }
}

$mysqli->close();
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Create Profile</title>
	</head>

	<body>

    <form class="form" action="test.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="Height" name="height" required />
      <input type="text" placeholder="Weight" name="weight" required />
      <input type="text" placeholder="Age" name="age" required />
      <input type="submit" value="verify" name="Create Account" class="btn btn-block btn-primary" />

      <div class="module">
    </form>


	</body>
</html>
