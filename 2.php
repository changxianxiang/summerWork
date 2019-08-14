<?php

 public function userlistAction()
    {
        //分页
        //当前页，默认为1
        $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

        //获取所有的用户数据
        // 在 getTotalRows() 里面我是用count(id) as total 查询的
        $totalRows = $this->_db->getTotalRows();
        $totalRows = $totalRows['total'];

        //自定义一个最大的页码数
        $rowsPerPage = 10;

        //获取数据
        $offset = ($curPage - 1) * $rowsPerPage;

         //查询每页用户列表
         // 在 selectAll() 中，根据偏移量,使用limit 查询每页的数据
        $ret = $this->_db->selectAll($offset, $rowsPerPage);

        //总页数
        $totalpage = ceil($totalRows / $rowsPerPage);

        //存储页面字符串
        $pageNumString = '';

        if ($curPage <= 5) {
            $begin = 1;
            $end = $totalpage >= 10 ? 10 : $totalpage;
        } else {
            $end = $curPage + 5 > $totalpage ? $totalpage : $curPage + 5;
            $begin = $end - 9 <= 1 ? 1 : $end - 9;
        }

        //上一页
        $prev = $curPage - 1 <= 1 ? 1: $curPage - 1;
        $pageNumString .= "<li><a href='/user/userlist?curPage=1'>首页</a></li>";
        $pageNumString .= "<li><a href='/user/userlist?curPage=$prev'>&laquo;</a></li>";

        //根据起始页与终止页将当前页面的页码显示出来
        for ($i = $begin; $i <= $end;$i ++) {
            //使用if实现高亮显示当前点击的页码
            //这是 bootstrap的全局样式
            if ($curPage == $i) {
                $pageNumString .= "<li class='active'><a href='/user/userlist?curPage=$i'>$i</a></li>";
            } else {
                $pageNumString .= "<li><a href='/user/userlist?curPage=$i'>$i</a></li>";
            }
        }

        //实现下一页
        $next = $curPage + 1 >= $totalpage ? $totalpage : $curPage + 1;
        $pageNumString .= "<li><a href='/user/userlist?curPage=$next'>&raquo;</a></li>";
        $pageNumString .= "<li><a href='/user/userlist?curPage=$totalpage'>尾页</a></li>";

        $this->getView()->assign('pageNumString', $pageNumString);
        $this->getView()->assign("ret",$ret);
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<nav aria-label="Page navigation" style="float:right;">
    <ul class="pagination">

    </ul>
</nav>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
</body>
</html>