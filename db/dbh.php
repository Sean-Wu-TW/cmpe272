<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM department"); 
    $stmt->execute();
 
    // 设置结果集为关联数组
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
		echo $row['dept_name'];
	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>