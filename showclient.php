<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">معلومات عن العملاء</h3>                                    
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
							<div class="col-xs-12">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>المسلسل</th>
											<th>اسم العميل </th>
											<th>العنوان</th>
											<th>ارقام الهواتف</th>
											<th>المديونيه عليه</th>
											<th>خيارات</th>
										</tr>
									</thead>
									<tbody>
										
<?php require 'connection.php'; 
				$sql="SELECT * FROM clients";
				$query=$conn->query($sql);
				$i=1;
				while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
					extract($result);
					echo "<tr class='even'>
					<td>$i</td>
					<td class='sorting_1'>$client_name</td>
					<td class=''>$address</td>
					<td class=''>$phone</td>
					<td class=''>$deserved</td>
					<td class=''>
					<a href='editclient.php?id=$id'><button class='btn btn-warning btn-sm'>تعديل</button></a></td>
					</tr>";
					$i++;
				}
				?>
									</tbody>

								</table>
							</div>
						</div>
					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
	<?php require 'footer.php'; ?>