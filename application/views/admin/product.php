      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Products
            <small>Products Managements</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
					<div class="margin">
						<div class="btn-group">
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addProductModal">
								<i class="zmdi zmdi-plus"></i>Add product
							</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-md-right">Export</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">PDF</a></li>
								<li><a href="#">Excel</a></li>
							</ul>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>Code</th>
						<th>Type</th>
						<th>Brand</th>
						<th>Name</th>
						<th>Vendor</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Date in</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php foreach($product as $val):?>
					  <tr>
						<td><?= $val->product_code;?></td>
						<td><?= $val->type;?></td>
						<td><?= $val->brand;?></td>
						<td><?= $val->name;?></td>
						<td><?= $val->vendor_name;?></td>
						<td><?= $val->price;?></td>
						<td><?= $val->qty;?></td>
						<td><?= date('d-m-Y', strtotime($val->date_in));?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editProductModal<?= $val->id;?>">
									<i class="fa fa-pencil"></i>
								</button>
								<button  class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('product/delproduct/'. $val->id);?>')">
									<i class="fa fa-trash"></i></a>
								</button>
							</div>
						</td>
					  </tr>
					  <?php endforeach;?>
                	</tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
		<!-- modal addProduct -->
		<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addProductModal">Add Product</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('product/addproduct');?>" method="post">
								<div class="form-group">
									<label>Product Code</label>
									<input class="form-control" type="text" name="product_code" id="product_code" placeholder="Product Code" required>
									<?= form_error('product_code','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Type of Product</label>
									<input class="form-control" type="text" name="type" id="type" placeholder="Type of Product" required>
								</div>
								<div class="form-group">
									<label>Brand</label>
									<input class="form-control" type="text" name="brand" id="brand" placeholder="Brand" required>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
								</div>
								<div class="form-group">
									<label>Vendor Name</label>
									<select class="form-control" type="text" name="vendor_name" id="vendor_name" required>
										<option value="">Select...</option>
										<?php foreach($vendor as $ven):?>
										<option value="<?= $ven->name;?>"><?= $ven->name;?></option>
										<?php endforeach;?>
									</select>
									<!-- <input class="form-control" type="text" name="vendor_name" id="vendor_name" placeholder="Vendor Name" required> -->
								</div>
								<div class="form-group">
									<label>Price</label>
									<input class="form-control" type="text" name="price" id="price" placeholder="Price" required>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity" required>
								</div>
								<div class="form-group">
									<label>Date in</label>
									<input class="form-control datepicker" type="text" name="date_in" id="date_in" required>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal addProduct -->
		
		<!-- modal editProduct -->
		<?php $no = 0;
			foreach($product as $val): $no++;?>
		<div class="modal fade" id="editProductModal<?= $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editProductModal">Edit Product</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('product/editproduct');?>" method="post">
								<input type="hidden" name="id" id="id" value="<?= $val->id;?>" >
								<div class="form-group">
									<label>Product Code</label>
									<input class="form-control" type="text" name="product_code" id="product_code" placeholder="Product Code" value="<?= $val->product_code;?>" readonly>
								</div>
								<div class="form-group">
									<label>Type of Product</label>
									<input class="form-control" type="text" name="type" id="type" placeholder="Type of Product" value="<?= $val->type;?>" required>
								</div>
								<div class="form-group">
									<label>Brand</label>
									<input class="form-control" type="text" name="brand" id="brand" placeholder="Brand" value="<?= $val->brand;?>" required>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name" value="<?= $val->name;?>" required>
								</div>
								<div class="form-group">
									<label>Vendor</label>
									<select class="form-control" type="text" name="vendor_name" id="vendor_name" required>
										<option value="<?= $val->vendor_name;?>"><?= $val->vendor_name;?></option>
										<?php foreach($vendor as $ven):?>
										<option value="<?= $ven->name;?>"><?= $ven->name;?></option>
										<?php endforeach;?>
									</select>
									<!-- <input class="form-control" type="text" name="vendor_name" id="vendor_name" placeholder="Vendor" value="<?= $val->vendor_name;?>" required> -->
								</div>
								<div class="form-group">
									<label>Price</label>
									<input class="form-control" type="text" name="price" id="price" placeholder="Price" value="<?= $val->price;?>" required>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity" value="<?= $val->qty;?>" required>
								</div>
								<div class="form-group">
									<label>Date in</label>
									<input class="form-control datepicker" type="text" name="date_in" id="date_in" value="<?= $val->date_in;?>" required>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<!-- end modal editProduct -->
