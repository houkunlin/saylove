<?php
include('../config/mysql_config.php');
$id = isset($_GET['uid']) && trim($_GET['uid']) != '' ? trim($_GET['uid']) : 0;
//print_r($_GET);
if ($id == 0) {

    echo '{"error":"传入参数错误！"}';
    exit();
}
$time = date("Y-n-j");
$ip = get_client_ip();
$ua = $_SERVER['HTTP_USER_AGENT'];
$have = hkl_mysql_query("select * from likenumlog where add_ip='{$ip}' and add_time like '%{$time}%' and toid='{$id}'");
if ($have[0] == 1002) {
    if ($id != 0) {
        $add_time = date("Y-n-j");
        $ua = $_SERVER['HTTP_USER_AGENT'];

        $insert = "update `lovelist` set `likenum`=`likenum`+1,`countnum`=`countnum`+1 where id='{$id}'";
        $re = $mysqli->query($insert);//修改该人点赞数目


        if ($re) {
            $insert2 = "update `countlog` set `num`=`num`+1 where id='3'";
            $re2 = $mysqli->query($insert2);//修改总点赞数目

            $insert3 = "insert into likenumlog set toid='{$id}',add_time='{$add_time}',add_ip='{$ip}',add_ua='{$ua}'";
            $re3 = $mysqli->query($insert3);//添加点赞记录

            echo '{"error":"0","result":"点赞成功！"}';
        } else {
            echo '{"error":"抱歉，数据库写入失败，点赞失败！"}';//.mysqli_error($mysqli);
        }

    } else {
        echo '{"error":"点赞失败，传入参数错误！"}';
    }
} elseif ($have[0] == 1010) {
    echo '{"error":"您今天已经为TA点赞了哦！"}';
} else {
    echo '{"error":"点赞失败，数据库连接失败！"}';
}
?>