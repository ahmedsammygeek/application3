<?php 
// include 'header.php';
require 'sidebar.php';

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        تسجيل اعضاء جدد

    </h1>

</section>



<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <?php 
if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 'empty_data':
        //this case if admin left inputs empty show allert (to complete this space)
        echo '<div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>Alert!</b> برجاء ملئ جميع الخانات .
        </div>' ;
        break;
        case 'error_data':
        //this case if exist an error in sql request 
        echo '<div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>Alert!</b>خطا في ادخال البينات برجاء اللجوء الى الدعم .
        </div>' ;
        break;

        default:
    
        break;
    }
}

?>
                    <h3 class="box-title">ادخل بيانات المستخدم الجديد</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="addadmin.php" method="post" enctype="multipart/form-data" >
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">الاسم</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="ادخل اسم المستخدم الجديد">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">كلمة السر </label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="ادخل كلمة السر الخاصة به">
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">اضف مستخدم</button>
                    </div>
                </form>
            </div><!-- /.box -->


        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
<?php 
require 'footer.php';

?>