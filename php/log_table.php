<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="icon"  href="../img/guan%20(2).ico">
</head>

<body>
<?php

include_once("admin.php");
   include_once('../function/function.php');
    //设置字符编码
    mysql_query("set names'utf8'");
    //调用函数链接数据库服务器
    opensql('localhost','root','woainirr@1314.++','db_lzy');

    $sqlinte="select distinct(lo_message) from tb_log";
    $resultinte=mysql_query($sqlinte);
    while ($node=mysql_fetch_array($resultinte)){
        $intes[]=$node['lo_message'];
    }

?>
<?php

echo '<div class="righttable3">';
  echo  "<form method='get'  action='log_table.php'>";
    echo '<select name="lo_message">';

    foreach ($intes as $value){
        echo "<option value='$value'";
        if(!empty($_GET['lo_message']) and $value==$_GET['lo_message']){
            echo "selected";
        }
        echo "> $value </option>";
    }


   echo  '</select>';
   echo '<input type="submit" value="筛选">';
    echo '</form>';

    ?>
    <?php


    $num_rec_per_page=10;   // 每页显示数量
    //调用function.php文件
    include_once('../function/function.php');
    //设置字符编码
    mysql_query("set names'utf8'");
    //调用函数链接数据库服务器
    opensql('localhost','root','woainirr@1314.++','db_lzy');

if(empty($_POST['text'])){
    $text='';
}
else{
    $text= $_POST['text'];
}

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        if($text>0&&$text<=100){
            $page=$text;
        }else{
            $page=1;
        }
    };

    $start_from = ($page-1) * $num_rec_per_page;
    //准备查询数据表classfiy1的mysql语句
    if(!empty($_GET['lo_message'])){
        $lo_message=$_GET['lo_message'];
        $sqlnum="select * from tb_log where lo_message='$lo_message' limit $start_from, $num_rec_per_page";
        $sql="select * from tb_log where lo_message='$lo_message'";
    }else{
        $sqlnum="select * from tb_log  limit $start_from, $num_rec_per_page";
        $sql="select * from tb_log ";
    }

    //返回查询结果集给$result
    $rs_result = mysql_query ($sqlnum);
    //表格头部
    echo '<table border="1" cellspacing="0" cellpadding="0"  id="tab" align="center" style="text-align:  center;position: absolute;width:1550px;height:200px;">';
    echo "<caption><h1>登录信息表</h1></caption>";
    echo "<tr>";
    echo "<th>日志编号</th>";
    echo "<th>用户（1管理/2超级管理）</th>";
    echo "<th>用户名</th>";
    echo "<th>登录是否成功</th>";
    echo "<th>发生时间</th>";
    echo '<th >操作</th>';
    echo "</tr>";
    //循环查询数据表中的单行的信息以数组的方式返回  mysql_fetch_row($result)：从结果集中取得一行作为数组
    while($data=mysql_fetch_row($rs_result)){
        echo '<tr>';

        echo "<td>".$data[0]."</td>";
        echo "<td>".$data[1]."</td>";
        echo "<td>".$data[2]."</td>";
        echo "<td>".$data[3]."</td>";
        echo "<td>".$data[4]."</td>";


        echo "<td><a href='delete5.php?cid=$data[0]'>";
        echo '删除';
        echo '<a/></td>';

        echo '</tr>';
    }
    echo '</table>';


   echo '<div style="margin-top: 600px;display: block;width: 1100px;height: 30px; margin-left: 350px;" class="fenye">' ;


    $rs_result = mysql_query ($sql);

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
if($page!=1){
        if(!empty($_GET['lo_message'])){
        echo "<a href='log_table.php?page=1&lo_message=$lo_message'>首页</a> "; // 第一页
        echo "<a  href='log_table.php?page=$prev&lo_message=$lo_message'>上一页</a> "; // 上一页
    }else{
            echo "<a href='log_table.php?page=1'>首页</a> "; // 第一页
            echo "<a  href='log_table.php?page=$prev'>上一页</a> "; // 上一页
        }

    }


    for ($i=1; $i<=$total_pages; $i++) {
    if(!empty($_GET['lo_message'])) {
        echo "<a href='log_table.php?page=$i&lo_message=$lo_message'>";
        echo "第" . $i . "页";
        echo "</a> ";
    }else{
        echo "<a href='log_table.php?page=$i'>";
        echo "第" . $i . "页";
        echo "</a> ";
    }

    };


    if($page!= $total_pages){
    if(!empty($_GET['lo_message'])) {
        echo "<a  href='log_table.php?page=$next&lo_message=$lo_message'>下一页</a> "; // 下一页
        echo "<a href='log_table.php?page=$total_pages&lo_message=$lo_message'>末页</a> "; // 最后一页
    }else{
        echo "<a  href='log_table.php?page=$next'>下一页</a> "; // 下一页
        echo "<a href='log_table.php?page=$total_pages'>末页</a> "; // 最后一页
    }
    }

    echo "<form method='post'  action='log_table.php'><input type='text'autofocus='autofocus' style='width: 40px;margin-left:8px;margin-top:10px;float: left;background: white;border-radius:10px  0 0 10px;height:25px;color: #3ed;border: 1px solid #3ed' name='text'><input type='submit'value='跳转' style='width: 40px;text-align:center;float: left;background:#3ed;border-radius:0 10px 10px 0;margin-top:10px;color: white;height:25px;' /></form>";

    echo "<a style='width: 100px;'>这是第";
    echo $page."页</a> "; // 最后一页
    mysql_close();

        echo " </div>";
    ?>
</div>




<script type="text/javascript">


</script>

</body>
</html>


