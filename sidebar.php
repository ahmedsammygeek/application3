<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
   header('location: login.php'); die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>مخزن مستلزمات طبية</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="css/select.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
      </head>
      <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                مخزن ادوات طبيه
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                
                            </a>
                            <ul class="dropdown-menu">

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <p> لن تتمكن من الدخول مرة اخرى الا بعد تسجيل الدخول</p>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">تسجيل الخروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="showadmin.php">
                                <i class="fa fa-dashboard"></i> <span>المستخدمين</span>
                            </a>

                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> 
                                <span>الموردين</span>
                                <i class="fa fa-angle-left pull-right"></i> 
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="showsupplier.php"><i class="fa fa-angle-double-right"></i> الموردين </a></li>
                                <li><a href="supplier.php"><i class="fa fa-angle-double-right"></i> اضف موردين جدد </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> 
                                <span>العملاء</span>
                                <i class="fa fa-angle-left pull-right"></i> 
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="showclient.php"><i class="fa fa-angle-double-right"></i> العملاء الحاليين </a></li>
                                <li><a href="client.php"><i class="fa fa-angle-double-right"></i> اضف عميل جديد </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>المنتجات</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="showproduct.php"><i class="fa fa-angle-double-right"></i> عرض المنتجات المتاحة</a></li>
                                <li><a href="product.php"><i class="fa fa-angle-double-right"></i> اضافة منتج جديد</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>الفواتير موردين</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="showsupplierbill.php"><i class="fa fa-angle-double-right"></i> فواتير موردين</a></li>
                                <li><a href="supplierbill.php"><i class="fa fa-angle-double-right"></i> اضافة فاتورة موردة</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>الفواتير عملاء</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="showbill.php"><i class="fa fa-angle-double-right"></i> فواتير عملاء</a></li>
                                <li><a href="bill.php"><i class="fa fa-angle-double-right"></i> اضافة فاتورة عميل</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> 
                                <span>فواتير سداد</span>
                                <i class="fa fa-angle-left pull-right"></i> 
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="payclient.php"><i class="fa fa-angle-double-right"></i> سداد عملاء </a></li>
                                <li><a href="showpayclient.php"><i class="fa fa-angle-double-right"></i> كشف حساب عملاء </a></li>
                                <li><a href="paysupplier.php"><i class="fa fa-angle-double-right"></i>  سداد موردين  </a></li>
                                <li><a href="showpaysupplier.php"><i class="fa fa-angle-double-right"></i> كشف حساب موردين </a></li>

                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">