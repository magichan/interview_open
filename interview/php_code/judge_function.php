<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-16
 * Time: 下午12:58
 *  面试官模块常用函数
 */
// 评委登陆，成功返回 1 ，失败返回 0

require_once("hong.php");
require_once("sql.php");
function judge_log($name,$key )
{
    $sql = sql_connection();
    $query = "SELECT count(*) FROM judge WHERE name = '$name' AND password = '$key' ";
    $ret = mysqli_query($sql, $query);
    $val = mysqli_fetch_array($ret);
    return $val[0];
}

// 检查是否是一个登陆用户
function check_valid_user()
{


     if(isset($_SESSION['valid_user'])){

         ;
     }else{
         ?>
         <!DOCTYPE html>
    <!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>错误</title>

    </head>
    <body>
    <h1> 未授权访问，请登陆</h1>
    <a href="http://localhost/interview/login/login.html">登陆</a>
    </body>
    </html>
<?php
         exit();
     }

}
// 传入　judge_id ,student_id 初始化一个评分表, 并返回评分表的 id
function make_interview($judge, $studentid,$jobid,$status )
{

    if(is_judge_busy($judge))
    {
        die("还有未处理的");
    }

    $info = get_player_info_from_stduentid($studentid);
    $player = $info['id'];

    $conn =sql_connection();

    $query = "INSERT INTO interview(judges_id,player_id,job_id,status)
              VALUES (".$judge.",".$player.",".$jobid.",".$status.")";


    $ret   = mysqli_query($conn,$query);
    if(!$ret)
    {
        die("创建一个评分想失败".mysqli_error($conn));
    }
    $query = "SELECT id FROM interview WHERE judges_id =$judge AND player_id= $player AND status=$status ";
    $ret = mysqli_query($conn,$query);

    if(!$ret)
    {
        die("查询一个评分想失败".mysqli_error($conn));
    }
    mysqli_close($conn);
    $info  = mysqli_fetch_array($ret);
    return $info[0];

}
// 传入学生和状态信息，创建一个未完全的 interview 表格（缺少 judges_id）,，返回　interview 的 id
function make_new_interview($student_id,$status)
{
    $info = get_player_info_from_stduentid($student_id);
    $player_id = $info['id'];

    $conn =sql_connection();

    $query = "INSERT INTO interview(player_id,status)
              VALUES (".$player_id.",".$status.")";

    $ret   = mysqli_query($conn,$query);
    if(!$ret)
    {
        die("创建一个评分想失败".mysqli_error($conn));
    }
    $query = "SELECT id FROM interview WHERE player_id=$player_id AND status=$status";

    $ret = mysqli_query($conn,$query);


    if(!$ret)
    {
        die("查询一个评分想失败".mysqli_error($conn));
    }
    mysqli_close($conn);
    $info  = mysqli_fetch_array($ret);

    return $info[0];

}

//　传入id  判断　评委 是否繁忙，不繁忙返回　-1 繁忙返回  interviews  的值
function is_judge_busy($judge)
{
    $conn =sql_connection();

    $query = "SELECT * FROM interview WHERE judges_id=$judge
              AND  status !=".STATUS_END;


    $ret = mysqli_query($conn,$query);

    if(!$ret)
    {
        die("查询评委是否繁忙失败".mysqli_error($conn));
    }

    $count = mysqli_num_rows($ret);

    if(!$count)
    {
        return -1;
    }
    $interview_info = mysqli_fetch_assoc($ret);

    $player_id = $interview_info['player_id'];


    $player_info = get_player_info_from_id($player_id);
    $student_id = $player_info['studentid'];

    $status1 = STATUS_FIRST_ONE_END;
    $status2 = STATUS_SECOND_END;
    $status3 = STATUS_FIRST_END;
    $status4 = STATUS_END;

    $query = "SELECT * FROM job WHERE studentid='$student_id' AND status!=$status1 AND status!=$status2 AND status!=$status3 AND status!=$status4";
             $ret = mysqli_query($conn,$query);

    if(!$ret)
    {
        die("查询评委是否繁忙失败".mysqli_error($conn));
    }

    $job_info = mysqli_fetch_assoc($ret);

    mysqli_close($conn);

    return $job_info['id'];
}

//　将　未补全的　interview 补全，添加对应的　judge　信息
function add_judge_to_interview($job_info,$judge_info,$status)
{
    $sql_conn = sql_connection();

    $judges_id = $judge_info['id'];
    $interview_id = $job_info['interview_id'];
    $query = "UPDATE interview set judges_id=$judges_id, status=$status  WHERE id=$interview_id";

    $ret = mysqli_query($sql_conn,$query);
    if(!$ret)
    {
        die("add_judge_to_interview error".mysqli_error($sql_conn));
    }
    mysqli_close($sql_conn);

}

?>
