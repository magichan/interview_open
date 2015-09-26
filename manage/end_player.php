<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-24
 * Time: 上午10:21
 * 结束面试，但仍然没有表决是否通过的　player
 */
require_once("./php_code/judge_function.php");
require_once("./php_code/output.php");
require_once("./php_code/sql.php");

session_start();
check_valid_user();

?>
<!DOCTYPE html>
<!-- saved from url=(0065)http://docs.bootcss.com/bootstrap-2.3.2/docs/examples/fluid.html# -->
<html lang="en">
<?php do_html_header("面试未决") ?>
<body>

<?php do_html_top_bar($_SESSION['valid_user']); ?>
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
                        <a href="#first_pass" data-toggle="tab">
                            一面通过
                        </a>
                    </li>
                    <li><a href="#second_pass" data-toggle="tab">二面通过</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="first_pass">
                        <?php
                        $direction = change_direction_root_to_direction_id($_SESSION['valid_user']);
                        $new = STATUS_FIRST_PASS;
                        $new1 = STATUS_SECOND_END;
                        $new2 = STATUS_SECOND_NO_PASS;
                        $new3 = STATUS_SECOND_ING;
                        $new4 = STATUS_SECOND_WAIT;
                        $new5 = STATUS_SECOND_PASS;
                        $sql_conn = sql_connection();

                        $query = "select * from player where direction=$direction AND ( status=$new OR status=$new1 OR status=$new2 OR status=$new3 OR status=$new4 OR status=$new5)";



                        $ret = mysqli_query($sql_conn, $query);
                        if (!$ret) {
                            die("get_player_info_from status error" . mysqli_error($sql_conn));
                        }
                        $count = mysqli_num_rows($ret);
                        if (!$count) {
                            return null;
                        }
                        $players_info = null;
                        for ($i = 0; $i < $count; $i++) {
                            $players_info[$i] = mysqli_fetch_assoc($ret);
                        }
                        mysqli_close($sql_conn);

                        do_html_player_info_with__($players_info);

                        ?>
                    </div>

                    <div class="tab-pane fade" id="second_pass">

                        <?php
                        $new = STATUS_SECOND_PASS;
                        $players_info = get_players_info_from_status($new);
                        do_html_player_info_with__($players_info);

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
