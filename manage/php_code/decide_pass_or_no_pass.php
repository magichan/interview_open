<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-25
 * Time: 上午4:22
 * 接受一个判断一个选手是否通过一面或二面的请求
 */
require_once('sql.php');
require_once('normal.php');

session_start();
check_valid_user();

if(!isset($_POST['status']) || !isset($_POST['player_id'])|| !isset($_POST['time']))
{
    exit();
    // ajax 返回
}

$status = $_POST['status'];
$player_id = $_POST['player_id'];
switch($_POST['time'])
{
    case 1 :
        $pass = STATUS_FIRST_PASS;
        $no_pass = STATUS_FIRST_PASS;
        break;
    case 2 :
        $pass = STATUS_SECOND_PASS;
        $no_pass = STATUS_SECOND_PASS;
        break;

    default :
        die("get_chose 遇到未知的 time");
}
switch($status)
{
    case 'wait': exit(); // 无动作结束
    case 'pass':
        change_player_status_by_id($player_id,$pass );
        break;
    case "no_pass":
        change_player_status_by_id($player_id,$no_pass);
        break;
    default :
        die("get_chose 遇到未知的 status ");

}
?>

    <html>
    <head>
        <script>location.href='../../manage/welcome_manage.php';</script>
    </head>
    </html>

