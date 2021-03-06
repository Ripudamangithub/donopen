<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<style>
    #form-map{
        background-color: #e5e3df;
        height: 300px;
        width: 100%;
    }
    #form-map img { max-width: none; }
	.post_ad_display
	{
		display: none
	}
	.sell_prdct
	{
		display: block;
	}
</style>

<div class="page-heading-two">
    <div class="container">
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <?php echo lang_key('post_ad');?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">

        <form action="<?php echo site_url('create-ad');?>" method="post" role="form" class="form-horizontal">
            <?php echo $this->session->flashdata('msg');?>
            <?php if(isset($msg) && $msg!='') echo $msg;?>
                <!-- Shopping items content -->
                <div class="shopping-content">
                    <div class="shopping-checkout">
                        <!-- Heading -->
                            <h4 class="text-center post_ad_heading"><span><?php echo lang_key('Post Free Ad');?></span></h4>
							<div class="form-group">
							
								<!-- Label -->
								<label for="name" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<!-- Input -->
									<div class="radio col-md-3">
										<label>
											<input type="radio" name="buy_sell" value="Sell" checked <?php echo set_radio('buy_sell', 'Sell', TRUE); ?>/>
											<?php echo lang_key('I want to Sell');?></label>
									</div>
									<div class="radio col-md-3">
										<label>
											<input type="radio" name="buy_sell" value="Buy" <?php echo set_radio('buy_sell', 'Buy'); ?>/>
											<?php echo lang_key('I want to Buy');?></label>
									</div>
								</div>
							</div>
                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label" for="inputEmail1"><?php echo lang_key('category');?></label>
                                <div class="col-md-6">
                                    <select name="category" class="form-control">
                                        <option value=""><?php echo lang_key('select_category');?></option>
                                        <?php foreach ($categories as $row) {
                                            $sel = (set_value('category')==$row->id)?'selected="selected"':'';
                                        ?>
                                            <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $sel.lang_key($row->title);?></option>
                                        <?php
                                        }?>
                                    </select>
                                    <?php echo form_error('category');?>
                                </div>
                            </div>
							
                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label" for="inputEmail1"><?php echo lang_key('sub_category');?></label>
                                <div class="col-md-6">
                                    <select name="category" class="form-control">
                                        <option value=""><?php echo lang_key('select_category');?></option>
                                        <?php foreach ($sub_categories as $row) {
                                            $sel = (set_value('category')==$row->id)?'selected="selected"':'';
                                        ?>
                                            <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $sel.lang_key($row->title);?></option>
                                        <?php
                                        }?>
                                    </select>
                                    <?php echo form_error('sub_category');?>
                                </div>
                            </div>

							
                            <div class="form-group post_ad_display sell_prdct">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-6">
                                    <?php $chk = (isset($_POST['contact_for_price']))?'checked="checked"':'';?>
                                    <input type="checkbox" name="contact_for_price" id="contact_for_price" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="contact_for_price" class="contact_for_price_label"><?php echo lang_key('contact_for_price');?></label>
                                    <?php echo form_error('contact_for_price');?>
                                </div>
                            </div>

                            <div class="form-group price-input-holder post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('price');?></label>
                                <div class="col-md-6">
                                    <?php $v = (set_value('price')!='')?set_value('price'):'';?>
                                    <input type="text" name="price" placeholder="<?php echo lang_key('price');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('price');?>
                                </div>
                            </div>

							    <?php
								$CI = get_instance();
								$CI->load->model('admin/system_model');
								$langs = $CI->system_model->get_all_langs();
								?>



								<div class="tabbable">
									<div class="tab-content" id="myTabContent1">
										 <?php $flag=1; foreach ($langs as $lang=>$long_name){
										 ?>
										 <div id="<?php echo $lang;?>" class="tab-pane fade in <?php echo (default_lang()==$lang)?'active':'';?>">

											<div class="form-group post_ad_display sell_prdct buy_prdct buy_prdct">
												<label class="col-md-3 control-label"><?php echo lang_key('Post Title');?></label>
												<div class="col-md-6">
													<?php $v = (set_value('title_'.$lang)!='')?set_value('title_'.$lang):'';?>
													<input type="text" name="title_<?php echo $lang;?>" placeholder="<?php echo lang_key('title');?>" value="<?php echo $v;?>" class="form-control">
													<?php echo form_error('title_'.$lang);?>
												</div>
											</div>
											
											
											<h4 class="text-center post_ad_heading"><span><?php echo lang_key('Equipment Informations');?></span></h4>
											<div class="form-group post_ad_display sell_prdct">
												<label class="col-md-3 control-label"><?php echo lang_key('manufacturer');?></label>
												<div class="col-md-6">
												<?php $v = (set_value('manufacturer')!='')?set_value('manufacturer'):'';?>
													<input id="manufacturer" type="text" name="manufacturer" placeholder="<?php echo lang_key('Manufacturer');?>" value="<?php echo $v;?>" class="form-control">
													<?php echo form_error('manufacturer');?>
												</div>
											</div>
											
											<div class="form-group post_ad_display sell_prdct">
												<label class="col-md-3 control-label"><?php echo lang_key('Manufacturing Year');?></label>
												<div class="col-md-6">
												<?php $v = (set_value('manufacturing_year')!='')?set_value('manufacturing_year'):'';?>
													<input id="manufacturing_year" type="text" name="manufacturing_year" placeholder="<?php echo lang_key('Manufacturing Year');?>" value="<?php echo $v;?>" class="form-control">
													<?php echo form_error('manufacturing_year');?>
												</div>
											</div>
																						
											<div class="form-group post_ad_display sell_prdct buy_prdct">
												<!-- Label -->
												<label for="name" class="col-sm-3 control-label">Condition</label>
												<div class="col-sm-9">
													<!-- Input -->
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="condition" value="New" <?php echo set_radio('condition', 'New', TRUE); ?>/>
															<?php echo lang_key('New');?></label>
													</div>
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="condition" value="Pre-Owned" <?php echo set_radio('condition', 'Pre-Owned'); ?>/>
															<?php echo lang_key('Pre-Owned');?></label>
													</div>
												</div>
											</div>
											<div class="form-group post_ad_display sell_prdct">
												<!-- Label -->
												<label for="name" class="col-sm-3 control-label">Working Condition</label>
												<div class="col-sm-9">
													<!-- Input -->
													<div class="radio col-md-3">
														<label>
															<input type="checkbox" name="working_condition" value="Ready-to-use" <?php echo set_radio('working_condition', 'Ready-to-use', TRUE); ?>/>
															<?php echo lang_key('Ready to Use');?></label>
													</div>
													<div class="radio col-md-3">
														<label>
															<input type="checkbox" name="working_condition" value="As-it-is" <?php echo set_radio('working_condition', 'As-it-is'); ?>/>
															<?php echo lang_key('As it is condition');?></label>
													</div>
												</div>
											</div>
											
											
											<div class="form-group post_ad_display sell_prdct">
												<!-- Label -->
												<label for="name" class="col-sm-3 control-label">Available for Inspection</label>
												<div class="col-sm-9">
													<!-- Input -->
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="Inspection" value="Yes" <?php echo set_radio('Inspection', 'Yes', TRUE); ?>/>
															<?php echo lang_key('Yes');?></label>
													</div>
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="Inspection" value="No" <?php echo set_radio('Inspection', 'No'); ?>/>
															<?php echo lang_key('No');?></label>
													</div>
												</div>
											</div>
											
											<div class="form-group post_ad_display sell_prdct">
												<!-- Label -->
												<label for="name" class="col-sm-3 control-label">Warranty Available</label>
												<div class="col-sm-9">
													<!-- Input -->
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="Warranty" value="Warranty-Yes" <?php echo set_radio('Warranty', 'Warranty-Yes', TRUE); ?>/>
															<?php echo lang_key('Yes');?></label>
													</div>
													<div class="radio col-md-3">
														<label>
															<input type="radio" name="Warranty" value="Warranty-No" <?php echo set_radio('Warranty', 'Warranty-No'); ?>/>
															<?php echo lang_key('No');?></label>
													</div>
												</div>
											</div>

											<div class="form-group post_ad_display buy_prdct">
												<label class="col-md-3 control-label"><?php echo lang_key('Min Required Quantity');?></label>
												<div class="col-md-6">
													<?php $v = (set_value('required_quantity')!='')?set_value('required_quantity'):'';?>
													<input id="required_quantity" type="text" name="required_quantity" placeholder="<?php echo lang_key('Required Quantity');?>" value="<?php echo $v;?>" class="form-control">
													<?php echo form_error('required_quantity');?>
												</div>
											</div>
											
											<div class="form-group  post_ad_display sell_prdct buy_prdct">
												<label class="col-md-3 control-label"><?php echo lang_key('description');?></label>
												<div class="col-md-6">
													<?php $v = (set_value('description_'.$lang)!='')?set_value('description_'.$lang):'';?>
													<textarea rows="8" name="description_<?php echo $lang;?>" class="form-control"><?php echo $v;?></textarea>
													<?php echo form_error('description');?>
												</div>
											</div>
											
										</div>
										<?php $flag++; }?>
									</div>
								</div>



									<div class="form-group post_ad_display sell_prdct">
										<label class="col-md-3 control-label"><?php echo lang_key('tags');?></label>
										<div class="col-md-6">
											<?php $v = (set_value('tags')!='')?set_value('tags'):'';?>
											<textarea rows="1" name="tags" class="form-control tag-input"><?php echo $v;?></textarea>
											<span><?php echo lang_key('put_as_comma_seperated')?></span>
											<?php echo form_error('tags');?>
										</div>
									</div>

									<div class="form-group  post_ad_display sell_prdct">
										<label class="col-md-3 control-label"><?php echo lang_key('featured_image');?></label>
										<div class="col-md-6">
											<div class="featured-img">
												<?php $v = (set_value('featured_img')!='')?set_value('featured_img'):'';?>
												<input type="hidden" name="featured_img" id="featured-img-input" value="<?php echo $v;?>">
												<img id="featured-img" src="<?php echo base_url('uploads/images/no-image.png');?>">
												<div class="upload-button"><?php echo lang_key('upload');?></div>
												<?php echo form_error('featured_img');?>
											</div>
										</div>
									</div>

									<?php if(get_settings('package_settings','enable_pricing','No')=='Yes'){?>
									<div class="form-group post_ad_display sell_prdct">
										<label class="col-md-3 control-label" style="padding:10px 0;"><?php echo lang_key('selected_package');?></label>
										<div class="col-md-6">
											<?php
											$CI = get_instance();
											$CI->load->model('admin/package_model');
											$package  = $CI->package_model->get_package_by_id($this->session->userdata('selected_package'));
											?>
											<div class="clearfix" style="margin-top:5px;"></div>

											<div class="" style="padding:10px 0;font-weight:bold">
												<?php echo lang_key($package->title);?><br/>
												<?php echo lang_key('price');?> : <?php echo show_package_price($package->price);?><br/>
												<?php echo lang_key('expirtion_time');?> : <?php echo $package->expiration_time;?> <?php echo lang_key('days'); ?>
											</div>
											<div class="clearfix" style="margin-top:5px;"></div>
											<a href="<?php echo site_url('choose-package');?>" class=""><?php echo lang_key('change_package');?></a>
										</div>
									</div>
									<?php }?>



									<div class="form-group post_ad_display sell_prdct">
										<label class="col-md-3 control-label"><?php echo lang_key('gallery');?></label>
										<div class="col-md-6">
											<ul class="multiple-uploads">
												<li class="add-image" id="dragandrophandler">+</li>
											</ul>       
											<div class="clearfix"></div>
											<span class="gallery-upload-instruction">NB: you can drag drop to reorder the gallery photos. Photos are not resized.</span>
											<div class="clearfix clear-top-margin"></div>
										</div>
									</div>  
            
                            <h4 class="text-center post_ad_heading"><span><?php echo lang_key('Seller/Buyer Informations');?></span></h4>
							<div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('phone');?></label>
                                <div class="col-md-6">
                                    <?php $v = (set_value('phone_no')!='')?set_value('phone_no'):'';?>
                                    <input id="phone_no" type="text" name="phone_no" placeholder="<?php echo lang_key('phone');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('phone_no');?>
                                </div>
                            </div>
							
							<div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('Email');?></label>
                                <div class="col-md-6">
                                    <?php $v = (set_value('email')!='')?set_value('email'):'';?>
                                    <input id="phone_no" type="text" name="email" placeholder="<?php echo lang_key('Email');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('email');?>
                                </div>
                            </div>

                            <!--<div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-6">
                                    <?php $chk = (isset($_POST['hide_my_phone']))?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_phone" id="hide_my_phone" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_phone" class="hide_my_phone_label"><?php echo lang_key('hide_my_phone');?></label>
                                    <?php echo form_error('hide_my_phone');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-6">
                                    <?php $chk = (isset($_POST['hide_my_email']))?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_email" id="hide_my_email" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_email" class="hide_my_email_label"><?php echo lang_key('hide_my_email');?></label>
                                    <?php echo form_error('hide_my_email');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <?php $chk = (isset($_POST['hide_my_address']))?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_address" id="hide_my_address" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_address" class="hide_my_address_label"><?php echo lang_key('hide_my_address');?></label>
                                    <?php echo form_error('hide_my_address');?>
                                </div>
                            </div>
                            -->

                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('country');?></label>
                                <div class="col-md-6">
                                    <select name="country" id="country" class="form-control">
                                        <option data-name="" value=""><?php echo lang_key('select_country');?></option>
                                        <?php foreach (get_all_locations_by_type('country')->result() as $row) {
                                            $sel = ($row->id==set_value('country'))?'selected="selected"':'';
                                            ?>
                                            <option data-name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                        <?php }?>
                                    </select>
                                    <?php echo form_error('country');?>
                                </div>
                            </div>
                        <?php $state_active = get_settings('classified_settings', 'show_state_province', 'yes'); ?>
                        <?php if($state_active == 'yes'){ ?>
                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('state');?></label>
                                <div class="col-md-6">
                                    <select name="state" id="state" class="form-control">

                                    </select>
                                    <?php echo form_error('state');?>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('city');?></label>
                                <div class="col-md-6">
                                    <?php $city_field_type = get_settings('classified_settings', 'city_dropdown', 'autocomplete'); ?>
                                    <input type="hidden" name="selected_city" id="selected_city" value="<?php echo(set_value('selected_city')!='')?set_value('selected_city'):'';?>">
                                    <?php if ($city_field_type=='dropdown') {?>
                                    <select name="city" id="city_dropdown" class="form-control">                                        
                                    </select>
                                    <?php }else {?>
                                    <input type="text" id="city" name="city" value="<?php echo(set_value('city')!='')?set_value('city'):'';?>" placeholder="<?php echo lang_key('city');?>" class="form-control" >
                                    <?php }?>
                                    <?php echo form_error('city');?>
                                </div>
                            </div>
							
                            <div class="form-group post_ad_display sell_prdct buy_prdct">
                                <label class="col-md-3 control-label"><?php echo lang_key('address');?></label>
                                <div class="col-md-6">
                                <?php $v = (set_value('address')!='')?set_value('address'):'';?>
                                    <input id="address" type="text" name="address" placeholder="<?php echo lang_key('address');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('address');?>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="radio col-md-8">
									<label>
										<input type="checkbox" name="working_condition" value="Ready-to-use" <?php echo set_radio('working_condition', 'Ready-to-use', TRUE); ?>/>
										<?php echo lang_key('I have read <a href="3">Terms and Conditions</a> and I accept to Post the Ad.');?></label>
								</div>
							</div>
							
                    </div>
                </div>
				


<<<<<<< HEAD
=======
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('featured_image');?></label>
                    <div class="col-md-8">
                        <div class="featured-img">
                            <?php $v = (set_value('featured_img')!='')?set_value('featured_img'):'';?>
                            <input type="hidden" name="featured_img" id="featured-img-input" value="<?php echo $v;?>">
                            <img id="featured-img" src="<?php echo base_url('uploads/images/no-image.png');?>">
                            <div class="upload-button"><?php echo lang_key('upload');?></div>
                            <?php echo form_error('featured_img');?>
                        </div>
                    </div>
                </div>

                <?php if(get_settings('package_settings','enable_pricing','No')=='Yes'){?>
                <div class="form-group">
                    <label class="col-md-3 control-label" style="padding:10px 0;"><?php echo lang_key('selected_package');?></label>
                    <div class="col-md-8">
                        <?php
                        $CI = get_instance();
                        $CI->load->model('admin/package_model');
                        $package  = $CI->package_model->get_package_by_id($this->session->userdata('selected_package'));
                        ?>
                        <div class="clearfix" style="margin-top:5px;"></div>

                        <div class="" style="padding:10px 0;font-weight:bold">
                            <?php echo lang_key($package->title);?><br/>
                            <?php echo lang_key('price');?> : <?php echo show_package_price($package->price);?><br/>
                            <?php echo lang_key('expirtion_time');?> : <?php echo $package->expiration_time;?> <?php echo lang_key('days'); ?>
                        </div>
                        <div class="clearfix" style="margin-top:5px;"></div>
                        <a href="<?php echo site_url('choose-package');?>" class=""><?php echo lang_key('change_package');?></a>
                    </div>
                </div>
                <?php } ?>



                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('gallery');?></label>
                    <div class="col-md-8">
                        <?php $tmp_gallery = ($post->gallery!='')?json_decode($post->gallery):array();?>
                        <?php $gallery = (isset($_POST['gallery']))?$_POST['gallery']:$tmp_gallery;?>
                        <ul class="multiple-uploads">
                            <?php foreach ($gallery as $item) {
                            ?>
                            <li class="gallery-img-list">
                              <input type="hidden" name="gallery[]" value="<?php echo $item;?>" />
                              <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />
                              <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>
                            </li>
                            <?php }?>
                            <li class="add-image" id="dragandrophandler">+</li>
                        </ul>       
                        <div class="clearfix"></div>
                        <span class="gallery-upload-instruction">NB: you can drag drop to reorder the gallery photos. Photos are not resized.</span>
                        <div class="clearfix clear-top-margin"></div>
                    </div>
                </div>  
            
>>>>>>> origin/master

        <div class="row">
				<hr>
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group" style="text-align:center">
                    <button class="btn btn-red btn-block" type="submit"><?php echo lang_key('Post Ad');?></button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script src="<?php echo theme_url();?>/assets/js/markercluster.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map-icons.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map_config.js"></script>

<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>
<?php require'multiple-uploader.php';?>
<?php require'bulk_uploader_view.php';?>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Sell"){
            $(".post_ad_display").not(".sell_prdct").hide();
            $(".sell_prdct").show();
        }
        if($(this).attr("value")=="Buy"){
            $(".post_ad_display").not(".buy_prdct").hide();
            $(".buy_prdct").show();
        }
    });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery('#photoimg').attr('target','.multiple-uploads');
    jQuery('#photoimg').attr('input','gallery');
    var obj = $("#dragandrophandler");
    obj.on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', '2px solid #0B85A1');
    });

    obj.on('dragover', function (e)
    {
         e.stopPropagation();
         e.preventDefault();
    });

    obj.on('drop', function (e)
    {
     
         $(this).css('border', '2px dotted #0B85A1');
         e.preventDefault();
         var files = e.originalEvent.dataTransfer.files;
         //console.log(files);
         //We need to send dropped files to Server
         handleFileUpload(files,obj);
    });

    $(document).on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).on('dragover', function (e)
    {
      e.stopPropagation();
      e.preventDefault();
      obj.css('border', '2px dotted #0B85A1');
    });
    
    $(document).on('drop', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    jQuery('.multiple-uploads > .add-image').click(function(){
        jQuery('#photoimg').attr('target','.multiple-uploads');
        jQuery('#photoimg').attr('input','gallery');
        jQuery('#photoimg').click();
    });

    jQuery( ".multiple-uploads" ).sortable();
});
</script>


<script type="text/javascript">
jQuery(document).ready(function(){

    var city_field_type =  '<?php echo get_settings("classified_settings", "city_dropdown", "autocomplete"); ?>' ;
    //alert(city_field_type);

    jQuery('#contact_for_price').click(function(){
        show_hide_price();
    });
    show_hide_price();

    jQuery('.upload-button').click(function(){
        jQuery('#photoimg_featured').click();
    });

    jQuery('#featured-img-input').change(function(){
        var val = jQuery(this).val();
        if(val=='')
        {
            val = 'no-image.png';
        }

        var base_url  = '<?php echo base_url();?>';
        var image_url = base_url+'uploads/thumbs/'+val;
        jQuery( '#featured-img' ).attr('src',image_url);

    }).change();

    var site_url = '<?php echo site_url();?>';
    jQuery('#country').change(function(){
        // jQuery('#city').val('');
        // jQuery('#selected_city').val('');
        var val = jQuery(this).val();
        var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;
        jQuery.post(
            loadUrl,
            {},
            function(responseText){
                <?php if($state_active=='yes'){?>
                jQuery('#state').html(responseText);
                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):'';?>';
                var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):'';?>';
                if(val==sel_country)
                jQuery('#state').val(sel_state);
                else
                jQuery('#state').val('');
                jQuery('#state').trigger('change');
                <?php }else{?>
                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):'';?>';
                var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):'';?>';
                var city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';
                if(city_field_type=='dropdown')
                populate_city(val); //populate the city drop down
                if(val==sel_country)
                {
                    jQuery('#selected_city').val(sel_city);
                    jQuery('#city').val(city);
                }
                else
                {
                    jQuery('#selected_city').val('');
                    jQuery('#city').val('');
                }
                <?php }?>

            }
        );
     }).change();

    jQuery('#state').change(function(){
        <?php if($state_active=='yes'){?>
        var val = jQuery(this).val();
        var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):'';?>';
        var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):'';?>';
        var city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';

        if(city_field_type=='dropdown')
        populate_city(val); //populate the city drop down

        if(val==sel_state)
        {
            jQuery('#selected_city').val(sel_city);
            jQuery('#city').val(city);
        }
        else
        {
            jQuery('#selected_city').val('');
            jQuery('#city').val('');
        }
        <?php }?>

    });

    <?php if($state_active == 'yes'){ ?>

        var parent = '#state';
    <?php } else { ?>

        var parent = '#country';
    <?php } ?>

    if(city_field_type=='autocomplete') {
        jQuery( "#city" ).bind( "keydown", function( event ) {
            if ( event.keyCode === jQuery.ui.keyCode.TAB &&
                jQuery( this ).data( "ui-autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
            .autocomplete({
                source: function( request, response ) {

                    jQuery.post(
                        "<?php echo site_url('show/get_cities_ajax');?>/",
                        {term: request.term,parent: jQuery(parent).val()},
                        function(responseText){
                            response(responseText);
                            jQuery('#selected_city').val('');
                            jQuery('.city-loading').html('');
                        },
                        "json"
                    );
                },
                search: function() {
                    // custom minLength
                    var term = this.value ;
                    if ( term.length < 2 || jQuery(parent).val()=='') {
                        return false;
                    }
                    else
                    {
                        jQuery('.city-loading').html('Loading...');
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    this.value = ui.item.value;
                    jQuery('#selected_city').val(ui.item.id);
                    jQuery('.city-loading').html('');
                    return false;
                }
            });
    }
    else if(city_field_type=='dropdown') {
        jQuery('#city_dropdown').change(function (){
            var val = jQuery('option:selected', this).attr('city_id');
            jQuery('#selected_city').val(val);
        });
    }



});
function show_hide_price()
{
    var val = jQuery('#contact_for_price').attr('checked');
    if(val=='checked')
    {
        jQuery('.price-input-holder').hide();
    }
    else
    {
        jQuery('.price-input-holder').show();
    }
}

function populate_city(parent) {
    var site_url = '<?php echo site_url();?>';
    var loadUrl = site_url+'/show/get_city_dropdown_by_parent_ajax/'+parent;
        jQuery.post(
            loadUrl,
            {},
            function(responseText){
                jQuery('#city_dropdown').html(responseText);
                var sel_city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';
                jQuery('#city_dropdown').val(sel_city);
            }
        );
}
</script>

<script type="text/javascript">
    var markers = [];
    //    var map;
    var Ireland = "Dhaka, Bangladesh";
    function initialize() {

        var myLatitude = parseFloat('<?php echo get_settings("banner_settings","map_latitude", 37.2718745); ?>');
        var myLongitude = parseFloat('<?php echo get_settings("banner_settings","map_longitude", -119.2704153); ?>');
        var myLatlng = new google.maps.LatLng(myLatitude,myLongitude);

        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: myLatlng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: MAP_STYLE
        };
        map = new google.maps.Map(document.getElementById("form-map"),
            mapOptions);

        var ex_latitude = $('#latitude').val();
        var ex_longitude = $('#longitude').val();

        if (ex_latitude != '' && ex_longitude != ''){
            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result
            var marker = new google.maps.Marker(
                {
                    map: map,
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(ex_latitude, ex_longitude)
                });

            markers.push(marker);
            google.maps.event.addListener(marker, 'dragend', function()
            {
                var marker_positions = marker.getPosition();
                $('#latitude').val(marker_positions.lat());
                $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
            });

        }

    }

    function codeAddress()
    {
        var main_address = $('#address').val();
        var country = $('#country').find(':selected').data('name');
        var state = $('#state').find(':selected').data('name');
        var city = '';
        
        var city_field_type =  '<?php echo get_settings("classified_settings", "city_dropdown", "autocomplete"); ?>' ;
        if(city_field_type=='dropdown') {
            city = $('#city_dropdown').find(':selected').text();
        }
        else{

            city = $('#city').val();
        }

        <?php if($state_active == 'yes'){ ?>

        var address = [main_address, city, state, country].join();
        <?php } else { ?>

        var address = [main_address, city, country].join();
        <?php } ?>


        if(country != '' && city != '')
        {


            setAllMap(null); //Clears the existing marker

            geocoder.geocode( {address:address}, function(results, status)
            {
                if (status == google.maps.GeocoderStatus.OK)
                {
//                    console.log(results[0].geometry.location.lat());
                    $('#latitude').val(results[0].geometry.location.lat());
                    $('#longitude').val(results[0].geometry.location.lng());
                    map.setCenter(results[0].geometry.location);//center the map over the result


                    //place a marker at the location
                    var marker = new google.maps.Marker(
                        {
                            map: map,
                            draggable:true,
                            animation: google.maps.Animation.DROP,
                            position: results[0].geometry.location
                        });

                    markers.push(marker);


                    google.maps.event.addListener(marker, 'dragend', function()
                    {
                        var marker_positions = marker.getPosition();
                        $('#latitude').val(marker_positions.lat());
                        $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }
        else{
            alert('You must enter at least country and city');
        }

    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
