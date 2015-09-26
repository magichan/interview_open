<?php
// 显示该评委评选过的所有个人
require_once("php_code/hong.php");

require_once("php_code/judge_function.php");
require_once("php_code/output.php");
require_once("php_code/sql.php");

session_start();
check_valid_user();
$_SESSION['valid_user']='safe_1';
?>
<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("所评选手") ?>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./Bootstrap, from Twitter_files/Bootstrap, from Twitter.html"><?php echo $_SESSION['valid_user']; ?> Intervivew</a>

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
                    <li class="dropdown">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle"
                           data-toggle="dropdown">排名
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                            <li><a href="#asc_first" tabindex="-1" data-toggle="tab">一面</a></li>
                            <li><a href="#asc_second" tabindex="-1" data-toggle="tab">二面</a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="first">
                        <p>
                            <?php
                $judges_name = $_SESSION['valid_user'];
                $interview_info_first_one = get_interview_from_name_and_end_status($judges_name,STATUS_FIRST_ONE_END);
                $interview_info_first_two = get_interview_from_name_and_end_status($judges_name,STATUS_FIRST_END);
                            $interviews_first = my_array_merge($interview_info_first_one,$interview_info_first_two);
                                  do_html_score_from_interviews($interviews_first);
                            ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="second">
                        <p>
                            <?php
                          $judges_name = $_SESSION['valid_user'];
                            $interviews_second= get_interview_from_name_and_end_status($judges_name,STATUS_SECOND_END);
                            do_html_score_from_interviews($interviews_second);
                          ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="asc_first">
                        <?php

                        if($interviews_first!=null)
                        {
                        usort($interviews_first, function($a, $b) {
                            $a1 = $a['score'];
                            $b1 = $b['score'];
                            $a2 = $a['base_knowledge'];
                            $b2 = $b['base_knowledge'];
                            $a3 = $a['direction_knowledge'];
                            $b3 = $b['direction_knowledge'];
                            if ($a1 == $b1 && $a2==$b2 && $a3==$b3 )
                                return 0;
                            if($a1 > $b1 )
                            {
                                return -1;
                            }elseif( $a1==$b1 && $a1>$b2){
                                return -1;
                            }elseif($a1==$b1 && $a2==$b2 && $a3>$b3){
                                return -1;
                            }else{
                                return 1;
                            }
                        });
                        }// usort 排序　，且预防　null 传入
                       do_html_score_from_interviews($interviews_first);

                        ?>
                    </div>
                    <div class="tab-pane fade" id="asc_second">
                        <?php
                        if($interviews_second!=null) {
                            usort($interviews_second, function ($a, $b) {
                                $a1 = $a['score'];
                                $b1 = $b['score'];
                                $a2 = $a['base_knowledge'];
                                $b2 = $b['base_knowledge'];
                                $a3 = $a['direction_knowledge'];
                                $b3 = $b['direction_knowledge'];
                                if ($a1 == $b1 && $a2 == $b2 && $a3 == $b3)
                                    return 0;
                                if ($a1 > $b1) {
                                    return -1;
                                } elseif ($a1 == $b1 && $a1 > $b2) {
                                    return -1;
                                } elseif ($a1 == $b1 && $a2 == $b2 && $a3 > $b3) {
                                    return -1;
                                } else {
                                    return 1;
                                }
                            });
                        }
                        do_html_score_from_interviews($interviews_second);

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