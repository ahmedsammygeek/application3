<div class="copy row">
	<div class="form-group col-md-4">
		<label >الكمية</label>
		<input type="number" name="quantity[]" class="form-control"  placeholder="الكمية المستلمة">
	</div>
	<div class="form-group col-md-3" >
		<label for="exampleInputPassword1">السعر</label>
		<input type="text" name="price[]" id="price" class="form-control"  placeholder="سعر الشراء">
	</div>
	
	<div class="form-group col-md-4">
	<label >المنتج :</label>	
		<select name="products[]"  id="products" class="produtcs  form-control">
			<?php 
			require 'connection.php';
			$sql="SELECT * FROM products";
			$query=$conn->query($sql);
			while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
				extract($result);
				echo "<option value=''></option>";
				echo "<option value='$id'>$product_name</option>";
			} ?>

		</select>
	</div>
	<div class="form-group col-md-1">
		<a  class="btn btn-danger adelo_top">الغاء</a>
	</div>
	
</div>
