      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Branch
            <small>Branch Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addBranchModal">
								<i class="zmdi zmdi-plus"></i>Add branch
							</button>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th width="20px">NO</th>
						<th width="150px">Branch Code</th>
						<th>Name</th>
						<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($branch as $val): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $val->branch_code;?></td>
						<td><?= $val->name;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('company/delbranch/'. $val->branch_id);?>')" >
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

		<!-- modal addBranch -->
		<div class="modal fade" id="addBranchModal" tabindex="-1" role="dialog" aria-labelledby="addBranchModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addBranchModal">Add Branch</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('company/addBranch');?>" method="post">
								<div class="form-group">
									<label>Branch Code</label>
									<input class="form-control" type="text" name="br_code" id="br_code" value="IBL<?php echo sprintf("%04s", $branch_code) ?>" readonly>
									<?= form_error('br_code','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
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
		<!-- end modal addBranch -->
