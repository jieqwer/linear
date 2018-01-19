<meta charset="UTF-8">

<?php
$num_rec_per_page=10;   // 每页显示数量
mysql_connect('localhost','root','123456');  // 数据库连接
mysql_select_db('db_fen');  // 数据库名
mysql_query("set names 'utf8'");
    if (isset($_GET["page"])) {
            $page = $_GET["page"];
    } else {
        $page=1;
    };
    echo $page;
$start_from = ($page-1) * $num_rec_per_page;
$sql = "select * from tb_id limit $start_from, $num_rec_per_page";//从第$start_from取$num_rec_per_page条数据
$rs_result = mysql_query ($sql); // 查询数据
?>
<table>
    <tr><td>ID</td><td>name</td></tr>
    <?php
    while ($row = mysql_fetch_assoc($rs_result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <?php
    };
    ?>
</table>
<?php
$sql = "select * from tb_id";//查询数据库
$rs_result = mysql_query($sql); //查询数据
$total_records = mysql_num_rows($rs_result);  // 统计总共的记录返回条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数=总共的记录条数/每页显示数量
if($page==1){
    $prev=1;
}else{
    $prev=$page-1;
}
if($page==$total_pages){
    $next=$total_pages;
}else{
    $next=$page+1;
}


echo "<a href='fenye.php?page=1'>".'首页'."</a> "; // 第一页

echo "<a  href='fenye.php?page=$prev'>".'上一页'."</a> "; // 上一页


for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='fenye.php?page=".$i."'>第".$i."页</a> ";
};

echo "<a  href='fenye.php?page=$next'>".'下一页'."</a> "; // 下一页
echo "<a href='fenye.php?page=$total_pages'>".'末页'."</a> "; // 最后一页

echo $page;
echo $prev;

mysql_close();
?>

