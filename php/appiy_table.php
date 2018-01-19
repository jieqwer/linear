<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="icon"  href="../img/guan%20(2).ico">
</head>

<body>
<?php

include_once("admin.php")
?>
<div class="righttable3">


    <?php
    $num_rec_per_page=10;   // 每页显示数量
    //调用function.php文件
    include_once('../function/function.php');
    //设置字符编码
    mysql_query("set names'utf8'");
    //调用函数链接数据库服务器
    opensql('localhost','root','woainirr@1314.++','db_lzy');
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page=1;
    };
    $start_from = ($page-1) * $num_rec_per_page;
    //准备查询数据表classfiy1的mysql语句
    $sql="select * from tb_appiy limit $start_from, $num_rec_per_page";
    //返回查询结果集给$result
    $rs_result=mysql_query($sql);
    //表格头部
    echo '<table border="1" cellspacing="0" cellpadding="0"  id="tab" align="center" style="text-align:  center;position: absolute;width:1550px;height:200px;">';
    echo "<caption><h1>批次信息表</h1></caption>";
    echo "<tr>";
    echo "<th>批次名称</th>";
    echo "<th>批次ID</th>";
    echo "<th>报名开始时间</th>";
    echo "<th>报名结束时间</th>";
    echo "<th>缴费开始时间</th>";
    echo "<th>缴费结束时间</th>";
    echo "<th width='500'>专业信息</th>";
    echo "<th>缴费金额</th>";
    echo "<th>批次发布时间</th>";
    echo "<th>批次发布者（1管理/2超级管理）</th>";
    echo "<th>是否禁用（1禁用/2不禁用）</th>";
    echo '<th colspan="2" width="200">操作</th>';
    echo "</tr>";
    //循环查询数据表中的单行的信息以数组的方式返回  mysql_fetch_row($result)：从结果集中取得一行作为数组
    while($data=mysql_fetch_row($rs_result)){
        echo '<tr>';

        echo "<td>".$data[0]."</td>";
        echo "<td>".$data[1]."</td>";
        echo "<td>".$data[2]."</td>";
        echo "<td>".$data[3]."</td>";
        echo "<td>".$data[4]."</td>";
        echo "<td>".$data[5]."</td>";
        echo "<td>".$data[6]."</td>";
        echo "<td>".$data[7]."</td>";
        echo "<td>".$data[8]."</td>";
        echo "<td>".$data[9]."</td>";
        echo "<td>".$data[10]."</td>";


        echo "<td><a href='update4.php?cid=$data[1]'>";
        echo '修改';
        echo '</a></td>';
        echo "<td><a href='delete4.php?cid=$data[1]'>";
        echo '删除';
        echo '<a/></td>';

        echo '</tr>';
    }
    echo '</table>';

    ?>
    <div style="margin-top: 600px;display: block;width:1000px;height: 30px; margin-left: 500px;" class="fenye">
        <?php
        $sql = "select * from tb_appiy";//查询数据库
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

        echo "<a href='appiy_table.php?page=1'>".'首页'."</a> "; // 第一页

        echo "<a  href='appiy_table.php?page=$prev'>".'上一页'."</a> "; // 上一页


        for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='appiy_table.php?page=".$i."'>第".$i."页</a> ";
        };

        echo "<a  href='appiy_table.php?page=$next'>".'下一页'."</a> "; // 下一页
        echo "<a href='appiy_table.php?page=$total_pages'>".'末页'."</a> "; // 最后一页

        mysql_close();
        ?>
    </div>
</div>

</body>
</html>


