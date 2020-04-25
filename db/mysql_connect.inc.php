<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$servername = "sean84041142843.ipagemysql.com";
//資料庫名稱
$dbname = "cmpe272";
//資料庫管理者帳號
$username = "ga2006321111";
//資料庫管理者密碼
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
