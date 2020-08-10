<?php

//数据库连接
$conn = mysqli_connect('127.0.0.1','root','root','root');

//检测链接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');//设定数据库连接字符集

$sql = "SELECT `type`,`id` FROM article";//查询文章分类

$result = mysqli_query($conn, $sql);//执行语句

if ($result){
    while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
        $rows[] = $row;
    }
}else{
    die('无法读取数据'.mysqli_error($conn));
}

foreach ($rows as $val){?>
    <ul>
        <li>
            <a><?php echo $val['type'], $val['id'];?></a>
        </li>
    </ul>

<?php }?>