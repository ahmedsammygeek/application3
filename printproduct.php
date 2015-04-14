<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<img  class="box-title" src="img/credit/paypal.png" alt="">

					<h3 class="box-title"></h3>  
					<input class="btn btn-default btn-block btn-flat" type="button" value="معلومات عن النتجات" onclick="window.print()" >

				</div><!-- /.box-header -->
				
				<div class="box-body table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6">

							</div>
						</div>
						<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th>المسلسل</th>
									<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم المورد</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">اسم المنتج</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">السعر الاصلي</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">الكمية</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">سعر البيع</th>
									
								</tr>
							</thead>

							
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php 
								require 'connection.php'; 
								$sql="SELECT * FROM products";
								$query=$conn->query($sql);								
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result); 
									$query3=$conn->query("SELECT supplier_name FROM suppliers WHERE id=$supplier_id");
									$result3=$query3->fetch(PDO::FETCH_ASSOC);
									extract($result3);
									echo "<tr class='even'>
									<td>$i</td>
									<td class='sorting_1'>$supplier_name</td>
									<td class=''>$product_name</td>
									<td class=''>$original_price</td>
									<td class=''>$quantity</td>
									<td class=''>$product_price</td>
									</tr>";
									$i++;
								}


								?>
							</tbody>
						</table>


					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
	<?php require 'footer.php'; ?>