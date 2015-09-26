<?php
require_once("sql.php");

// 测试 用户  是否存在
// 存在 返回  0
// 不存在 返回 1
 function test_if_exist( $studentid )
 { 
 	 $sql_conn = sql_connection();

	 $query = "select *  from player where studentid ='$studentid' " ;
	 $result =  mysqli_query($sql_conn,$query);

	 if(!$result){
		 die("Valid result!");
	 }
	 $row = mysqli_fetch_row($result);

	 mysqli_close($sql_conn);
	 if($row)
		 return 0;
	 else{
		 return 1;
	 }
 }
// 判断状态是否时　注册或是一面通过
function test_if_ok($student_id)
{


	$info = get_player_info_from_stduentid($student_id);
	switch ($info['status']) {
		case STATUS_REGIST:
			return 0;
		case STATUS_FIRST_PASS:
			return 0;
		default :
			return 1;
	}

}

// 签到情况下改变状态,针对一面开始和二面开始
function regist_change_player_status($studentid)
{


	$info = get_player_info_from_stduentid($studentid);

	switch($info['status'])
	{
		case STATUS_REGIST:
			change_player_status($studentid,STATUS_SIGUP);
			break;
		case STATUS_FIRST_PASS:
			change_player_status($studentid,STATUS_FIRST_PASS);
			break;
		default:
			die("regist_change_player_status 遇到未知状态");
	}


}


?>