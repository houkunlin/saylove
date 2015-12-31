<?php
include('../config/mysql_config.php');
$id = isset($_GET['uid']) && trim($_GET['uid']) != '' ? trim($_GET['uid']) : 0;
$page = isset($_GET['page']) && trim($_GET['page']) != '' ? trim($_GET['page']) : 1;//默认是第一页
//$name = isset($_GET['name']) && trim($_GET['name']) != '' ? trim($_GET['name']) : '';//默认是第一页
$page_num = 10;
$page_start = ($page - 1) * $page_num;
$all_num_sql = "select * from lovelist where id='{$id}' ";
$all_num_re = hkl_mysql_query($all_num_sql);
$all_num = $all_num_re[0] == 1010 ? $all_num_re[1][0]['review'] : 0;//获得总评论数量
$max_page = ceil($all_num / $page_num);//获得总页数

$sql = "select * from reviewlog where toid='{$id}' order by id desc limit {$page_start},{$page_num}";
$re = hkl_mysql_query($sql);
if ($re[0] == 1010) {
    $json = '';
    $arr_count = count($re[1]);
    $i = 1;
    SqlString2($re[1]);
//    SqlString($re[1]);
    foreach ($re[1] as $row) {
   
        $json .= '{"id":"' . $row['id'] . '","toid":"' . $row['toid'] . '","content":"' . $row['content'] . '","add_time":"' . $row['add_time'] . '","ip":"' . ereg_replace("\.[0-9]{0,3}\.[0-9]{0,3}$",'.***.***', $row['add_ip']) . '"}';
        if ($i++ < $arr_count) {
            $json .= ',';
        }
    }
    $json = '{"error":"0","reviewlist":[' . $json . '],"page_num":"' . $page_num . '","max_page":"' . $max_page . '","page_in":"' . $page . '"}';
} elseif ($re[0] == 1002) {
    $json = '{"error":"还没有人评论，赶快来评论吧！"}';
} else {
    $json = '{"error":"获取列表失败，数据库连接失败！！"}';
}
echo $json;

?>