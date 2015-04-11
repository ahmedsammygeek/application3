<html>
<head>
	<meta charset="UTF-8">
	<title>SIGN IN PAGE  </title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<!-- bootstrap wysihtml5 - text editor -->
	<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-black">

    <div class="form-box" id="login-box">
         <?php 

        if (isset($_GET['msg'])) {

         switch ($_GET['msg']) {
             case 'data_empty':
             echo '<div class="alert alert-danger alert-dismissable">
             <i class="fa fa-ban"></i>
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <b>Alert!</b> برجاء ادخال اسم المستخدم و الرقم السري
             </div>';
             break;
             case 'data_error':
             echo '<div class="alert alert-danger alert-dismissable">
             <i class="fa fa-ban"></i>
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <b>Alert!</b> برجاء ادخال اسم المستخدم و كلمة المرور صحيحين
             </div>';


             break;

             default:
                           # code...
             break;
         }
     }   


     ?>
        <div class="header">Sign In</div>

     <form action="check.php" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="userid" class="form-control" id='inputError' placeholder="اسم المستخدم">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
            </div>          

        </div>
        <div class="footer">                                                               
            <button type="submit" name="submit" class="btn bg-olive btn-block">تسجيل الدخول</button>  

        </div>
    </form>
</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../js/bootstrap.min.js" type="text/javascript"></script>        


<meta style="visibility: hidden !important; display: block !important; width: 0px !important; height: 0px !important; border-style: none !important;"></meta></body>





</html>