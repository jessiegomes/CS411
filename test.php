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
  $height = $_POST['height']);
  $weight = $_POST['weight']);
  $age = $_POST['age']);
  $sql = "INSERT INTO User (height, weight, age) " . "VALUES ('$height', '$weight', '$age')";

  if(mysqli_query($mysqli, $sql) === true) {
  		header("Inserted!");
  		exit();
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />
	</head>

	<body>

    <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <label for="height">Height:</label><input type="text" placeholder="Height" name="height" required />
      <label for="weight">Weight:</label><input type="text" placeholder="Weight" name="weight" required />
      <label for="age">Age:</label><input type="text" placeholder="Age" name="age" required />
      <input type="submit" name="submit" class="btn btn-block btn-primary" onclick="test.php" method="post"/>
      <div class="module">
    </form>


	</body>
</html>