
    <div class="login-box">
      <div class="login-logo">
		<a href="#">
			<img src="<?= base_url('assets/');?>images/icon/logoibl.png" >
		</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
				<?= $this->session->userdata('message');?>
        <form action="<?= base_url('auth');?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
						<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<?= form_error('password','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    