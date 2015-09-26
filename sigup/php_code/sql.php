<?php
/*
 * 建立数据库的连接
 * 和队列操作中添加任务和取任务，修改任务状态的操作
 */
require_once("hong.php");
require_once("normal.php");
require_once("judge_function.php");

require_once('output.php');


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

// 添加一个任务
function add_job($student_id)
{
    $con = sql_connection();

    $current_status = get_player_status_from_player($student_id);

    switch ($current_status) {
        case STATUS_SIGUP:
            $status = STATUS_FIRST_ONE_WAIT;
            break;
        case STATUS_FIRST_ONE_END:
            $status = STATUS_FIRST_SECOND_WAIT;
            break;
        case STATUS_FIRST_PASS:
            $status = STATUS_SECOND_WAIT;
            break;
        default:
            die("add job 遭遇未知状态 ,status" . $current_status);
    }

    change_player_status($student_id, $status);

    $interview_id = make_new_interview($student_id, $status);


    $query = "INSERT  INTO job(studentid,status,interview_id) VALUE ('$student_id',$status,$interview_id)";


    $ret = mysqli_query($con, $query);

    if (!$ret) {
        die("建立任务失败" . mysqli_error($con));
    }
    mysqli_close($con);
}

function get_job_info_from_id($id)
{
    $conn = sql_connection();
    $query = "SELECT * FROM job WHERE id =" . $id;

    $ret = mysqli_query($conn, $query);
    if (!$ret) {
        die("　get_job_info_from_id 获取 job 的信息失败" . mysqli_error($con));
    }
    if (!mysqli_num_rows($ret)) {
        die("根据 id 获取　job 内容失败，未找到匹配的 job ");
    }

    $info = mysqli_fetch_assoc($ret);
    mysqli_close($conn);
    return $info;

}


// 输入　job info ,获得一个 job 中用户的信息,返回一个关联数组　
function get_in_job_player_info($job)
{
    $studentid = $job['studentid'];
    $conn = sql_connection();

    $query = "select * from player where studentid = '$studentid'";
    $ret = mysqli_query($conn, $query);

    if (!$ret) {
        die("获得一个任务中　player 的信息失败" . mysqli_error($conn));
    }
    if (!mysqli_num_rows($ret)) {
        die("获得一个任务中　player 的信息,未在 play 中找到对应的信息,studentid=" . $studentid);
    }

    $info = mysqli_fetch_assoc($ret);
    return $info;
}

// 获得具有某一特定状态的任务，返回的是一个二位数组.其二维数组是关联数组
function get_same_status_job($status)
{
    $conn = sql_connection();

    switch ($status) {
        case STATUS_WAIT :
            $query = "SELECT * FROM job WHERE status=" . STATUS_FIRST_ONE_WAIT .
                " OR status=" . STATUS_FIRST_SECOND_WAIT .
                " OR status=" . STATUS_SECOND_WAIT . " ORDER BY id ASC ";
            break;
        default:
            $query = "SELECT * FROM job WHERE status=" . $status . " ORDER BY id ASC ";
    } // 根据　状态　，按照升序提出成员

    $ret = mysqli_query($conn, $query);
    if (!$ret) {
        die("根据状态筛选　job 失败" . mysqli_error($conn));
    }

    $cout = mysqli_num_rows($ret);
    $jobs = null;

    for ($i = 0; $i < $cout; $i++) {
        $job = mysqli_fetch_assoc($ret);
        $jobs[$i] = $job;

    }// 将查询的结果放到一个二维数组中

    mysqli_close($conn);

    return $jobs;
}

function get_player_info_from_stduentid($studentid)
{
    $sql = sql_connection();

    $query = "SELECT * FROM player WHERE studentid='$studentid'";
    $ret = mysqli_query($sql, $query);

    if (!$ret) {
        die("get player info from stduentid error" . mysqli_error($sql));
    }
    mysqli_close($sql);
    return mysqli_fetch_assoc($ret);
}

function get_player_info_from_id($id)
{
    $sql = sql_connection();

    $query = "SELECT * FROM player WHERE id=$id";
    $ret = mysqli_query($sql, $query);

    if (!$ret) {
        die("get player info from $id error" . mysqli_error($sql));
    }
    mysqli_close($sql);
    return mysqli_fetch_assoc($ret);
}

function get_judge_info_from_name($name)
{
    $sql = sql_connection();

    $query = "SELECT * FROM judge WHERE name='$name'";
    $ret = mysqli_query($sql, $query);

    if (!$ret) {
        die("get judge info from name error" . mysqli_error($sql));
    }
    mysqli_close($sql);
    return mysqli_fetch_assoc($ret);
}

// 通过 id 查找　interview 中所有信息
// 返回一个　关联数组
function get_interview_info_from_id($id)
{

    $conn = sql_connection();
    $query = "select * from interview where id=$id";
    $ret = mysqli_query($conn, $query);
    if (!$ret) {
        die("通过 id 查找　interview 表中的信息失败" . mysqli_error($conn));
    }
    $info = mysqli_fetch_assoc($ret);
    mysqli_close($conn);
    return $info;


}

// 前提是　一个　job 对应一个 interview 属性
function get_interview_info_from_job_id($job_id)
{
    $conn = sql_connection();
    $query = "select * from interview where job_id=$job_id";
    $ret = mysqli_query($conn, $query);
    if (!$ret) {
        die("通过 job_d 查找　interview 表中的信息失败" . mysqli_error($conn));
    }
    $info = mysqli_fetch_assoc($ret);
    mysqli_close($conn);
    return $info;
}

// show_player 页面使用，根据　评委名和结束状态选择出　对应评委评选过的所有具有 $end_status 的结束状态的信息
// 返回　一组　interview_info

function get_interview_from_name_and_end_status($judges_name, $end_status)
{
    $judges_info = get_judge_info_from_name($judges_name);
    $judges_id = $judges_info['id'];

    $sql_conn = sql_connection();
    $query = "SELECT * FROM interview WHERE judges_id=$judges_id AND end_status=$end_status";
    $ret = mysqli_query($sql_conn, $query);
    if (!$ret) {
        die("查询评委对应的已评　interview 失败,get_interview_from_name_and_end_status ".mysqli_error($sql_conn));
    }// 查询　

    $count = mysqli_num_rows($ret);
    if($count == 0 )
    {
        mysqli_close($sql_conn);
        return null;
    }else{
        $info = null;
        for ($i = 0; $i < $count; $i++) {
            $row = mysqli_fetch_assoc($ret);
            $info[$i] = $row;
        }// 将查询的结果放到一个二维数组中
        mysqli_close($sql_conn);
        return $info;
    }

}

function get_job_info_from_interview_id($interview_id)
{
    $sql_conn = sql_connection();

    $query = "SELECT * FROM job WHERE interview_id = $interview_id ";
    $ret = mysqli_query($sql_conn,$query);
    if(!$ret)
    {
        die("get_job_info_from_interview_id error".mysqli_error($sql_conn));
    }
    $job_info = mysqli_fetch_assoc($ret);

    mysqli_close($sql_conn);
    return $job_info;

}



?>


