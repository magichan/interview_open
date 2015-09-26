<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-19
 * Time: 下午5:10
 * 签到函数
 */
require_once("hong.php");
require_once("normal.php");
require_once("regist_function.php");
if(!isset($_POST['studentid']))
{
    echo "未填写";
}
else{
    $studentid = $_POST['studentid'];
    if(test_if_exist($studentid))
    {
        echo "该学生不存在";
        exit();
    }
    if(test_if_ok($studentid))
    {

        echo "已签到或者是已结束面试";
        exit();
    }
    regist_change_player_status($studentid);
    add_job($studentid);

    echo  "成功签到，请等待面试";
}
?>

