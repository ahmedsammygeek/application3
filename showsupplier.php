<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">معلومات عن المورديين</h3>                                    
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
				</div>
				<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
					<thead>
						<tr role="row"><th>المسلسل</th><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم المورد</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">العنوان</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">ارقام الهواتف</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">المديونيه له</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">خيارات</th></tr>
					</thead>

					<tfoot>
						<tr role="row"><th>المسلسل</th><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">اسم المورد</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">العنوان</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">ارقام الهواتف</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 159px;">المديونيه له</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">خيارات</th></tr>
					</tfoot>
					<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
						<?php require 'connection.php'; 
						$sql="SELECT * FROM suppliers";
						$query=$conn->query($sql);
						$i=1;
						while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
							extract($result);
							echo "<tr class='even'>
							<td>$i</td>
							<td class='sorting_1'>$supplier_name</td>
							<td class=''>$address</td>
							<td class=''>$phone</td>
							<td class=''>$debts</td>
							<td class=''><a href='deletesupplier.php?id=$id'><button class='btn btn-danger btn-sm'>حذف</button></a>
							<a href='editsupplier.php?id=$id'><button class='btn btn-warning btn-sm'>تعديل</button></a></td>
							</tr>";
							$i++;
						}


						?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-xs-6">
						
					</div>
					
					</div>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
<?php require 'footer.php'; ?>