<?php 
require_once("hong.php");
require_once("sql.php");
// 修改 player 的 status
function change_player_status($studentid,$status )
{

    $sql_conn = sql_connection();
    $query = "update player set status =$status WHERE studentid='$studentid'" ;

    $info = get_player_info_from_stduentid($studentid);
    $old_status = $info['status'];
    $ret =  mysqli_query($sql_conn,$query);
    make_log($studentid,$old_status);

    if(!$ret)
    {
        die("修改用户状态".$query.mysqli_error($sql_conn));
    }
    mysqli_close($sql_conn);
}
function change_player_status_by_id($id,$status)
{
    $info = get_player_info_from_id($id);
    change_player_status($info['studentid'],$status);
}
function change_job_status($id,$status)
{
    $sql_conn = sql_connection();
    $query = "update job set status =".$status." WHERE id = ".$id;

    $ret = mysqli_query($sql_conn,$query);

    if(!$ret)
    {
        die("修改job状态 失败 ".$query.mysqli_error($sql_conn));
    }
    mysqli_close($sql_conn);
}
// 从　player 表中获得用户的状态　
function get_player_status_from_player($studentid)
{
    $sql_conn = sql_connection();
    $query_get_old_status = "select status from player WHERE studentid = '$studentid'";
    $result = mysqli_query($sql_conn,$query_get_old_status);
    $row = mysqli_fetch_array($result);
    $old_status = $row[0];
    mysqli_close($sql_conn);
    return $old_status;

}

// 记录用户状态改变
// 使用要求，在执行改变之前获得旧的状态，在执行改变后，再调用该含函数
// 建议使用在　player 表
function make_log($studentid , $old_status )
{
    $sql_conn = sql_connection();

    $new_status = get_player_status_from_player($studentid);

    $query_set_log = "INSERT INTO log (studentid,old,new)
                      VALUES ('$studentid',$old_status,$new_status)";

    $ret = mysqli_query($sql_conn,$query_set_log);

    if (!$ret) {
        die("添加日志错误".mysqli_error($sql_conn));
    }
    mysqli_close($sql_conn);
}
function change_direction_id_to_string($direction_id)
{
    switch($direction_id)
    {
        case DIRECTION_WEB:
            return "WEB组";
        case DIRECTION_SAFE:
            return "安全组";
        case DIRECTION_OPERATE:
            return "技术运营组";
        default:
            return "视觉设计组";
    }
}
function change_status_to_string($status)
{
    switch($status)
    {

        case STATUS_REGIST:
            return "注册";
            break;
        case STATUS_SIGUP:
            return "签到";
            break;
        case STATUS_FIRST_ONE_WAIT:
            return "一面一等待";
            break;
        case STATUS_FIRST_ONE_ING:
            return "一面一中";
            break;
        case
            STATUS_FIRST_SECOND_WAIT:
            return "一面二等待";
            break;
        case STATUS_FIRST_SECOND_ING:
            return "一面二中";
            break;
        case STATUS_FIRST_ONE_END:
            return "一面一结束";
            break;
        case STATUS_FIRST_END:
            return "一面结束";
            break;
        case STATUS_SECOND_WAIT:
            return "二面等待";
            break;
        case STATUS_SECOND_ING:
            return "二面进行中";
            break;
        case STATUS_SECOND_END:
            return "二面结束";
            break;
        case STATUS_FIRST_PASS:
            return "一面通过";
        case STATUS_FIRST_NO_PASS:
            return "一面未通过";
        case STATUS_SECOND_PASS:
            return "二面通过";
        case STATUS_SECOND_NO_PASS:
            return "二面未通过";
        case STATUS_END:
            return "结束";
            break;
        case STATUS_WAIT:
            return "等待";
            break;
        default:
            return "未知状态";
    }
}
function change_all_need_change_status($interview_id,$job_id)
{
    $info = get_interview_info_from_id($interview_id);


    $player_id =  $info['player_id'];
    $current_status = $info['status'];



    switch($current_status)
    {
        case STATUS_FIRST_ONE_ING:

            change_job_status($job_id,STATUS_FIRST_ONE_END);
            change_player_status_by_id($player_id,STATUS_FIRST_ONE_END);
            $end_status = STATUS_FIRST_ONE_END;
            break;
        case STATUS_FIRST_SECOND_ING:
            change_job_status($job_id,STATUS_FIRST_END);
            change_player_status_by_id($player_id,STATUS_FIRST_END);
            $end_status = STATUS_FIRST_END;
            break;
        case STATUS_SECOND_ING:
            change_job_status($job_id,STATUS_SECOND_END);
            change_player_status_by_id($player_id,STATUS_SECOND_END);
            $end_status = STATUS_SECOND_END;
            break;
        default:
            die("change_all_need_change_status 遭遇未知状态 status=".$current_status);
    }// 更改　job 和　player 的状态　

    $conn = sql_connection();
    $query_change_interview_status = "UPDATE interview SET status=".STATUS_END.
        ",end_status=$end_status WHERE id=$interview_id";


    $ret = mysqli_query($conn,$query_change_interview_status);
    if(!$ret)
    {
        die("改变 interview 的状态　失败".mysqli_error($conn));
    }// 改变　interview status 为 STATUS_END

     mysqli_close($conn);

}


// 在评分结束后，立即合计分数
function total_score($interview_id)
{

    $interview_info = get_interview_info_from_id($interview_id);

    $interview_score = $interview_info['interview_attitude'];
    $group_score = $interview_info['group_attitude'];
    $life_score = $interview_info['life_attitude'];
    $base_score = $interview_info['base_knowledge'];
    $direction_score = $interview_info['direction_knowledge'];// 分数

    $interview_weight = 0.1;
    $group_weight = 0.1;
    $life_weight = 0.2;
    $base_weight = 0.4;
    $direction_weight = 0.2;//分数权值

    $total_score = $interview_score*$interview_weight+
        $group_score*$group_weight+$life_score*$life_weight+
        $base_score*$base_weight+$direction_score*$direction_weight;// 计算总分


    $sql_conn = sql_connection();
    $query = "UPDATE interview set score=$total_score WHERE id=$interview_id";
    $ret = mysqli_query($sql_conn,$query);
    if(!$ret)
    {
        die("合计分数失败".mysqli_error($sql_conn));
    }
    mysqli_close($sql_conn); // 插入成绩

}

function  my_array_merge($a ,$b )
{
    $a_count = count($a);
    $b_count = count($b);

    $var = null;
    for($i=0 ; $i<$a_count; $i++ )
    {
        $var[$i] = $a[$i];
    }

    for(;$i<$a_count+$b_count;$i++)
    {
        $var[$i] = $b[$i-$a_count];
    }
    return $var;
}
// 将　方向的名字转换为对应的 int 类型
function change_direction_root_to_direction_id($direction_name)
{
    switch($direction_name)
    {
        case "root" : return 0;
        case "safe" : return 1;
        case "web" : return 2;
        case "operator": return 3;
        default : return 4;
    }
}
// 选出该方向所有已经结束面试的 interview 分类，然后计算排名，返回一个　均分， interview_id player_id 组合起来的，降序排列的　数组
// 返回一个 average_score player_id interview_info_one interview_info_two组成的二维数组
function do_score_sort_first($direction )
{
    $sql_conn = sql_connection();
    $status_first_end = STATUS_FIRST_END;
    $status_first_one_end = STATUS_FIRST_ONE_END;


    $query = "select * from interview, player  where interview.player_id=player.id AND player.status=$status_first_end   AND end_status=$status_first_end AND direction=$direction ORDER BY interview.id desc";// 按照降序取出具有end_status的　interview 列
    $ret = mysqli_query($sql_conn, $query);
    if (!$ret) {
        die("do_score_sort_first error" . mysqli_error($sql_conn));
    }
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
        return null;
    }//　判断是否有数据
    $interviews_one = null;
    for ($i = 0; $i < $count; $i++) {
        $interviews_one[$i] = mysqli_fetch_assoc($ret);
    }// 将上一个　sql 语句　查找出的数据放到　$interviews_one 中

    $query = "SELECT * FROM interview WHERE end_status = $status_first_one_end AND player_id
IN (select player_id from interview, player  where interview.player_id=player.id  AND player.status=$status_first_end  AND end_status=$status_first_end AND direction=$direction  ) ORDER BY id DESC ";

    $ret = mysqli_query($sql_conn, $query);
    if (!$ret)
    {
        die("do_score_sort_first query ues in error ".mysqli_error($sql_conn));
    }
    $interviews_two = null;
    $count = mysqli_num_rows($ret);
    for($i=0; $i < $count; $i++ )
    {
        $interviews_two[$i] = mysqli_fetch_assoc($ret);
    }


    $return_val = null;
    $count = count($interviews_two);
    for($i=0; $i<$count; $i++ )
    {
        $average_score = ($interviews_two[$i]['score']+$interviews_one[$i]['score'])/2;
        $player_id = $interviews_two[$i]['player_id'];
        $return_val[$i] = array('average_score'=>$average_score,'player_id'=>$player_id,'interview_info_one'=>$interviews_one[$i],'interview_info_two'=>$interviews_two[$i]);
    }// 构建返回数组 ，由 average_score player_id interview_info_one interview_info_two 构成

    usort($return_val,function($a,$b){
        return  $a['average_score']>$b['average_score']?-1:1;
    });// 由高到低排序

    return $return_val;

}
// 因为这面试一次，所以只需要将 interview 按由高到低返回
function do_score_sort_second($direction )
{
    $sql_conn = sql_connection();
    $status_second_end = STATUS_SECOND_END;
    $query = "select * from interview, player  where interview.player_id=player.id AND end_status=$status_second_end AND direction=$direction ORDER BY interview.id desc";


    $ret = mysqli_query($sql_conn, $query);
    if (!$ret) {
        die("do_score_sort_second error" . mysqli_error($sql_conn));
    }
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
        return null;
    }//　判断是否有数据

    $interviews_second = null;
    for ($i = 0; $i < $count; $i++) {

        $interviews_second[$i] = mysqli_fetch_assoc($ret);
    }// 将上一个　sql 语句　查找出的数据放到　$interviews_one 中


    return $interviews_second;

}



?>
