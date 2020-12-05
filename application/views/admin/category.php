      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Category
            <small>Category Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addCategoryModal">
								<i class="zmdi zmdi-plus"></i>Add category
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
						<th width="150px">Category Id</th>
						<th>Name</th>
						<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($category as $val): $no++;?>
					  <tr>
					  	<td><?= $no;?></td>
						<td><?= $val->cat_id;?></td>
						<td><?= $val->cat_name;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('asset/delcat/'. $val->cat_id);?>')" >
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

		<!-- modal addCategory -->
		<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addCategoryModal">Add Category</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('asset/addCat');?>" method="post">
								<div class="form-group">
									<label>Category ID</label>
									<input class="form-control" type="text" name="cat_code" id="cat_code" value="20<?= sprintf("%04s", $cat_id) ?>" readonly>
									<?= form_error('cat_code','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Category Name</label>
									<input class="form-control" type="text" name="cat_name" id="cat_name" placeholder="Category Name" required>
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
		<!-- end modal addCategory -->
