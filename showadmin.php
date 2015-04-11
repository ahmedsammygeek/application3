<?php 
// include 'header.php';
require 'sidebar.php';

?>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">المستخدمين</h3>

      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <?php
        if (isset($_GET['msg'])) {
         switch ($_GET['msg']) {
           case 'data_inserted':
                     //case data about new admin insert successuful
           echo '<div class="alert alert-success alert-dismissable">
           <i class="fa fa-check"></i>
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <b>Alert!</b> تم ادخال البيانات بنجاح.
           </div>' ;
           break;
           case 'deleted':
                     //case successful delete old admin 
           echo '<div class="alert alert-success alert-dismissable">
           <i class="fa fa-check"></i>
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <b>Alert!</b> تم حذف البيانات بنجاح.
           </div>' ;
           break;
           case 'error_delete':
                     //an error in sql request 
           echo '<div class="alert alert-danger alert-dismissable">
           <i class="fa fa-ban"></i>
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <b>Alert!</b>خطا فى حذف البينات برجاء اللجوء للدعم .
           </div>' ;
           break;

           default:
                                                 # code...
           break;
         }
       } 
       ?>
       <table class="table table-hover">

        <tbody><tr>
          <th>م</th>
          <th>الاسم</th>
          <th>الرقم السري</th>
          <th>ادوات</th>


        </tr>
        <?php
        if (isset($_GET['id'])) {
          $inserted_id=$_GET['id'];
        }
        include 'connection.php';
                //connection with database (met)
        $sql="SELECT * FROM admin ";
        $query=$conn->query($sql);
                //prepare sql request
                $i=1; // this variable is the number of every row in gellery (admins)
                while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
                  //put the result from sql request in array 
                 extract($result);
                   //put data in variables
                 
                   echo " <tr>
                   <td>$i</td>
                   <td>$name</td>
                   <td>***********</td>
                   <td><a href='deleteadmin.php?msg=$id' class='btn btn-danger btn-sm'>حذف</a></td>
                   </tr>";
                 
                 
                 $i++;

               } 



               ?>


             </tbody></table>
           </div><!-- /.box-body -->
         </div><!-- /.box -->
         <a href="admin.php"><button class="btn btn-success btn-lg">اضف مستخدم جديد</button></a>
       </div>
     </div>
   </section><!-- /.content -->                
   <?php 
   require 'footer.php';

   ?>