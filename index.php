<?php require 'sidebar.php'; ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">المنتجات المنتهية</h3>                                    
				</div><!-- /.box-header -->
				
				<div class="box-body table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-xs-12">
								  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>المسلسل</th>
                                                <th>اسم المورد</th>
                                                <th>المنتج</th>
                                                <th>الكمية الحالية </th>
                                                <th>السعر الاصلى</th>
                                                <th>السعر البيع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php require 'connection.php'; 
								$sql="SELECT * FROM products WHERE quantity<=20 ";
								$query=$conn->query($sql);
								$i=1;
								while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
									extract($result);
									$query2=$conn->query("SELECT supplier_name FROM suppliers WHERE id=$supplier_id");
									$result2=$query2->fetch(PDO::FETCH_ASSOC);
									extract($result2);
									echo "<tr class='even'>
									<td>$i</td>
									<td class='sorting_1'>$supplier_name</td>
									<td class=''>$product_name</td>
									<td class=''>$quantity</td>
									<td class=''>$original_price</td>
									<td class=''>$product_price</td>
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