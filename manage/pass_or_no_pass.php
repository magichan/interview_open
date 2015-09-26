<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-23
 * Time: 下午1:43
 * 队长权限用于决定是否通过
 * 显示一个选手经过几个一面评分，且由谁而评
 *
 */

require_once("php_code/hong.php");
require_once("php_code/judge_function.php");
require_once("php_code/output.php");
require_once("php_code/sql.php");

session_start();

check_valid_user();

?>
<!DOCTYPE html>

<html lang="en">
<?php
$direction = change_direction_root_to_direction_id($_SESSION['valid_user']);
$return_val_one = do_score_sort_first($direction); // 提前执行，知道需要几个按钮
$count_one = count($return_val_one);

$direction = change_direction_root_to_direction_id($_SESSION['valid_user']);
$return_val_two = do_score_sort_second($direction);
$count_two = count($return_val_two);


?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>表决</title>
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
    <script type="text/javascript">
        $(function(){
            $("#btnSubmit_first").click(function(){
                 <?php
                 for($i=0; $i<$count_one; $i++ )
                 {
                 ?>
                $("form[name='input_first<?php echo $i?>']").submit();
                <?php
                 }
                 ?>
            })
        })
    </script>

</head>

<body>

<?php do_html_top_bar($_SESSION['valid_user']); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">

                    <?php do_html_sidebar() ?>
            </div>
            <!--/.well -->
        </div>


        <div class="span9">
            <div class="hero-unit">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <a href="#first_end" data-toggle="tab">
                            一面
                        </a>
                    </li>
                    <li><a href="#second_end" data-toggle="tab">二面</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="first_end">

                        <?php // do_html_players_info_with_pass_no_pass_first_can_not_be_used($return_val);?>
                        <?php
                        do_html_players_info_with_pass_no_pass_first($return_val_one);?>

                    </div>
                    <div class="tab-pane fade" id="second_end">

                        <?php
                        do_html_players_info_with_pass_no_pass_second($return_val_two);
                        ?>
                    </div>
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

