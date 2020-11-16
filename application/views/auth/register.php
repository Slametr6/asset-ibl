<div class="register-box">
      <div class="register-logo">
		<a href="#">
			<img src="<?= base_url('assets/');?>images/icon/logoibl.png" >
		</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new account</p>
		<?= $this->session->userdata('message');?>
        <form action="<?= base_url('auth/register');?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" id="name" placeholder="Full name" value="<?= set_value('name');?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?= form_error('name','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?= form_error('password','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password1" id="password1" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			<?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="register-link">
            <p>
                 Already have account?
                <a href="<?= base_url('auth');?>">Sign In</a>
            </p>
        </div>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
