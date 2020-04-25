<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$other = $_POST['other'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $sql = "insert into mem (username, password, telephone, address, other) values ('$id', '$pw', '$telephone', '$address', '$other')";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        if($sql)
        {
                echo 'Updated!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=main.html>';
        }
        else
        {
                echo 'Update failed!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=main.html>';
        }
}
else
{
        echo 'No right to visit this page!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=main.html>';
}
?>