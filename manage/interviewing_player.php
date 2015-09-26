<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-24
 * Time: 上午10:21
 * 所有的正在处于面试状态的 player
 */
require_once("./php_code/judge_function.php");
require_once("./php_code/output.php");
require_once("./php_code/sql.php");
session_start();
check_valid_user()

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
                <?php
                $direction = change_direction_root_to_direction_id($_SESSION['valid_user']);
                $players_info = get_players_info_from_direction_with_interviewing($direction);
                do_html_players_info_with_more_info($players_info);
                ?>
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

