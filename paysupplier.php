<?php 
require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">اضف مبلغ تم سداده</h3>
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
				<form role="form" action="addpaysupplier.php" method="post" >
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputPassword1">العميل :</label>
							<div class="btn-group">		
								<select name="supplier" id="" class="btn btn-default dropdown-toggle">
									<?php require 'connection.php';
									$sql="SELECT * FROM suppliers";
									$query=$conn->query($sql);
									while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<option value='$id'>$supplier_name</option>";
									} ?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">المبلغ اللذي تم ساده</label>
							<input type="text" name="money" class="form-control" id="exampleInputPassword1" placeholder="ادخل المبلغ">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">تاريخ السداد</label>
							<input type="date" name="date" class="form-control" id="exampleInputPassword1">
						</div>

					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" name="submit" class="btn btn-primary">اضف مبلغ سداد</button>
					</div>
				</form>
			</div><!-- /.box -->

			<!-- Form Element sizes -->

		</div>
	</div>
</section>

<?php require 'footer.php'; ?>