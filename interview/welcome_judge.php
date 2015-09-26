<?php

require_once("./php_code/judge_function.php");
require_once("./php_code/output.php");
require_once("./php_code/sql.php");
session_start();
check_valid_user();

?>
<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("管理者首页") ?>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php echo $_SESSION['valid_user']?>   Intervivew</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="./php_code/exit.php"
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
                    <?php do_html_sidebar() ?>
                </ul>

            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="span9">
            <div class="hero-unit">

                <?php
                $info = get_judge_info_from_name($_SESSION['valid_user']);


                $flag = is_judge_busy($info['id']);

                if ($flag != -1)
                {// 还有任务未处理
                ?>
                <p class="lead ">还有未处理的情况,请处理完。</p>
                　　
                <table class="table table-hover">
                    <tr>
                        <th>名字</th>
                        <th>学号</th>
                        <th>方向</th>
                        <th>状态</th>
                        <th class="th_test"></th>
                    </tr>
                    <?php
                    // 获得为处理任务的情况


                    $job_info = get_job_info_from_id($flag);
                    $player_info = get_in_job_player_info($job_info);

                    $name = $player_info['name'];
                    $studentid = $player_info['studentid'];
                    $direction = change_direction_id_to_string($player_info['direction']);
                    ?>
                    <tr>
                        <td><?php echo $name; ?>  </td>
                        <td><?php echo $studentid; ?> </td>
                        <td><?php echo $direction; ?> </td>
                        <td><?php echo change_status_to_string($job_info['status']); ?> </td>
                        <td><a class="btn btn-large btn-block btn-info test"
                               href="interview.php?<?php echo $job_info['id'] ?>">完成评分</a></td>
                    </tr>
                    <?php
                    }else{
                    // 处理等待人员
                    ?>
                    <table class="table table-hover">
                        <tr>
                            <th>名字</th>
                            <th>学号</th>
                            <th>方向</th>
                            <th>状态</th>
                            <th class="th_test"></th>
                        </tr>
                        <?php
                        do_html_job_with_button_by_status(STATUS_WAIT);
                        }
                        ?>

                    </table>
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