<?php
$verify = stripslashes(trim($_GET['verify']));// 取回标识码
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register常宪祥</title>
    <script src="jquery-1.10.2.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="ajax方式">
    <script type="text/javascript"></script>
<!--    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
    body{
        background-image: url("images/timg.jpg");
    }
    h2{
        margin: 30px;
    }
        form{
            margin: 60px;
            border: black 0px;
            text-align: center;
        }
        button{
            margin: 60px;
            border: black 0px;
            text-align: center;
            position: absolute;
            top: 360px;
            right: 150px;
        }
        input{
            height: 30px;
            width: 250px;
        }
        select{
            width: 250px;
            height: 30px;
        }
        .title{
            position: absolute;
            top: 80px;
            right: 510px;
        }
        .forms{
            position: absolute;
            top: 100px;
            right: 420px;
        }
        .a{
            position: absolute;
            top: 600px;
            right: 570px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h2 align="center">欢迎注册</h2>
    </div>
    <pre>
    <div class="forms">
    <form action="" method="post" class="excel" id="form1" >
            用户名：<input  class="in" type="text" name="userName" autofocus><br>
              邮箱：<input class="in" type="text"name="userEmail"> <br>
     请选择您的身份： <input list="identical" name="userIdentify">
    <datalist id="identical">
        <option value="学生">
        <option value="老师">
    </datalist><br>
    请选择您的学校：<select name="userSchool">
        <option>烟台大学</option>
        <option>清华大学</option>
        <option>北京大学</option>
    </select><br>
        请输入密码：<input class="in" type="password" name="mainuserPassword"><br>
        请再次输入：<input class="in" type="password" name="subuserPassword"><br>
        <?php echo "<input class='in' type='hidden' name='verify' value='$verify'>"?>
<!--    <input value="提交" type="image" src="images/logo_black.png" height="40" width="48" alt="Submit">-->

    </form>
            <button type="button" class="btn btn-block btn-info btn-lg">注册</button>
</div>
          </pre>
<div class="a">
    <a href="index.html">已有账号 点击登陆</a>
</div>
</body>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $.ajax({
                url:"mailbackstage.php",
                async:true,
                type:"post",
                data: $('#form1').serialize(),
                success:function(result){
                    $("h1").html(result);
                }});
        });
    });
</script>
<h1 align="center">  </h1>
<!-- Content Wrapper. Contains page content -->

<!-- Main content -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</html>