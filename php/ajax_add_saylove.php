<?php
include('../config/mysql_config.php');
include('email.php');
$myname = isset($_POST['myname']) && trim($_POST['myname']) != '' ? trim($_POST['myname']) : '';
$ta = isset($_POST['ta']) && trim($_POST['ta']) != '' ? trim($_POST['ta']) : '';
$email = isset($_POST['email']) && $_POST['email'] != '' ? trim($_POST['email']) : '';
$content = isset($_POST['content']) && trim($_POST['content']) != '' ? $_POST['content'] : '';
if (empty($myname) || empty($ta) || empty($content) || strlen(trim($content)) < 15 ) {
    echo '{"error":"表白检测不通过！' . (empty($myname) || empty($ta) ? '我的名字或表白对象名字不能为空！' : '') . (empty($content) || strlen(trim($content)) < 15 ? '表白内容不得少于5个汉字！' : '') . '"}';
    exit();
}
$add_time = date("Y-n-j H:i:s");
$ip = get_client_ip();
$ua = $_SERVER['HTTP_USER_AGENT'];

$time = date("Y-n-j");
$have = hkl_mysql_query("select * from lovelist where add_ip='{$ip}' and add_time like '%{$time}%' ");
if ($have[0] == 1002) {


$insert = "insert into `lovelist` set `from`='{$myname}',`to`='{$ta}',`toemail`='{$email}',`content`='{$content}',`add_time`='{$add_time}',`add_ip`='{$ip}',`add_ua`='{$ua}'";
$re = $mysqli->query($insert);
$insert_id=$mysqli->insert_id;//插入数据多得的该数据的id值
if ($re) {
    $updata = "update countlog set `num`=`num`+1 where id='1'";
    $mysqli->query($updata);
	$email_re='';
if(eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$email)){
	set_time_limit(300);
	$email_re=send_mail($email,$ta,$myname,$content,$insert_id);
}else{
	$email_re='邮箱检测未通过，邮件发送失败！';
}

    echo '{"error":"0","result":"恭喜您，表白成功！'.$email_re.'"}';
} else {
    echo '{"error":"抱歉，数据库写入失败，表白失败！"}';//.mysqli_error($mysqli);
}
}elseif ($have[0] == 1010) {
    echo '{"error":"您今天已经表白过一次了哦！"}';
} else {
    echo '{"error":"表白失败，数据库连接失败！"}';
}
?>