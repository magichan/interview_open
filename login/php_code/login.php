<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-20
 * Time: 上午9:52
 * 面试官登录
 */
require_once('sql.php');
require_once('judge_function.php');
session_start();

if( isset($_POST['name']) && isset($_POST['password']) ) {
    $name = $_POST['name'];
    $key = $_POST['password'];


    $ret =  judge_log($name,$key);

    if ($ret[0])
    {

        $_SESSION['valid_user'] = $name;
        if($name=='safe' || $name=='web' || $name=='operator')
        {
            ?>
            <html>
            <head>
                <script>location.href='../../manage/welcome_manage.php';</script>
            </head>
            </html>
            <?php
            exit();
        }
        ?>
        <html>
        <head>
            <script>location.href='../../interview/welcome_judge.php';</script>
        </head>
        </html>

        <?php

    }else {
        ?>
        <html>
        <head>
            <script>location.href='../login.html';</script>
        </head>
        </html>

<?php
    }
}else{
    print_r($_POST);
    echo "错误";
}
?>