      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Requests
            <small>Requests Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addRequestModal">
								<i class="zmdi zmdi-plus"></i>Add request
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
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
	  					<th width="20px">No</th>
						<th>Employee</th>
						<th>Department</th>
						<th>Position</th>
						<th>Product Name</th>
						<th>Specification</th>
						<th>Brand</th>
						<th>Qty</th>
						<th>Allocation</th>
						<th>Note</th>
						<th>Is approved</th>
						<th width="70px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($request as $val): $no++;?>
					  <tr>
						<td><?= $no;?></td>
						<td><?= $val->name;?></td>
						<td><?= $val->dept;?></td>
						<td><?= $val->position;?></td>
						<td><?= $val->product_name;?></td>
						<td><?= $val->spec;?></td>
						<td><?= $val->brand;?></td>
						<td><?= $val->qty;?></td>
						<td><?= $val->allocation;?></td>
						<td><?= $val->note;?></td>
						<td><?= $val->is_approved;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Print" data-toggle="modal" data-target="#editRequestModal<?= $val->id;?>">
									<i class="fa fa-print"></i>
								</button>
								<button class="item" title="Return" data-toggle="modal" data-target="#editReturnModal<?= $val->id;?>">
									<i class="fa fa-refresh" style="color:green"></i>
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
	  
		<!-- modal addRequest -->
		<div class="modal fade" id="addRequestModal" tabindex="-1" role="dialog" aria-labelledby="addRequestModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addRequestModal">Add Request</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('request/addrequest');?>" method="post">
								<div class="form-group">
									<label>Name of Employe</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name of Employe" required>
									<?= form_error('name','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" required>
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="position" id="position" placeholder="Position" required>
								</div>
								<div class="form-group">
									<label>Product Name</label>
									<select class="form-control" type="text" name="vendor_name" id="vendor_name" required>
										<option value="">Select...</option>
										<?php foreach($products as $prod):?>
										<option value="<?= $prod->name;?>"><?= $prod->name;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Specification</label>
									<select class="form-control" type="text" name="vendor_name" id="vendor_name" required>
										<option value="">Select...</option>
										<?php foreach($products as $prod):?>
										<option value="<?= $prod->description;?>"><?= $prod->description;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Brand</label>
									<input class="form-control" type="text" name="brand" id="brand" placeholder="Brand" required>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity" required>
								</div>
								<div class="form-group">
									<label>Allocation</label>
									<input class="form-control" type="text" name="allocation" id="allocation" placeholder="Allocation" required>
								</div>
								<div class="form-group">
									<label>Note</label>
									<select class="form-control" type="text" name="note" id="note" required>
										<option value="">Select...</option>
										<option value="New">New</option>
										<option value="Replace">Replace</option>
									</select>
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
		<!-- end modal addRequest -->
		
		<!-- modal editReturn -->
		<?php $no = 0;
			foreach($request as $val): $no++;?>
		<div class="modal fade" id="editReturnModal<?= $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="editReturnModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editReturnModal">Edit Return</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('returnn/addreturn');?>" method="post">
								<input type="hidden" name="id" id="id" value="<?= $val->id;?>" >
								<div class="form-group">
									<label>Name of Employe</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name of Employe" value="<?= $val->name;?>" readonly>
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" value="<?= $val->dept;?>" readonly>
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="position" id="position" placeholder="Position" value="<?= $val->position;?>" readonly>
								</div>
								<div class="form-group">
									<label>Product Name</label>
									<input class="form-control" type="text" name="product_name" id="product_name" placeholder="Product Name" value="<?= $val->product_name;?>" readonly>
								</div>
								<div class="form-group">
									<label>Specification</label>
									<input class="form-control" type="text" name="spec" id="spec" placeholder="Specification" value="<?= $val->spec;?>" readonly>
								</div>
								<div class="form-group">
									<label>Brand</label>
									<input class="form-control" type="text" name="brand" id="brand" placeholder="Brand" value="<?= $val->brand;?>" readonly>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity" value="<?= $val->qty;?>" required>
								</div>
								<div class="form-group">
									<label>Allocation</label>
									<input class="form-control" type="text" name="allocation" id="allocation" placeholder="Allocation" value="<?= $val->allocation;?>" readonly>
								</div>
								<div class="form-group">
									<label>Note</label>
									<select class="form-control" type="text" name="note" id="note" readonly>
										<option value="<?= $val->note;?>"><?= $val->note;?></option>
										<option value="New">New</option>
										<option value="Replace">Replace</option>
									</select>
								</div>
								<div class="form-group">
									<label>Receiver</label>
									<input class="form-control" type="text" name="receiver" id="receiver" placeholder="Receiver" required>
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
		<!-- end modal editReturn -->
