<?php
 require 'sidebar.php'; ?>
<section class="content">
<div class="row">
<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">اضف عميل جديد</h3>
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
		<form role="form" action="addclient.php" method="post" >
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputEmail1">ادخل اسم العميل</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اسم العميل">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">عنوان العميل</label>
					<input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="العنوان">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">رقم التليفون</label>
					<input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="التليفون">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">المديونية</label>
					<input type="text" name="deserved" class="form-control" id="exampleInputPassword1" placeholder="ادخل باقي حساب هذا العميل">
				</div>
				
			</div><!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" name="submit" class="btn btn-primary">اضف العميل</button>
			</div>
		</form>
	</div><!-- /.box -->

	<!-- Form Element sizes -->

</div>
</div>
</section>

<?php require 'footer.php'; ?>