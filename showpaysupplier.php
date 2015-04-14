<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">فواتير سداد الموردين</h3>                                    
				</div><!-- /.box-header -->
				<?php 
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 'data_inserted':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم ادخال البينات بنجاح.
						</div>";
						break;
						case 'error_data':
						echo "<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-ban'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> من فضلك حاول مرة اخرى او توجه الى الدعم.
						</div>";
						break;
						case 'data_deleted':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم حذف البينات بنجاح.
						</div>";
						break;
						case 'data_updated':
						echo "<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-check'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<b>Alert!</b> تم تعديل البيانات بنجاح.
						</div>";
						break;
						default:
							# code...
						break;
					}
				}
				?>
				<div class="box-body table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6">
							</div>
						</div>
						<table class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th>المسلسل</th>
									<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم المورد</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">المبلغ المدفوع</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">المبلغ المتبقي</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">الاجمالى قبل الخصم</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">التاريخ</th>
									<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">خيارات</th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								<?php require 'connection.php'; 
								$sql="SELECT * FROM pay_supplier";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query2=$conn->query("SELECT supplier_name FROM suppliers WHERE id=$supplier_id");
									$result2=$query2->fetch(PDO::FETCH_ASSOC);
									extract($result2);
									// =deserved
									// $dev = bcsub($elbaky, $money);
									$dev = $elbaky - $money ;
									echo "<tr class='even'>
									<td>$i</td>
									<td class=''><a href='supplier_pay.php?id=$supplier_id'>$supplier_name</a></td>
									<td class=''>$money</td>
									<td class=''>$dev</td>
									<td class=''>$elbaky</td>
									<td class=''>$date</td>
									<td class=''><a href='deletepaysupplier.php?id=$id'><button class='btn btn-danger btn-sm'>حذف</button></a>
									</td>
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