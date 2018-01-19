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

$sqlinte="select distinct(me_major) from tb_message";
$resultinte=mysql_query($sqlinte);
while ($node=mysql_fetch_array($resultinte)){
    $intes[]=$node['me_major'];
}

?>

<div class="righttable2">
    <form method="get" action="message_table.php">
        <select name="me_major">
            <?php
            foreach ($intes as $value){
                echo "<option value='$value'";
                if(!empty($_GET['me_major']) and $value==$_GET['me_major']){
                    echo "selected";
                }
                echo "> $value </option>";
            }

            ?>

        </select>
        <input type="submit" value="筛选">
    </form>


    <?php
    $num_rec_per_page=6;   // 每页显示数量
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
    if(!empty($_GET['me_major'])){
        $me_major=$_GET['me_major'];
        $sqlnum="select * from tb_message where me_major='$me_major' limit $start_from, $num_rec_per_page";
        $sql="select * from tb_message where me_major='$me_major'";
    }else{
        $sqlnum="select * from tb_message limit $start_from, $num_rec_per_page";
        $sql="select * from tb_message ";
    }

    //返回查询结果集给$result
    $rs_result = mysql_query ($sqlnum);
    //表格头部
    echo '<table border="1" cellspacing="0" cellpadding="0" id="tab" align="center" style="text-align:center;position: absolute;width:1520px;height:200px;">';
    echo "<caption><h1>报名信息表</h1></caption>";
    echo "<tr>";
    echo "<th>身份证号</th>";
    echo "<th>姓名</th>";
    echo "<th>性别</th>";
    echo "<th>名族</th>";
    echo "<th>政治面貌</th>";
    echo "<th>毕业城市</th>";
    echo "<th>毕业学校</th>";
    echo "<th>生源类别</th>";
    echo "<th >专业</th>";
    echo "<th>本人手机号</th>";
    echo "<th>QQ</th>";
    echo "<th>目前所在地</th>";
    echo "<th>目前工作状态</th>";
    echo "<th>家长姓名</th>";
    echo "<th>家长电话</th>";
    echo "<th>邮寄地址</th>";
    echo "<th>邮编</th>";
    echo "<th>收件人姓名</th>";
    echo "<th>收件人电话</th>";
    echo "<th>考生ID</th>";
    echo "<th>批次ID</th>";
    echo '<th colspan="2" width="100">操作</th>';
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
        echo "<td>".$data[11]."</td>";
        echo "<td>".$data[12]."</td>";
        echo "<td>".$data[13]."</td>";
        echo "<td>".$data[14]."</td>";
        echo "<td>".$data[15]."</td>";
        echo "<td>".$data[16]."</td>";
        echo "<td>".$data[17]."</td>";
        echo "<td>".$data[18]."</td>";
        echo "<td>".$data[19]."</td>";
        echo "<td>".$data[20]."</td>";
        echo "<td><a href='update3.php?cid=$data[0]'>";
        echo '修改';
        echo '</a></td>';
        echo "<td><a href='delete3.php?cid=$data[0]'>";
        echo '删除';
        echo '<a/></td>';

        echo '</tr>';
    }
    echo '</table>';


   echo' <div style="margin-top: 600px;display: block;width: 950px;height: 30px; margin-left: 350px;" class="fenye">';


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

        if(!empty($_GET['me_major'])){
            echo "<a href='message_table.php?page=1&me_major=$me_major'>首页</a> "; // 第一页
            echo "<a  href='message_table.php?page=$prev&me_major=$me_major'>上一页</a> "; // 上一页
        }
        else{
            echo "<a href='message_table.php?page=1'>首页</a> "; // 第一页
            echo "<a  href='message_table.php?page=$prev'>上一页</a> "; // 上一页
        }


        for ($i=1; $i<=$total_pages; $i++) {
            if(!empty($_GET['me_major'])) {
                echo "<a href='message_table.php?page=$i&me_major=$me_major'>";
                echo "第".$i."页";
                echo "</a> ";
            }else{
                echo "<a href='message_table.php?page=$i'>";
                echo "第".$i."页";
                echo "</a> ";
            }
        };
    if(!empty($_GET['me_major'])) {
        echo "<a  href='message_table.php?page=$next&me_major=$me_major'>下一页</a> "; // 下一页
        echo "<a href='message_table.php?page=$total_pages&me_major=$me_major'>末页</a> "; // 最后一页
    }else{
        echo "<a  href='message_table.php?page=$next'>下一页</a> "; // 下一页
        echo "<a href='message_table.php?page=$total_pages'>末页</a> "; // 最后一页
    }
    echo "<a style='width:100px;'>这是第";
    echo $page."页</a> ";
        mysql_close();
        ?>
    </div>
</div>

</body>
</html>

