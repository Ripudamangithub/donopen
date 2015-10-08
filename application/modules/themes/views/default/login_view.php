<div class="page-heading-two">
    <div class="container">
        <h2><?php echo lang_key('login');?></h2>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div class="row">
    <?php echo $this->session->flashdata('msg');?>
        <div class="col-md-7">
            <?php render_widget('login_page_description') ?>
        </div>
        <div class="col-md-5">
            <!-- Login starts -->
            <div class="well login-reg-form">
                <!-- Heading -->
                <h4><?php echo lang_key('login_to_your_account'); ?></h4>
                <hr />
                <!-- Form -->
                <form action="<?php echo site_url('account/login');?>" class="form-horizontal" role="form" method="post">
                            <!-- Form Group -->
                            <div class="form-group">
								<div class="controls">
									<div class="input-group">
										<input class="form-control" type="text" name="useremail" placeholder="<?php echo lang_key('email'); ?>">
										<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="controls">
									<div class="input-group">
										<input type="password" class="form-control"  name="password" placeholder="<?php echo lang_key('password'); ?>">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
									</div>
								</div>
							</div>
                            <?php if(constant("ENVIRONMENT")=='demo'){?>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                demo user : user@dbcinfotech.com pass: 12345
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <?php echo lang_key('remember_me'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <!-- Button -->
                                    <button type="submit" class="btn btn-embossed btn-warning btn-block"><?php echo lang_key('login'); ?></button>&nbsp;
                                </div>
								<div class="col-xs-8">
									<a href="<?php echo site_url('account/recoverpassword');?>" class="black"><?php echo lang_key('forgot_password'); ?> ?</a>
								</div>
                                <div class="col-xs-4" style="text-align:right;">
									<a href="<?php echo site_url('account/signup');?>" class="black"><?php echo lang_key('sign_up'); ?></a>
                                </div>
                            </div>
                        </form>
						<div class="or_social"></div>
                        <?php
                        $fb_enabled = get_settings('classified_settings','enable_fb_login','No');
                        $gplus_enabled = get_settings('classified_settings','enable_gplus_login','No');
                        if($fb_enabled=='Yes' || $gplus_enabled=='Yes'){
                        ?>
                        <!-- Social Media Login -->
                        <div class="row s-media text-center">
                            <!-- Button -->
							<div class="col-sm-6 col-xs-12">
								<?php if($gplus_enabled=='Yes'){?>
								<a href="<?php echo site_url('account/newaccount/google_plus');?>" class="btn btn-block btn-red btn-embossed"><i class="fa fa-google-plus"></i> &nbsp; <?php echo lang_key('login_with_google')?></a>
								<?php }?>
							</div>
							<div class="col-sm-6 col-xs-12">
								<?php if($fb_enabled=='Yes'){?>
								<a href="<?php echo site_url('account/newaccount/fb');?>" class="btn btn-block btn-embossed btn-blue"><i class="fa fa-facebook"></i> &nbsp; <?php echo lang_key('login_with_facebook')?></a>
								<?php }?>
							</div>
                        </div>
                        <?php } ?>
                    </div>
            <!-- Login ends -->
        </div>
    </div>
</div>
