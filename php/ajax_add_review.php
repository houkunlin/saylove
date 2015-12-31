<?php
include('../config/mysql_config.php');
$id = isset($_POST['uid']) && trim($_POST['uid']) != '' ? trim($_POST['uid']) : 0;
$content = isset($_POST['content']) && trim($_POST['content']) != '' ? $_POST['content'] : '';
if (empty($content) || strlen(trim($content)) < 15 || $id == 0) {
    echo '{"error":"评论检测不通过，内容不得少于5个汉字！' . ($id == 0 ? '传入参数错误！' : '') . '"}';
    exit();
}

$time = date("Y-n-j");
$ip = get_client_ip();
$ua = $_SERVER['HTTP_USER_AGENT'];
$have = hkl_mysql_query("select * from reviewlog where add_ip='{$ip}' and add_time like '%{$time}%' and toid='{$id}'");
if ($have[0] == 1002) {

$add_time = date("Y-n-j H:i:s");
$insert = "insert into `reviewlog` set `toid`='{$id}',`content`='{$content}',`add_time`='{$add_time}',`add_ip`='{$ip}',`add_ua`='{$ua}'";

$re = $mysqli->query($insert);
if ($re) {


    $insert = "update `lovelist` set `review`=`review`+1,`countnum`=`countnum`+1 where id='{$id}'";
    $re = $mysqli->query($insert);

    $insert = "update `countlog` set `num`=`num`+1 where id='2'";
    $re = $mysqli->query($insert);

    echo '{"error":"0","result":"评论成功！"}';
} else {
    echo '{"error":"抱歉，数据库写入失败，评论失败！"}';//.mysqli_error($mysqli);
}
}elseif ($have[0] == 1010) {
    echo '{"error":"您今天已经为TA评论了哦！"}';
} else {
    echo '{"error":"评论失败，数据库连接失败！"}';
}
?>