<?php require 'sidebar.php'; ?>
<section class="content">
<div class="row">
<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">تعديل بيانات مورد</h3>
		</div><!-- /.box-header -->
		<?php 
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 'empty_data':
						echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك ادخل جميع البيانات.
						</div>";
						break;
						case 'error_data':
							echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك حاول مرة اخرى او توجه الى الدعم.
						</div>";
							break;
							

						default:
						# code...
						break;
					}
				}

				?>

		<!-- form start -->
		<?php 
		if (isset($_GET['id'])) {
		 $id=$_GET['id'];
		 } 
		 require 'connection.php';
		 $sql="SELECT * FROM suppliers WHERE id=$id ";
		 $query=$conn->query($sql);
		 $result=$query->fetch(PDO::FETCH_ASSOC);
		 extract($result);
		 ?>
		<form role="form" action="updatesupplier.php<?php echo "?id=$id"; ?>" method="post" >
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">ادخل اسم المورد</label>
					<input type="text" name="name" value="<?php echo "$supplier_name"; ?>" class="form-control" id="exampleInputEmail1" placeholder="اسم المورد">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">عنوان المورد</label>
					<input type="text" name="address" value="<?php echo "$address"; ?>" class="form-control" id="exampleInputPassword1" placeholder="العنوان">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">رقم التليفون</label>
					<input type="text" name="phone" value="<?php echo "$phone"; ?>" class="form-control" id="exampleInputPassword1" placeholder="التليفون">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">المديونية</label>
					<input type="text" name="debts" value="<?php echo "$debts"; ?>" class="form-control" id="exampleInputPassword1" placeholder="ادخل مستحقات هذا المورد">
				</div>
				
			</div><!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" name="submit" class="btn btn-primary">تعديل</button>
			</div>
		</form>
	</div><!-- /.box -->

	<!-- Form Element sizes -->

</div>
</div>
</section>

<?php require 'footer.php'; ?>