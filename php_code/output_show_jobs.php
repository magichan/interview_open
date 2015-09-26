<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-19
 * Time: 上午10:51
 * 在页面中显示出所有的任务状态
 */
require_once("judge_function.php");
require_once('sql.php');
require_once('output_fns.php');
require_once('output.php');
$jobs = get_same_status_job(STATUS_WAIT);
foreach($jobs as $job )
{
    do_html_job_with_status($job);
}
?>