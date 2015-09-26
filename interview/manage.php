<?php


require_once("php_code/hong.php");

require_once("php_code/judge_function.php");
require_once("php_code/output.php");
require_once("php_code/sql.php");

session_start();
check_valid_user();

?>
<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("修改") ?>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php echo $_SESSION['valid_user'];?>  Interview</a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="http://localhost/interview/php_code/exit.php"
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
                <?php do_html_sidebar() ?>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->
        <div class="span9">
            <div class="hero-unit">

                <ul id="myTab" class="nav nav-tabs">

                    <li class="active">
                        <a href="#first" data-toggle="tab">
                            一面
                        </a>
                    </li>

                    <li><a href="#second" data-toggle="tab">二面</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="first">
                        <p>
                            <?php
                            $judges_name = $_SESSION['valid_user'];
                            $interview_info_first_one = get_interview_from_name_and_end_status($judges_name,STATUS_FIRST_ONE_END);
                            $interview_info_first_two = get_interview_from_name_and_end_status($judges_name,STATUS_FIRST_END);
                            $interviews_first = my_array_merge($interview_info_first_one,$interview_info_first_two);
                            do_html_score_from_interviews_for_change($interviews_first);
                            ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="second">
                        <p>
                            <?php
                            $judges_name = $_SESSION['valid_user'];
                            $interviews_second= get_interview_from_name_and_end_status($judges_name,STATUS_SECOND_END);
                            do_html_score_from_interviews_for_change($interviews_second);
                            ?>
                        </p>
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