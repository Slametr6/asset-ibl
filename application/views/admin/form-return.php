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
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-md-right">Export</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<!-- <li><a href="#">PDF</a></li> -->
								<li><a href="<?= base_url('returnn/exportExcel');?>">Excel</a></li>
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
						<th>Material Name</th>
						<th>Speck / Type</th>
						<th>Description</th>
						<th>Brand</th>
						<th>Qty</th>
						<th>Allocation</th>
						<th>Note</th>
						<th>Receiver</th>
						<th>Is accepted</th>
						<th>Action</th>
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
						<td><?= $val->material;?></td>
						<td><?= $val->product_name;?></td>
						<td><?= $val->spec;?></td>
						<td><?= $val->brand;?></td>
						<td><?= $val->qty;?></td>
						<td><?= $val->allocation;?></td>
						<td><?= $val->note;?></td>
						<td><?= $val->receiver;?></td>
						<td><?= $val->is_accepted;?></td>
						<!-- <td>
							<form action="<?= base_url('request/editrequest/'. $val->id);?>" method="POST">
								<select class="form-control" id="is_accepted" name="is_accepted">
									<option value="<?= $val->is_accepted;?>"><?= $val->is_accepted;?></option>
									<option value="0" <?php if($val->is_accepted == "0") echo 'selected="selected"';?> > 0</option>
									<option value="1" <?php if($val->is_accepted == "1") echo 'selected="selected"';?> > 1</option>
								</select>
							</form>
						</td> -->
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editReturnModal<?= $val->id;?>">
									<i class="fa fa-pencil"></i>
								</button>
								<button  class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('returnn/delreturn/'. $val->id);?>')">
									<i class="fa fa-trash-o" style="color:red"></i></a>
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
		
		<!-- modal editReturn -->
		<?php $no = 0;
			foreach($return as $val): $no++;?>
		<div class="modal fade" id="editReturnModal<?= $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="editReturnModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editReturnModal">Edit Return</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('returnn/editreturn');?>" method="post">
								<input type="hidden" name="id" id="id" value="<?= $val->id;?>" >
								<div class="form-group">
									<label>Name of Employe</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name of Employe" value="<?= $val->name;?>" required>
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" value="<?= $val->dept;?>" required>
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="position" id="position" placeholder="Position" value="<?= $val->position;?>" required>
								</div>
								<div class="form-group">
									<label>Material Name</label>
									<input class="form-control" type="text" name="material" id="material" placeholder="Material Name" value="<?= $val->material;?>" required>
								</div>
								<div class="form-group">
									<label>Speck / Type</label>
									<input class="form-control" type="text" name="product_name" id="product_name" placeholder="Speck / Type" value="<?= $val->product_name;?>" required>
								</div>
								<div class="form-group">
									<label>Description</label>
									<input class="form-control" type="text" name="spec" id="spec" placeholder="Description" value="<?= $val->spec;?>" required>
								</div>
								<div class="form-group">
									<label>Brand</label>
									<input class="form-control" type="text" name="brand" id="brand" placeholder="Brand" value="<?= $val->brand;?>" required>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity" value="<?= $val->qty;?>" required>
								</div>
								<div class="form-group">
									<label>Allocation</label>
									<input class="form-control" type="text" name="allocation" id="allocation" placeholder="Allocation" value="<?= $val->allocation;?>" required>
								</div>
								<div class="form-group">
									<label>Note</label>
									<textarea class="form-control" type="text" name="note" id="note" placeholder="Note" required><?= $val->note;?></textarea>
								</div>
								<div class="form-group">
									<label>Receiver</label>
									<input class="form-control" type="text" name="receiver" id="receiver" placeholder="Receiver" value="<?= $val->receiver;?>" required>
								</div>
								<div class="form-group">
									<label>Is accepted</label>
									<select class="form-control" type="text" name="is_accepted" id="is_accepted" required>
										<option value="<?= $val->is_accepted;?>"><?= $val->is_accepted;?></option>
										<option value="1">1 - Accepted</option>
										<option value="0">0 - Not Accept</option>
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
		<?php endforeach;?>
		<!-- end modal editReturn -->
