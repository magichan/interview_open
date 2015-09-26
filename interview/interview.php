<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-20
 * Time: 下午8:56
 * 生成评分表
 */


require_once("./php_code/judge_function.php");
require_once("./php_code/output.php");
require_once("./php_code/sql.php");
session_start();
check_valid_user();

$jobid = $_SERVER["QUERY_STRING"];

$name = $_SESSION['valid_user'];

$judge_info = get_judge_info_from_name($name);
$job_info = get_job_info_from_id($jobid);
$studentid = $job_info['studentid'];
$player_info = get_player_info_from_stduentid($studentid);

$flag = is_judge_busy($judge_info['id']); // 判断是否是已保存类型的，不是返回　-1,是的话，返回　对应的 job_id
$current_status = get_player_status_from_player($job_info['studentid']);



if($flag == -1)
{// 评委第一次领取选手
    switch ($current_status) {
        case STATUS_FIRST_ONE_WAIT:
            change_player_status($studentid, STATUS_FIRST_ONE_ING);
            change_job_status($jobid, STATUS_FIRST_ONE_ING);
          //  $id = make_interview($judge_info['id'], $job_info['studentid'], $jobid, STATUS_FIRST_ONE_ING);
            add_judge_to_interview($job_info,$judge_info,STATUS_FIRST_ONE_ING);
            break;
        case STATUS_FIRST_SECOND_WAIT:
            change_player_status($studentid, STATUS_FIRST_SECOND_ING);
            change_job_status($jobid, STATUS_FIRST_SECOND_ING);
            //$id = make_interview($judge_info['id'], $job_info['studentid'], $jobid, STATUS_FIRST_SECOND_ING);
            add_judge_to_interview($job_info,$judge_info,STATUS_FIRST_SECOND_ING);
            break;
        case STATUS_SECOND_WAIT:
            change_player_status($studentid, STATUS_SECOND_ING);
            change_job_status($jobid, STATUS_SECOND_ING);
            //$id = make_interview($judge_info['id'], $job_info['studentid'], $jobid, STATUS_SECOND_ING);
            add_judge_to_interview($job_info,$judge_info,STATUS_SECOND_ING);
            break;
        default:
            die("生成面试表时，遭遇未知状态,status:" . $current_status);

    }


}

$interview_info = get_interview_info_from_id($job_info['interview_id'] );

?>

<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("面试表") ?>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php echo $_SESSION['valid_user']?>  Interview</a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"
                       class="navbar-link">Exit</a>
                </p>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"><h5>面试</h5></a></li>
                    <li><a href="#"><h5>查看</h5></a></li>
                    <li><a href="#"><h5>管理</h5></a></li>
                    <li><a href="#"><h5>通知</h5></a></li>
                </ul>

            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="span9">
            <div class="hero-unit">
                <form id="Form1" action="./php_code/get_score.php" method="post" enctype="multipart/form-data" >
                    <div style="text-align: center">
                        <?php echo $player_info['name']?>的面试表格
                        <hr style="size: 50%" />
                    </div>
                    <div style="text-align: left">
                        面试态度：<input name="interview_attitude" type="text" value="
                        <?php echo $interview_info['interview_attitude']?>"/><br />
                        团队态度：<input name="group_attitude" type="text" value="
                        <?php echo $interview_info['group_attitude']?>"/><br />
                        人生态度：<input name="life_attitude" type="text" value="
                        <?php echo $interview_info['life_attitude']?>"/><br />
                        基础知识：<input name="base_knowledge" type="text" value="
                        <?php echo $interview_info['base_knowledge']?>"/><br />
                        方向知识：<input name="direction_knowledge" type="text" value="
                        <?php echo $interview_info['direction_knowledge']?>"/><br />
                        评价：<input name="comment" type="text" value="
                        <?php echo $interview_info['comment']?>"/><br />
                        <input name="job_id" type="hidden" value="<?php echo $job_info['id']?>"/><br />
                        <input type="submit" value="提交" />
                        <input type="submit" value="保存" />
                        <input type="reset" value="重置" />
                    </div>
                </form>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->

    <hr>

    <footer>
        <p>© Company 2013</p>
    </footer>

</div>
<!--/.fluid-container-->


</body>
<div></div>
<div></div>
</html>
