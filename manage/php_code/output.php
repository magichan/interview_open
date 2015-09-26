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
            <li><a href="./welcome_manage.php"><h5>所有人</h5></a></li>
            <li><a href="./interviewing_player.php"><h5>正在面试</h5></a></li>
            <li><a href="./pass_or_no_pass.php"><h5>面试未决</h5></a></li>
           <li><a href="./end_player.php"><h5>面试结果</h5></a></li>
       </ul>

    <?php
}

function do_html_top_bar($interview_name)
{
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php echo $interview_name; ?>   Intervivew</a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="./php_code/exit.php"
                       class="navbar-link">Exit</a>
                </p>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div
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
// 展示 二维数组　$players_info 中所有的　$player
// 提供　“更多信息”　的按钮
function  do_html_players_info_with_more_info($players_info)
{
if ($players_info == null )
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
                <th>状态</th>
                <th><th>
            </tr>
            <?php
            $count = count($players_info,COUNT_NORMAL); // count 的不统计二维数组的重载
            for($i=0; $i<$count; $i++ ) {

                $player_info = $players_info[$i];// 获取评分所对应的学生
                if($player_info['name']==null)
                {
                   continue;
                }// 使用 unset 只会置空，不会逸动覆盖，在这样的情况下，将置空的全部放过
                ?>
                <tr>
                    <td><?php echo $player_info['name'] ?></td>
                    <td><?php echo $player_info['studentid'] ?></td>
                    <td><?php echo change_direction_id_to_string($player_info['direction']) ?></td>
               　　　<td><?php echo change_status_to_string($player_info['status'])?></td>
                    <td><a class="btn btn-large btn-block btn-info test"
                           href="player_more_info.php?<?php echo $player_info['id']?>">更多信息</a></td>
                </tr>
                <?php

            }
            ?>
        </table>
        <?php

    }


}
// 根据　player_info $judge_info $interview_info 传入的参数，输出 一条　interview 外加　状态　和评委的信息
function do_html_form_about_player_interview_and_status($player_info,$judge_info,$interview_info)
{
$status_string = change_status_to_string($player_info['status']);
$name = $player_info['name'];
if(!$judge_info)
{
    $judge_name = "无评委";
}
else{
   $judge_name = $judge_info['name'];
}
?>
                                <table class="table table-hover">
                                 <tr>
                                <th>名字</th>　<td> <?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <th>状态</th>　<td> <?php echo $status_string; ?></td>
                            </tr>
                            <tr>
                                <th>评委</th>　<td> <?php echo $judge_name; ?></td>
                            </tr>
                            <tr>
                                <th>面试态度</th>　<td> <?php  echo $interview_info['interview_attitude'];?></td>
                            </tr>
                            <tr>
                                <th>集体态度</th>　<td> <?php  echo $interview_info['group_attitude']; ?></td>
                            </tr>
                            <tr>
                                <th>人生态度</th>　<td> <?php echo $interview_info['life_attitude']; ?></td>
                            </tr>
                            <tr>
                                <th>基础知识</th>　<td> <?php echo $interview_info['base_knowledge']; ?></td>
                            </tr>
                            <tr>
                                <th>方向知识</th>　<td> <?php echo $interview_info['direction_knowledge'];   ?></td>
                            </tr>
                            <tr>
                                <th>评价</th>　<td> <?php echo $interview_info['comment'];   ?></td>
                            </tr>
                            </table>
                            <?php
}
// 提供　player_info 的信息


function do_html_players_info_with_pass_no_pass_first_can_not_be_used($return_val)
{
?>
 <table class="table table-hover">
                            <tr>
                                <th>名字</th>
                                <th>学号</th>
                                <th>均分</th>
                                <th>More</th>
                                <th>选择</th>
                            </tr>
</table>
<?php

foreach($return_val as $key =>$value )
{


                         $average_score = $value['average_score'];
                         $player_info = get_player_info_from_id($value['player_id']);
                         $student_id = $player_info['studentid'];
                         $player_name = $player_info['name'];
                         $interview_info_one = $value['interview_info_one'];
                         $interview_info_two = $value['interview_info_two'];
                         $judge_info_one = get_judge_info_from_id($interview_info_one['judges_id']);
                         $judge_info_two = get_judge_info_from_id($interview_info_two['judges_id']);

                  ?>
                  <table class="table table-hover">
                         <tr>
                                <td><?php echo $player_name; ?></td>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $average_score; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="collapse"
                                            data-target="#first<?php echo $key; ?>">
                                        更多
                                    </button>
                                </td>
                                <td>
                                    <form name="input_first<?php echo $key; ?>" action="" method="get">
                                        <label>暂定：<input type="radio" name="status" value="wait" checked="checked"></label>
                                        <label>通过：<input type="radio" name="status" value="pass"></label>
                                        <label>不通过：<input type="radio" name="status" value="no_pass"></label>
                                        <input type="hidden"  name="player_id" value="<?php echo $player_info['id'];?>">
                                    </form>

                                </td>
                         </tr>
                  </table>
                  <div id="first<?php echo $key; ?>" class="collapse ">
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <th><?php echo $judge_info_one['name']; ?>的评价</th>
                                    <td><?php echo $interview_info_one['comment']; ?>
                                    <td>
                                </tr>
                                <tr>
                                    <th><?php echo $judge_info_two['name']; ?>的评价</th>
                                    <td><?php echo $interview_info_two['comment'];?>
                                    <td>
                                </tr>
                            </table>
                            <table class="table  table-striped table-condensed">
                                <tr>
                                    <th>评委</th>
                                    <th>均分</th>
                                    <th>面试态度</th>
                                    <th>集体态度</th>
                                    <th>人生态度</th>
                                    <th>基础知识</th>
                                    <th>方向知识</th>
                                </tr>
                                <tr>
                                    <td><?php echo $judge_info_one['name'];?></td>
                                    <td><?php echo $interview_info_one['score'];?></td>
                                    <td><?php echo $interview_info_one['interview_attitude'];?></td>
                                    <td><?php echo $interview_info_one['group_attitude'];?></td>
                                    <td><?php echo $interview_info_one['life_attitude'];?></td>
                                    <td><?php echo $interview_info_one['base_knowledge'];?></td>
                                    <td><?php echo $interview_info_one['direction_knowledge'];?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $judge_info_two['name'];?></td>
                                    <td><?php echo $interview_info_two['score'];?></td>
                                    <td><?php echo $interview_info_two['interview_attitude'];?></td>
                                    <td><?php echo $interview_info_two['group_attitude'];?></td>
                                    <td><?php echo $interview_info_two['life_attitude'];?></td>
                                    <td><?php echo $interview_info_two['base_knowledge'];?></td>
                                    <td><?php echo $interview_info_two['direction_knowledge'];?></td>
                                </tr>
                            </table>
                        </div>

                            <?php
}

}
function do_html_players_info_with_pass_no_pass_first($return_val)
{
if(!$return_val)
{
 echo "无数据";
 return ;
}
?>
 <table class="table table-hover">
                            <tr>
                                <th>名字</th>
                                <th>学号</th>
                                <th>均分</th>
                                <th>More</th>
                                <th>选择</th>
                            </tr>

<?php

foreach($return_val as $key =>$value )
{


                         $average_score = $value['average_score'];
                         $player_info = get_player_info_from_id($value['player_id']);
                         $student_id = $player_info['studentid'];
                         $player_name = $player_info['name'];

                  ?>

                         <tr>
                                <td><?php echo $player_name; ?></td>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $average_score; ?></td>
                                 <td><a class="btn btn-large btn-block btn-info test"
                           href="player_more_info.php?<?php echo $player_info['id']?>">更多信息</a></td>
                                <td>
                                    <form name="input_first<?php echo $key; ?>" action="./php_code/decide_pass_or_no_pass.php" method="post">
                                        <label>暂定：<input type="radio" name="status" value="wait" checked="checked"></label>
                                        <label>通过：<input type="radio" name="status" value="pass"></label>
                                        <label>不通过：<input type="radio" name="status" value="no_pass"></label>
                                        <input type="hidden"  name="player_id" value="<?php echo $player_info['id'];?>">
                                        <input type="hidden"  name="time" value=1 >
                                         <input type="submit" value="Submit" />
                                    </form>
                                </td>
                         </tr>
                  <?php

}
?>
</table>
<?php


}

function do_html_players_info_with_pass_no_pass_second($return_val)
{
if(!$return_val)
{
 echo "无数据";
 return ;
}
?>
 <table class="table table-hover">
                            <tr>
                                <th>名字</th>
                                <th>学号</th>
                                <th>均分</th>
                                <th>More</th>
                                <th>选择</th>
                            </tr>

<?php
foreach($return_val as $key=>$value )
{


                         $average_score = $value['score'];
                         $player_info = get_player_info_from_id($value['player_id']);
                         $student_id = $player_info['studentid'];
                         $player_name = $player_info['name'];

                  ?>

                         <tr>
                                <td><?php echo $player_name; ?></td>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $average_score; ?></td>
                                 <td><a class="btn btn-large btn-block btn-info test"
                           href="player_more_info.php?<?php echo $player_info['id']?>">更多信息</a></td>
                                <td>
                                    <form name="input_second<?php echo $key; ?>" action="./php_code/decide_pass_or_no_pass.php" method="post">
                                        <label>暂定：<input type="radio" name="status" value="wait" checked="checked"></label>
                                        <label>通过：<input type="radio" name="status" value="pass"></label>
                                        <label>不通过：<input type="radio" name="status" value="no_pass"></label>
                                        <input type="hidden"  name="player_id" value="<?php echo $player_info['id'];?>">
                                        <input type="hidden"  name="time" value= 2 >
                                        <input type="submit" value="Submit" />
                                    </form>
                                </td>
                         </tr>
                  <?php

}

?>
</table>
<?php


}
function do_html_player_info_with__($players_info)
{
if(!$players_info)
{
echo "无数据";
return ;
}
?>
 <table class="table table-hover">
                            <tr>
                                <th>名字</th>
                                <th>学号</th>
                            </tr>

<?php
foreach($players_info as $key=>$value )
{
                         $student_id = $value['studentid'];
                         $player_name = $value['name'];

                  ?>
                   <tr>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $player_name; ?></td>
                   </tr>
                  <?php
}
?>
</table>
<?php
}
?>