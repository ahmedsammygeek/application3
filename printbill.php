<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<img  class="box-title" src="img/credit/paypal.png" alt="">

					<?php
					if (isset($_GET['id'])) {
						$msg=$_GET['id'];
						require 'connection.php';
						$sql="SELECT * FROM bills WHERE bill_num=$msg";
						$query=$conn->query($sql);
						$result=$query->fetch(PDO::FETCH_ASSOC);
						extract($result);
						$query2=$conn->query("SELECT * FROM clients WHERE id=$client_id");
						$result2=$query2->fetch(PDO::FETCH_ASSOC);
						extract($result2);	
						echo "<h4 class='text-right'> تاريخ الفاتورة : $date " . "<br><br>" . " رقم الفاتورة : $bill_num " . "<br><br>" . "اسم العميل : $client_name" . "<br><br>" . "المبلغ المتبقي : $deserved <h4>" ;
						
					 }


					?>



				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<input class="btn btn-default btn-block btn-flat" type="button" value="بيان مبيعات" onclick="window.print()" >

					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6">
							</div>
						</div>
						<table id="example1" class="table table-bordered table-striped dataTable" dir="rtl" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 40px;">المسلسل</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 170px;">المنتج</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 170px;">الكمية</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">السعر</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">الاجمالى</th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php
								$sql="SELECT * FROM bills WHERE bill_num=$msg";
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
									<td class=''>$total</td>

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