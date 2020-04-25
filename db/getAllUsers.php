<?php
session_start();
$servername = "sean84041142843.ipagemysql.com";
$username = "ga2006321111";
$password = "ga2006321111";
$dbname = "cmpe272";

if (!isset($_SESSION['username'])){
    echo '<h1>No Hacking bro!</h1>';
    echo '<meta http-equiv=REFRESH CONTENT=3;url=../index.html>';
}
elseif ($_SESSION['username'] != 'root@root') {
    echo 'No right to access!';
    echo '<meta http-equiv=REFRESH CONTENT=3;url=../index.html>';
}else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM mem"); 
        $stmt->execute();
        echo '<br>';
        echo '<h1>WOW, look at all these suckers:</h1>';

        $email = array();
        $firstname = array();
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
            echo '<b>Email: </b>'.$row['email'].'&nbsp'.'&nbsp'.'&nbsp';
            echo '<b>First name: </b>'.$row['firstname'].'&nbsp'.'&nbsp'.'&nbsp';
            echo '<b>Last name: </b>'.$row['lastname'].'&nbsp'.'&nbsp'.'&nbsp';
            echo '<b>Cell phone: </b>'.$row['phone'].'&nbsp'.'&nbsp'.'&nbsp';
            echo '<b>Address: </b>'.$row['address'].'<hr>';
        }
        ?>
        <?php unset($_SESSION["username"]);?>
        <a href="../index.html">Go back</a>
        <?php

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
}
?>