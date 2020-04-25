<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$em = $_POST['email'];
$pw = $_POST['password'];
$pw2 = $_POST['password2'];
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$nt = $_POST['note'];
$ph = $_POST['phone'];
$ad = $_POST['address'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($em != null && $pw != null && $pw2 != null && $pw == $pw2 && $fn != null && $ln != null)
{
        $sql = $conn ->prepare("SELECT email, firstname, lastname FROM mem where email = '$em'");
        $sql -> execute(array($em,$pw));
        $row = $sql -> fetch(PDO::FETCH_ASSOC);

        if ($row['email'] == $em or $row['firstname'] == $fn or $row['lastname'] == $ln){
                echo 'user already exist!';
                echo '<meta http-equiv=REFRESH CONTENT=5;url=register.html>';
        }
        else{
                if (!$ad){
                //新增資料進資料庫語法
                $sql1 = "insert into mem (email, firstname, lastname, phone, address, note, password) values ('$em', '$fn', '$ln','$ph','null','$nt','$pw')";
                $stmt = $conn->prepare($sql1); 
                $stmt->execute();
                        if($sql1)
                        {
                                echo 'Account Created!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
                        }
                }else{
                        //新增資料進資料庫語法
                        $sql1 = "insert into mem (email, firstname, lastname, phone, address, note, password) values ('$em', '$fn', '$ln','$ph','$ad','$nt','$pw')";
                        $stmt = $conn->prepare($sql1); 
                        $stmt->execute();
                        if($sql1)
                        {
                                echo 'Account Created!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
                        }
                        else
                        {
                                echo 'Update failed!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
                        }
                }
        }
}
else
{
        echo 'No right to visit this page!';
        echo '<meta http-equiv=REFRESH CONTENT=5;url=register.html>';
}
?>