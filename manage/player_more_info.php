<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-24
 * Time: 上午11:15
 * 根据接受过来的 player_id 显示选手的所有信息
 */
require_once("./php_code/judge_function.php");
require_once("./php_code/output.php");
require_once("./php_code/sql.php");
session_start();
check_valid_user();




$player_id = $_SERVER["QUERY_STRING"];


$player_info = get_player_info_from_id($player_id);
$interviews_info = get_interviews_info_from_player_id($player_info['id']);

$flag_first_one = 0 ;
$flag_first_two = 0 ;
$flag_second = 0;
$count = count($interviews_info, COUNT_NORMAL);
if(!$count)
{
    // 如果没有找不到，那么就不需要做任何操作

}else {

    switch ($count) {
        case 1:
            $flag_first_one = 1;
            break;
        case 2:
            $flag_first_two = 1;
            $flag_first_one = 1;
            break;
        case 3:
            $flag_first_two = 1;
            $flag_first_one = 1;
            $flag_second = 1;
            break;
        default:
            die("player_more_info 中　找到关于这个选手多余三条的 interview 信息　");
    }//　根据找到的 interview　的个数，将　一面一，一面二，二面二　的 flag 做标志，以便输出
}

?>
<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("更多信息") ?>
<body>

<?php  do_html_top_bar($_SESSION['valid_user']); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <?php do_html_sidebar() ?>
                </ul>

            </div>
            <!--/.well -->
        </div>


        <div class="span9">
            <div class="hero-unit">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <a href="#first_one" data-toggle="tab">
                           一面一
                        </a>
                    </li>
                    <li><a href="#first_two" data-toggle="tab">一面二</a></li>
                    <li><a href="#second" data-toggle="tab">二面</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="first_one">
                           <?php
                            if(!$flag_first_one) {


                                echo "处于报名状态";
                            }else{

                                $interview_info = $interviews_info[0];// 一面一肯定是第一个
                                $judge_info = get_judge_info_from_id($interview_info['judges_id']);
                            do_html_form_about_player_interview_and_status($player_info,$judge_info,$interview_info);

                            }
                            ?>

                    </div>
                    <div class="tab-pane fade" id="first_two">
                        <?php

                        if(!$flag_first_two) {
                            echo "处于一面一";
                        }else{


                            $interview_info = $interviews_info[1];// 一面二肯定是第二个
                            if($interview_info['judges_id']==null)
                            {
                                $judge_info = null;
                            }else{
                                $judge_info = get_judge_info_from_id($interview_info['judges_id']);
                            }// 如果 judge_id 为　-1 ,则说明还在等待队列中特殊处理

                            do_html_form_about_player_interview_and_status($player_info,$judge_info,$interview_info);

                        }
                        ?>
                    </div>
                    <div class="tab-pane fade" id="second">
                        <?php
                        if(!$flag_second)
                        {
                            echo "处于一面";
                        }else{

                            $interview_info = $interviews_info[2];// 一面一肯定是第一个
                            $judge_info = get_judge_info_from_id($interview_info['judges_id']);
                            do_html_form_about_player_interview_and_status($player_info,$judge_info,$interview_info);
                        }
                        ?>
                    </div>

                </div>
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

