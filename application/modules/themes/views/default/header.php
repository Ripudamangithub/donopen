<!-- Top bar starts -->
<div class="top-bar">
    <div class="container">

        <?php render_widget('top_bar'); ?>

        

        <!-- Langauge starts -->
        <div class="tb-language dropdown pull-right">
            <?php 
            $CI         = get_instance();
            $uri        = current_url();
            $curr_lang  = get_current_lang();
            $CI->load->config('classifieds');
            $languages = $CI->config->item('active_languages');
            ?>
            <a href="real-estate-index.html#" data-target="#" data-toggle="dropdown"><i class="fa fa-globe"></i> <?php echo (isset($languages[$curr_lang]))?$languages[$curr_lang]:'language';?> <i class="fa fa-angle-down color"></i></a>
            <!-- Dropdown menu with languages -->

            <?php
            if($CI->uri->segment(1)=='')
                $uri .= '/'.default_lang();            
            echo '<ul class="dropdown-menu dropdown-mini" role="menu">';
            $url = $uri;

            foreach ($languages as $short_name=>$long_name) {   
                $uri = str_replace('/'.$curr_lang,'/'.$short_name,$url);
                $sel = ($curr_lang==$short_name)?'active':'';
                echo '<li class="'.$sel.'"><a href="'.$uri.'">'.$long_name.'</a></li>';
            }
            echo '</ul>';
            ?>

        </div>
        <!-- Language ends -->

        <!-- Search section for responsive design -->
        <!--div class="tb-search pull-left">
            <a href="real-estate-index.html#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
            <div class="b-dropdown-block">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Something">
									<span class="input-group-btn">
										<button class="btn btn-color" type="button"><?php echo lang_key('search');?></button>
									</span>
                    </div>
                </form>
            </div>
        </div-->
        <!-- Search section ends -->

        <?php render_widget('top_bar_social'); ?>


        <div class="clearfix"></div>
    </div>
</div>

<!-- Top bar ends -->
<!-- Header two Starts -->
<div class="header-2">

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <!-- Logo section -->
                <div class="logo">
                    <h3><a href="<?php echo site_url();?>"><img src="<?php echo get_site_logo();?>" alt="Logo" style="height:63px"></a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 no-padding">
                <!-- Logo section -->
                <div class="logo">
                    <h6>Flat 10% off on new phones and 5% off on Quikr Certified Phones</h6>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">

                <!-- Navigation starts.  -->
                <div class="navy">
                    <ul class="pull-right open" style="display:block;">
                        <?php
                            $CI = get_instance();
                            $CI->load->model('admin/page_model');
                            $CI->page_model->init();
                        ?>



                        <?php 
                            $alias = (isset($alias))?$alias:'';
                            foreach ($CI->page_model->get_menu() as $li) 
                            {
                                if($li->parent==0)
                                $CI->page_model->render_top_menu($li->id,0,$alias);
                            }
                        ?>

                        <?php if(!is_loggedin()){?>
                        <li class="">
							<a><button class="btn signin btn-myaccount" onclick="location.href='#'" type="button"><i class="fa fa-user"></i> <?php echo lang_key('My Account');?></button></a>
                        </li>
                        <li class="">
							<a><button class="btn signup btn-postad" onclick="location.href='<?php echo site_url('post-ad');?>'" type="button"><?php echo lang_key('Post Free Ad');?></button></a>
                        </li>
                        <?php }else{ ?>
                        <li class="">
							<a><button class="btn btn-myaccount" onclick="location.href='<?php echo site_url('admin');?>'" type="button"><?php echo lang_key('My Account');?></button></a>
                        </li>
                        <li class="">
							<a><button class="btn signup btn-postad" onclick="location.href='<?php echo site_url('post-ad');?>'" type="button"><?php echo lang_key('Post Free Ad');?></button></a>
                        </li>
                        <?php }?>

                    </ul>
                </div>
                <!-- Navigation ends -->

            </div>

        </div>
    </div>
</div>

<!-- Header two ends -->


