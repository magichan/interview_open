<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-19
 * Time: 上午10:55
 */
require_once('sql.php');
require_once('normal.php');


function do_html_header($title) {
    // print an HTML header
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://apps.bdimg.com/libs/bootstrap/2.3.2/css/bootstrap.css" rel="stylesheet">
        <link href="http://apps.bdimg.com/libs/bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="http://apps.bdimg.com/libs/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }

            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }

            .test {
                width: 120px;
                height: inherit;
            }

            .th_test {
                width: 120px;
                height: inherit;
            }

        </style>

    </head>
    <?php
}


// 输入 job info 输出一个　job 列表



function do_html_job_with_status($job)
{
    $info = get_in_job_player_info($job);

    $studentid = $info['studentid'];
    $name      = $info['name'];
    $direction = change_direction_id_to_string($info['direction']);

    ?>
    <tr>
        <td><?php echo $name;?>  </td>
        <td><?php echo $studentid;?> </td>
        <td><?php echo $direction;?> </td>
        <td><?php echo change_status_to_string($job['status']);?> </td>
    </tr>
    <?php


}
function do_html_job_with_button_by_status($status)
{
    $jobs = get_same_status_job($status);
    foreach($jobs as $job )
    {
        $info = get_in_job_player_info($job);

        $studentid = $info['studentid'];
        $name      = $info['name'];
        $direction = change_direction_id_to_string($info['direction']);

        ?>
        <tr>
            <td><?php echo $name;?>  </td>
            <td><?php echo $studentid;?> </td>
            <td><?php echo $direction;?> </td>
            <td><?php echo change_status_to_string($job['status']);?> </td>
            <td><a class="btn btn-large btn-block btn-info test"
                   href="interview.php?<?php echo $job['id']?>">面试</a></td>
        </tr>
        <?php
    }

}

function do_html_sidebar()
{
    ?>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="./welcome_judge.php"><h5>面试</h5></a></li>
        <li><a href="./show_player.php"><h5>查看已评</h5></a></li>
        <li><a href="./manage.php"><h5>我的管理</h5></a></li>
    </ul>
    <?php
}

function  do_html_score_from_interviews($interviews)
{

if ($interviews == null )
{
    ?>
    无记录
    <?php
}else
{
?>
<table class="table table-hover">
    <tr>
        <th>名字</th>
        <th>学号</th>
        <th>方向</th>
        <th>面试态度</th>
        <th>集体态度</th>
        <th>人生态度</th>
        <th>基础知识</th>
        <th>方向知识</th>
        <th>总分</th>
        <th>评价</th>
    </tr>
    <?php
    $count = count($interviews,COUNT_NORMAL); // count 的不统计二维数组的重载
    for($i=0; $i<$count; $i++ ) {
        $row = $interviews[$i];// 获取一组评分
        $player_info = get_player_info_from_id($row['player_id']);// 获取评分所对应的学生

        ?>
        <tr>

            <td><?php echo $player_info['name'] ?></td>
            <td><?php echo $player_info['studentid'] ?></td>
            <td><?php echo change_direction_id_to_string($player_info['direction']) ?></td>
            <td><?php echo $row['interview_attitude'] ?></td>
            <td><?php echo $row['group_attitude'] ?></td>
            <td><?php echo $row['life_attitude'] ?></td>
            <td><?php echo $row['base_knowledge'] ?></td>
            <td><?php echo $row['direction_knowledge'] ?></td>
            <td><?php echo $row['score'] ?></td>
            <td><?php echo $row['comment'] ?></td>

        </tr>
         <?php

    }
    ?>
    </table>
    <?php

}

}
function do_html_score_from_interviews_for_change($interviews)
{
    if ($interviews == null )
    {
        ?>
        无记录
        <?php
    }else
    {
        ?>
        <table class="table table-hover">
            <tr>
                <th>名字</th>
                <th>学号</th>
                <th>方向</th>
                <th>面试态度</th>
                <th>集体态度</th>
                <th>人生态度</th>
                <th>基础知识</th>
                <th>方向知识</th>
                <th>总分</th>
                <th>评价</th>
                <th><th>
            </tr>
            <?php
            $count = count($interviews,COUNT_NORMAL); // count 的不统计二维数组的重载
            for($i=0; $i<$count; $i++ ) {
                $row = $interviews[$i];// 获取一组评分
                $player_info = get_player_info_from_id($row['player_id']);// 获取评分所对应的学生
                $job_info = get_job_info_from_interview_id($row['id']);

                ?>
                <tr>
                    <td><?php echo $player_info['name'] ?></td>
                    <td><?php echo $player_info['studentid'] ?></td>
                    <td><?php echo change_direction_id_to_string($player_info['direction']) ?></td>
                    <td><?php echo $row['interview_attitude'] ?></td>
                    <td><?php echo $row['group_attitude'] ?></td>
                    <td><?php echo $row['life_attitude'] ?></td>
                    <td><?php echo $row['base_knowledge'] ?></td>
                    <td><?php echo $row['direction_knowledge'] ?></td>
                    <td><?php echo $row['score'] ?></td>
                    <td><?php echo $row['comment'] ?></td>
                    <td><a class="btn btn-large btn-block btn-info test"
                           href="change_interview.php?<?php echo $job_info['id']?>">修改</a></td>
                </tr>
                <?php

            }
            ?>
        </table>
        <?php

    }

}

function do_html_URL($url, $name) {
    // output URL as link and br
    ?>
    <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
    <?php
}


?>