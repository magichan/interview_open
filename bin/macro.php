<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-10-10
 * Time: 下午8:00
 * 定义统一的宏，全部引用该文件
 * $interview_attitude
 * $group_attitude
 * $life_attitude
 * $base_knowledge
 * $direction_knowledge

 $row['interview_attitude']
 $row['group_attitude']
 $row['life_attitude']
 $row['base_knowledge']
 $row['direction_knowledge']
 */
//
////
define("HOST","**");
define("USER","**");
define("PASSWORD","***");
// //远程测试数据库

define("DATABASE_NAME","***");

define("STATUS_SIGN_UP",1); //注册
define("STATUS_SIGN_IN",2); // 登陆

define("STATUS_FIRST_ONE_WAIT",3);
define("STATUS_FIRST_ONE_ING",4);
define("STATUS_FIRST_ONE_END",5);// 一面一
define("STATUS_FIRST_SECOND_WAIT",6);
define("STATUS_FIRST_SECOND_ING",7);
define("STATUS_FIRST_END",8);// 一面二
define("STATUS_SECOND_WAIT",9);
define("STATUS_SECOND_ING",10);
define("STATUS_SECOND_END",11);//二面


define("STATUS_FIRST_PASS",12);
define("STATUS_FIRST_NO_PASS",13);// 一面
define("STATUS_SECOND_NO_PASS",14);
define("STATUS_SECOND_PASS",15);//二面





define("STATUS_WAIT",16); // 等待
define("STATUS_END",17);// 结束


define("DIRECTION_SAFE",1);
define("DIRECTION_WEB",2);
define("DIRECTION_OPERATE",3);
define("DIRECTION_ART",4);// 分组

define("SAVE",1);
define("END",2);
?>
