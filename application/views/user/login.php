
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h1><?php echo $subtitle; ?></h1>
                <?php echo validation_errors(); ?>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php 
                        $attr = array(
                            'id'=>'loginForm'
                        );
                        echo form_open('/', $attr,false); ?>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <?php 
                                    $attributes = array(
                                        'class' => 'form-control',
                                        'title' => 'Please enter you username',
                                        'placeholder' => 'Please enter you username',
                                        'value' => set_value('username')
                                    );
                                    echo form_input('username', set_value('username'), $attributes);
                                    echo form_error('username', '<div class="alert alert-error">', '</div>'); ?>
                                <!-- <span class="help-block small">Your unique username to app</span> -->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <?php 
                                    $attributes = array(
                                        'class' => 'form-control',
                                        'title' => 'Please enter you username',
                                        'placeholder' => 'Please enter you username',
                                        'value' => set_value('username')
                                    );
                                    echo form_input('password', set_value('password'), $attributes);
                                    echo form_hidden('trylogin', 'true');
                                 ?>
                                <!-- <span class="help-block small">Yur strong password</span> -->
                                <?php echo form_error('password', '<div class="alert alert-error">', '</div>'); ?>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="#">Register</a>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>   
    </div>