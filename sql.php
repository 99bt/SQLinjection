<?php
/*
写这个php最初目的是为了给自己测WAF用，和深入了解SQL注入。
可以打印你查询的结果，和打印你调用的SQL语句。
使用到了DVWA的库

*/


// 设置编码为utf-8
header("Content-Type: text/html;charset=utf-8");

$servername = "localhost";
$username = "root";
$password = "root";
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功";

$chaxun = $_GET["id"];

mysqli_query($conn,'use dvwa;');//连接数据库并使用dvwa库
$sql = "SELECT * FROM users WHERE user_id= '$chaxun'";//查询语句
$result = mysqli_query($conn,$sql);//使用mysqli_query函数调用sql语句

while($row = $result->fetch_assoc()) {//查询后的结果集里取一行并赋值给row
        echo "<br>账号：".$row['user'];//打印user行的内容
        echo "<br>";
        echo "密码：".$row['password'];
    }

print "<br><b>SQL语句为：</b>$sql</br>";
//加粗并换行打印出来


$conn->close();
//查询后不管有没有都记得关闭数据库
?>