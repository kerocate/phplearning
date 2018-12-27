<?php
$a="";
$c="";
$b="";
$Message;
@$a=$_GET["a"]; //表示写删改
@$c=$_GET["c"]; //表示文字内容
@$b=$_GET["b"];
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn,'message'); //指定库
// Error report
// if(! $conn )
// {
//     die('Could not connect: ' . mysqli_error());
// }
if ($b!="") {


switch ($a) {
    case '1':
        $sql = "INSERT INTO message (con) VALUES ('$c')"; //设置插入的内容
        mysqli_query($conn,$sql); //发送mysql请求
        break;
    case '2':
        $sql = "UPDATE message SET con='$c' WHERE con='$b'";
        mysqli_query($conn,$sql); //发送mysql请求
        break;
    case '3':
        $sql = "DELETE FROM message WHERE con='$c'";
        mysqli_query($conn,$sql); //发送mysql请求
        break;
    default:
    $sql = "SELECT con FROM message";
    $response = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($response, MYSQLI_ASSOC))
    {
        echo "<tr><tr>留言：</tr><td> {$row['con']}</td> "."</tr>";
    }
    echo '</table>';
        break;
}

    $sql = "SELECT con FROM message";
    $response = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($response, MYSQLI_ASSOC))
    {
       echo "<tr><tr>留言：</tr><td> {$row['con']}</td> "."</tr>";
    }
    echo '</table>';

mysqli_close($conn);
}else {
    echo "啥都不写你留啥言啊？";
}
// output the response
?>