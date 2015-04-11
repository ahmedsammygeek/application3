<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">تعديل بيانات عميل</h3>
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
				$sql="SELECT * FROM bill_products WHERE id=$id ";
				$query=$conn->query($sql);
				while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
					extract($result);
				}



				?>
				<form role="form" action="updatesupplierbill.php<?php echo "?id=$id"; ?>" method="post" >
					<div class="box-body">
						
						<div class="form-group">
							<label for="exampleInputPassword1">السعر</label>
							<input type="text" name="price" value="<?php echo "$price"; ?>" class="form-control" id="exampleInputPassword1" placeholder="سعر الشراء">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">تاريخ الفاتورة</label>
							<input type="date" name="date" class="form-control" id="exampleInputPassword1" >
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">المورد :</label>
							<div class="btn-group">		
								<select name="supplier" id="" class="btn btn-default dropdown-toggle">
									<?php 
									$sql="SELECT * FROM suppliers";
									$query=$conn->query($sql);
									while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<option value='$id'>$supplier_name</option>";
									} ?>

								</select>
							</div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="exampleInputPassword1">المنتج :</label>
							<div class="btn-group">		
								<select name="product" id="" class="btn btn-default dropdown-toggle">
									<?php 
									$sql="SELECT * FROM products";
									$query=$conn->query($sql);
									while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<option value='$id'>$product_name</option>";
									} 
									?>

								</select>
							</div>
						</div>
						
					

					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" name="submit" class="btn btn-primary">اضف الفاتورة الموردة</button>
					</div>
				</form>
			</div><!-- /.box -->

			<!-- Form Element sizes -->

		</div>
	</div>
</section>

<?php require 'footer.php'; ?>