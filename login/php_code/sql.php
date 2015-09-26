<?php
/*
 * 建立数据库的连接
 * 和队列操作中添加任务和取任务，修改任务状态的操作
 */
require_once("hong.php");

function sql_connection()
{
    $con = mysqli_connect("localhost", USER, PASSWORD);
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_set_charset($con, "utf8");
    mysqli_select_db($con, DATABASENAME);

    return $con;
}



?>


