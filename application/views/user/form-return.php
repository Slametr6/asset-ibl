      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Return
            <small>Return Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addReturnModal">
								<i class="zmdi zmdi-plus"></i>Add return
							</button>
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
						<th>Receiver</th>
						<th>Is accepted</th>
						<!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($return as $val): $no++?>
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
						<td><?= $val->receiver;?></td>
						<td><?= $val->is_accepted;?></td>
						<!-- <td>
							<div class="table-data-feature">
								<button class="item" title="Print" data-toggle="modal" data-target="#editReturnModal<?= $val->id;?>">
									<i class="fa fa-print"></i>
								</button>
							</div>
						</td> -->
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
	  
		<!-- modal addReturn -->
		<div class="modal fade" id="addReturnModal" tabindex="-1" role="dialog" aria-labelledby="addReturnModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addReturnModal">Add Return</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('returnn/addreturn');?>" method="post">
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
									<label>Material Name</label>
									<input class="form-control" type="text" name="material" id="material" placeholder="Material Name" required>
								</div>
								<div class="form-group">
									<label>Speck / Type</label>
									<input class="form-control" type="text" name="product_name" id="product_name" placeholder="Speck / Type" required>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" type="text" name="descript" id="descript" placeholder="Description" required></textarea>
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
									<textarea class="form-control" type="text" name="note" id="note" placeholder="Note" required></textarea>
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
		<!-- end modal addReturn -->
