<?php
include('../config/mysql_config.php');
$page = isset($_GET['page']) && trim($_GET['page']) != '' ? trim($_GET['page']) : 1;//默认是第一页
$name = isset($_GET['name']) && trim($_GET['name']) != '' ? trim($_GET['name']) : '';//默认是第一页
$page_num = 10;
$page_start = ($page - 1) * $page_num;
$all_num_sql = "select * from countlog where id='1'";
$all_num_re = hkl_mysql_query($all_num_sql);
$all_num = $all_num_re[0] == 1010 ? $all_num_re[1][0]['num'] : 0;//获得总表白数量
//print_r($all_num_re);
$max_page = ceil($all_num / $page_num);//获得总页数

$sql = "select * from lovelist " . ($name != "" ? "where to='{$name}' " : '') . " order by countnum desc limit {$page_start},{$page_num}";
$re = hkl_mysql_query($sql);
if ($re[0] == 1010) {
    $json = '';
    $arr_count = count($re[1]);
    $i = 1;
    SqlString($re[1]);
    foreach ($re[1] as $row) {
        $json .= '{"id":"' . $row['id'] . '","from":"' . $row['from'] . '","to":"' . $row['to'] . '","content":"' . $row['content'] . '","add_time":"' . $row['add_time'] . '","likenum":"' . $row['likenum'] . '","review":"' . $row['review'] . '","countnum":"' . $row['countnum'] . '"}';
        if ($i++ < $arr_count) {
            $json .= ',';
        }
    }
    $json = '{"error":"0","lovelist":[' . $json . '],"page_num":"' . $page_num . '","max_page":"' . $max_page . '","page_in":"' . $page . '"}';
} elseif ($re[0] == 1002) {
    $json = '{"error":"目前还没有人表白，赶快点击上方的【我要表白】去表白吧！"}';
} else {
    $json = '{"error":"获取列表失败，数据库连接失败！！"}';
}
echo $json;

?>