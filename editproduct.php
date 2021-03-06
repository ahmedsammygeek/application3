<?php require 'sidebar.php'; ?>
<section class="content">
<div class="row">
<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">تعديل بيانات المنتج</h3>
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
		 $sql="SELECT * FROM products WHERE id=$id ";
		 $query=$conn->query($sql);
		 $result=$query->fetch(PDO::FETCH_ASSOC);
			extract($result);
		
		 
		 ?>
		<form role="form" action="updateproduct.php<?php echo "?id=$id"; ?>" method="post" >
				<div class="box-body">
						<div class="form-group">
							<label for="exampleInputPassword1">المورد :</label>
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
							<label for="exampleInputEmail1">ادخل اسم المنتج</label>
							<input type="text" name="name" value="<?php echo "$product_name"; ?>" class="form-control" id="exampleInputEmail1" placeholder="اسم المنتج">
						</div>
						
						<div class="form-group">
							<label for="exampleInputPassword1">السعر الاصلي</label>
							<input type="text" name="original_price" value="<?php echo "$original_price"; ?>" class="form-control" id="exampleInputPassword1" placeholder="السعر الاصلي">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">الكمية</label>
							<input type="number" name="quantity" value="<?php echo $quantity ?>" class="form-control" id="exampleInputPassword1" placeholder="الكمية الموجودة">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">سعر البيع العام</label>
							<input type="text" name="product_price" value="<?php echo $product_price ?>" class="form-control" id="exampleInputPassword1" placeholder="سعر البيع ">
						</div>


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