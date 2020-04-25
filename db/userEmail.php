<?php

include("mysql_connect.inc.php");

$em = $_POST['email'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM mem where email = '$em'"); 
    $stmt->execute();
    echo '<br>';
    echo '<h1>WOW, look at all these suckers:</h1>';
    $email = array();
    $firstname = array();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        echo '<b>First name: </b>'.$row['firstname'].'&nbsp'.'&nbsp'.'&nbsp';
        echo '<b>Last name: </b>'.$row['lastname'].'&nbsp'.'&nbsp'.'&nbsp';
        echo '<b>Cell phone: </b>'.$row['phone'].'<hr>';
    }
    ?>
    <a href="../index.html">Go back</a>
    <?php
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>