<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "univ2";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM student"); 
    $stmt->execute();
    echo '<br>';
    echo '<h1>These are all the students:</h1>';
 	echo '<hr size=10>';

	while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
		echo $row['stuId'].'&nbsp'.$row['lastName'].'&nbsp'.$row['firstName'].'&nbsp'.$row['major'].'&nbsp'.$row['credits'].'<hr>';
	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>