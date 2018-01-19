<!DOCTYPE html>
<html>
<head>
	<title>报名系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
	<link type="text/css" href="../style/style.css" rel="stylesheet">
</head>

<body>
<div class="top">
	<div>泸州技师学院——在线报名系统</div>
	<a href="http://www.lzy.edu.cn/">【学院首页】</a>
</div>
<div class="center">
	<div class="centerleft">
		<select id="mySelect"  name="bid">
			<?php 
		include_once('../function/function.php');
			opensql('localhost','root','woainirr@1314.++','db_lzy');
			$sql="select * from tb_appiy";
			$result=mysql_query($sql);
			while($row=mysql_fetch_row($result)){
					echo '<option value="';
					echo $row[1];
					echo '">';
					echo $row[0];
					echo '</option>';
			}
			?>	
		</select>
		<div class="bao">
			<ul id="1" style="display:block">
<!--			<?php
/*			include_once('../function/function.php');
			opensql('localhost','root','woainirr@1314.++','db_lzy');
			$sql="select * from tb_appiy where ap_no=1";
			$result=mysql_query($sql);
			while($row=mysql_fetch_row($result)){
					echo '<li>'."报名开始时间：".date('Y年m月d日 h:i:s',strtotime($row[2])).'</li>';
					echo '<li>'."报名结束时间：".date('Y年m月d日 h:i:s',strtotime($row[3])).'</li>';
					echo '<li>'."缴费开始时间：".date('Y年m月d日 h:i:s',strtotime($row[4])).'</li>';
					echo '<li>'."缴费结束时间：".date('Y年m月d日 h:i:s',strtotime($row[5])).'</li>';
			}

			*/?>
			</ul>
			<ul id="2" style="display:none">
<!--			--><?php
/*			include_once('../function/function.php');
			opensql('localhost','root','woainirr@1314.++','db_lzy');

			$sql="select * from tb_appiy where ap_no=2";
			$result=mysql_query($sql);
			while($row=mysql_fetch_row($result)){
					echo '<li>'."报名开始时间：".date('Y年m月d日 h:i:s',strtotime($row[2])).'</li>';
					echo '<li>'."报名结束时间：".date('Y年m月d日 h:i:s',strtotime($row[3])).'</li>';
					echo '<li>'."缴费开始时间：".date('Y年m月d日 h:i:s',strtotime($row[4])).'</li>';
					echo '<li>'."缴费结束时间：".date('Y年m月d日 h:i:s',strtotime($row[5])).'</li>';
			}
			*/?>
                <li>报名开始时间：<time id="startTime"></time></li>
                <li>报名结束时间：<time id="endTime"></time></li>
                <li>缴费开始时间：<time id="payStartTime"></time></li>
                <li>缴费结束时间：<time id="payEndTime"></time></li>
			</ul>
		</div>
		<p>提示：</p>
		<div class="tishi">
			<span><b>技师专业：</b></span><span>中等职业学校(技工学校)应往届毕业生，且取得中级工资格证，学制3年<br>普通高中及未取得中级工资格证的中职（技工学校）应往届毕业生，学制4年</span>
			<br><span><b>高级工专业：</b></span><span>中等职业学校(技工学校)应往届毕业生，且取得中级工资格证，学制2年<br>普通高中及未取得中级工资格证的中职（技工学校）应往届毕业生，学制3年</span>
            <span id="message" style="color: red"></span>
		</div>
	</div>
	<div class="centerc">
		<span>第一步：</span><a id="reg">报名登记</a>
		<br>
		<img src="../img/next.png">
		<br>
		<span>第二步：</span><a id="ret">登录缴费</a>

	</div>
	<div class="centerright">
		<img src="../img/wei.png">
		<div class="erwei">
			<img src="../img/touxiang.jpg">
			<div>
				<p>泸职院信息系2017咨询</p>
				<p>扫一扫二维码，加入该群</p>
			</div>
		</div>
	</div>
</div>

<div class="footer">
	<div><span></span></div>
	<p>泸州技师学院 地址：泸州市龙马潭区长桥路2号 邮编：646000</p>
	<p>热线：0830-3152281 <a href="mlogin.php"> 管理登录</a></p>
</div>

<script type="text/javascript" src="jq.js"></script>
<script type="text/javascript">
    /*function test(){
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	var value=document.getElementById('mySelect').value;
	document.getElementById(value).style.display="block";
}*/
    window.onload=function(){
             document.getElementById('reg').onclick=function(){
             var mySelect=document.getElementById('mySelect').value;
             window.location.href="message.php?id="+mySelect;
        };

             document.getElementById('ret').onclick=function(){
              var mySelect=document.getElementById('mySelect').value;
              window.location.href="login.php?id="+mySelect;
            };

        $("#mySelect").trigger("change");//手动触发一次change事件
    };
    $("#mySelect").change(function() {
        var bid=$("#mySelect").val();
        $.ajax({
            type:"POST",
            url:"ajax.php",
            data:"bid="+bid,
            success:function (msg) {
                var obj= JSON.parse(msg);
                $("#startTime").html(obj.ap_begin);
                $("#endTime").html(obj.ap_over);
                $("#payStartTime").html(obj.ap_moneyb);
                $("#payEndTime").html(obj.ap_moneyo);
                $("#message").html(obj.ap_message);
            }
        });
    });




</script>

</body>
</html>