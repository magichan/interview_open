<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-16
 * Time: 下午12:58
 *  面试官模块常用函数
 */
// 评委登陆，成功返回 1 ，失败返回 0

require_once("sql.php");
function judge_log($name,$key )
{
    $sql = sql_connection();
    $query = "SELECT count(*) FROM judge WHERE name = '$name' AND password = '$key' ";
    $ret = mysqli_query($sql, $query);
    $val = mysqli_fetch_array($ret);
    return $val[0];
}


?>
