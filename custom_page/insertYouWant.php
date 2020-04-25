<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dog";
//判斷 $_GET 內容
if($_GET){
	if($_GET['id']!=''){echo 'id:'.$_GET['id'].'<br />';}else{echo '無名氏<br />';}
	if($_GET['num']!=''){echo 'number:'.$_GET['num'].'<br />';}else{echo '無密碼<br />';}
	
	$id = $_GET['id'];
	$num = $_GET['num'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into dummy(id,num) values ($id ,$num);";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
 
	echo $id.'&nbsp'.'Welcome to the big family.';
}


if($_POST){
	echo '使用了<font color="red">post</font>方式傳遞資料,<br />「<font color="red">網址列</font>」上不會顯示傳遞的資料訊息<br /><br />';
	if(!empty($_POST['user_name'])){echo '姓名:'.$_POST['user_name'].'<br />';}else{echo '無名氏<br />';}
	if(!empty($_POST['user_pass'])){echo '密碼:'.$_POST['user_pass'].'<br />';}else{echo '無密碼<br />';}
	
	echo '<p style="color:red">送出的資料將會是以「陣列」方式儲存在 $_POST 變數當中，<br />因此可使用 var_dump($_POST) 或 print_r($_POST) 涵數查詢內容如下:</p>';
	echo '<p>';
	print_r($_POST);
	echo '</p>';
}


echo '<p><a href="index.php">Hop back</a></p>';