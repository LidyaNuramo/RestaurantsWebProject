<?php
   $dbhost="localhost";
    $dbuser="id15549999_feyiseljemal";
    $dbpassword="G-5l{t)7sEr/h@Uu";
    $dbname="id15549999_feyisel";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection) {
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
$time = date('H:i:s', time());
if (ISSET($_POST['button'])) {
   
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$x4 = $_POST['x4'];
$x5 = $_POST['x5'];
mysqli_query($connection, "INSERT INTO measurements (x1,x2,x3,x4,x5) VALUES('$x1','$x2','$x3','$x4','$x5')") or die ("DB dfdf: $dbname");
    $result = mysqli_query($connection, "SELECT * FROM measurements ") or die ("DB error: $dbname");
     $results = mysqli_fetch_array ($result);
$id = null;
$x1 = $result[1];
$x2 = $result[2];
$x3 = $result[3];
$x4 = $result[4];
$x5 = $result[5];

}

?>
 

 <!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="POST">
<br>
x1:<input type="text" name="one" maxlength="10" size="10"><br>
x2:<input type="text" name="two" maxlength="10" size="10"><br>
x3:<input type="text" name="three" maxlength="10" size="10"><br>
x4:<input type="text" name="four" maxlength="10" size="10"><br>
x5:<input type="text" name="five" maxlength="10" size="10"><br>
<input type="submit" name="button" value="Send"/>
</form>

<p> check graph <a href="graph.php">here </a> </p>
</body>
</html>