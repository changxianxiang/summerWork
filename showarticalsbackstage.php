<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Fixed Layout</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->

            <?php
            session_start();//开始session必须放在最上面
            $id=$_GET['id'];
            //            if(!$_SESSION['afdgashyrhjnb/;']){
            //                echo "您无权查看";
            //                echo "<meta http-equiv=refresh content=\"2;url=index.php\">";
            //                exit();
            //            }
            $pageSize=10;//一页显示的条数
            $link=mysqli_connect("localhost","root","root");
            if(!$link){
                echo "link failed";
                exit();
            }
            if(mysqli_select_db($link,"register")){
            }else{
                exit();
            }
            echo "<nav >
                <ul class='pager' >";
            $sql="select * from articals ";
            $result=mysqli_query($link,$sql);
            $record=mysqli_num_rows($result);//总记录条数
            if($id>$record||$id<1){
                $id= $_SESSION["adfdfadsfdhykj"];
            }else{
                $_SESSION["adfdfadsfdhykj"]=$id;

            }
            $pre=$id-1;
            $next=$id+1;
            if($pre>0)
                echo "<div align='center'><li class='previous' ><a href='showarticalsbackstage.php?id=$pre'>上一篇</a></li></div>";
            else
                echo "<li class='previous disabled'><a href='#'>上一篇</a></li>";
            echo "<li class='disabled'><a href='showArticals.php'>返回到目录</a></li>";

            if($next <= $record)
                echo "<li class='next'><a href='showarticalsbackstage.php?id=$next'>下一篇</a></li>";
            else
                echo "<li class='next disabled'><a href='#'>下一篇</a></li>";


            echo "</ul>
            </nav>";
            $sqlOne="select * from articals where id='{$id}'";
            $resultOne=mysqli_query($link,$sqlOne);
            while($arr=mysqli_fetch_row($resultOne)){
                // echo $arr[1];
                $count=$arr[6]+1;
                mysqli_query($link,"update articals set count ='{$count}'  where id='{$id}'");
//                echo "<tr>";
//                echo "<td style='text-align: center'>";
//                echo "<span style='color: #a31515'>$arr[0]</span>";
//                echo "</td>";
//
//                echo "<td>";
//                echo "$arr[1]";
//                echo "</td>";
//                echo "</tr>";
                echo "<h1 align='center'>$arr[3]</h1>";
                echo "阅读量：$arr[6]";
                echo "作者：$arr[2]";
                echo "分类：$arr[4]";
                echo "上传时间：$arr[5]";
                echo "<br>";
                echo "<div align='center'>";
                echo "$arr[1]";
                echo "</div>";
            }
            echo "<tr>";
            echo "<td colspan='2' align='center'>";

            //echo "<a href='dengLuBack.php?nowPage=3'>1<a>";
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
