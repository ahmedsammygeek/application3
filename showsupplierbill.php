<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">فواتير الموردين</h3>                                    
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

  <table id="example1" class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>المسلسل</th>
                                                <th>اسم المورد</th>
                                                <th>المنتج المشترى</th>
                                                <th>الكمية</th>
                                                <th>السعر</th>
                                                <th>التاريخ</th>
                                                <th>خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php 
								require 'connection.php'; 
								$sql="SELECT * FROM bill_products";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query2=$conn->query("SELECT supplier_name FROM suppliers WHERE id=$supplier_id");
									$result2=$query2->fetch(PDO::FETCH_ASSOC);
									extract($result2);
									$query3=$conn->query("SELECT product_name FROM products WHERE id=$product_id");
									$result3=$query3->fetch(PDO::FETCH_ASSOC);
									// var_dump($result3);die();
									extract($result3);
									echo "<tr class='even'>
									<td>$i</td>
									<td class=''><a href='supplier_bill.php?id=$supplier_id'>$supplier_name</a></td>
									<td class=''>$product_name</td>
									<td class=''>$quantity</td>
									<td class=''>$price</td>
									<td class=''>$time</td>
									<td class=''><a href='deletesupplierbill.php?id=$id'><button class='btn btn-danger btn-sm'>حذف</button></a>
									</td>
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