<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<?php if (isset($_GET['id'])) {
						$id=$_GET['id'];
						require 'connection.php'; 
						$query4=$conn->query("SELECT supplier_name FROM suppliers WHERE id=$id");
						$result4=$query4->fetch(PDO::FETCH_ASSOC);
						extract($result4);
						echo "<h3 class='text-center'>فواتير المورد $supplier_name </h3>";

					} ?>
					<input class="btn btn-default btn-block btn-flat" type="button" value="بيان الموردين" onclick="window.print()">


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
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">المنتج المشترى</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">الكمية</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">السعر</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">التاريخ</th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php 
								$sql="SELECT * FROM bill_products WHERE supplier_id=$id ";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query3=$conn->query("SELECT product_name FROM products WHERE id=$product_id");
									$result3=$query3->fetch(PDO::FETCH_ASSOC);
									extract($result3);
									echo "<tr class='even'>
									<td>$i</td>
									<td class=''>$product_name</td>
									<td class=''>$quantity</td>
									<td class=''>$price</td>
									<td class=''>$time</td>
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