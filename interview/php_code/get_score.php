<?php

/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-17
 * Time: 下午3:10
 *  获取　提交的信息　
 */

require_once("hong.php");
require_once("sql.php");
require_once("normal.php");
require_once('judge_function.php');
session_start();
check_valid_user();
$flag = null;

if($_POST['interview_attitude']==0 || $_POST['group_attitude']==0|| $_POST['life_attitude']==0||
    $_POST['base_knowledge']==0|| $_POST['direction_knowledge']==0 )
{
    $flag = SAVE;
}else{
    $flag = END;
}// 根据填写的信息，确认是什么样的值
$interview= $_POST['interview_attitude'];
$group = $_POST['group_attitude'];
$life = $_POST['life_attitude'];
$base = $_POST['base_knowledge'];
$direction = $_POST['direction_knowledge'];
$comment = $_POST['comment'];
$job_id = $_POST['job_id'];

$judge_info = get_judge_info_from_name($_SESSION['valid_user']);
$job_info = get_job_info_from_id($job_id);

$judge_id = $judge_info['id'];
$interview_id = $job_info['interview_id'];

// 找到对应的评分项的　id
$conn = sql_connection();
$query_record_score = "UPDATE interview SET
interview_attitude=$interview,
group_attitude=$group,
life_attitude=$life,
base_knowledge=$base,
direction_knowledge=$direction,
comment='$comment'
WHERE id = $interview_id";


switch($flag)
{
    case SAVE:
        $ret = mysqli_query($conn,$query_record_score);
        if(!$ret)
        {
            echo $query_record_score;
            die("保存得分错误".mysqli_error($conn));
        }
        break;
    case END:
        $ret = mysqli_query($conn,$query_record_score);
        if(!$ret)
        {
            die("提交得分错误".mysqli_error($conn));
        }
        $interview_info = get_interview_info_from_id($job_info['interview_id']);
        if($interview_info['end_status']!=0)
        {
            break;
        }// 提交为修改提交

        change_all_need_change_status($interview_id,$job_id);// 改变一切要改变的状态

        total_score($interview_id); // 合计分数

        $interview_info = get_interview_info_from_id($interview_id);
        $player_info = get_player_info_from_id($interview_info['player_id']);
        $player_status = $player_info['status']; // 获取完成评分后　选手的状态
        if($player_status == STATUS_FIRST_ONE_END)
        {
            add_job($player_info['studentid']);
        }

        break;
    default:
        die("不可能运行");
        break;
}

?>
<html>
<head>
    <script>location.href = '../welcome_judge.php';</script>
</head>
</html>

