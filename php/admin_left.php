
<!DOCTYPE HTML>
<html>
<head>
    <title>left</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/admin_left.css" />

</head>
<body>
<div class="topbotleft">
    <ul class="tree">
        <li>
            <span>批次管理<i class="r1"></i></span>
            <ul>
                <li><a href="add_appiy.php">添加批次信息</a></li>
                <li><a href="appiy_table.php">批次信息表</a></li>
            </ul>
        </li>
        <li>
            <span>报名统计<i class="r2"></i></span>
            <ul>
                <li><a href="message_table.php">报名信息</a></li>
            </ul>
        </li>
        <li><span>操作日志<i class="r3"></i></span>
            <ul>
                <li><a href="log_table.php">日志表</a></li>
            </ul>
        </li>
        <li><span>用户管理<i class="r4"></i></span>
            <ul>
                <li><a href="admin_table.php">用户管理表</a></li>
            </ul>
        </li>
    </ul>
</div>
<script type="text/javascript">

    var span=document.querySelectorAll(".tree>li>span");
    var open=document.getElementsByClassName("open");

    console.log(span);
    open.onclick=function(){
        li.style.height="30px";
    }

    for(var i=0;i<span.length;i++){
        var sp=span[i];
        sp.index=i;
        sp.onclick=function () {

            /* this.className="open" ?  this.className=" " : this.className="open";*/
            if(  this.className==""){
                if(this.index==0){
                    this.className="open";
                    span[1].className="";span[2].className="";span[3].className="";
                }else if(this.index==1){
                    this.className="open";
                    span[0].className="";span[2].className="";span[3].className="";
                }else if(this.index==2){
                    this.className="open";
                    span[0].className="";span[1].className="";span[3].className="";
                }else {
                    this.className="open";
                    span[0].className="";span[1].className="";span[2].className="";
                }

            }else {
                this.className="";
            }
        }


    }
</script>
</body>
</html>
